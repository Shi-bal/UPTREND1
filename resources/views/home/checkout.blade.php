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
    <div class="sticky top-0 z-10">
    <nav class="w-full sm:flex justify-between p-2 sm:p-4 lg:px-32 md:px-20 sm:px-14 items-center bg-white shadow-md">
            <div class="flex justify-center">
                <a href="/"><img class="w-[20px] md:w-[40px]" src="{{ asset('logos/uptrend.png') }}" alt="Logo"></a>
            </div>
            
            <div class=" absolute sm:static collapse sm:visible">
                <ul class="flex flex-row sm:space-x-4">
                    <li class="hover:underline hover:underline-offset-8 decoration-2">
                        <a href="/shoes" class="font-semibold">Men</a>
                    </li>
                    <li class="hover:underline hover:underline-offset-8 decoration-2">
                        <a href="/shoes" class="font-semibold ">Women</a>
                    </li>
                    <li class="hover:underline hover:underline-offset-8 decoration-2">
                        <a href="/shoes" class="font-semibold ">Kids</a>
                    </li>
                </ul>
            </div>

            <div class="absolute sm:static collapse sm:visible">
                <div class="space-x-4">
                <button href="#"><i class="ph-bold ph-user"></i></button>
                <button href="#"><i class="ph-bold ph-heart-straight"></i></button>
                <button href="#"><i class="ph-bold ph-bag"></i></button>
                </div>
            </div>
        </nav>
    </div>
    
  <section class="bg-white py-8 antialiased md:py-16">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <h2 class="text-xl font-semibold text-gray-900  sm:text-2xl">Shopping Cart</h2>

      <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
        <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
          <div class="space-y-6">

            <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm  md:p-6">
              <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                <a href="#" class="shrink-0 md:order-1">
                  <img class="h-40" src="{{ URL('images/shoes/aj1midwhite.jpg') }}" alt="" class="object-cover size-14 hover-image pb-[2px] hover:bg-black">
                </a>

                <div class="flex items-center justify-between md:order-3 md:justify-end">
                  <div class="flex items-center">
                    <button class="increase-quantity px-2 border rounded-l-lg border-gray-300 border-r-0 hover:bg-black hover:text-white">+</button><input type="number" value="1" min="1" class="w-12 text-center border border-gray-300"><button class="decrease-quantity px-2 border rounded-r-lg border-gray-300 border-l-0 hover:bg-black hover:text-white">-</button>
                  </div>
                  <div class="text-end md:order-4 md:w-32">
                    <p class="text-base font-bold text-gray-900 ">₱4,719</p>
                  </div>
                </div>

                <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                  <div>
                  <a href="#" class="text-base font-medium text-gray-900 hover:underline ">Air Jordan 1</a>
                  <p>Men's Shoes</p>
                  <p class="text-gray-500">White</p>
                  </div>

                  <div class="flex items-center gap-4">
                    <button class="text-sm font-medium hover:underline"><i class="fa-regular fa-heart me-1.5"></i>Add to Favorites</button>
                    <button class="text-sm font-medium hover:underline text-red-600"><i class="fa-solid fa-x me-1.5 text-red-600"></i>Remove</button>
                  </div>

                </div>
              </div>
            </div>
            
          </div>
        </div>

        <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
          <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm  sm:p-6">
            <p class="text-xl font-semibold text-gray-900 ">Order summary</p>

            <div class="space-y-4">
              <div class="space-y-2">
                <dl class="flex items-center justify-between gap-4">
                  <dt class="text-base font-normal text-gray-500">Bag</dt>
                  <dd class="text-base font-medium text-gray-900 ">₱4,719.00</dd>
                </dl>
                <dl class="flex items-center justify-between gap-4">
                  <dt class="text-base font-normal text-gray-500">Shipping Fee</dt>
                  <dd class="text-base font-medium text-gray-900 ">₱499.00</dd>
                </dl>

              </div>

              <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                <dt class="text-base font-bold text-gray-900 ">Total</dt>
                <dd class="text-base font-bold text-gray-900 ">₱5,218.00</dd>
              </dl>
            </div>

            <a href="#" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300">Proceed to Checkout</a>

            <div class="flex items-center justify-center gap-2">
              <span class="text-sm font-normal text-gray-500"> or </span>
              <a href="#" title="" class="inline-flex items-center gap-2 text-sm font-medium text-primary-700 underline hover:no-underline">
                Continue Shopping
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

</body>
</html>