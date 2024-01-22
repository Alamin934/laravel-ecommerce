@extends('frontend.layouts.mastar-layout')

@section('main-content')
<section>
    <div class="container mx-auto px-5">
        <div class="py-14 px-4 2xl:px-6 2xl:container 2xl:mx-auto">
            <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
            @foreach ($orders as $order_details)
            <div class="flex justify-start item-start space-y-2 flex-col">
                <h1 class="text-3xl dark:text-white lg:text-4xl font-semibold leading-7 lg:leading-9 text-gray-800">
                    Order Id: #{{$order_details['id']}}

                </h1>
                <p class="text-base dark:text-gray-300 font-medium leading-6 text-gray-600">{{
                    date_format($order_details['created_at'], "d M Y h:i A") }}</p>

            </div>
            <div
                class="mt-10 flex flex-col xl:flex-row jusitfy-center items-stretch w-full xl:space-x-8 space-y-4 md:space-y-6 xl:space-y-0">
                <div class="flex flex-col justify-start items-start w-full space-y-4 md:space-y-6 xl:space-y-8">
                    {{-- Ordered Product --}}
                    <div
                        class="flex flex-col justify-start items-start dark:bg-gray-800 bg-gray-50 px-4 py-4 md:py-6 md:p-6 xl:p-8 w-full">
                        <p
                            class="text-lg md:text-xl dark:text-white font-semibold leading-6 xl:leading-5 text-gray-800">
                            Ordered Product</p>

                        @foreach ($order_details['product'] as $product)
                        <div
                            class="mt-4 md:mt-6 flex flex-col md:flex-row justify-start items-start  md:space-x-6 xl:space-x-8 w-full border-b border-gray-200">
                            {{-- Image --}}
                            <div class="pb-4 w-full md:w-40">
                                <img class="w-full"
                                    src="{{ \App\Models\Product::find($product->product['id'])->getFirstMediaUrl() }}"
                                    alt="{{ $product->product['title'] }}" />
                            </div>
                            <div
                                class="md:flex-row flex-col flex justify-between items-start w-full pb-8 space-y-4 md:space-y-0">

                                <div class="w-full flex flex-col justify-start items-start space-y-8">
                                    <h3 class="text-xl dark:text-white font-semibold leading-6 text-gray-800">
                                        <a href="{{route('product.details', $product->product['slug'])}}">{{
                                            $product->product['title'] }}</a>
                                    </h3>
                                    {{-- <div class="flex justify-start items-start flex-col space-y-2">
                                        <p class="text-sm dark:text-white leading-none text-gray-800"><span
                                                class="dark:text-gray-400 text-gray-300">Style: </span> Italic Minimal
                                            Design
                                        </p>
                                        <p class="text-sm dark:text-white leading-none text-gray-800"><span
                                                class="dark:text-gray-400 text-gray-300">Size: </span> Small</p>
                                        <p class="text-sm dark:text-white leading-none text-gray-800"><span
                                                class="dark:text-gray-400 text-gray-300">Color: </span> Light Blue</p>
                                    </div> --}}
                                </div>

                                <div class="flex justify-around space-x-8 items-start w-full">
                                    <p class="text-base dark:text-white xl:text-lg leading-6 text-gray-800">{{
                                        $product['quantity'] }}</p>
                                    <p
                                        class="text-base dark:text-white xl:text-lg font-semibold leading-6 text-gray-800">
                                        BDT {{ $product['price'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                {{-- Customer & Order Details --}}
                <div
                    class="bg-gray-50 dark:bg-gray-800 w-full xl:w-4/5 flex justify-between items-center md:items-start px-4 py-6 md:p-6 xl:p-8 flex-col">
                    <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">Customer Details</h3>
                    <div
                        class="flex flex-col md:flex-row xl:flex-col justify-start items-stretch h-full w-full md:space-x-6 lg:space-x-8 xl:space-x-0">
                        <div class="flex flex-col justify-start items-start flex-shrink-0">

                            <div class="flex w-full space-x-4 py-8 border-b border-gray-200">
                                {{-- Left Col --}}
                                <div class="w-1/2 pr-3 border-r-2">
                                    {{-- Name --}}
                                    <div class="flex justify-between items-center flex-row pb-2">
                                        <p
                                            class="text-base dark:text-white font-semibold leading-4 text-left text-gray-800">
                                            Customer Name:</p>
                                        <p
                                            class="text-base dark:text-white font-medium leading-4 text-left text-gray-800">
                                            {{ $order_details['customer_name'] }}</p>
                                    </div>
                                    {{-- Phone --}}
                                    <div class="flex justify-between items-center flex-row pb-2">
                                        <p
                                            class="text-base dark:text-white font-semibold leading-4 text-left text-gray-800">
                                            Customer Phone:</p>
                                        <p
                                            class="text-base dark:text-white font-medium leading-4 text-left text-gray-800">
                                            {{ $order_details['customer_phone_number'] }}</p>
                                    </div>

                                    {{-- Order Details --}}
                                    <p
                                        class="text-indigo-600 font-semibold leading-4 text-left text-gray-800 my-3 text-lg">
                                        Order Details:<span class="mt-2 block h-0.5 w-10 bg-indigo-600 sm:w-20"></span>
                                    </p>

                                    {{-- Order Status --}}
                                    <div class="flex justify-between items-center flex-row pb-2">
                                        <p
                                            class="text-base dark:text-white font-semibold leading-4 text-left text-gray-800">
                                            Order Status:</p>
                                        <p
                                            class="text-base dark:text-white font-medium leading-4 text-left text-gray-800">
                                            {{ $order_details['operational_status'] }}</p>
                                    </div>

                                    {{-- Payment Status --}}
                                    <div class="flex justify-between items-center flex-row pb-2">
                                        <p
                                            class="text-base dark:text-white font-semibold leading-4 text-left text-gray-800">
                                            Payment Status:</p>
                                        <p
                                            class="text-base dark:text-white font-medium leading-4 text-left text-gray-800">
                                            {{ $order_details['payment_status'] }}</p>
                                    </div>

                                    {{-- Payment Details --}}
                                    <div class="flex justify-between items-center flex-row pb-2">
                                        <p
                                            class="text-base dark:text-white font-semibold leading-4 text-left text-gray-800">
                                            Payment Details:</p>
                                        <p
                                            class="text-base dark:text-white font-medium leading-4 text-left text-gray-800">
                                            {{ $order_details['payment_details'] }}</p>
                                    </div>
                                </div>


                                {{-- Right Col --}}
                                <div class="w-1/2 pl-3 border-l-2">
                                    <p
                                        class="text-indigo-600 font-semibold leading-4 text-left text-gray-800 mb-3 text-lg">
                                        Shipping Address:<span
                                            class="mt-2 block h-0.5 w-10 bg-indigo-600 sm:w-20"></span>
                                    </p>
                                    {{-- Address --}}
                                    <div class="flex justify-between items-center flex-row pb-2">
                                        <p
                                            class="text-base dark:text-white font-semibold leading-4 text-left text-gray-800">
                                            Address:</p>
                                        <p
                                            class="text-base dark:text-white font-medium leading-4 text-left text-gray-800">
                                            {{ $order_details['address'] }}</p>
                                    </div>
                                    {{-- City --}}
                                    <div class="flex justify-between items-center flex-row pb-2">
                                        <p
                                            class="text-base dark:text-white font-semibold leading-4 text-left text-gray-800">
                                            City:</p>
                                        <p
                                            class="text-base dark:text-white font-medium leading-4 text-left text-gray-800">
                                            {{ $order_details['city'] }}</p>
                                    </div>
                                    {{-- Postal Code --}}
                                    <div class="flex justify-between items-center flex-row pb-2">
                                        <p
                                            class="text-base dark:text-white font-semibold leading-4 text-left text-gray-800">
                                            Postal Code:</p>
                                        <p
                                            class="text-base dark:text-white font-medium leading-4 text-left text-gray-800">
                                            {{ $order_details['postal_code'] }}</p>
                                    </div>
                                </div>

                            </div>



                            {{-- Amount Summary --}}
                            <div class="flex flex-col py-6 w-full bg-gray-50 dark:bg-gray-800 space-y-6">
                                <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">
                                    Summary</h3>
                                <div
                                    class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
                                    <div class="flex justify-between w-full">
                                        <p class="text-base dark:text-white leading-4 text-gray-800">Subtotal
                                        </p>
                                        <p class="text-base dark:text-gray-300 leading-4 text-gray-600">BDT {{
                                            $order_details['total_amount'] }}
                                        </p>
                                    </div>

                                </div>
                                <div class="flex justify-between items-center w-full">
                                    <p class="text-base dark:text-white font-semibold leading-4 text-gray-800">
                                        Total</p>
                                    <p class="text-base dark:text-gray-300 font-semibold leading-4 text-gray-600">
                                        BDT {{ $order_details['total_amount'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection