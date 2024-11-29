<div class="sticky top-0 z-20">
    <nav class="w-full sm:flex justify-between p-2 sm:p-4 lg:px-32 md:px-20 sm:px-14 items-center bg-white shadow-md">
        <div>
            <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="fixed top-0 left-0 p-2 ms-3 text-sm text-black rounded-lg sm:hidden">
                <span class="sr-only">Open sidebar</span>
                <i class="ph-bold ph-list"></i>
            </button>
        </div>
    
        <div class="flex justify-center">
            <a href="/"><img class="w-[20px] md:w-[40px]" src="{{ asset('logos/uptrend.png') }}" alt="Logo"></a>
        </div>
<!--
        <div class="absolute sm:static collapse sm:visible">
            <ul class="flex flex-row sm:space-x-4">
                <li class="hover:underline hover:underline-offset-8 decoration-2">
                    <a href="/shoes" class="font-semibold">Men</a>
                </li>
                <li class="hover:underline hover:underline-offset-8 decoration-2">
                    <a href="/shoes" class="font-semibold">Women</a>
                </li>
                <li class="hover:underline hover:underline-offset-8 decoration-2">
                    <a href="/shoes" class="font-semibold">Kids</a>
                </li>
            </ul>
        </div>
-->
        <div class="absolute sm:static collapse sm:visible">
    <div class="space-x-4">
        <!-- User Icon with Dropdown -->
        <div class="relative inline-block group">
            <!-- Trigger button with User Icon -->

            <button class="inline-flex items-center justify-center focus:outline-none">
                <i class="ph-bold ph-user"></i>
            </button>

            <!-- Dropdown Menu -->
            <div class="origin-top-right absolute right-0 mt-2 w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible transition-all duration-200">
                <div class="py-1" role="menu" aria-orientation="vertical">

                    @if (Route::has('login'))
                        @auth
                            <!-- Logout Option -->
                            <form method="POST" action="{{ route('logout') }}" class="hover:bg-gray-100">
                                @csrf
                                <button type="submit" class="font-semibold block px-4 py-2 text-sm text-gray-700" role="menuitem">
                                    Logout
                                </button>
                            </form>
                        @else
                            <!-- Login and Register Links -->
                            <a href="{{ route('login') }}" class="font-semibold block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Login</a>
                            <a href="{{ route('register') }}" class="font-semibold block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Register</a>
                        @endauth
                    @endif

                </div>
            </div>
            
        </div>

    </div>

</div>

</div>

    </nav>
</div>