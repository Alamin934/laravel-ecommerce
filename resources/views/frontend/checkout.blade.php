@extends('frontend.layouts.mastar-layout')

@section('main-content')
<section>
    <div class="container mx-auto p-5">
        <div class="relative mx-auto w-full bg-white">
            <div class="grid min-h-full grid-cols-10">

                <div class="col-span-full py-6 px-4 sm:py-12 lg:col-span-6 lg:py-24">
                    <div class="mx-auto w-full max-w-lg">
                        <h1 class="relative text-2xl font-medium text-gray-700 sm:text-3xl">Shipping Details<span
                                class="mt-2 block h-1 w-10 bg-indigo-600 sm:w-20"></span></h1>
                        {{-- Shipping Form --}}
                        <form action="" method="POST" class="mt-10 flex flex-col space-y-4">
                            {{-- Email --}}
                            <div>
                                <label for="email" class="text-xs font-semibold text-gray-500">Email</label>
                                <input type="email" id="email" name="email" value="{{auth()->user()->email}}"
                                    class="mt-1 block w-full rounded border-gray-300 bg-gray-50 py-3 px-4 text-sm placeholder-gray-300 shadow-sm outline-none transition focus:ring-2 focus:ring-indigo-500" />
                            </div>
                            {{-- Customer Name --}}
                            <div class="relative">
                                <label for="name" class="text-xs font-semibold text-gray-500">Name</label>
                                <input type="text" id="name" name="name" value="{{auth()->user()->name}}"
                                    class="block w-full rounded border-gray-300 bg-gray-50 py-3 px-4 pr-10 text-sm placeholder-gray-300 shadow-sm outline-none transition focus:ring-2 focus:ring-indigo-500" />
                            </div>
                            {{-- Phone Number --}}
                            <div class="relative">
                                <label for="phone-number" class="text-xs font-semibold text-gray-500">Phone
                                    number</label>
                                <input type="text" id="phone-number" name="phone_number"
                                    value="{{auth()->user()->phone_number}}" class=" block w-full rounded border-gray-300 bg-gray-50 py-3 px-4 pr-10 text-sm
                                    placeholder-gray-300 shadow-sm outline-none transition focus:ring-2
                                    focus:ring-indigo-500" />
                            </div>
                            {{-- Address --}}
                            <div class="relative">
                                <label for="address" class="text-xs font-semibold text-gray-500">Address</label>
                                <textarea id="address" name="address" class="block w-full rounded border-gray-300 bg-gray-50 py-3 px-4 pr-10 text-sm
                                    placeholder-gray-300 shadow-sm outline-none transition focus:ring-2
                                    focus:ring-indigo-500"> </textarea>
                            </div>
                            <div>
                                <div class="flex flex-wrap justify-between">
                                    {{-- City --}}
                                    <div class="relative">
                                        <label for="city" class="text-xs font-semibold text-gray-500">City</label>
                                        <input type="text" id="city" name="city" class="block w-full rounded border-gray-300
                                            bg-gray-50 py-3 px-4 pr-10 text-sm placeholder-gray-300 shadow-sm
                                            outline-none transition focus:ring-2 focus:ring-indigo-500" />
                                    </div>
                                    {{-- Postal Code --}}
                                    <div class="relative ml-3">
                                        <label for="postal-code" class="text-xs font-semibold text-gray-500">Postal
                                            Code</label>
                                        <input type="text" id="postal-code" name="postal_code" class=" block w-full rounded border-gray-300
                                            bg-gray-50 py-3 px-4 pr-10 text-sm placeholder-gray-300 shadow-sm
                                            outline-none transition focus:ring-2 focus:ring-indigo-500" />
                                    </div>
                                </div>
                            </div>
                            {{-- Button --}}
                            <p class="mt-10 text-center text-sm font-semibold text-gray-500">By placing this order you
                                agree
                                to the
                                <a href="#"
                                    class="whitespace-nowrap text-indigo-400 underline hover:text-indigo-600">Terms and
                                    Conditions</a>
                            </p>
                            <button type="submit"
                                class="mt-4 inline-flex w-full items-center justify-center rounded bg-indigo-600 py-2.5 px-4 text-base font-semibold tracking-wide text-white text-opacity-80 outline-none ring-offset-2 transition hover:text-opacity-100 focus:ring-2 focus:ring-indigo-500 sm:text-lg">Place
                                Order</button>
                        </form>

                    </div>
                </div>

                {{-- Product and Total Amout --}}
                <div class="relative col-span-full flex flex-col py-6 pl-8 pr-4 sm:py-12 lg:col-span-4 lg:py-24">
                    <h2 class="text-white text-3xl z-10 mb-4">Order summary</h2>
                    {{-- Background img and gradient color --}}
                    <div>
                        <img src="https://images.unsplash.com/photo-1581318694548-0fb6e47fe59b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                            alt="" class="absolute inset-0 h-full w-full object-cover" />
                        <div
                            class="absolute inset-0 h-full w-full bg-gradient-to-t from-indigo-800 to-purple-400 opacity-95">
                        </div>
                    </div>
                    {{-- Cart Products --}}
                    <div class="relative">
                        <ul class="space-y-5">
                            @foreach ($cart['product'] as $key => $product )

                            <li class="flex justify-between">
                                <div class="inline-flex">
                                    <img src="{{ \App\Models\Product::find($key)->getFirstMediaUrl() }}" alt=""
                                        class="max-h-16" />
                                    <div class="ml-3">
                                        <p class="text-base font-semibold text-white">{{ $product['title'] }}</p>
                                        <p class="text-sm font-medium text-white text-opacity-80">Qty: {{
                                            $product['quantity'] }}</p>
                                    </div>
                                </div>
                                <p class="text-sm font-semibold text-white">BDT {{
                                    number_format(($product['quantity']*$product['price']), 2) }}</p>
                            </li>
                            @endforeach
                        </ul>
                        <div class="my-5 h-0.5 w-full bg-white bg-opacity-30"></div>
                        <div class="space-y-2">
                            <p class="flex justify-between text-lg font-bold text-white"><span>Total
                                    price:</span><span>BDT {{$cart['total']}}</span></p>
                            {{-- <p class="flex justify-between text-sm font-medium text-white"><span>Vat:
                                    10%</span><span>$55.00</span></p> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection