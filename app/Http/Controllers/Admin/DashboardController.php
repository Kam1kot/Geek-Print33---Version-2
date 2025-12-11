<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Админ-панель';
        $products = Product::all();
        $categories = Category::all();
        return view('layouts.admin-header',compact('title','products','categories'));
    }
    public function product_manage(){
        $title = 'Управление товарами';
        $products = Product::all();
        $categories = Category::all();
        return view('admin.manage-products',compact('title','products','categories'));
    }
}
