<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Number;

class CartController extends Controller
{
    public function showCart(){
            $cart = session()->get('cart');
            if($cart){
                $collection = collect($cart['product'])->map(function (array $product, int $key) {
                    return $product['price']*$product['quantity'];
                });
                $cart['total'] = Number::format($collection->sum(), 2);
            }

            return view('frontend.cart', compact('cart'));
    }

    public function addToCart(Request $request){
        $cart = [];

        try {
            $validated = $request->validate([
                'product_id' => 'required|numeric',
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
                        'slug' => $product->slug,
                        'price' => ($product->sell_price == 0 || $product->sell_price == null) ? $product->price : $product->sell_price,
                        'quantity' => 1,
                ];
            }
        }else{
            $cart['product'] = [
                $product->id => [
                    'title' => $product->title,
                    'slug' => $product->slug,
                    'price' => ($product->sell_price == 0 || $product->sell_price == null) ? $product->price : $product->sell_price,
                    'quantity' => 1,
                ]
            ];
        }

        session(['cart' => $cart]);
        session()->flash("message", $product->title." added to cart.");

        return redirect()->route('cart.show');
    }

    public function removeFromCart(Request $request){
        try {
            $validated = $request->validate([
                'product_id' => 'required|numeric',
            ]);
        } catch (\ValidationException $e) {
            return redirect()->back();
        }

        $cart = session()->get('cart');
        unset($cart['product'][$request->product_id]);
        session(['cart' => $cart]);
        session()->flash("message", "Product removed from your cart.");

        return redirect()->route('cart.show');
    }

    public function clearCart(){

        session()->forget('cart');

        return redirect()->route('cart.show');
    }
}
