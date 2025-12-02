<div class="product-card d-flex flex-column">
    {{-- изображение --}}
    <img src="{{ asset('imgs/products/shark.jpg') }}"
         alt="{{ $product->title }}"
         class="product-card__image">

    {{-- название --}}
    <a href='/' class="product-card__title fs-5 fw-bold">{{ $product->title }}</a>
    <p class="product-card__category mb-2">{{ $product->category->title }}</p>
    
    {{-- описание (макс. 3 строки) --}}
    <p class="product-card__description mb-2"
       style="display: -webkit-box;
              -webkit-line-clamp: 3;
              -webkit-box-orient: vertical;
              overflow: hidden;">
        {{ $product->description }}
    </p>

    {{-- теги --}}
    <div class="product-card__tags mb-2"
         style="min-height: 26px;">
        @foreach ($product->tags as $tag)
            <span class="product-card__tag">{{ $tag->title }}</span>
        @endforeach
    </div>

    {{-- цена и кнопки «прижаты» к низу --}}
    <div class="mt-auto">
        <div class="product-card__actions">
            <div class="product-card__price">
                <span class="product-card__price-value fs-4 fw-bold">{{ $product->price }} ₽</span>
            </div>
            <div class="product-card__btns">
                <button class="product-card__heart fw-bold">
                    <i class="fa-regular fa-heart"></i>
                </button>
                <button class="product-card__add-to-cart fw-bold">
                    <i class="fa-solid fa-basket-shopping"></i> В корзину
                </button>
            </div>
        </div>
    </div>
</div>