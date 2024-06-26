@extends('layouts.app')
@section('content')
    <div class="">
        <div class="bg-local bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('images/banner.png') }}');">
            <div class="">
                <div class="justify-center py-20">
                    <div
                        class="max-w-screen-2xl px-4 lg:px-16 mx-auto py-20 items-center justify-center bg-stone-700 bg-opacity-50 rounded-md w-fit">
                        <div class="py-10 px-20">
                            <div class="text-white">
                                <div>
                                    <h2 class="text-4xl font-extrabold"> Çdo pronë në dorën tënde!
                                        <br>
                                        Lundro tani!
                                    </h2>
                                </div>
                                <div class="my-5">
                                    <p class="font-semibold " href="#">Siguri, Cilësi, Komoditet – Pasuri të
                                        paluajtshme në të gjithë
                                        vendin!</p>
                                </div>
                            </div>
                            <div class="font-semibold">
                                <ul class="flex space-x-5 my-7  ">
                                    <li>
                                        <a class="bg-black text-green-500 px-5 py-3 rounded-md"
                                            href="{{ route('all-properties-page') }}"> All </a>
                                    </li>
                                    <li>
                                        <a class="text-white " href="{{ route('for-rent-properties-page') }}"> Me Qira </a>
                                    </li>
                                    <li>
                                        <a class="text-white " href="{{ route('for-sale-properties-page') }}"> Në Shitje
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div
                                class="block md:flex bg-white rounded-md md:rounded-full p-2 justify-center items-center w-full md:w-fit space-y-3 md:space-y-0 md:space-x-3">
                                <div class=" border-solid border-2 border-black rounded-full py-3 px-10">
                                    <label class=" text-slate-400">Zgjidh qytetin...</label>
                                </div>
                                <div class="border-solid border-2 border-black rounded-full py-3 px-12">
                                    <label class="">Cmimi max</label>
                                </div>
                                <div class=" font-bold bg-green-500 rounded-full py-3 px-12">
                                    <button class="">Kerko</button>
                                </div>
                            </div>
                            <div
                                class="block  md:flex my-5 w-full justify-items-center md:space-x-10 space-y-5 md:space-y-0 justify-between">
                                <div class="">
                                    <a class="font-bold bg-green-500 p-2 rounded-lg" href="#">Kerko duke vizatuar
                                        ne
                                        harte</a>
                                </div>
                                <div>
                                    <a class="font-bold bg-green-500 p-2 rounded-lg" href="#">Kerko manualisht ne
                                        harte</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ############# Per Shitje ############### -->


    <div class="max-w-screen-2xl px-4 mx-auto lg:px-16 my-8">
        <div class="flex my-8 justify-between w-full">
            <div>
                <h2 class="font-bold text-2xl">Ne Shitje</h2>
            </div>
            <div>
                <a href="{{ route('all-properties-page') }}">
                    <p class="text-slate-700 underline">Zbuloji te gjitha</p>
                </a>
            </div>
        </div>
        <div class="flex mb-20">
            <div class="flex justify-between">
                <div class="flex flex-wrap ">
                    @foreach ($saleProperties as $property)
                        <div class="md:w-1/2 lg:w-1/3">

                            <div class="mx-2 border-solid border-slate-200 border-2 rounded-lg bg-slate-50">
                                <a href="{{ route('single-property', ['id' => $property->id]) }}">


                                    <img class="w-full h-13" src="{{ asset('storage/hazaar-images/' . $property->photo) }}"
                                        alt="">
                                </a>
                                <div class=" my-5 align-left px-10">
                                    <h2 class="font-sans font-semibold text-2xl">
                                        {{ $property->title }}
                                    </h2>
                                    <div>
                                        <p>{{ $property->description }}</p>
                                    </div>
                                </div>
                                <div>
                                    {{-- @dd($property) --}}
                                    <ul class="flex align-left py-3 px-7 gap-x-10">
                                        <div class="flex">

                                            <li class="mx-3">
                                                <img src="{{ asset('images/bed.png') }}" alt="">
                                            </li>

                                            <li>
                                                <p>{{ $sale_properties->no_rooms ?? null }}</p>
                                            </li>
                                            <li class="mx-3">
                                                <img src="{{ asset('images/bathroom.png') }}" alt="">
                                            </li>
                                            <li>
                                                <p>{{ $sale_properties->no_toilets ?? null }}</p>
                                            </li>
                                            <li class="mx-3">
                                                <img src="{{ asset('images/size.png') }}" alt="">
                                            </li>

                                            <li>
                                                <p>{{ $sale_properties->dimensions ?? '' }}</p>
                                            </li>
                                        </div>
                                        <div class="ml-auto pr-3">
                                            <li class="flex">
                                                <h2 class="font-bold text-lg">{{ $sale_properties->price ?? '' }}</h2>
                                            </li>
                                        </div>

                                    </ul>
                                    <div class="flex align-left my-5 py-3 px-7 gap-x-5">
                                        {{-- <a href="{{ route('edit-property-page', ['id' => $property->id]) }}"
                                            class=" text-black-500  bg-transparent border-b-2 border-black px-5 py-3 rounded-md">
                                            Edit
                                        </a> --}}
                                        @php
                                            $is_found = \App\Models\Favourite::where('user_id', auth()->user()->id)
                                                ->where('property_id', $property->id)
                                                ->exists();

                                        @endphp
                                        <form action="{{ route('make-favourite', ['id' => $property->id]) }}"
                                            method="POST">
                                            @csrf
                                            <button class="bottom-0 right-0" type="submit">
                                                @if ($is_found)
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#F42C02"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6  text-red-500">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                    </svg>
                                                @endif


                                            </button>

                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        {{-- eksploro --}}
        <div class="hidden lg:flex lg:flex-row my-8">
            <div class="relative items-center flex bg-slate-50 gap-x-10">
                <div class="max-w-screen-2xl px-4 lg:px-16 mx-auto">
                    <div class="flex flex-col gap-y-8 py-10">
                        <p class="">Në qytet, në zona bregdetare, rurale apo në vendndodhje të njohura – Hazaar
                            është
                            kudo me ju!
                            Zbuloni
                            <br>
                            çdo pronë brenda perimetrit të ëndrrave tuaja. Lehtësoni kërkimin tuaj në çdo zonë të
                            Shqipërisë.
                            Klikoni tani për një të ardhme të sigurt!
                        </p>
                        <div class="align-left">
                            <a href="{{ route('all-properties-page') }}"
                                class="bg-black text-green-500 px-6 py-2 rounded-sm text-lg font-semibold">Eksploro
                                tani</a>
                        </div>
                    </div>
                    <div class="absolute top-0 left-0 flex max-w-screen-2xl px-4 lg:px-16 mx-auto bg-gray-200">
                        <div>
                            <h2 class="font-bold text-3xl">Eksploro sipas zonave</h2>
                        </div>
                        <div class="px-20 hidden lg:flex"><img src="{{ asset('images/shigjeta.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <img class="ml-auto" src="{{ asset('images/Explore-Area-1.png') }}" alt="">
            </div>
        </div>

        <div class="flex flex-col gap-y-5 bg-slate-50 md:flex-row-reverse lg:hidden">
            <img src="{{ asset('images/Explore-Area-1.png') }}" alt="">
            <div><img src="" alt=""></div>
            <div class="max-w-screen-2xl px-4 lg:px-16 mx-auto flex flex-col gap-y-5 pb-3">
                <div>
                    <h2 class="font-bold text-2xl">Eksploro sipas zonave</h2>
                </div>
                <div>
                    <p>Në qytet, në zona bregdetare, rurale apo në vendndodhje të njohura – Hazaar është kudo me ju!
                        Zbuloni
                        çdo pronë brenda perimetrit të ëndrrave tuaja. Lehtësoni kërkimin tuaj në çdo zonë të
                        Shqipërisë.
                        Klikoni tani për një të ardhme të sigurt!</p>
                </div>
                <div><a href="{{ route('all-properties-page') }}"
                        class="bg-black text-green-500 px-5 py-3 rounded-md text-lg font-semibold">Eksploro
                        tani</a></div>
            </div>
        </div>


        <!-- ############# Me qira ############### -->

        <div class="flex my-8 justify-between w-full">
            <div>
                <h2 class="font-bold text-2xl">Me Qira</h2>
            </div>
            <div>
                <a href="{{ route('all-properties-page') }}">
                    <p class="text-slate-700 underline">Zbuloji te gjitha</p>
                </a>
            </div>
        </div>
        <div class="flex mb-20">
            <div class="flex justify-between">
                <div class="flex flex-wrap ">
                    {{-- @dd($rentProperties) --}}
                    @foreach ($rentProperties as $property)
                        <div class="md:w-1/2 lg:w-1/3">

                            <div class="mx-2 border-solid border-slate-200 border-2 rounded-lg bg-slate-50">
                                <a class="" href="{{ route('single-property', ['id' => $property->id]) }}">
                                    <img class="w-full h-13"
                                        src="{{ asset('storage/hazaar-images/' . $property->photo) }}" alt="">
                                </a>
                                <div class=" my-5 align-left px-10">
                                    <h2 class="font-sans font-semibold text-2xl">
                                        {{ $property->title ?? '' }}
                                    </h2>
                                    <div>
                                        <p>{{ $property->description ?? '' }}</p>
                                    </div>
                                </div>
                                <div>
                                    <ul class="flex align-left py-3 px-7 gap-x-10">
                                        <div class="flex">
                                            <li class="mx-3">
                                                <img src="{{ asset('images/bed.png') }}" alt="">
                                            </li>
                                            <li>
                                                <p>{{ $property->no_rooms ?? '' }}</p>
                                            </li>
                                            <li class="mx-3">
                                                <img src="{{ asset('images/bathroom.png') }}" alt="">
                                            </li>
                                            <li>
                                                <p>{{ $property->no_toilets ?? '' }}</p>
                                            </li>
                                            <li class="mx-3">
                                                <img src="{{ asset('images/size.png') }}" alt="">
                                            </li>
                                            <li>
                                                <p>{{ $property->dimensions ?? '' }}</p>
                                            </li>
                                        </div>
                                        <div class="ml-auto pr-3">
                                            <li class="flex">
                                                <h2 class="font-bold text-lg">{{ $property->price ?? '' }}</h2>
                                            </li>
                                        </div>
                                    </ul>
                                    <div class="flex align-left my-5 py-3 px-7 gap-x-5">
                                        {{-- <a href="{{ route('edit-property-page', ['id' => $property->id]) }}"
                                            class=" text-black-500  bg-transparent border-b-2 border-black px-5 py-3 rounded-md">
                                            Edit
                                        </a> --}}
                                        @php
                                            $is_found = \App\Models\Favourite::where('user_id', auth()->user()->id)
                                                ->where('property_id', $property->id)
                                                ->exists();

                                        @endphp
                                        <form action="{{ route('make-favourite', ['id' => $property->id]) }}"
                                            method="POST">
                                            @csrf
                                            <button class="bottom-0 right-0" type="submit">
                                                @if ($is_found)
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#F42C02"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6  text-red-500">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                    </svg>
                                                @endif


                                            </button>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <!-- ############# Vleresimet sipas kadastres dhe agjencise ############### -->
        <div class="flex flex-col lg:flex-row lg:justify-between gap-y-5 lg:gap-x-5 my-8">
            <div class="flex flex-col sm:flex-row  w-full">
                <img src="{{ asset('images/Value-ur-home-1.png') }}" alt="">
                <div class="flex flex-col bg-white w-full px-10 py-6 gap-y-5">
                    <div>
                        <h2 class="font-bold text-2xl">Vlerësim sipas agjencisë</h2>
                    </div>
                    <div>
                        <p>Gjeni agjencinë, filtroni opsionet më të mira dhe zgjidhni pronën perfekte
                            për ju! Një vlerësim ndryshe me Hazaar!</p>
                    </div>
                    <div><button class="bg-black text-green-700 font-semibold p-3">Vleresoni sipas
                            agjencise</button></div>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row w-full">
                <img src="{{ asset('images/Agency-Evaluation-1.png') }}" alt="">

                <div class="flex flex-col bg-white w-full px-10 py-6 gap-y-5">
                    <div>
                        <h2 class="font-bold text-2xl">Vlerësim sipas Kadastrës</h2>
                    </div>
                    <div>
                        <p>Vlerësoni pronën tuaj sipas rregullave të administratës. Krijoni idenë e
                            duhur duke marrë informacionin e nevojshëm.</p>
                    </div>
                    <div><button class="bg-black text-green-700 font-semibold p-3">Vleresoni sipas
                            kadastres</button></div>
                </div>
            </div>
        </div>


        <!-- ############# Informim per Blogun ############### -->



        <div class="flex my-8 justify-between w-full">
            <div>
                <h2 class="font-bold text-2xl">Informohu ne Blogun Tone</h2>
            </div>
            <div>
                <a href="{{ route('blog-page') }}">
                    <p class="text-slate-700 underline">Zbuloji te gjitha</p>
                </a>
            </div>
        </div>
        <div class="flex mb-20">
            <div class="flex justify-between">
                <div class="flex flex-wrap ">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="md:w-1/2 lg:w-1/3">
                            <div class="mx-2 border-solid border-slate-200 border-2 rounded-lg bg-slate-50">
                                <a class="" href="">
                                    <img class="w-full h-13"
                                        src="https://hazaar.eu/wp-content/uploads/2024/04/vila_3-2-584x438.jpg"
                                        alt="">
                                </a>
                                <div class=" my-5 align-left px-10">
                                    <h2 class="font-sans font-semibold text-2xl">Apartamente per shitje ne
                                        Astir
                                    </h2>
                                </div>
                                <div>
                                    <ul class="flex align-bottom py-3 px-7 gap-x-10">
                                        <div class="flex">
                                            <li class="mx-3">
                                                <img src="https://hazaar.eu/wp-content/uploads/2023/10/bed.png"
                                                    alt="">
                                            </li>
                                            <li>
                                                <p>2</p>
                                            </li>
                                            <li class="mx-3">
                                                <img src="https://hazaar.eu/wp-content/uploads/2023/10/bathroom.png"
                                                    alt="">
                                            </li>
                                            <li>
                                                <p>2</p>
                                            </li>
                                            <li class="mx-3">
                                                <img src="https://hazaar.eu/wp-content/uploads/2023/10/size.png"
                                                    alt="">
                                            </li>
                                            <li>
                                                <p>143</p>
                                            </li>
                                        </div>
                                        <div class="ml-auto pr-3">
                                            <li class="flex">
                                                <h2 class="font-bold text-lg">165,000 €</h2>
                                            </li>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
