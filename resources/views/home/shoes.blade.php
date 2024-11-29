<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css'); }}">
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/@phosphor-icons/web@2.1.1/src/bold/style.css"/>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>UP TREND</title>
    </head>

    <body>
        @include('home.navbar')

        <div class="mt-10 sm:mt-20">
            <div class="flex justify-center items-center flex-col">
                <p class="font-bold text-2xl sm:font-extrabold sm:text-6xl mb-2">KEEP UP WITH THE TREND</p>
                <p class="mb-6">Elevate your look with UP Trend.</p>
                <button class="bg-black text-white font-medium px-3 py-1 rounded-3xl">Shop Now</button>
            </div>
        </div>

        <div class="p-10 sm:p-20">
            <div class="flex justify-center">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                    @foreach ($product as $prod) <!-- Loop through each product -->
                        <div class="group">
                            <a href=""><img src="{{ URL('product/' . $prod->image1) }}" alt="" class="object-cover main-image"></a> <!-- Display product image -->
                            <div class="pt-1 hidden group-hover:inline-flex gap-[2px]">
                                <img src="{{ URL('product/' . $prod->image1) }}" alt="" class="object-cover size-14 hover-image pb-[2px] hover:bg-black">
                                <img src="{{ URL('product/' . $prod->image2) }}" alt="" class="object-cover size-14 hover-image pb-[2px] hover:bg-black">
                                <img src="{{ URL('product/' . $prod->image3) }}" alt="" class="object-cover size-14 hover-image pb-[2px] hover:bg-black">
                            </div>
                            <div class="py-4 flex justify-between">
                                <div>
                                    <a href="">
                                        <p class="font-semibold">{{ $prod->title }}</p> <!-- Display product title -->
                                        <p>{{ $prod->description }}</p> <!-- Display product description -->
                                        <p>{{ $prod->quantity }} colors</p>
                                        <div class="mt-2">
                                            @if($prod->discount_price != null)
                                                <!-- Display discount price and strike-through original price -->
                                                <p class="font-semibold text-red-600">₱{{ number_format($prod->discount_price, 2) }}</p>
                                                <p class="text-gray-500 line-through">₱{{ number_format($prod->price, 2) }}</p>
                                            @else
                                                <!-- Display regular price -->
                                                <p class="font-semibold">₱{{ number_format($prod->price, 2) }}</p>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                                <div class="flex flex-col items-end justify-end space-y-2">
                                    <div>
                                        <button class="increase-quantity px-2 py-1 border rounded-l-lg border-gray-300 border-r-0 hover:bg-black hover:text-white">+</button>
                                        <input type="number" value="1" min="1" class="w-12 py-1 text-center border border-gray-300">
                                        <button class="decrease-quantity px-2 py-1 border rounded-r-lg border-gray-300 border-l-0 hover:bg-black hover:text-white">-</button>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="border border-gray-300 rounded-lg px-2 py-1 hover:bg-black hover:text-white">
                                            <i class="ph-bold ph-heart-straight align-middle"></i>
                                        </button>
                                        <button class="border border-gray-300 rounded-lg px-2 py-1 hover:bg-black hover:text-white text-sm">
                                            <i class="ph-bold ph-bag mr-2 align-middle"></i>Add to Bag
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </body>
    <script defer src="{{ URL::asset('js/main.js') }}"></script>
</html>
