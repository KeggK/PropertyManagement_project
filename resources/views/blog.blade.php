@extends('layouts.app')
@section('content')
    <!-- ############# Informim per Blogun ############### -->

    <div class="max-w-screen-2xl px-4 mx-auto lg:px-16">
        <form action="{{ route('blog-create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" placeholder="blog image name">
            <input type="text" name="title" placeholder="title">
            <input type="text" name="description" placeholder="blog description">

            <label for="category_id">Category</label>
            <select name="category" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }} ">{{ $category->category_name }}</option>
                @endforeach
            </select>
            <label for="user_id">Creator</label>
            <select name="user_id" id="user_id">
                @foreach ($users as $user)
                    <option value="{{ $user->id }} ">{{ $user->name }}</option>
                @endforeach
            </select>
            <button type="submit">Submit</button>

        </form>
        <div class="max-w-screen-2xl px-4 mx-auto lg:px-16">
            <div class="flex my-8 justify-between w-full">
                <div>
                    <h2 class="font-bold text-2xl">Posts</h2>
                </div>
                <div>
                    {{-- <div>
                    <label for="category_id">Category</label>
                    <select name="category" id="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }} " {{request('category')==$category->id ? 'selected': ''}}>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div> --}}
                    {{-- <div>
                    <label for="timestamps">Time</label>
                    <select name="timestamps" id="timestamps">
                        @foreach ($users as $user)
                            <option value="{{ $post->id }} ">{{ $post->timestamps }}</option>
                        @endforeach
                    </select>
                </div> --}}
                    <form action="{{route('filter-blog')}}" method="POST">
                        @csrf

                        <div>
                            <div>
                                <select name="filter_category" id="filter_category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <select name="filter_user" id="filter_user">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit">Filter</button>

                    </form>

                    {{-- <button type="submit">Filter</button> --}}
                </div>
                <div class="flex mb-20">
                    <div class="flex justify-between">
                        <div class="flex flex-wrap ">
                            @foreach ($posts as $post)
                                <div class="">

                                    <div class="mx-2 border-solid border-slate-200 border-2 rounded-lg bg-slate-50">
                                        <a href="{{ route('single-post-page', ['id' => $post->id]) }}">
                                            <img class="w-full h-13"
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
                                        <div>
                                            {{-- @dd($property)
                                        <ul class="flex align-left py-3 px-7 gap-x-10">
                                            <div class="flex">
                                                <li class="mx-3">
                                                    <img src="https://hazaar.eu/wp-content/uploads/2023/10/bed.png"
                                                        alt="">
                                                </li>
                                                <li>
                                                    <p>{{ $sale_properties->no_rooms ?? null }}</p>
                                                </li>
                                                <li class="mx-3">
                                                    <img src="https://hazaar.eu/wp-content/uploads/2023/10/bathroom.png"
                                                        alt="">
                                                </li>
                                                <li>
                                                    <p>{{ $sale_properties->no_toilets ?? null }}</p>
                                                </li>
                                                <li class="mx-3">
                                                    <img src="https://hazaar.eu/wp-content/uploads/2023/10/size.png"
                                                        alt="">
                                                </li>
                                                <li>
                                                    <p>{{ $sale_properties->dimensions ?? '' }}</p>
                                                </li>
                                            </div>
                                            <div class="ml-auto pr-3">
                                                <li class="flex">
                                                    <h2 class="font-bold text-lg">165,000 €</h2>
                                                </li>
                                            </div>
                                        </ul> --}}
                                        </div>
                                    </div>

                                </div>
                                {{-- <div class="mr-auto">
                                <a href="{{ route('single-post-page', ['id' => $post->id]) }}"
                                    class="text-gray-700 underline hover:text-black">
                                    Edit
                                </a>
                            </div> --}}
                            @endforeach
                            <div class="flex flex-col">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
