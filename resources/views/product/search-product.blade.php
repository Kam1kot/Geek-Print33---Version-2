<ul class="search-product__wrapper">
    <li class="d-flex align-items-center justify-content-between">
        <div class="search-product__img-wrapper">
            <img width="90" height="90" src="{{ asset('imgs/products/shark.jpg') }}"
                alt="${item.title}"
                class="">
            {{-- <img width="90" height="90" src="{{ asset('') }}"> --}}
        </div>
        <div class="search-product__details d-flex align-items-centert text-start">
            <div class="name fw-bold">
                <a href="${link}" class="">${item.title}</a>
            </div>
            <div class="category">
                <a href="${link}" class="">${item.title}</a>
            </div>
        </div>
        <div class="search-product__price fw-bold"><p>${item.price} ₽</p></div>
    </li>
</ul>