@extends('layouts.app')
@section('content')
    <div class="max-w-screen-2xl px-4 mx-auto lg:px-16">
        <div class="flex my-8 justify-between w-full">
            <div>
                <h2 class="font-bold text-2xl">{{ $property->title }}</h2>
            </div>
            <div>
                <a href="{{route('all-properties-page')}}">
                    <p class="text-slate-700 underline">Zbuloji te gjitha</p>
                </a>
            </div>
        </div>
        <div class="flex mb-20">
            <div class="flex justify-between">
                <div class="flex flex-wrap ">

                    <div class="w-full">

                        <div class="mx-2 border-solid border-slate-200 border-2 rounded-lg bg-slate-50">

                            <img class="w-full h-13" src="{{ asset('storage/hazaar-images/' . $property->photo)}}"  alt="">

                            <div class="my-5 align-left px-10">
                                <h2 class="font-sans font-semibold text-2xl">
                                    Permbledhje
                                </h2>
                            </div>
                            <div class="">
                                <div class="">
                                    <div class="flex align-left py-3 px-7 gap-x-10">
                                        <div class="flex gap-x-10">
                                            <div>
                                                <p class="font-bold">Apartament</p>
                                            </div>
                                            <div class="flex gap-x-3 mx-3 text-sm">
                                                <div class="">
                                                    <img src="https://hazaar.eu/wp-content/uploads/2023/10/bed.png"
                                                        alt="">
                                                </div>
                                                <div>
                                                    <p>{{ $property->no_rooms }}</p>
                                                </div>
                                            </div>
                                            <div class="flex gap-x-3 mx-3 text-sm">
                                                <div class="">
                                                    <img src="https://hazaar.eu/wp-content/uploads/2023/10/bathroom.png"
                                                        alt="">
                                                </div>
                                                <div>
                                                    <p>{{ $property->no_toilets }}</p>
                                                </div>
                                            </div>
                                            <div class="flex gap-x-3 mx-3 text-sm">
                                                <div class="">
                                                    <img src="https://hazaar.eu/wp-content/uploads/2023/10/size.png"
                                                        alt="">
                                                </div>
                                                <div>
                                                    <p>{{ $property->dimensions }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex gap-x-10">
                                            <div class="flex">
                                                <h2 class="font-bold text-lg">2018</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex align-left py-3 px-7 text-slate-600 gap-x-10">
                                    <p>Lloji i prones</p>
                                    <p>Dhoma gjumi</p>
                                    <p>Banjat</p>
                                    <p>m²</p>
                                    <p>Viti i ndertimit</p>
                                </div>
                            </div>
                            <div class="flex align-left py-3 px-7 flex-col gap-y-3">
                                <h2 class="font-sans font-semibold text-2xl">
                                    Pershkrim
                                </h2>
                                <p class="gap-y-3">
                                    {{ $property->description }}
                                </p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    @endsection
