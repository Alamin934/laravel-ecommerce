<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function showCart(){

        $cart = session()->get('cart');
        return view('frontend.cart', compact('cart'));
    }

    public function addToCart(Request $request){
        $cart = [];

        try {
            $validated = $request->validate([
                'product_id' => 'required',
            ]);
        } catch (\ValidationException $e) {
            return redirect()->back();
        }

        $product = Product::findOrFail($request->input('product_id'));


        if(session()->has('cart')){
            $cart = session()->get('cart');

            if(array_key_exists($product->id, $cart['product'])){
                $cart['product'][$product->id]['quantity'] += 1;
            }
            else{
               $cart['product'][$product->id] = [
                        'title' => $product->title,
                        'price' => ($product->sell_price == 0 || $product->sell_price == null) ? $product->price : $product->sell_price,
                        'quantity' => 1,
                ];
            }
        }else{
            $cart['product'] = [
                $product->id => [
                    'title' => $product->title,
                    'price' => ($product->sell_price == 0 || $product->sell_price == null) ? $product->price : $product->sell_price,
                    'quantity' => 1,
                ]
            ];
        }

        session(['cart' => $cart]);
        session()->flush("message", $product->title." added to cart.");

        return redirect()->route('cart.show');
    }
}
