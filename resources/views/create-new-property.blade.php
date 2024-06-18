@extends('layouts.app')
@section('content')

    <div class="bg-local bg-cover bg-center bg-no-repeat"
        style="background-image: url('https://hazaar.eu/wp-content/uploads/2023/10/home-page-image.jpg');">
        <div
            class="max-w-screen-2xl px-4 lg:px-16 mx-auto py-20 items-center justify-center bg-stone-700 bg-opacity-50 rounded-md w-fit">

            <div class="max-w-screen-2xl px-4 mx-auto lg:px-16">
                <div class="flex flex-col bg-transparent">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif
                    <form action=" {{ route('property-create') }} " method="POST" enctype="multipart/form-data">
                        <div class="">
                            @csrf
                            <div>
                                <input type="text" name="title" placeholder="Title..."
                                    class="text-6xl text-gray-50 my-10 bg-transparent block border-b-2 w-full h-20 outline-none">
                                @error('title')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="my-10 ">
                                <input type="file" name="image" placeholder="Enter your image"
                                    class="rounded-sm text-xl text-gray-700 outline-none block border-b-2 p-2">
                            </div>
                            <div class="my-10">
                                <input type="text" name="description" placeholder="Description..."
                                    class="rounded-sm text-2xl outline-none block border-b-2 pr-20 pl-3 py-20">
                                @error('description')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex gap-x-4">
                                <input type="number" name="no_rooms" placeholder="Number of rooms"
                                    class="rounded-sm text-xl outline-none block border-b-2 p-3">
                                <input type="number" name="no_toilets" placeholder="Number of toilets"
                                    class="rounded-sm text-xl outline-none block border-b-2 p-3">
                            </div>
                            <div class="my-10">
                                <input type="number" name="price" placeholder="Property price"
                                    class="rounded-sm text-xl outline-none block border-b-2 p-3">
                                @error('price')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="my-10">
                                <input type="text" name="dimensions" placeholder="Property dimensions"
                                    class="rounded-sm text-xl outline-none block border-b-2 p-3">
                                @error('dimensions')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="my-10">
                                <label for="tag"
                                    class="rounded-sm text-xl outline-none block border-b-2 p-3 text-gray-50 ">Select your
                                    option</label>
                                <select name="tag" id="tag"
                                    class="rounded-sm text-xl text-gray-700 outline-none block border-b-2 p-2">
                                    <option value="for_sale">Ne Shitje</option>
                                    <option value="for_rent">Me Qira</option>
                                </select>
                                @error('tag')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="bg-black text-green-500 px-5 py-3 rounded-md">Submit</button>
                            </div>
                            @if (Session::has('success'))
                                {{ Session::get('success') }}
                            @elseif(Session::has('error'))
                                {{ Session::get('error') }}
                            @endif
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
