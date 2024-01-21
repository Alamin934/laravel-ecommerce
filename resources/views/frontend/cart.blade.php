@extends('frontend.layouts.mastar-layout')
@push('styles')
<style>
    .grid-cols-2 {
        grid-template-columns: 70% auto
    }

    @media screen and (max-width: 992px) {
        .grid-cols-2 {
            grid-template-columns: repeat(1, 1fr)
        }
    }
</style>
@endpush


@section('main-content')
<div class=" h-screen py-8">
    <div class="container px-4 mx-auto py-12">
        @if (empty($cart['product']))
        <h1 class="text-2xl text-center font-semibold mb-4">Cart is Empty</h1>
        @else
        <h1 class="text-2xl text-center font-semibold mb-4">Shopping Cart</h1>
        @if (session()->has('message'))
        <div class="bg-emerald-200 font-semibold text-green-700 p-4 mb-3 rounded w-1/2 shadow-md">
            {{session('message')}}
        </div>
        @endif
        <div class="grid grid-cols-2 gap-4">
            <div class="">
                <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="text-left font-semibold">Product</th>
                                <th class="text-left font-semibold">Price</th>
                                <th class="text-left font-semibold">Quantity</th>
                                <th class="text-left font-semibold">Total</th>
                                <th class="text-left font-semibold">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart['product'] as $key => $product)
                            <tr class="mb-3 border-b-2">
                                <td class="py-4">
                                    <a href="{{route('product.details', $product['slug'])}}">
                                        <div class="flex items-center">
                                            <img class="h-24 w-24"
                                                src="{{\App\Models\Product::find($key)->getFirstMediaUrl()}}"
                                                alt="Product image">
                                            <span class="font-semibold ml-4">{{ $product['title']
                                                }}</span>
                                        </div>
                                    </a>
                                </td>
                                <td class="py-4">BDT {{ $product['price'] }}</td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <button class="border rounded-md py-2 px-4 mr-2">-</button>
                                        <span class="text-center w-8">{{ $product['quantity'] }}</span>
                                        <button class="border rounded-md py-2 px-4 ml-2">+</button>
                                    </div>
                                </td>
                                <td class="py-4">BDT {{\Number::format(($product['price']*$product['quantity']), 2)}}
                                </td>
                                <td class="py-4 text-center">
                                    <form action="{{route('cart.remove')}}" method="post" class="flex ml-auto">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$key}}">
                                        <button class="text-red-500 bg-red-100 rounded p-2">X</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <!-- More product rows -->
                        </tbody>
                    </table>
                </div>
                <a href="{{route('cart.clear')}}"
                    class="bg-red-500 text-white border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">
                    Clear Cart</a>
            </div>
            
            <div class="">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold mb-4">Summary</h2>
                    <div class="flex justify-between mb-2">
                        <span>Subtotal</span>
                        <span>BDT {{$cart['total']}}</span>
                    </div>
                    {{-- <div class="flex justify-between mb-2">
                        <span>Taxes</span>
                        <span>$1.99</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Shipping</span>
                        <span>$0.00</span>
                    </div> --}}
                    <hr class="my-2">
                    <div class="flex justify-between mb-2">
                        <span class="font-semibold">Total</span>
                        <span class="font-semibold">BDT {{$cart['total']}}</span>
                    </div>
                    <button class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full">Checkout</button>
                </div>
            </div>
            @endif

        </div>

    </div>
</div>
@endsection