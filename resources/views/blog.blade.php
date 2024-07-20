@extends('layouts.app')
@section('content')
    <!-- ############# Informim per Blogun ############### -->

    <div class="max-w-screen-2xl px-4 mx-auto lg:px-16">
        <div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            @endif
            @if (Session::has('success'))
                {{ Session::get('success') }}
            @elseif(Session::has('error'))
                {{ Session::get('error') }}
            @endif
            <form action="{{ route('blog-create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class= "flex flex-col gap-y-5">

                    <input type="text" name="title" placeholder="Title" class="w-full rounded-md py-3 px-4 bg-gray-100 text-sm outline-orange-500">
                    @error('title')
                        <span>{{ $message }}</span>
                    @enderror
                   
                    <input type="file" name="image" placeholder="blog image name" class="w-full rounded-md py-3 px-4 bg-gray-100 text-sm outline-orange-500">

                    <input type="text" name="description" placeholder="Blog description" class="w-full rounded-md py-20 px-4 bg-gray-100 text-sm outline-orange-500">
                    @error('description')
                        <span>{{ $message }}</span>
                    @enderror

                    <label for="category_id"></label>
                    <select name="category" id="category_id" class="w-full rounded-md py-3 px-4 bg-gray-100 text-sm outline-orange-500">
                        <option value="">Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }} ">{{ $category->category_name }}</option>
                        @endforeach
                        @error('category')
                            <span>{{ $message }}</span>
                        @enderror
                    </select>
                    <button class=" text-black bg-orange-500 hover:bg-orange-600 font-semibold rounded-md text-sm px-4 py-3" type="submit">Submit</button>
                </div>
            </form>
        </div>
        <div class="">
            <div class="flex flex-col my-8 justify-between w-full">
                <div>
                    <h2 class="font-bold text-2xl">Posts</h2>
                </div>
                <div>

                    <form action="{{ route('filter-blog') }}" method="POST">
                        @csrf

                        <div class="flex gap-x-5 mt-5">
                            <div>
                                <select name="filter_category" id="filter_category">
                                    <option value="">Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <select name="filter_user" id="filter_user">
                                    <option value="">Author</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="text-black bg-orange-500 hover:bg-orange-600 font-semibold rounded-md my-2 text-sm px-4 py-2">Filter</button>

                    </form>

                    {{-- <button type="submit">Filter</button> --}}
                </div>
                <div class="mb-10 lg:mb-20">
                    <div class="">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($posts as $post)
                                <div class="">
                                    <div class="mx-2 border-solid border-slate-200 border-2 rounded-lg bg-slate-50">
                                        <a href="{{ route('single-post-page', ['id' => $post->id]) }}">
                                            <img class="w-full h-auto md:h-[300px] rounded-t-md"
                                                src="{{ asset('storage/hazaar-images/' . $post->photo) }}" alt="">
                                        </a>
                                        <div class=" my-5 align-left px-4">
                                            <h2 class="font-sans font-semibold text-2xl">
                                                {{ $post->title }}
                                            </h2>
                                            <div>
                                                <p class="line-clamp-1">{{ $post->description }}</p>
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
                            <div class="flex flex-col">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
