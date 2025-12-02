<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $title = 'Главная страница';
        $products = Product::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('index', compact('title','products', 'categories'));
    }
    // public function admin() {
    //     $title = 'Админ-панель';
    //     $products = Product::all();
    //     $categories = Category::all();
    //     $tags = Tag::all();
    //     return view('admin.dashboard', compact('title','categories'));
    // }
    public function delivery() {
        $title = 'Доставка и оплата';
        $categories = Category::all();
        return view('delivery', compact('title','categories'));
    }
    public function contacts() {
        $title = 'Контакты';
        $categories = Category::all();
        return view('contacts', compact('title','categories'));
    }
    public function about_us() {
        $title = 'О нас';
        $categories = Category::all();
        return view('about_us', compact('title','categories'));
    }
}
