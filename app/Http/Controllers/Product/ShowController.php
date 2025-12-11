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

class ShowController extends Controller
{
    public function __invoke(Product $product)
    {
        $items_cart = Cart::instance('cart')->content();
        $items_wishlist = Cart::instance('wishlist')->content();
        $title = $product->title;

        $products_other = Product::get()->shuffle()->take(4);
        $categories = Category::all();
        return view('product.show' , compact('products_other','product','categories', 'title', 'items_cart', 'items_wishlist'));
    }
}
