@extends('layouts.app')
@section('content')
    <!-- ############# Informim per Blogun ############### -->
    <div class="bg-stone-700 bg-opacity-50">
    <div class="max-w-screen-2xl px-4 mx-auto lg:px-16 ">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            @endif
            <form action="{{ route('update-post', ['id' => $posts->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col">
                <input type="file" name="blog_image" placeholder="blog image name">
                <input type="text" name="title" placeholder="title" value="{{ $posts->title }}">
                @error('title')
                    <span>{{ $message }}</span>
                @enderror
                <input type="text" name="description" placeholder="blog description" value="{{ $posts->description }}">
                @error('description')
                    <span>{{ $message }}</span>
                @enderror

                <label for="category_id" value="{{ $posts->category_id }}">Category</label>
                <select name="category" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }} ">{{ $category->category_name }}</option>
                    @endforeach
                    @error('category')
                        <span>{{ $message }}</span>
                    @enderror
                </select>
                <label for="user_id" value="{{ $posts->user_id }}">Creator</label>
                <select name="user_id" id="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }} ">{{ $user->name }}</option>
                    @endforeach
                    @error('user_id')
                        <span>{{ $message }}</span>
                    @enderror
                </select>
            </div>
                <button type="submit">Submit</button>
                @if (Session::has('success'))
                    {{ Session::get('success') }}
                @elseif(Session::has('error'))
                    {{ Session::get('error') }}
                @endif

            </form>
        </div>
    </div>
@endsection
