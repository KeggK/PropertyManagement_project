@extends('layouts.app')
@section('content')
    <div class="">
        @include('partials.main-banner')
        <!-- ############# Per Shitje ############### -->


        <div class="max-w-screen-2xl px-4 mx-auto lg:px-16 my-8">
            <div class="flex my-8 justify-between w-full">
                <div>
                    <h2 class="font-bold text-2xl">Ne Shitje</h2>
                </div>
                <div>
                    <a href="{{ route('for-sale-properties-page') }}">
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


                                        <img class="w-full h-13"
                                            src="{{ asset('storage/hazaar-images/' . $property->photo) }}" alt="">
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
                                    class="bg-black text-orange-500 px-6 py-2 rounded-sm text-lg font-semibold">Eksploro
                                    tani</a>
                            </div>
                        </div>
                        <div class="absolute top-0 left-0 flex max-w-screen-2xl px-4 lg:px-16 mx-auto bg-gray-200">
                            <div>
                                <h2 class="font-bold text-3xl">Kontrolloni pronat tona</h2>
                            </div>
                            <div class="px-20 hidden lg:flex"><img src="{{ asset('images/shigjeta.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <img class="ml-auto w-80 h-90" src="{{ asset('images/Explore-Area-1.png') }}" alt="">
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
                            class="bg-black text-orange-500 px-5 py-3 rounded-md text-lg font-semibold">Eksploro
                            tani</a></div>
                </div>
            </div>


            <!-- ############# Me qira ############### -->

            <div class="flex my-8 justify-between w-full">
                <div>
                    <h2 class="font-bold text-2xl">Me Qira</h2>
                </div>
                <div>
                    <a href="{{ route('for-rent-properties-page') }}">
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
                <div class="flex flex-col sm:flex-row w-full">
                    <img src="{{ asset('images/Agency-Evaluation-1.png') }}" alt="">
                    <div class="flex flex-col bg-white w-full px-10 py-6 gap-y-5">
                        <div>
                            <h2 class="font-bold text-2xl">Vlerësim sipas agjencisë</h2>
                        </div>
                        <div>
                            <p>Gjeni agjencinë, filtroni opsionet më të mira dhe zgjidhni pronën perfekte
                                për ju! Një vlerësim ndryshe me Hazaar!</p>
                        </div>
                        <div><button class="bg-black text-orange-700 font-semibold p-3">Kontrollo Prona</button></div>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row w-full">
                    <img src="{{ asset('images/Value-ur-home-1.png') }}" alt="">

                    <div class="flex flex-col bg-white w-full px-10 py-6 gap-y-5">
                        <div>
                            <h2 class="font-bold text-2xl">Vlerësim sipas Kadastrës</h2>
                        </div>
                        <div>
                            <p>Vlerësoni pronën tuaj sipas rregullave të administratës. Krijoni idenë e
                                duhur duke marrë informacionin e nevojshëm.</p>
                        </div>
                        <div><button class="bg-black text-orange-700 font-semibold p-3">Kontrollo Prona</button></div>
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
                        @foreach ($posts as $post)
                            <div class="">

                                <div class="mx-2 border-solid border-slate-200 border-2 rounded-lg bg-slate-50">
                                    <a href="{{ route('single-post-page', ['id' => $post->id]) }}">
                                        <img class="max-w-md h-13"
                                            src="{{ asset('storage/hazaar-images/' . $post->photo) }}" alt="">
                                    </a>
                                    <div class=" my-5 align-left px-10">
                                        <h2 class="font-sans font-semibold text-2xl">
                                            {{ $post->title }}
                                        </h2>
                                        <div>
                                            <p>{{ $post->description }}</p>
                                        </div>
                                        <div>
                                            <p>{{ $post->category->category_name }}</p>
                                        </div>
                                        <div>
                                            <p>{{ $post->user->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
