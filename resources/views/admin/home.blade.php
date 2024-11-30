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

    <aside id="default-sidebar" class="fixed left-0 w-64 z-10 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto shadow bg-white">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#" class="flex items-center p-2 rounded-lg group">
                        <i class="ph-bold ph-chart-pie"></i>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 rounded-lg group">
                        <i class="ph-bold ph-eye"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Show Products</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 rounded-lg group">
                        <i class="ph-bold ph-plus-circle"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Add Products</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

<div class="p-4 sm:ml-64">
<div class="main-panel">
        <div class="content-wrapper">
            @if(session()->has('message'))
                <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            @endif

            <div class="flex justify-center items-center w-full">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 border-2 rounded-lg sm:p-5">
            
                        <!-- Modal body -->
                        <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                                    <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type product name" required="">
                                </div>
                                <div>
                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                                    <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="₱0.00" required="">
                                </div>
                                <div>
                                    <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 ">Quantity</label>
                                    <input type="number" name="quantity" id="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="0" required="">
                                </div>
                                
                                <div class="sm:col-span-2">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                                    <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 " placeholder="Write product description here"></textarea>
                                </div>
                                <div class="space-y-2 text-sm">
                                    <label class="font-medium text-gray-900">Product Image 1:</label>
                                    <input type="file" name="image1" required>
                                </div>
                                <div class="space-y-2 text-sm">
                                    <label class="font-medium text-gray-900">Product Image 2:</label>
                                    <input type="file" name="image2" required>
                                </div>
                                <div class="space-y-2 text-sm">
                                    <label class="font-medium text-gray-900">Product Image 3:</label>
                                    <input type="file" name="image3" required>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <button type="submit" class="text-white inline-flex items-center font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-black">
                                    <i class="ph-bold ph-plus mr-2"></i>
                                    Add new product
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const button = document.querySelector('[data-drawer-toggle="default-sidebar"]');
    const sidebar = document.getElementById('default-sidebar');
    const dashboardLink = document.getElementById('dashboard-link');

    button.addEventListener('click', function () {
        sidebar.classList.toggle('-translate-x-full');
    });

    dashboardLink.addEventListener('click', function () {
        sidebar.classList.add('-translate-x-full');
    });
});
</script>

    </body>
</html>