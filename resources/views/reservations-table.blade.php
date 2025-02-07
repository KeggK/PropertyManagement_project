@extends('layouts.app')
@section('content')
@include('partials.sidemenu')

    <body class = "body bg-white dark:bg-[#0F172A]">
        <!-- CONTENT -->
        <div class = "content ml-12 transform ease-in-out duration-500 pt-4 px-2 md:px-5 pb-4 ">
            <nav class = "flex justify-center px-5 py-3 text-gray-700  rounded-lg bg-gray-50 dark:bg-[#1E293B] "
                aria-label="Breadcrumb">
                <ol class = "inline-flex items-center space-x-1 md:space-x-3">
                    <li class = "inline-flex items-center">
                        <a href="{{ route('users-dashboard') }}"
                            class = "inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            <svg class = "w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class = "flex items-center">
                            <svg class = "w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fillRule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clipRule="evenodd"></path>
                            </svg>
                            <a href=""
                                class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Users</a>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class = "flex flex-wrap my-5 -mx-2">
                <div class = "w-full p-2">


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nr
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tour Type
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Time
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Phone
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Message
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Property
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            {{ $loop->index+1 }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$reservation->fullname}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$reservation->tour_type}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$reservation->date}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$reservation->time}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$reservation->phone}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$reservation->email}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$reservation->message}}
                                        </td>

                                        @php
                                            $property = \App\Models\Property::findOrFail($reservation->property_id);
                                        @endphp
                                        <td class="px-6 py-4">
                                           <a class="underline text-blue-500" href="{{route('single-property', ['id'=>$property->id])}}">
                                            {{$property->title}}
                                        </a> 

                                        </td>
                                        
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        @endsection
