<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\Product\FilterRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $title = 'Каталог';
        $items_cart = Cart::instance('cart')->content();
        $items_wishlist = Cart::instance('wishlist')->content();
        $data = $request->validated();
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $products = Product::filter($filter)
        ->whereHas('category')
        ->paginate(16);

        $categories = Category::all();
        $tags = Tag::all();
        return view('product.index' , compact('products','categories', 'title', 'items_cart', 'items_wishlist'));
    }
}
