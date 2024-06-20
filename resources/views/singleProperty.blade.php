@extends('layouts.app')
@section('content')
    <div class="max-w-screen-2xl px-4 mx-auto lg:px-16">
        <div class="flex my-8 justify-between w-full">
            <div>
                <h2 class="font-bold text-2xl">{{ $property->title ?? ''}}</h2>
            </div>
            <div>
                <a href="{{ route('all-properties-page') }}">
                    <p class="text-slate-700 underline">Zbuloji te gjitha</p>
                </a>
            </div>
        </div>
        <div class="flex mb-20">
            <div class="flex justify-between w-full">
                <div class="flex flex-wrap w-full h-full">

                    <div class="w-full">

                        <div class="mx-2 border-solid border-slate-200 border-2 rounded-lg bg-slate-50">

                            <img class="w-full h-13" src="{{ asset('storage/hazaar-images/' . $property->photo) }}"
                                alt="">

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
            <section class="bg-gray-50 w-1/3 h-full">

                <div class="flex flex-col items-center mt-8 px-3 py-2  md:h-screen">
                    <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                        <img class="w-20 h-20 mr-2" src="../images/header2.png" alt="logo">
                        <h1
                            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-3xl dark:text-white">
                            Hazaar
                        </h1>
                    </a>
                    <form action="{{ route('property-contact',['id'=>$property->id]) }}" method="POST" class="mt-20">
                        @csrf
                        <div class="flex flex-col gap-y-10">
                            <div>
                                {{-- <label for="">Username</label> --}}
                                <input name="name" type="text" value="{{auth()->user()->name}}" placeholder="Emri / Mbiemri*" class="p-3" required>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div>
                                {{-- <label for="">Email</label> --}}
                                <input name="email" type="text" value="{{auth()->user()->email}}" placeholder="Email*" class="p-3" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div>
                                {{-- <label for="">Phone number</label> --}}
                                <input name="phone" type="text" placeholder="Numri i Telefonit*" class="p-3">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                                
                            </div>
                            <div >
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
                                <textarea id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Leave a comment..."></textarea>
                            </div>
                            <div>
                                {{-- <label for="">Identify</label> --}}
                                {{-- <input type="text" placeholder="Identifikohu" class="p-3"> --}}
                                <select name="role" id="role" class="p-3">
                                    <option value="seller">Shites</option>
                                    <option value="buyer">Bleres</option>
                                </select>
                            </div>
                            <div>
                                {{-- <form action="{{route(contact-form-submission)}}" method="POST"> --}}
                               
                                <input type="submit" class="bg-black text-green-500 cursor-pointer px-5 py-3 rounded-md" value="Dergo Email">
                                {{-- </form> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </section>

        </div>

    </div>
@endsection
