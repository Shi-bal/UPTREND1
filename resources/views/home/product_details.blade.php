<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="stylesheet" type="text/css" href="{{ mix('css/style.css') }}"> -->

        <link rel="stylesheet" type="text/css" href="https://unpkg.com/@phosphor-icons/web@2.1.1/src/bold/style.css"/>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>UP TREND</title>
    </head>

    <body>
        @include('home.navbar')

        <section class="py-8 md:py-16">
    <div class="max-w-screen-lg px-4 mx-auto 2xl:px-0">
        <div class="lg:grid lg:grid-cols-5 group">
            @foreach ($products as $prod)
                <div class="col-span-3 shrink-0 max-w-md lg:max-w-lg mx-auto grid grid-cols-5 gap-4">
                    <div class="col-span-1 flex flex-col gap-2">
                            <img src="{{ URL('product/' . $prod->image1) }}" alt="" class="object-cover size-24 hover-image rounded-md hover-image">
                            <img src="{{ URL('product/' . $prod->image2) }}" alt="" class="object-cover size-24 hover-image rounded-md hover-image">
                            <img src="{{ URL('product/' . $prod->image3) }}" alt="" class="object-cover size-24 hover-image rounded-md hover-image">
                    </div>
                    <div class="col-span-4">
                    <img src="{{ URL('product/' . $prod->image1) }}" alt="" class="object-cover hover-image rounded-md main-image">
                    </div>
                </div>

                <div class="col-span-2 mt-6 sm:mt-8 lg:mt-0">
                    <p class="text-2xl font-bold sm:text-3xl ">
                        {{ $prod->title }} <!-- Display product title -->
                    </p>

                    <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                        @if($prod->discount_price != null)
                            <h1 class="text-lg font-semibold sm:text-xl">
                                ₱{{ number_format($prod->discount_price, 2) }}
                            </h1>
                        @else
                            <h1 class="text-lg font-semibold sm:text-xl">
                                ₱{{ number_format($prod->price, 2) }}
                            </h1>
                        @endif
                    </div>

                    <!-- Add Size Selection -->
                    <div>
                        <p class="text-base font-bold sm:text-xl mt-10">
                            Select Size
                        </p>
                        <div class="mt-6 sm:mt-8 grid grid-cols-2 xl:grid-cols-2 gap-1">
                            <button class="border-2 hover:border-black py-2 px-4 rounded-md text-lg size-btn" data-size="US M 11 / W 12.5">US M 11 / W 12.5</button>
                            <button class="border-2 hover:border-black py-2 px-4 rounded-md text-lg size-btn" data-size="US M 10.5 / W 12">US M 10.5 / W 12</button>
                            <button class="border-2 hover:border-black py-2 px-4 rounded-md text-lg size-btn" data-size="US M 10 / W 11.5">US M 10 / W 11.5</button>
                            <button class="border-2 hover:border-black py-2 px-4 rounded-md text-lg size-btn" data-size="US M 9.5 / W 11">US M 9.5 / W 11</button>
                            <button class="border-2 hover:border-black py-2 px-4 rounded-md text-lg size-btn" data-size="US M 9 / W 10.5">US M 9 / W 10.5</button>
                            <button class="border-2 hover:border-black py-2 px-4 rounded-md text-lg size-btn" data-size="US M 8.5 / W 10">US M 8.5 / W 10</button>
                        </div>
                    </div>
                    
                    <!-- <div>
                        <p class="text-base font-bold sm:text-xl mt-10">
                            Select Quantity
                        </p>
                        <button class="mt-6 increase-quantity px-2 py-1 border rounded-l-lg border-gray-300 border-r-0 hover:bg-black hover:text-white">+</button><input type="number" value="1" min="1" class="w-12 py-1 text-center border border-gray-300"><button class="decrease-quantity px-2 py-1 border rounded-r-lg border-gray-300 border-l-0 hover:bg-black hover:text-white">-</button>

                    </div> -->

                    <!-- Add Cart Form -->
                    <!-- Add Cart Form -->
                    <form action="{{ url('add_cart', $prod->id) }}" method="POST">
                        @csrf
                        <!-- Set variant image dynamically -->
                        
                        <input type="hidden" name="quantity" value="1">

                        <!-- Size -->
                        <input type="hidden" name="size" id="selected-size" value="">

                        <!-- Add to Cart Button -->
                        <div class="mt-6 gap-2 sm:items-center grid lg:grid-cols-2 sm:mt-8">
                            <button type="submit" class="flex items-center justify-center py-2.5 text-sm sm:text-lg font-medium rounded-lg bg-black text-white">
                                <i class="ph-bold ph-bag mr-2"></i>
                                Add to bag
                            </button>
                        </div>
                    </form>

                </div>
            @endforeach
        </div>
    </div>
</section>


<script>
        // Handle size selection
    // Handle size selection
    const sizeButtons = document.querySelectorAll('.size-btn');
    const selectedSizeInput = document.getElementById('selected-size');
    const selectedImageInput = document.getElementById('selected-image');

    // Set size and variant image dynamically
    sizeButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove 'selected' class from all buttons
            sizeButtons.forEach(btn => btn.classList.remove('bg-gray-200'));

            // Add 'selected' class to clicked button
            this.classList.add('bg-gray-200');

            // Set the selected size value in the hidden input field
            selectedSizeInput.value = this.getAttribute('data-size');
        });
    });

    // If you want to allow variant image selection (image1, image2, image3), you can update the selected image based on user input.
    document.querySelectorAll('.hover-image').forEach(image => {
        image.addEventListener('click', function() {
            selectedImageInput.value = this.src; // Set the image URL as the selected image
        });
    });

    window.addEventListener('load', function() {
    const groups = document.querySelectorAll('.group');
    groups.forEach(function(group) {
        const mainImage = group.querySelector('.main-image');
        const hoverImages = group.querySelectorAll('.hover-image');
        
        // Ensure mainImage exists before proceeding
        if (mainImage) {
            let originalSrc = mainImage.src;

            hoverImages.forEach(function(hoverImage) {
                // Ensure hoverImage exists before adding event listeners
                if (hoverImage) {
                    hoverImage.addEventListener('mouseover', function() {
                        mainImage.src = hoverImage.src;
                    });

                    hoverImage.addEventListener('mouseout', function() {
                        mainImage.src = originalSrc;
                    });

                    hoverImage.addEventListener('click', function() {
                        originalSrc = hoverImage.src;
                        mainImage.src = hoverImage.src;
                    });
                }
            });
        }
    });
});
</script>



        
    </body>
    <script defer src="{{ URL::asset('js/main.js') }}"></script>
</html>
