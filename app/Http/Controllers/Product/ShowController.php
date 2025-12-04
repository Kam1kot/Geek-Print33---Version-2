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
    public function __invoke(string $id)
    {
        
        $items_cart = Cart::instance('cart')->content();
        $items_wishlist = Cart::instance('wishlist')->content();

        $product = Product::find($id);
        $title = $product->title;

        $categories = Category::all();
        return view('product.show' , compact('product','categories', 'title', 'items_cart', 'items_wishlist'));
    }
}
