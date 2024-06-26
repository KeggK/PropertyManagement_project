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
                <input type="file" name="image" placeholder="blog image name">

                <input type="text" name="title" placeholder="title">
                @error('title')
                    <span>{{ $message }}</span>
                @enderror
                <input type="text" name="description" placeholder="blog description">
                @error('description')
                    <span>{{ $message }}</span>
                @enderror

                <label for="category_id">Category</label>
                <select name="category" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }} ">{{ $category->category_name }}</option>
                    @endforeach
                    @error('category')
                        <span>{{ $message }}</span>
                    @enderror
                </select>
                <label for="user_id">Creator</label>
                <select name="user_id" id="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }} ">{{ $user->name }}</option>
                    @endforeach
                    @error('user_id')
                        <span>{{ $message }}</span>
                    @enderror
                </select>
                <button type="submit">Submit</button>

            </form>
        </div>
        <div class="max-w-screen-2xl px-4 mx-auto lg:px-16">
            <div class="flex flex-col my-8 justify-between w-full">
                <div>
                    <h2 class="font-bold text-2xl">Posts</h2>
                </div>
                <div>

                    <form action="{{ route('filter-blog') }}" method="POST">
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
                                            <img class="max-w-md h-13"
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
                                        @if (auth()->user()->id == $post->user_id)
                                            <div>
                                                <div class="flex align-left py-3 px-7 gap-x-5">
                                                    <a href="{{ route('edit-post-page', ['id' => $post->id]) }}"
                                                        class=" text-black-500  bg-transparent border-b-2 border-black px-5 py-3 rounded-md">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('delete-post', ['id' => $post->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="bg-black text-green-500 px-5 py-3 rounded-md">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
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
