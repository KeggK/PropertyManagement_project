@extends('layouts.app')
@section('content')

    <body class = "body bg-white dark:bg-[#0F172A]">
        @include('partials.sidemenu')
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
                            <a href="{{ route('properties-list') }}"
                                class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Properties</a>
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
                                        Photo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Property Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Number of Rooms
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Author
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total Contacts
                                    </th>
                                    <th class="px-6 py-3">Edit</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($properties as $property)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <img src="{{ $property->photo }}" alt="">
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $property->title }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $property->price }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $property->no_rooms }}
                                        </td>
                                        @php
                                            $user = \App\Models\User::findOrFail($property->user_id);
                                        @endphp
                                        <td class="px-6 py-4">
                                            {{ $user->name ?? '?' }}
                                        </td>
                                        @php
                                        $total = 0;
                                            $formData = \App\Models\FormContact::where('property_id', $property->id)->get()->count();
                                        @endphp
                                        <td class="px-6 py-4">
                                            {{ $formData }}
                                            <a class="underline text-blue-500 pl-2 cursor-pointer" href="{{ route('display-property-contacts', ['id' => $property->id]) }}">View</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-row gap-x-3 divide-x divide-orange-500">
                                            <a href="{{ route('edit-property-page', ['id' => $property->id]) }}">Edit</a>
                                            <form action="{{ route('delete-property', ['id' => $property->id]) }}"
                                                method="POST" class="pl-3">
                                                @csrf
                                                <button type="submit" >
                                                    Delete
                                                </button>
                                            </form>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                            <tr>{{ $properties->links() }}</tr>
                        </table>
                    </div>

                </div>

            </div>
        @endsection
