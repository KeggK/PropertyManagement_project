@extends('layouts.app')
@section('content')
    @if (Session::has('success'))
        <x-alert :success="true">
            <strong> {{ Session::get('success') }}</strong>
        </x-alert>
    @elseif(Session::has('error'))
        <x-alert :success="false">
            <strong> {{ Session::get('error') }}</strong>
        </x-alert>
    @endif
    <div class="max-w-screen-2xl px-4 mx-auto lg:px-16">
        <div class="flex my-8 justify-between w-full">
            <div>
                <h2 class="font-bold text-2xl">{{ $property->title ?? '' }}</h2>
            </div>
            <div>
                <a href="{{ route('all-properties-page') }}">
                    <p class="text-slate-700 underline">Te gjitha pronat</p>
                </a>
            </div>
        </div>

        @if (Session::has('success'))
            <x-alert :success="true">
                <strong> {{ Session::get('success') }}</strong>
            </x-alert>
        @elseif(Session::has('error'))
            <x-alert :success="false">
                <strong> {{ Session::get('error') }}</strong>
            </x-alert>
        @endif
        <div class="flex flex-col lg:flex-row mb-20">
            <div class="flex justify-between w-full">
                <div class="flex flex-wrap w-full h-full">
                    <div class="w-full">
                        <div class=" p-4 mx-2 border-solid border-slate-200 border-2 rounded-lg bg-slate-50">
                            <img class="w-full h-[300px] md:h-[400px] lg:h-[500px] rounded-xl" src="{{ asset('storage/hazaar-images/' . $property->photo) }}"
                                alt="">
                            <div class="my-5">
                                <h2 class="font-sans font-semibold text-2xl">
                                    {{$property->title}}
                                </h2>
                            </div>
                            <div class="">
                                <div class="flex flex-col sm:flex-row py-3 text-slate-600 gap-x-10">
                                    <p><span class="font-bold">Dhoma gjumi:</span>{{ $property->no_rooms }}</p>
                                    <p><span class="font-bold">Banjat:</span>{{ $property->no_toilets }}</p>
                                    <p><span class="font-bold">m²:</span>{{ $property->dimensions }}</p>
                                    <p><span class="font-bold">Viti i ndertimit:2021</span></p>
                                </div>
                            </div>
                            <div class="flex align-left py-3 flex-col gap-y-3">
                                <h2 class="font-sans font-semibold text-2xl">
                                    Pershkrim
                                </h2>
                                <p class="gap-y-3">
                                    {{ $property->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="px-3 mx-3 mt-5 py-5 w-full rounded-md bg-white font-[sans-serif]">
                        <h1 class="text-3xl text-[#333] font-extrabold text-center">Book a meeting</h1>
                        <form action="{{ route('reservation-contact', ['id' => $property->id]) }}" method="POST"
                            class="mt-8 space-y-4">
                            @csrf
                            <div class="w-full flex flex-col lg:flex-row gap-y-3 gap-x-3">
                                <div class="flex flex-col w-full">
                                    <label for="countries"
                                        class="block  text-sm font-medium text-gray-900 dark:text-white">Tour
                                        Options</label>
                                    <select id="countries" name="tour_type"
                                        class=" bg-gray-100 mt-1 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-3.5">
                                        <option selected>Choose an option</option>
                                        <option value="meeting">Meeting</option>
                                        <option value="video_call">Video call</option>
                                    </select>
                                </div>
                                @if ($errors->has('tour_type'))
                                    <span class="text-red-500">{{ $errors->first('tour_type') }}</span>
                                @endif
                                <div class="w-full">
                                    <label for=""> Meeting Date
                                        <input name="date" type='date' placeholder='Date'
                                            class="w-full rounded-md py-3 px-4 bg-gray-100 text-sm outline-blue-500" />
                                    </label>
                                </div>
                                @if ($errors->has('date'))
                                    <span class="text-red-500">{{ $errors->first('date') }}</span>
                                @endif
                                <div class="flex flex-col w-full">
                                    <label for="countries"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time</label>
                                    <input name="time" type="time" placeholder="Time"
                                        class="w-full rounded-md py-3 px-4 bg-gray-100 text-sm outline-blue-500" />
                                    </input>
                                </div>
                                @if ($errors->has('time'))
                                    <span class="text-red-500">{{ $errors->first('time') }}</span>
                                @endif
                            </div>
                            <div class="flex flex-col lg:flex-row gap-y-3 justify-between gap-x-3">
                                <div class="w-full">
                                    <label for="">Name
                                        <input name="fullname" type='text' placeholder='Name'
                                            class="w-full rounded-md py-3 px-4 bg-gray-100 text-sm outline-blue-500" />
                                    </label>
                                </div>
                                @if ($errors->has('fullname'))
                                    <span class="text-red-500">{{ $errors->first('fullname') }}</span>
                                @endif
                                <div class="w-full">
                                    <label for="">Phone</label>
                                    <input name="phone" type='number' placeholder='Phone'
                                        class="w-full rounded-md py-3 px-4 bg-gray-100 text-sm outline-blue-500" />
                                </div>
                                @if ($errors->has('phone'))
                                    <span class="text-red-500">{{ $errors->first('phone') }}</span>
                                @endif
                                <div class="w-full">
                                    <label for="">Email
                                        <input name="email" type='email' placeholder='Email'
                                            class="w-full rounded-md py-3 px-4 bg-gray-100 text-sm outline-blue-500" />
                                    </label>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="text-red-500">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <textarea name="message" placeholder='Message' rows="6"
                                class="w-full rounded-md px-4 bg-gray-100 text-sm pt-3 outline-blue-500"></textarea>
                            <button type='submit' class="bg-black text-orange-500 cursor-pointer px-5 py-3 rounded-md">Make
                                Reservation</button>
                        </form>
                    </div>
                </div>
            </div>
            <section class="bg-gray-50 mt-4 lg:mt-0 mx-3 rounded-md lg:mx-0 lg:w-1/3 h-full">
                <div class="flex flex-col px-4 mt-8 py-2 ">
                    <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                        <img class="w-20 h-20 mr-2" src="../images/main-logo.png" alt="logo">
                        <h1
                            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-3xl dark:text-white">
                            Elite Group
                        </h1>
                    </a>
                    <form action="{{ route('property-contact', ['id' => $property->id]) }}" method="POST"
                        class="mt-6">
                        @csrf
                        <div class="flex flex-col gap-y-10">
                            <div>
                                <input name="name" type="text" value="{{ auth()->user()->name }}"
                                    placeholder="Emri / Mbiemri*" class="p-3 w-full" required>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div>
                                <input name="email" type="text" value="{{ auth()->user()->email }}"
                                    placeholder="Email*" class="p-3 w-full" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div>
                                <input name="phone" type="text" placeholder="Numri i Telefonit*"
                                    class="p-3 w-full">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div>
                                <label for="message"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your
                                    message</label>
                                <textarea id="message" rows="6"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Leave a comment..."></textarea>
                            </div>
                            <div>
                                <select name="role" id="role" class="p-3 w-full">
                                    <option value="seller">Shites</option>
                                    <option value="buyer">Bleres</option>
                                </select>
                            </div>
                            <div>
                                <input type="submit" class="bg-black text-orange-500 cursor-pointer px-5 py-3 rounded-md"
                                    value="Dergo Email">
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
