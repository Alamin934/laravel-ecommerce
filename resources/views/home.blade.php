@extends('frontend.layouts.mastar-layout')

@section('main-content')
{{-- Hero Section Start --}}
<section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
            <img class="object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600">
        </div>
        <div
            class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Before they sold out
                <br class="hidden lg:inline-block">readymade gluten
            </h1>
            <p class="mb-8 leading-relaxed">Copper mug try-hard pitchfork pour-over freegan heirloom neutra air plant
                cold-pressed tacos poke beard tote bag. Heirloom echo park mlkshk tote bag selvage hot chicken authentic
                tumeric truffaut hexagon try-hard chambray.</p>
            <div class="flex justify-center">
                <button
                    class="inline-flex text-white bg-purple-500 border-0 py-2 px-6 focus:outline-none hover:bg-purple-600 rounded text-lg">Button</button>
                <button
                    class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Button</button>
            </div>
        </div>
    </div>
</section>
{{-- Hero Section End --}}
{{-- Product Section Start --}}
<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="sm:text-2xl text-1xl font-medium title-font mb-8 text-gray-900 text-center">
            All Products
        </div>
        <div class="flex flex-wrap -m-4">
            @foreach ($products as $product)
            <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a class="block relative h-48 rounded overflow-hidden">
                    <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                        src="{{$product->getFirstMediaUrl()}}">
                </a>
                <div class="mt-4">
                    {{-- <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{$product->category}} --}}
                    </h3>
                    <h2 class="text-gray-900 title-font text-lg font-medium">{{$product->title}}</h2>
                    <p class="mt-1 mb-3">BDT {{$product->price}}</p>
                    <button
                        class="inline-flex items-center bg-purple-500 border-0 py-1 px-3 focus:outline-none hover:bg-purple-600 rounded text-white">Add
                        to Cart
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        <div class="py-5">
            {{$products->links()}}
        </div>
    </div>
</section>
{{-- Product Section End --}}
@endsection