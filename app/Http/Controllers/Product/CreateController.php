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

class CreateController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $title = 'Каталог';
        $items_cart = Cart::instance('cart')->content();
        $items_wishlist = Cart::instance('wishlist')->content();

        
        $categories = Category::all();
        return view('product.index' , compact('products','categories', 'title', 'items_cart', 'items_wishlist'));
    }
}
