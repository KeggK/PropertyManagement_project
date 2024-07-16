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
                <button type="submit">Submit</button>

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
