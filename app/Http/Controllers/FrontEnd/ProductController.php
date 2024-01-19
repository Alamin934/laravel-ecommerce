<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function showProductDetails(string $slug) {
        $product = Product::where('slug', $slug)->where('active', 1)->get();

        if($product == null){
            return redirect()->route('home');
        }
        return view('frontend.products.details', compact('product'));
    }
}
