<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('imgs/technical/favicon.png') }}">
    <title>{{ config('app.name') }} | {{ $title }}</title>
    
    {{-- Текст --}}
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap');
      .indie-flower-regular {
      font-family: "Indie Flower", cursive;
      font-weight: 400;
      font-style: normal;
      }
    </style>

    {{-- CSS файл --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    {{-- Бутстрап --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    {{-- Иконки --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    {{-- Админка --}}
    <link rel="preload" href="./css/adminlte.css" as="style" />

    {{-- Плагины админки --}}
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="./css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />
    <!-- jsvectormap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
      integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
      crossorigin="anonymous"
    />
    {{-- swiperjs --}}
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"
    />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  @include('partials.cookie-notification')
  <header class="topbar">
    @include('includes.main.navbar')
  </header>
  <aside class="sidebar">
    @include('includes.main.sidebar')
  </aside>
  <div class="content">
    <main>
      @yield('main-content')
    </main>
    <footer>
      @include('includes.main.footer')
    </footer>
  </div>
</body> 
</html>