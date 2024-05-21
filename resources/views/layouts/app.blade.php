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
            'Ne Shitje' => 'home_page',
            'Me Qira' => 'home_page',
            'Cmimet' => 'home_page',
            'Kontakt' => 'home_page',
            'About' => 'about-us-page',
            'Blog' => 'blog-page',
            'Insert Property' => 'new-property-page'
            // 'Property' => 'single-property-page'
        ];

    @endphp



    <header class="bg-white">

        <div class="max-w-screen-2xl px-4 lg:px-16 mx-auto">

            <nav class="relative md:mx-auto md:flex md:items-center md:justify-between py-4">
                <div class="flex flex-col lg:hidden" x-data="{ open: false }">
                    <button @click="open =! open"><i class="fa-solid fa-bars"></i></button>
                    <div x-show="open" @click.outside="open = false">
                        <div
                            class="absolute top-0 left-0 flex flex-col h-screen bg-white w-[40%] gap-y-5 divide-y text-gray-600 font-semibold uppercase">
                            @foreach ($menu as $item)
                                <div>
                                    <a class="" href="#">Kreu</a>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>

                <div class="flex">
                    <img class="h-10 w-full" src="https://hazaar.eu/wp-content/uploads/2023/12/logo-hazzar.svg"
                        alt="hazaar logo">
                    </a>

                </div>
                <div class="">
                    <ul class="flex items-center space-x-8">
                        <div class="hidden lg:flex">
                            @foreach ($menu as $key => $item)
                                <li>
                                    <a class="hover:text-green-700 p-5 hover:bg-black"
                                        href="{{ route($item) }}">{{ $key }}</a>
                                </li>
                            @endforeach

                        </div>
                        <div>
                            <a class="hidden lg:flex" href="#">
                                <img class="w-6 h-6" src="../../images/header2.png">
                            </a>
                        </div>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div>@yield('content')</div>


    <!-- ############# Footer ############### -->

    <footer class="bg-white mt-6">
        <div class="flex  py-10 justify-between max-w-screen-2xl px-4 lg:px-16 mx-auto">
            <div class="flex flex-col gap-y-5">
                <div>
                    <a href="">
                        <h2 class="font-semibold underline text-gray-600">NE SHITJE</h2>
                    </a>
                </div>
                <div><a href="">
                        <h2 class="underline text-gray-600">Kerko ne Harte</h2>
                    </a></div>
                <div><a href="">
                        <h2 class="underline text-gray-600">Shtepi te Reja</h2>
                    </a></div>
                <div><a href="">
                        <h2 class="underline text-gray-600">Prona ne Bashkepronesi</h2>
                    </a></div>
                <div><a href="">
                        <h2 class="underline text-gray-600">Prona per investim ne shitje</h2>
                    </a></div>
                <div><a href="">
                        <h2 class="underline text-gray-600">Prona ne shitje jashte vendit</h2>
                    </a></div>
            </div>
            <div class="flex flex-col gap-y-5">
                <div><a href="">
                        <h2 class="font-semibold underline text-gray-600">ME QIRA</h2>
                    </a></div>
                <div><a href="">
                        <h2 class="underline text-gray-600">Kerko ne Harte</h2>
                    </a></div>
                <div><a href="">
                        <h2 class="underline text-gray-600">Prona per investim me qira</h2>
                    </a></div>
                <div><a href="">
                        <h2 class="underline text-gray-600">Vizato ne Harte</h2>
                    </a></div>
            </div>
            <div class="flex flex-col gap-y-5">
                <div>
                    <a href="">
                        <h2 class="font-semibold underline text-gray-600">SHTEPI TE REJA</h2>
                    </a>
                </div>
                <div><a href="">
                        <h2 class="underline text-gray-600">Kerko ne Harte</h2>
                    </a></div>
                <div><a href="">
                        <h2 class="underline text-gray-600">Manual ne Bashkepronesi</h2>
                    </a></div>
            </div>
            <div class="flex flex-col gap-y-5">
                <div><a href="">
                        <h2 class="font-semibold underline text-gray-600">CMIMET E SHTEPIVE</h2>
                    </a></div>
                <div><a href="">
                        <h2 class="underline text-gray-600">Kerko ne Harte</h2>
                    </a></div>
                <div><a href="">
                        <h2 class="underline text-gray-600">Ne qytet</h2>
                    </a></div>
                <div><a href="">
                        <h2 class="underline text-gray-600">Ne bregdet</h2>
                    </a></div>
                <div><a href="">
                        <h2 class="underline text-gray-600">Ne zona rurale</h2>
                    </a></div>
                <div><a href="">
                        <h2 class="underline text-gray-600">Ne vendodhje te njohura</h2>
                    </a></div>
            </div>
        </div>
        <div class="flex justify-center py-5 max-w-screen-2xl px-4 lg:px-16 mx-auto">
            <a href="">
                <p class="text-xs font-bold px-3 text-gray-600">Cookies</p>
            </a>
            <a href="">
                <p class="text-xs font-bold px-3 text-gray-600">Politika e Privatesise</p>
            </a>
            <a href="">
                <p class="text-xs font-bold px-3 text-gray-600">Kushtet e Perdorimit</p>
            </a>
            <a href="">
                <p class="text-xs font-bold px-3 text-gray-600">Reklamo ne Hazaar</p>
            </a>
            <a href="">
                <p class="text-xs font-bold px-3 text-gray-600">Rreth nesh</p>
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
            <p class="text-xs text-center text-gray-600">© Hazaar - Të gjitha të drejtat të rezervuara
            </p>
        </div>
    </footer>
</body>

</html>
