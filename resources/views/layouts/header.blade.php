<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('imgs/technical/favicon.png') }}">
    <title>{{ config('app.name') }} | {{ $title }}</title>
    <base href="{{ asset('/') }}">
    
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
    <div class="navbar-wrapper sticky-top">
      <div class="logo">
          <img width="25px" style="height: 40px !important;" loading="lazy" src="{{ asset('imgs/technical/logo.png') }}"></img>
          <a class="indie-flower-regular fs-1 fw-bold text-nowrap" href="{{ route('main.index') }}"><span class="title-geek">Geek</span>-Print33</a>
      </div>
      <div class="navbar-other">
          <div class="divider"></div>
          <form class="searchForm" method="get" action="{{ route('products.index') }}">
              <input class="form-control" type="text" id="search-input" placeholder="Поиск по товарам...">
              <i class="fa-solid fa-magnifying-glass"></i>
          </form>

          <div class="search-popup__results">
            <ul id="box-content-search">

            </ul>
          </div>
          
          <div class="actions">
              <button class="wishlist">
                    <a href="{{ route('wishlist.index') }}">
                        <i class="fa-solid fa-heart"></i>
                        @if($items_wishlist->count()>0)
                          <span class="wishlist-amount position-absolute js-cart-items-count">{{ $items_wishlist->count() }}</span>
                        @endif
                    </a>
              </button>
              <button class="cart">
                  <a href="{{ route('cart.index') }}" clsas="position-relative">
                        <i class="fa-solid fa-basket-shopping"></i>
                      Корзина
                      @if($items_cart->count()>0)
                          <span class="cart-amount position-absolute js-cart-items-count">{{ $items_cart->count() }}</span>
                      @endif
                  </a>
              </button>
          </div>
      </div>
  </div>
  </header>
  <aside class="sidebar">
    <nav class="mt-5">
      <ul
          class="nav sidebar-menu flex-column"
          data-lte-toggle="treeview"
          role="navigation"
          data-accordion="false"
          id="navigation"
      >
          <li class="nav-item">
              <a href="{{ route('main.index') }}" class="nav-link active">
                  <i class="fa-solid fa-house-chimney"></i>
                  <p>
                  Главная
                  </p>
              </a>
          </li>
          <li class="nav-item menu-open">
              <a class="nav-link">
                  <i class="fa-solid fa-align-justify"></i>
                  <p>
                  Каталог
                  <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{ route('products.index') }}" class="nav-link active">
                      <i class="fa-solid fa-arrow-right-long"></i>
                      <p>Все</p>
                      </a>
                  </li>

                  @foreach ($categories as $cat)
                  <li class="nav-item">
                      <a href="{{ url('/products?category_id[]=') . $cat->id }}" class="nav-link">
                          <i class="fa-solid fa-arrow-right-long"></i>
                          <p>{{ $cat->title }}</p>
                      </a>
                  </li>
                  @endforeach
              </ul>
          </li>
          <li class="nav-item">
              <a href="{{ route('main.about_us') }}" class="nav-link active">
                  <i class="fa-solid fa-users-between-lines"></i>
                  <p>
                      О нас
                  </p>
              </a>
          </li>
          <li class="nav-item">
              <a href="{{ route('main.delivery') }}" class="nav-link active">
                  <i class="fa-solid fa-truck"></i>
                  <p>
                  Доставка и оплата
                  </p>
              </a>
          </li>
          <li class="nav-item">
              <a href="{{ route('main.contacts') }}" class="nav-link active">
                  <i class="fa-solid fa-phone"></i>
                  <p>
                  Контакты
                  </p>
              </a>
          </li>
      </ul>
  </nav>
  <div class="sidebar-info">
      <hr>
      <div class="sidebar-info-inner p-4 text-center">
          <i class="fa-solid fa-cube"></i>
          3D-услуги
      </div>
  </div>
  </aside>
  <div class="content">

    <main>
        @yield('main-content')
    </main>

    <footer>
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
            <script>
                $(function(){
                    $("#search-input").on("keyup", function() {
                        var searchQuery = $(this).val();

                        if (searchQuery.length > 2) {
                            $.ajax({
                                type: 'get',
                                url: "{{ route('main.search') }}",
                                data: {query: searchQuery},
                                dataType: 'json',
                                success: function(data){
                                    
                                }
                            })
                        }
                    })
                })
            </script>
        </div>
    </footer>
  </div>
</body> 
</html>