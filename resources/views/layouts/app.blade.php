<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

    <title>Laravel</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body class="bg-gray-200">

    <!-- #############Header############### -->
    @php
        $menu = [
            'Kreu' => 'home_page',
            'Ne Shitje' => 'for-sale-properties-page',
            'Me Qira' => 'for-rent-properties-page',
            'About' => 'about-us-page',
            'Blog' => 'blog-page',
            // 'Add new property' => 'new-property-page'
        ];
        // dd(auth()->user());
    @endphp

    @props([
        'showHeader' => true,
        'showFooter' => true,
    ])
    @if ($showHeader)
        <header class="bg-white">
            <div x-data="{ menu_open: false, profile_open: false }" class="max-w-screen-2xl px-4 lg:px-16 mx-auto">
                <nav class="relative flex flex-row items-center justify-between py-4">
                    <div class="flex flex-col lg:hidden">
                        <button @click="menu_open =! menu_open"><i class="fa-solid fa-bars"></i></button>
                        <div x-show="menu_open" @click.outside="menu_open = false">
                            <div
                                class="fixed top-0 left-0 z-50 p-4 flex flex-col h-screen bg-white w-[60%] gap-y-5 divide-y text-gray-600 font-semibold uppercase">
                                <div  class="flex flex-row justify-between">
                                    <div class="text-orange-400"> MENU</div>
                                    <x-icons.x-mark @click="menu_open = false" class="w-6 h-6 text-red-600 cursor-pointer"/>
                                </div>
                                @foreach ($menu as $key => $item)
                                    <div>
                                        <a class="" href="#">{{ $key }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="flex">
                        <a href="{{ route('home_page') }}">
                            <img class="h-auto w-20" src="{{ asset('../images/main-logo.png') }}" alt="elite logo">
                        </a>

                    </div>
                    <div class="">
                        <ul class="flex items-center">
                            <div class="hidden lg:flex lg:mr-7">
                                @foreach ($menu as $key => $item)
                                    <li>
                                        <a class="hover:text-orange-700 md:px-7 py-3 hover:bg-black hover:rounded-full"
                                            href="{{ route($item) }}">{{ $key }}</a>
                                    </li>
                                @endforeach
                            </div>
                            <div class="flex flex-col">
                                <button @click="profile_open =! profile_open">
                                    <div class="relative bg-orange-400 px-4 py-1.5 rounded-full">
                                        {{auth()->user()->name[0]}}
                                        <span class="top-0 left-7 absolute  w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
                                    </div>
                                </button>
                                <div x-show="profile_open" @click.outside="profile_open = false">
                                    <div
                                        class="absolute z-50 top-[80px] right-0 py-10 px-6 flex flex-col h-auto bg-white gap-y-5 divide-y text-gray-600 font-semibold uppercase">
                                        <a href="{{ route('users-dashboard') }}">
                                            Dashboard
                                        </a>
                                        @if (auth()->check() && auth()->user()->role == 'admin')
                                            <a href="{{ route('post-list') }}">
                                                Posts
                                            </a>
                                        @endif
                                        {{-- all users --}}
                                        <a href="{{ route('favourite-list-page') }}">
                                            My Favourites
                                        </a>
                                        <a href="{{ route('my-profile-page') }}">
                                            My Profile
                                        </a>

                                        {{-- only admins and sellers --}}
                                        @if ((auth()->check() && auth()->user()->role == 'seller') || auth()->user()->role == 'admin')
                                        <a href="{{ route('properties-list') }}">
                                           Properties
                                        </a>
                                        <a href="{{ route('new-property-page') }}">
                                                Add New Property
                                            </a>
                                            <a href="{{ route('reservations-list') }}">
                                                Reservations
                                            </a>
                                        @endif
                                        {{-- only admin --}}

                                        <a cass="nav-link" href="{{ route('signout') }}">Logout</a>
                                    </div>

                                </div>
                            </div>

                            <ul>
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login-page') }}">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register-page') }}">Register</a>
                                    </li>
                                @else
                                    {{-- <li class="nav-item">
                        <a cass="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li> --}}
                                @endguest
                            </ul>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
    @endif

    <div>@yield('content')</div>


    <!-- ############# Footer ############### -->

    @if ($showFooter)
        <footer class="bg-white">
            <div class="flex flex-col md:flex-row  py-10 justify-between max-w-screen-2xl px-4 lg:px-16 mx-auto">
                <div class="flex flex-col gap-y-5">
                    <div>
                        <a href="">
                            <h2 class="font-semibold underline text-gray-600">NE SHITJE</h2>
                        </a>
                    </div>
                    <div><a href="">
                            <h2 class="underline text-gray-600">Shtepi te Reja</h2>
                        </a></div>
                    <div><a href="">
                            <h2 class="underline text-gray-600">Prona ne Bashkepronesi</h2>
                        </a></div>
                    <div><a href="">
                            <h2 class="underline text-gray-600">Prona per investim ne shitje</h2>
                        </a></div>
                </div>
                <div class="flex flex-col gap-y-5">
                    <div><a href="">
                            <h2 class="font-semibold underline text-gray-600">ME QIRA</h2>
                        </a></div>
                    <div><a href="">
                            <h2 class="underline text-gray-600">Prona per investim me qira</h2>
                        </a></div>
                </div>
                <div class="flex flex-col gap-y-5">
                    <div><a href="">
                            <h2 class="font-semibold underline text-gray-600">Rreth nesh</h2>
                        </a></div>
                    <div><a href="">
                            <h2 class="underline text-gray-600">Pse ne? </h2>
                        </a></div>
                        <div><a href="">
                            <h2 class="underline text-gray-600">Blogu </h2>
                        </a></div>
                    <div><a href="">
                            <h2 class="underline text-gray-600">Lokacioni</h2>
                        </a></div>
                </div>
            </div>
            <div class="flex justify-center py-5 max-w-screen-2xl px-4 lg:px-16 mx-auto">


                <a href="">
                    <p class="text-xs font-bold px-3 text-gray-600">Rreth nesh</p>
                </a>
                <a href="">
                    <p class="text-xs font-bold px-3 text-gray-600">Kontakt</p>
                    <a href="">
                    <p class="text-xs font-bold px-3 text-gray-600">Reklamo ne Elite</p>
                </a>
                </a>
            </div>
            <div class="flex justify-between max-w-screen-2xl px-4 lg:px-16 mx-auto">
                <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
                <a href=""><i class="fa-brands fa-tiktok"></i></a>
                <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-youtube"></i></a>
            </div>
            <div class="max-w-screen-2xl px-4 lg:px-16 mx-auto">
                <p class="text-xs text-center text-gray-600">© Elite - Të gjitha të drejtat të rezervuara
                </p>
            </div>
        </footer>
    @endif
</body>

</html>
