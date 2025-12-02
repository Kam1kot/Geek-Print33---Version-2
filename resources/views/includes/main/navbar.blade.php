<div class="navbar-wrapper sticky-top">
    <div class="logo">
        <img width="25px" style="height: 40px !important;" loading="lazy" src="{{ asset('imgs/technical/logo.png') }}"></img>
        <a class="indie-flower-regular fs-1 fw-bold text-nowrap" href="{{ route('main.index') }}"><span class="title-geek">Geek</span>-Print33</a>
    </div>
    <div class="navbar-other">
        <div class="divider"></div>
        <form class="searchForm" method="get" action="{{ route('products.index') }}">
            <input class="form-control" placeholder="Поиск по товарам...">
            <i class="fa-solid fa-magnifying-glass"></i>
        </form>
        
        <div class="actions">
            <button class="wishlist">
                <i class="fa-solid fa-heart"></i>
            </button>
            <button class="cart">
                <i class="fa-solid fa-basket-shopping"></i>
                Корзина
            </button>
        </div>
    </div>
</div>
