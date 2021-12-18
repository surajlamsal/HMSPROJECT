<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', !empty($title) ? $title : '')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    @yield('css')
</head>

<body class="bg-gray-200">
<!-- HEADER -->
<header class="bg-white shadow w-full py-2">
    <div class="wrapper flex justify-between items-center">
        <div class="flex">
            <a href="{{ route('front.index') }}" class="
              py-5
              px-4
              bg-orange-200
              text-2xl
              font-bold
              h-full
              hover:bg-orange-300
              trans_300
            ">HMS</a>
        </div>

        <div class="md:hidden flex-1 flex items-center justify-end">
            <button onclick="toggleNav()" class="px-4 py-3 cursor-pointer hover:bg-gray-200 trans_300 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- DESKTOP MENU -->
        <div class="hidden md:block md:flex-1">
            <div class="flex justify-between px-2">
                <div class="nav-menu">
                    <a class="nav-item" href="{{ route('front.index') }}">Home</a>
                    <a class="nav-item" href="{{ route('front.rooms') }}">Rooms</a>
                    <a class="nav-item" href="{{ route('front.contact') }}">Contact</a>
                    <a class="nav-item" href="{{ route('front.gallery') }}">Gallery</a>
                    @guest
                    <a class="nav-item" href="{{ route('login') }}">Login</a>
                    <a class="nav-item" href="{{ route('register') }}">Sign Up</a>
                    @else
                        @if(auth()->user()->role == 'Admin')
                        <a class="nav-item" href="/admin">Admin</a>
                        @else
                            <a class="nav-item" href="/kitchen">Kitchen</a>
                        @endif
                        <a class="nav-item" href="/logout">Logout</a>

                    @endguest
                </div>
                <div class="flex items-center">
                    <a href="{{ route('front.book') }}" class="
              bg-orange-600
              text-white
              hover:bg-orange-700
              trans_300
              px-3
              py-2
              rounded
              shadow
            ">Book Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- MOBILE NAVBAR -->
    <div class="wrapper md:hidden">
        <div id="nav-mobile" class="hidden">
            <div class="nav-menu flex-col mt-3">
                <a class="nav-item w-full flex-1 mb-2 px-4" href="{{ route('front.index') }}">Home</a>
                <a class="nav-item w-full flex-1 mb-2 px-4" href="{{ route('front.rooms') }}">Rooms</a>
                <a class="nav-item w-full flex-1 mb-2 px-4" href="{{ route('front.contact') }}">Contact</a>
                <a class="nav-item w-full flex-1 mb-2 px-4" href="{{ route('front.gallery') }}">Gallery</a>
                @guest
                <a class="nav-item w-full flex-1 mb-2 px-4" href="{{ route('login') }}">Login</a>
                <a class="nav-item w-full flex-1 mb-2 px-4" href="{{ route('register') }}">Sign Up</a>
                @else
                <a class="nav-item w-full flex-1 mb-2 px-4" href="/admin">Admin</a>
                @endif
                <a class="px-3 py-2 text-white rounded text-center hover:bg-orange-700 trans_300 w-full flex-1 mb-2 px-4 bg-orange-500" style="text:white!important" href="{{ route('front.book') }}">Book Now</a>
            </div>
        </div>
    </div>
</header>

@yield('content')

<footer class="mt-4 bg-white border-t border-gray-300 pt-8">
    <div class="wrapper mb-6">
        <h3 class="text-3xl font-bold text-center mb-6">More Information</h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-4">
            <div>
                <h3 class="text-2xl font-bold mb-3">Address</h3>
                <p>Narayani Resort, Gaindakot</p>
            </div>
            <div>
                <h3 class="text-2xl font-bold mb-3">Sales</h3>
                <p>Sales Enquiries</p>
                <p>Tel: +9779845803736</p>
                <p>Email: NarayaniResort@gmail.com</p>
            </div>
            <div>
                <h3 class="text-2xl font-bold mb-3">About Us</h3>
                <p>
                    We have 24 hours comfortably equipped room,including many more
                    features.
                </p>
            </div>
        </div>
    </div>
    <div class="bg-orange-600 text-white text-center py-4 text-xl">
        WORLD CLASS HOTEL EXPERIENCE @2021
    </div>
</footer>

<script>
    function toggleNav() {
        let item = document.getElementById('nav-mobile');
        if (item.classList.contains('hidden')) {
            item.classList.remove('hidden');
        } else {
            item.classList.add('hidden');
        }
    }
</script>

@yield('js')
</body>

</html>
