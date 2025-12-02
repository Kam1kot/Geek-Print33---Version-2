<nav class="mt-5">
    <ul
        class="nav sidebar-menu flex-column"
        data-lte-toggle="treeview"
        role="navigation"
        aria-label="Main navigation"
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
        <li class="nav-item">
            <a class="nav-link active">
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