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

        <div class="p-10 sm:p-20">
    <div class="flex justify-center">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach ($products as $prod)
            <div class="group flex flex-col items-center text-center">
                <!-- Image Section -->
                <a href="">
                    <img src="{{ URL('product/' . $prod->image1) }}" 
                        alt="" 
                        class="object-cover main-image rounded-lg shadow-md" />
                </a>
                <!-- Hover Images -->
                <div class="pt-2 hidden group-hover:flex gap-2">
                    <img src="{{ URL('product/' . $prod->image1) }}" 
                        alt="Hover 1" 
                        class="object-cover size-14 hover-image pb-[2px] hover:bg-black rounded-md shadow-sm">
                    <img src="{{ URL('product/' . $prod->image2) }}" 
                        alt="Hover 2" 
                        class="object-cover size-14 hover-image pb-[2px] hover:bg-black rounded-md shadow-sm">
                    <img src="{{ URL('product/' . $prod->image3) }}" 
                        alt="Hover 3" 
                        class="object-cover size-14 hover-image pb-[2px] hover:bg-black rounded-md shadow-sm">
                </div>
                <!-- Product Details -->
                <div class="py-4 flex flex-col items-center">
    
                        <p class="font-semibold text-lg">{{ $prod->title }}</p>
                        <p class="text-gray-600">{{ $prod->category }}</p>
                        <p class="text-gray-500 text-sm">{{ $prod->quantity }} Colours</p>
                        <div class="mt-2">
                            @if($prod->discount_price != null)
                                <p class="font-semibold text-red-600">₱{{ number_format($prod->discount_price, 2) }}</p>
                                <p class="text-gray-500 line-through">₱{{ number_format($prod->price, 2) }}</p>
                            @else
                                <p class="font-semibold">₱{{ number_format($prod->price, 2) }}</p>
                            @endif
                        </div>

                        <form action="{{ url('add_cart', $prod->id) }}" method="POST" class="flex flex-col items-end justify-end space-y-2">
                        @csrf <!-- CSRF token for security -->

                        <!-- Quantity Control -->
                        <div class="flex">
                            <button 
                                type="submit" 
                                name="action" 
                                value="+" 
                                class="increase-quantity px-2 py-1 border rounded-l-lg border-gray-300 border-r-0 hover:bg-black hover:text-white"
                            >
                                +
                            </button>
                            <input 
                                type="number" 
                                name="quantity" 
                                value="1" 
                                min="1" 
                                class="w-12 py-1 text-center border border-gray-300"
                            >
                            <button 
                                type="submit" 
                                name="action" 
                                value="-" 
                                class="decrease-quantity px-2 py-1 border rounded-r-lg border-gray-300 border-l-0 hover:bg-black hover:text-white"
                            >
                                -
                            </button>
                        </div>

                        <!-- Wishlist and Add to Bag Buttons -->
                        <div class="flex space-x-2">
                            <button 
                                type="submit" 
                                name="action" 
                                value="Wishlist" 
                                class="border border-gray-300 rounded-lg px-2 py-1 hover:bg-black hover:text-white flex items-center"
                            >
                                <i class="ph-bold ph-heart-straight align-middle mr-1"></i> Wishlist
                            </button>
                            <button 
                                type="submit" 
                                name="action" 
                                value="Add to Bag" 
                                class="border border-gray-300 rounded-lg px-2 py-1 hover:bg-black hover:text-white text-sm flex items-center"
                            >
                                <i class="ph-bold ph-bag mr-1 align-middle"></i> Add to Bag
                            </button>
                        </div>
                    </form>

    
                </div>
            </div>
        @endforeach

                    <!-- Wishlist and Bag Buttons -->
                    
                </div>
            </div>
       
        </div>
    </div>
</div>



        
    </body>
    <script defer src="{{ URL::asset('js/main.js') }}"></script>
</html>
