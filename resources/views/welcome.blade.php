@extends('layouts.app')
@section('content')
    <div class="">
        @include('partials.main-banner')
        <!-- ############# Per Shitje ############### -->
        <div class="relative flex overflow-x-hidden bg-white">
            <div class="py-1 animate-marquee whitespace-nowrap">
                <span class="mx-4 text-xl italic font-bold text-orange-500">Arkitekturë</span>
                <span class="mx-4 text-xl italic font-bold text-orange-500">Rafinim dhe Stil</span>
                <span class="mx-4 text-xl italic font-bold text-orange-500">Ekskluzivitet dhe Luks</span>
                <span class="mx-4 text-xl italic font-bold text-orange-500">Inovacion</span>
                <span class="mx-4 text-xl italic font-bold text-orange-500">Ekologjik</span>
            </div>

            <div class="absolute top-0 py-1 animate-marquee2 whitespace-nowrap">
                <span class="mx-4 text-xl italic font-bold text-orange-500">Arkitekturë</span>
                <span class="mx-4 text-xl italic font-bold text-orange-500">Rafinim dhe Stil</span>
                <span class="mx-4 text-xl italic font-bold text-orange-500">Ekskluzivitet dhe Luks</span>
                <span class="mx-4 text-xl italic font-bold text-orange-500">Inovacion</span>
                <span class="mx-4 text-xl italic font-bold text-orange-500">Ekologjik</span>
            </div>
        </div>
        <div class="max-w-screen-2xl px-4 mx-auto lg:px-16 my-8">
            <div class="flex my-8 justify-between w-full">
                <div>
                    <h2 class="font-bold text-2xl">Prona ne shitje</h2>
                </div>
                <div>
                    <a href="{{ route('for-sale-properties-page') }}">
                        <p class="text-slate-700 underline">Zbulo</p>
                    </a>
                </div>
            </div>
            <div class="mb-10 lg:mb-20">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($saleProperties as $property)
                        <div class="relative mx-2 border-solid border-slate-200 border-2 rounded-lg bg-slate-50">
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
                                <a href="{{ route('single-property', ['id' => $property->id]) }}"
                                    class="font-sans font-semibold text-2xl">
                                    {{ $property->title }}
                                </a>
                                <div>
                                    <p>{{ $property->description }}</p>
                                </div>
                            </div>
                            <div class="flex flex-row items-center justify-between py-3 px-4">
                                <div class="flex flex-row gap-x-3">
                                    <div>
                                        <img src="{{ asset('images/bed.png') }}" alt="">
                                    </div>
                                    <div>
                                        <p>{{ $property->no_rooms ?? '' }}</p>
                                    </div>
                                    <div>
                                        <img src="{{ asset('images/bathroom.png') }}" alt="">
                                    </div>
                                    <div>
                                        <p>{{ $property->no_toilets ?? '' }}</p>
                                    </div>
                                    <div>
                                        <img src="{{ asset('images/size.png') }}" alt="">
                                    </div>
                                    <div>
                                        <p>{{ $property->dimensions ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="flex">
                                    <h2 class="font-bold text-3xl text-orange-500 font-sans">{{ $property->price ?? '100' }}$</h2>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- eksploro --}}
            <div class="hidden lg:flex lg:flex-row my-8">
                <div class="relative items-center flex bg-slate-50 gap-x-10">
                    <div class="max-w-screen-2xl px-4 lg:px-16 mx-auto w-2/3">
                        <div class="flex flex-col gap-y-8 py-10">
                            <p class="">Aktualisht, Elite Group është franchisori i organizatës më të madhe botërore
                                të shitjeve në Real Estate, që jep trajnim gjithëpërfshirës, menaxhim, suport administrativ
                                .
                                <br>
                                Sistemi përfshin më shumë se 14,000 zyra franchise që operojnë dhe janë në pronësi të
                                pavarur me mbi 145,000 bashkëpunëtorë shitjesh, në 86 vende dhe territore në të gjithë botën
                            </p>
                            <div class="align-left">
                                <a href="{{ route('all-properties-page') }}"
                                    class="bg-black text-orange-500 px-6 py-2 text-lg font-semibold rounded-md">Shiko me
                                    teper</a>
                            </div>
                        </div>

                    </div>
                    <div class="w-1/3">
                        <img class="ml-auto" src="{{ asset('images/Explore-Area-1.png') }}" alt="">
                    </div>
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
                        <p>Në qytet, në zona bregdetare, rurale apo në vendndodhje të njohura – Elite është kudo me ju!
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

            <div class="relative mt-6">
                <div style="background-image: url('{{ asset('images/slide-1.png') }}');"
                    class="sticky top-0 h-screen flex flex-col items-center justify-center bg-gradient-to-b from-green-200 to-blue-200">
                    <h2 class="text-3xl md:text-5xl font-extrabold text-orange-500">Elite Group: Where Distinction Meets Realty</h2>
                </div>
                <div style="background-image: url('{{ asset('images/slide-3.png') }}');"
                    class="sticky top-0 h-screen flex flex-col items-center justify-center bg-gradient-to-b from-indigo-800 to-purple-800 text-white">
                    <h2 class="text-3xl md:text-5xl font-extrabold text-orange-500">Unparalleled Excellence in Real Estate</h2>
                </div>
                <div style="background-image: url('{{ asset('images/slide-2.png') }}');"
                    class="sticky top-0 h-screen flex flex-col items-center justify-center bg-gradient-to-b from-purple-800 to-pink-800 text-white">
                    <h2 class="text-3xl md:text-5xl font-extrabold text-orange-500">Elevate Your Real Estate Expectations with us</h2>
                </div>
            </div>
            <!-- ############# Me qira ############### -->

            <div class="flex my-8 justify-between w-full">
                <div>
                    <h2 class="font-bold text-2xl">Prona me qira</h2>
                </div>
                <div>
                    <a href="{{ route('for-rent-properties-page') }}">
                        <p class="text-slate-700 underline">Zbulo</p>
                    </a>
                </div>
            </div>
            <div class="mb-10 lg:mb-20">
                <div class="">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        {{-- @dd($rentProperties) --}}
                        @foreach ($rentProperties as $property)
                            <div class="">
                                <div class="relative mx-2 border-solid border-slate-200 border-2 rounded-lg bg-slate-50">
                                    <div class="absolute top-3 right-4 z-50  hover:scale-150">
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
                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                        class="size-6 stroke-2 stroke-red-700 ">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </form>
                                    </div>
                                    <a class="" href="{{ route('single-property', ['id' => $property->id]) }}">
                                        <img class="w-full h-auto md:h-[300px] rounded-t-md"
                                            src="{{ asset('storage/hazaar-images/' . $property->photo) }}"
                                            alt="">
                                    </a>
                                    <div class=" my-5 align-left px-4">
                                        <h2 class="font-sans font-semibold text-2xl">
                                            {{ $property->title ?? '' }}
                                        </h2>
                                        <div>
                                            <p>{{ $property->description ?? '' }}</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-row items-center justify-between py-3 px-4">
                                        <div class="flex flex-row gap-x-3">
                                            <div>
                                                <img src="{{ asset('images/bed.png') }}" alt="">
                                            </div>
                                            <div>
                                                <p>{{ $property->no_rooms ?? '' }}</p>
                                            </div>
                                            <div>
                                                <img src="{{ asset('images/bathroom.png') }}" alt="">
                                            </div>
                                            <div>
                                                <p>{{ $property->no_toilets ?? '' }}</p>
                                            </div>
                                            <div>
                                                <img src="{{ asset('images/size.png') }}" alt="">
                                            </div>
                                            <div>
                                                <p>{{ $property->dimensions ?? '' }}</p>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <h2 class="font-bold text-3xl text-orange-500 font-sans">{{ $property->price ?? '100' }}$</h2>
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
                <div class="flex flex-col md:flex-row  w-full">
                    <img src="{{ asset('images/Value-ur-home-1.png') }}" alt="" class="w-full md:w-1/2">
                    <div class="flex flex-col bg-white w-full px-10 py-6 gap-y-5">
                        <div>
                            <h2 class="font-bold text-2xl">Elite Group</h2>
                        </div>
                        <div>
                            <p>Zbuloni një botë ku luksozia dhe sofistikimi bashkohen pa kurrfarë pengese te Grupi Elite të
                                Pasurive të Patundshme.</p>
                        </div>
                        <div><a href="{{route('all-properties-page')}}" class="bg-black text-orange-700 font-semibold p-3 rounded-md">Zbuloni Prona</a></div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row w-full">
                    <img src="{{ asset('images/Agency-Evaluation-1.png') }}" alt="" class="w-full md:w-1/2">

                    <div class="flex flex-col bg-white w-full px-10 py-6 gap-y-5">
                        <div>
                            <h2 class="font-bold text-2xl">Na kontaktoni</h2>
                        </div>
                        <div>
                            <p>Shfletoni faqen tonë të internetit për të parë listat tona aktuale, duke përfshirë përshkrime
                                të hollësishme, fotografi të mahnitshme dhe ture virtuale që japin jetë secilës pronë. </p>
                        </div>
                        <div><a href="{{route('all-properties-page')}}" class="bg-black text-orange-700 font-semibold p-3 rounded-md">Kontrollo Prona</a></div>
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
                        <p class="text-slate-700 underline">Zbulo</p>
                    </a>
                </div>
            </div>
            <div class="mb-10">
                <div class="">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($posts as $post)
                            <div class="mx-2 border-solid border-slate-200 border-2 rounded-lg bg-slate-50">
                                <a href="{{ route('single-post-page', ['id' => $post->id]) }}">
                                    <img class="w-full h-auto md:h-[300px] rounded-t-md" src="{{ asset('storage/hazaar-images/' . $post->photo) }}"
                                        alt="">
                                </a>
                                <div class=" my-5 align-left px-4">
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
