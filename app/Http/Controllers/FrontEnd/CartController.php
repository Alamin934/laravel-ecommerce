<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product,Order};
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

    public function checkout(){

        $cart = session()->get('cart');
        if(!empty($cart)){
            $collection = collect($cart['product'])->map(function (array $product, int $key) {
                return $product['price']*$product['quantity'];
            });
            $cart['total'] = Number::format($collection->sum(), 2);
            return view('frontend.checkout', compact('cart'));
        }else{
            return redirect()->route('cart.show');
        }

    }

    public function processOrder(Request $request) {
    
        $validated = $request->validate([
            'customer_name' => 'required',
            'customer_phone_number' => 'required|numeric',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
        ]);

        $cart = session()->get('cart');
        // if($cart){
            $collection = collect($cart['product'])->map(function (array $product, int $key) {
                return $product['price']*$product['quantity'];
            });
            $cart['total'] = $collection->sum();
        // }

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_phone_number' => $request->customer_phone_number,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'total_amount' => $cart['total'],
            'paid_amount' => $cart['total'],
            'payment_details' => "Cash on Delivery",
            'user_id' => auth()->user()->id,
        ]);
        // dd($order);

        foreach ($cart['product'] as $key => $product) {
            
            $order->product()->create([
                'product_id' => $key,
                'quantity' => $product['quantity'],
                'price'     => ($product['quantity']*$product['price']),
            ]);
        }

        session()->flash('message','Order Placed Successfully');
        session()->forget(['cart', 'total']);
        return redirect()->route('order.details', $order->id);

    }

    public function myOrders(){
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('profile.my-orders', compact('orders'));
    }

    public function orderDetails($order_id){
        $orders = Order::with(['product', 'product.product'])->where('id', $order_id)->get();
        return view('frontend.orders.details', compact('orders'));
    }
}
