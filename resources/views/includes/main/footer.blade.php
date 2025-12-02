<div class="footer-wrapper">
    <div class="footer-inner p-3">
            <div>1</div>
            <div>2</div>
            <div>3</div>
    </div>


    {{-- Скрипты --}}

    {{-- Админка --}}
    <script src="./js/adminlte.js"></script>

    {{-- Бутстрап --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    {{-- swiperjs --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <script src="./js/swiper.js"></script>

    {{-- Логика появления fade-in --}}
    <script>
        const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            }
        });
        }, {
        threshold: 0.50 // При 0.XX показывать элемент
        });

        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
    </script>

    {{-- Копирование почты --}}
    <script>
        function copyText(element) {
            const email = 'Geek-print33@yandex.ru'

            navigator.clipboard.writeText(email).then(() => {
                const originalText = element.innerHTML;
                element.innerHTML = 'Почта скопирована!';
                setTimeout(() => {
                    element.innerHTML = originalText;
                }, 1500);
            })
            .catch(err => {
                alert('Не удалось скопировать почту: ' + err);
            });
        }
    </script>
</div>