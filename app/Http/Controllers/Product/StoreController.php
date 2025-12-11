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

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|integer',
        ]);
        Product::create($data);
        return redirect()->back();
    }
}
