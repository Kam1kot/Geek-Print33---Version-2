<?php

header('Content-Type: application/json');
$response = ['success' => false, 'error' => ''];

// Папка для загрузки (убедитесь, что она существует и доступна для записи)
$uploadDir = '/uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// 1. Проверка наличия файла
if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    $response['error'] = 'Файл изображения не был загружен или произошла ошибка.';
    echo json_encode($response);
    exit;
}

$uploadedFile = $_FILES['image'];
$tempPath = $uploadedFile['tmp_name'];
$mimeType = $uploadedFile['type'];

// 2. Получение данных кадрирования
if (!isset($_POST['cropData'])) {
    $response['error'] = 'Данные кадрирования (cropData) не получены.';
    echo json_encode($response);
    exit;
}

$cropDataJson = $_POST['cropData'];
$cropData = json_decode($cropDataJson, true);

if (json_last_error() !== JSON_ERROR_NONE || !is_array($cropData)) {
    $response['error'] = 'Некорректный формат JSON для cropData.';
    echo json_encode($response);
    exit;
}

// Извлечение координат
// floatval() используется, так как Cropper.js может возвращать числа с плавающей точкой
$x = intval(floatval($cropData['x']));
$y = intval(floatval($cropData['y']));
$w = intval(floatval($cropData['width']));
$h = intval(floatval($cropData['height']));

// 3. Функция для обрезки изображения с использованием GD
function crop_image_gd($sourcePath, $mimeType, $x, $y, $w, $h, $uploadDir) {
    // 3.1. Создание исходного изображения (ресурса GD)
    $sourceImage = null;
    $outputFunction = null; // Функция для сохранения (imagejpeg, imagepng и т.д.)
    $extension = '';

    if ($mimeType == 'image/jpeg' || $mimeType == 'image/pjpeg') {
        $sourceImage = imagecreatefromjpeg($sourcePath);
        $outputFunction = 'imagejpeg';
        $extension = 'jpg';
    } elseif ($mimeType == 'image/png') {
        $sourceImage = imagecreatefrompng($sourcePath);
        // Сохраняем прозрачность для PNG
        imagealphablending($sourceImage, true);
        imagesavealpha($sourceImage, true);
        $outputFunction = 'imagepng';
        $extension = 'png';
    } elseif ($mimeType == 'image/gif') {
        $sourceImage = imagecreatefromgif($sourcePath);
        $outputFunction = 'imagegif';
        $extension = 'gif';
    } else {
        return false; // Неподдерживаемый тип
    }

    if ($sourceImage === false) {
        return false;
    }

    // 3.2. Создание нового пустого изображения для обрезки
    $croppedImage = imagecreatetruecolor($w, $h);

    if ($mimeType == 'image/png' || $mimeType == 'image/gif') {
        // Поддержка прозрачности для PNG и GIF
        imagealphablending($croppedImage, false);
        imagesavealpha($croppedImage, true);
        $transparent = imagecolorallocatealpha($croppedImage, 255, 255, 255, 127);
        imagefilledrectangle($croppedImage, 0, 0, $w, $h, $transparent);
    }
    
    // 3.3. Обрезка: Копирование части исходного изображения в новое
    // imagecopyresampled(dst_image, src_image, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
    imagecopyresampled($croppedImage, $sourceImage, 0, 0, $x, $y, $w, $h, $w, $h);

    // 3.4. Сохранение файла
    $newFileName = uniqid() . '_cropped.' . $extension;
    $savePath = $uploadDir . $newFileName;
    
    // Вызов соответствующей функции сохранения (imagejpeg, imagepng и т.д.)
    $outputFunction($croppedImage, $savePath);

    // Очистка памяти
    imagedestroy($sourceImage);
    imagedestroy($croppedImage);
    
    return $newFileName;
}

// 4. Запуск обрезки
$newFileName = crop_image_gd($tempPath, $mimeType, $x, $y, $w, $h, $uploadDir);

if ($newFileName) {
    // 5. Успех
    $response['success'] = true;
    $response['url'] = $uploadDir . $newFileName;
} else {
    $response['error'] = 'Не удалось обработать изображение или его тип не поддерживается (GD).';
}

echo json_encode($response);