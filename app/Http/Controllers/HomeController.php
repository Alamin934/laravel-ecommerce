<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Product,Category};

class HomeController extends Controller
{
    public function showHomePage(){
        $products = Product::select(['id', 'title', 'slug', 'price','sell_price'])->paginate(8);
        // return $products;
        // return $category = Category::with('product')->get();
        return view('home', compact('products'));
    }
}
