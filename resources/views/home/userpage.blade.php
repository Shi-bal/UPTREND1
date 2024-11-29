<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css'); }}">
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/@phosphor-icons/web@2.1.1/src/bold/style.css"/>
        <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>UP TREND</title>
    </head>

    <body>
    @include('home.navbar')
    
    <div class="mb-5 sm:mb-10 lg:mb-20 relative">
        <div class="bg-cover">
            <img class="" src="{{ URL('images/general/streetcropped.jpg') }}"alt=""/>
        </div>
        <div class="flex absolute inset-0 justify-center items-center space-x-3">
            <img class="w-[100px]" src="{{ asset('logos/uptrendnobg.png') }}" alt="Logo">
        </div>
    </div>

    
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
                    @foreach ($products as $prod) <!-- Loop through each product -->
                        <div class="group">
                            <a href="{{url('product_details', $prod->id)}}"><img src="{{ URL('product/' . $prod->image1) }}" alt="" class="object-cover main-image"></a> <!-- Display product image -->
                            <div class="pt-1 hidden group-hover:inline-flex gap-[2px]">
                                <img src="{{ URL('product/' . $prod->image1) }}" alt="" class="object-cover size-14 hover-image pb-[2px] hover:bg-black">
                                <img src="{{ URL('product/' . $prod->image2) }}" alt="" class="object-cover size-14 hover-image pb-[2px] hover:bg-black">
                                <img src="{{ URL('product/' . $prod->image3) }}" alt="" class="object-cover size-14 hover-image pb-[2px] hover:bg-black">
                            </div>
                            <div class="py-4 flex justify-between">
                                <div>
                                    <a href="">
                                        <p class="font-semibold">{{ $prod->title }}</p> <!-- Display product title -->
                                        <!-- <p>{{ $prod->description }}</p> Display product description -->
                                        <!-- <p>{{ $prod->quantity }} colors</p>-->
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
                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </body>
</html>