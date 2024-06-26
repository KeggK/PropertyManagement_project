@extends('layouts.app')
@section('content')
    <div class="max-w-screen-2xl px-4 mx-auto lg:px-16">
        <div class="flex my-8 justify-between w-full">
            <div>
                <h2 class="font-bold text-2xl">{{ $post->title }}</h2>
            </div>
        </div>
        <div class="flex mb-20">
            <div class="flex justify-between">
                <div class="flex flex-wrap ">

                    <div class="w-full">

                        <div class="mx-2 border-solid border-slate-200 border-2 rounded-lg bg-slate-50">

                            <img class="w-full h-13" src="{{ asset('storage/hazaar-images/' . $post->photo) }}"
                                alt="">

                            <div class="">
                                <div class="">
                                    <div class="flex align-left py-3 px-7 gap-x-10">
                                        <div class="flex gap-x-10">
                                            <div>
                                                <p class="font-bold">Post</p>
                                            </div>
                                            <div class="flex gap-x-3 mx-3 text-sm">
                                                <div class="flex gap-x-3 mx-3 text-sm">
                                                    <div>
                                                        <p>Category: {{ $post->category->category_name }}</p>
                                                    </div>
                                                    <div>
                                                        <p>Creator: {{ $post->user->name }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex gap-x-10">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex align-left py-3 px-7 flex-col gap-y-3">
                                    <h2 class="font-sans font-semibold text-2xl">
                                        Pershkrim
                                    </h2>
                                    <p class="gap-y-3">
                                        {{ $post->description }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex align-left my-5 py-3 px-7 gap-x-5">
                                @php
                                    $is_liked = \App\Models\Like::where('user_id', auth()->user()->id)
                                        ->where('post_id', $post->id)
                                        ->exists();

                                @endphp
                                <form action="{{ route('likes-post', ['id' => $post->id]) }}" method="POST">
                                    @csrf

                                    <button type="submit">
                                        @if ($is_liked)
                                            <x-icons.like class="text-blue-500 fill-blue-500 w-5 h-6" />
                                        @else
                                            <x-icons.like class="fill-none w-5 h-6" />
                                        @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
            <div class="max-w-2xl mx-auto px-4">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Comments
                        ({{ $post->comment->count() }})|Likes({{ $post->like->count() }})</h2>
                </div>


                <div class="container mx-auto p-4 mb-4" x-data="{ tab: 'tab1' }">
                    <h2 class="text-2xl font-bold">Tabs</h2>
                    <ul class="flex border-b mt-6">
                        <li class="-mb-px mr-1">
                            <a class="inline-block rounded-t py-2 px-4 font-semibold hover:text-blue-800" href="#"
                                :class="{ 'bg-white text-blue-700 border-l border-t border-r': tab == 'tab1' }"
                                @click.prevent="tab = 'tab1'">Comments</a>
                        </li>
                        <li class="-mb-px mr-1">
                            <a class="inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" href="#"
                                :class="{ 'bg-white text-blue-700 border-l border-t border-r': tab == 'tab2' }"
                                @click.prevent="tab = 'tab2'">Likes</a>
                        </li>
                        <li class="-mb-px mr-1">
                            <a class="inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" href="#"
                                :class="{ 'bg-white text-blue-700 border-l border-t border-r': tab == 'tab3' }"
                                @click.prevent="tab = 'tab3'">Dislike</a>
                        </li>
                    </ul>
                    <div class="content bg-white px-4 py-4 border-l border-r border-b pt-4">
                        <div x-show="tab == 'tab1'">
                            <form action="{{ route('comment-post', ['id' => $post->id]) }}" method="POST" class="mb-6">
                                @csrf
                                <div
                                    class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                    <label for="comment" class="sr-only">Your comment</label>
                                    <textarea name="comment" id="comment" rows="6"
                                        class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                        placeholder="Write a comment..."></textarea>
                                </div>
                                <button type="submit"
                                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-green-500 bg-black rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                    Post comment
                                </button>
                            </form>
                            <div class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                                <div class="flex flex-col justify-between gap-y-5 mb-2">
                                    @foreach ($post->comment as $comment)
                                        <div class="flex items-center">
                                            <p class="inline-flex mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                                <img class="mr-2 w-6 h-6 rounded-full"
                                                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                                    alt="Michael Gough">{{ $comment->user->name }}
                                            </p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate
                                                    datetime="2022-02-08"
                                                    title="February 8th, 2022">{{ $comment->created_at }}</time></p>
                                        </div>

                                        <div class="p-2 border border-gray-200 rounded-lg">{{ $comment->comment }}</div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div x-show="tab == 'tab2'">
                            <div>
                                @foreach ($post->like as $like)
                                    <div class="flex items-center">
                                        <p class="inline-flex mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                            <img class="mr-2 w-6 h-6 rounded-full"
                                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                                alt="Michael Gough">{{ $like->user->name }}
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400"><time datetime="2022-02-08"
                                                title="February 8th, 2022">{{ $like->created_at }}</time></p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div x-show="tab == 'tab3'">
                            Tab3 content. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt sunt,
                            consectetur eos quod perferendis mollitia consequuntur natus, porro molestiae qui iusto
                            deserunt rerum tempore voluptatum itaque. Ad, nisi esse cum quidem consequuntur ullam
                            obcaecati.
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
