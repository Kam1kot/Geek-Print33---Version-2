<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index() {
        $title = 'Корзина';
        $categories = Category::all();
        $items_cart = Cart::instance('cart')->content();
        $items_wishlist = Cart::instance('wishlist')->content();

        return view('cart',compact('items_cart', 'items_wishlist','categories', 'title'));
    }
    public function add_to_cart(Request $request) {
        // dd($request);
        Cart::instance('cart')->add($request->id, $request->title, 1, $request->price)->associate('App\Models\Product');
        return redirect()->back()->withFragment('product_' . $request->id);
    }
    
    public function add_to_cart_from_wishlist($rowId, Request $request) {
        // dd($request);
        Cart::instance('cart')->add($request->id, $request->title, 1, $request->price)->associate('App\Models\Product');
        Cart::instance('wishlist')->remove($rowId);
        return redirect()->back();
    }
    public function increase_cart_quantity($rowId) {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        return redirect()->back()->withFragment('product_'.$product->id);
    }
    public function decrease_cart_quantity($rowId) {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        return redirect()->back()->withFragment('product_'.$product->id);
    }
    public function remove_item($rowId) {
        Cart::instance('cart')->remove($rowId);
        return redirect()->back();
    }
    public function empty_cart() {
        Cart::instance('cart')->destroy();
        return redirect()->back();
    }
}