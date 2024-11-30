<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="stylesheet" type="text/css" href="{{ mix('css/style.css') }}"> -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <link rel="stylesheet" type="text/css" href="https://unpkg.com/@phosphor-icons/web@2.1.1/src/bold/style.css"/>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>UP TREND</title>
    </head>

    <body>
        @include('home.navbar')


        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        <section class="py-8 md:py-16">
    <div class="max-w-screen-lg px-4 mx-auto 2xl:px-0">
        <div class="lg:grid lg:grid-cols-2 lg:gap-4 xl:gap-8 group">
            @foreach ($products as $prod)
                <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                    <img src="{{ URL('product/' . $prod->image1) }}" alt="" class="object-cover hover-image rounded-md main-image">
                </div>

                <div class="mt-6 sm:mt-8 lg:mt-0">
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

                    <div class="mt-6 sm:mt-8 inline-flex gap-1">
                        <img src="{{ URL('product/' . $prod->image1) }}" alt="" class="object-cover size-16 hover-image border-b-white hover:border-b-black border-b-4 rounded-md hover-image">
                        <img src="{{ URL('product/' . $prod->image2) }}" alt="" class="object-cover size-16 hover-image border-b-white hover:border-b-black border-b-4 rounded-md hover-image">
                        <img src="{{ URL('product/' . $prod->image3) }}" alt="" class="object-cover size-16 hover-image border-b-white hover:border-b-black border-b-4 rounded-md hover-image">
                    </div>

                    <!-- Add Size Selection -->
                    <div>
                        <p class="text-base font-bold sm:text-xl mt-10">
                            Select Size
                        </p>
                        <div class="mt-6 sm:mt-8 grid grid-cols-2 gap-1">
                            <button class="border-2 hover:border-black py-2 px-4 rounded-md text-lg size-btn" data-size="US M 11 / W 12.5">US M 11 / W 12.5</button>
                            <button class="border-2 hover:border-black py-2 px-4 rounded-md text-lg size-btn" data-size="US M 10.5 / W 12">US M 10.5 / W 12</button>
                            <button class="border-2 hover:border-black py-2 px-4 rounded-md text-lg size-btn" data-size="US M 10 / W 11.5">US M 10 / W 11.5</button>
                            <button class="border-2 hover:border-black py-2 px-4 rounded-md text-lg size-btn" data-size="US M 9.5 / W 11">US M 9.5 / W 11</button>
                            <button class="border-2 hover:border-black py-2 px-4 rounded-md text-lg size-btn" data-size="US M 9 / W 10.5">US M 9 / W 10.5</button>
                            <button class="border-2 hover:border-black py-2 px-4 rounded-md text-lg size-btn" data-size="US M 8.5 / W 10">US M 8.5 / W 10</button>
                        </div>
                    </div>
                    
                    <!-- Add Cart Form -->
                    <div class="grid grid-cols-5 gap-2">
                        <form class="mt-6 gap-2 sm:items-center grid col-span-4 sm:mt-8" action="{{ url('add_cart', $prod->id) }}" method="POST">
                            @csrf
                            <!-- Size -->
                            <input type="hidden" name="size" id="selected-size" value="">
                            <!-- Hidden input for selected image (dynamic) -->
                            <input type="hidden" name="selected_image" id="selected-image" value="{{ URL('product/' . $prod->image1) }}">
                            <!-- Add to Cart Button -->
                            <button type="submit" class="flex items-center justify-center py-2.5 text-sm sm:text-lg font-medium rounded-lg bg-black text-white">
                                <i class="ph-bold ph-bag mr-2"></i>
                                Add to bag
                            </button>
                        </form>
                        @endforeach
                        
                        @foreach ($products as $prod)
                            <form class="mt-6 gap-2 sm:items-center grid col-span-1 sm:mt-8" action="{{ url('wishlist') }}" method="POST">
                                @csrf
                                <!-- Hidden input field to send the product ID -->
                                <input type="hidden" name="product_id" value="{{ $prod->id }}">

                                <button type="submit" class="flex items-center justify-center py-2.5 text-sm sm:text-lg font-medium rounded-lg bg-black text-white">
                                    <i class="ph-bold ph-heart-straight text-sm sm:text-lg"></i>
                                </button>
                            </form>
                        @endforeach


                    </div>

                </div>
          
        </div>
    </div>
</section>


<script>
// Handle size selection
const sizeButtons = document.querySelectorAll('.size-btn');
const selectedSizeInput = document.getElementById('selected-size');
const selectedImageInput = document.getElementById('selected-image');

// Set size dynamically
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

// Update the selected image when user clicks on an image (image1, image2, image3)
document.querySelectorAll('.hover-image').forEach(image => {
    image.addEventListener('click', function() {
        // Update the hidden input field with the selected image URL
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

    // Quantity increase and decrease functionality
    const increaseButtons = document.querySelectorAll('.increase-quantity');
    const decreaseButtons = document.querySelectorAll('.decrease-quantity');

    increaseButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const input = this.nextElementSibling;
            input.value = parseInt(input.value) + 1;
        });
    });

    decreaseButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const input = this.previousElementSibling;
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const selectedSizeInput = document.getElementById('selected-size');
    const selectedImageInput = document.getElementById('selected-image');
    const sizeButtons = document.querySelectorAll('.size-btn');
    const imageButtons = document.querySelectorAll('.hover-image'); // Image buttons (image1, image2, image3)

    let sizeSelected = false;
    let imageSelected = false;

    // Handle size selection
    sizeButtons.forEach(button => {
        button.addEventListener('click', function() {
            sizeButtons.forEach(btn => btn.classList.remove('bg-gray-200')); // Remove 'selected' class from all buttons
            this.classList.add('bg-gray-200'); // Add 'selected' class to clicked button
            selectedSizeInput.value = this.getAttribute('data-size');
            sizeSelected = true; // Mark size as selected
        });
    });

    // Update selected image when user clicks on an image (image1, image2, image3)
    imageButtons.forEach(image => {
        image.addEventListener('click', function() {
            selectedImageInput.value = this.src; // Set the image URL as the selected image
            imageSelected = true; // Mark image as selected
        });
    });

    // Handle form submission
    form.addEventListener('submit', function (e) {
        if (!sizeSelected || !imageSelected) {
            e.preventDefault(); // Prevent form submission if either size or image is not selected
            alert('Please select both a size and a product image.');
        }
    });
});




</script>



        
    </body>
    <script defer src="{{ URL::asset('js/main.js') }}"></script>
</html>
