
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
    @include('admin.navbar')

    <div class="">

        <div class="">
        <div class="">
        

    <div class="p-4 sm:ml-64">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl m-5">Orders</h2>
            <table class="w-full text-sm text-left mt-5">
                <thead class="uppercase">
                    <tr class="border-2">
                        <th scope="col" class="px-6 py-3">Customer Name</th>
                        <th scope="col" class="px-6 py-3">Contact Details</th>
                        <th scope="col" class="px-6 py-3">Address</th>
                        <th scope="col" class="px-6 py-3">Product Title</th>
                        <th scope="col" class="px-6 py-3">Price</th>
                        <th scope="col" class="px-6 py-3">Size</th>
                        <th scope="col" class="px-6 py-3">Color</th>
                        <th scope="col" class="px-6 py-3">Quantity</th>
                        <th scope="col" class="px-6 py-3">Payment Status</th>
                        <th scope="col" class="px-6 py-3">Delivery Status</th>
                        <th scope="col" class="px-6 py-3">Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $order)                  
                    <tr class="border-b text-black">
                        <td class="px-6 py-4">{{$order->name}}</td>
                        <td class="px-6 py-4">{{$order->email}}, {{$order->phone}}</td>
                        <td class="px-6 py-4">{{$order->address}}</td>
                        <td class="px-6 py-4">{{$order->product_title}}</td>
                        <td class="px-6 py-4">₱{{$order->price}}</td>
                        <td class="px-6 py-4">{{$order->size}}</td>
                        <td class="px-6 py-4">{{$order->color}}</td>
                        <td class="px-6 py-4">{{$order->quantity}}</td>
                        <td class="px-6 py-4">{{$order->payment_status}}</td>
                        <td class="px-6 py-4">{{$order->delivery_status}}</td>
                        <td class="px-6 py-4">
                            <img class="" src="/product/{{$order->image1}}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        </div>
        </div>
    </div>
    </body>
</html>