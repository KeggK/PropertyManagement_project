@extends('layouts.app')
@section('content')
    <div class="">
        @include('partials.main-banner')
        <div class="relative flex overflow-x-hidden bg-white">
            <div class="py-1 animate-marquee whitespace-nowrap">
                <span class="mx-4 text-xl italic font-bold text-orange-500">Arkitekturë</span>
                <span class="mx-4 text-xl italic font-bold text-orange-500">Raffinim dhe Stil</span>
                <span class="mx-4 text-xl italic font-bold text-orange-500">Ekskluzivitet dhe Luks</span>
                <span class="mx-4 text-xl italic font-bold text-orange-500">Inovacion</span>
                <span class="mx-4 text-xl italic font-bold text-orange-500">Ekologjik</span>
            </div>

            <div class="absolute top-0 py-1 animate-marquee2 whitespace-nowrap">
                <span class="mx-4 text-xl italic font-bold text-orange-500">Arkitekturë</span>
                <span class="mx-4 text-xl italic font-bold text-orange-500">Raffinim dhe Stil</span>
                <span class="mx-4 text-xl italic font-bold text-orange-500">Ekskluzivitet dhe Luks</span>
                <span class="mx-4 text-xl italic font-bold text-orange-500">Inovacion</span>
                <span class="mx-4 text-xl italic font-bold text-orange-500">Ekologjik</span>
            </div>
        </div>


        <!-- ############# Me qira ############### -->

        <div class="max-w-screen-2xl px-4 mx-auto lg:px-16">
            <div class="flex my-8 justify-between w-full">
                <div>
                    <h2 class="font-bold text-2xl">Me Qira</h2>
                </div>
                <div>
                    <a href="{{ route('all-properties-page') }}">
                        <p class="text-slate-700 underline">Zbulo</p>
                    </a>
                </div>
            </div>
            <div class="mb-10">
                <div class="">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($properties as $property)
                            <div class="relative">
                                <div class="border-solid border-slate-200 border-2 rounded-lg bg-slate-50">
                                    <a href="{{ route('single-property', ['id' => $property->id]) }}">
                                        <img class="w-full h-auto md:h-[300px] rounded-t-md"
                                            src="{{ asset('storage/hazaar-images/' . $property->photo) }}" alt="">
                                    </a>
                                    <div class="absolute top-3 right-4 z-50  hover:scale-150">
                                        @php
                                            $is_found = \App\Models\Favourite::where('user_id', auth()->user()->id)
                                                ->where('property_id', $property->id)
                                                ->exists();
                                        @endphp
                                        <form action="{{ route('make-favourite', ['id' => $property->id]) }}" method="POST">
                                            @csrf
                                            <button class="bottom-0 right-0" type="submit">
                                                @if ($is_found)
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#F42C02" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="size-6  text-red-500">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" class="size-6 stroke-2 stroke-red-700">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </form>
                                    </div>
                                    <div class=" my-5 align-left px-4">
                                        <h2 class="font-sans font-semibold text-2xl">
                                            {{ $property->title }}
                                        </h2>
                                        <div>
                                            <p>{{ $property->description }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <ul class="flex align-left py-3 px-4 gap-x-10">
                                            <div class="flex">
                                                <li class="mx-3">
                                                    <img src="{{ asset('images/bed.png') }}" alt="">
                                                </li>
                                                <li>
                                                    <p>{{ $property->no_rooms ?? null }}</p>
                                                </li>
                                                <li class="mx-3">
                                                    <img src="{{ asset('images/bathroom.png') }}" alt="">
                                                </li>
                                                <li>
                                                    <p>{{ $property->no_toilets ?? null }}</p>
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
                                        <div class="flex flex-row item-center justify-between py-3 px-4 gap-x-5">

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

                                            <div class="ml-auto pr-3">
                                                <h2 class="font-bold text-lg">{{ $property->city->name }}</h2>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                    {{ $properties->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
