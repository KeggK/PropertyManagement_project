@extends('layouts.app')
@section('content')
    <div class="max-w-screen-2xl px-4 mx-auto lg:px-16">
        <div class="flex my-8 justify-between w-full">
            <div>
                <h2 class="font-bold text-2xl">{{ $post->title }}</h2>
            </div>
            <div>
                <a href="">
                    <p class="text-slate-700 underline">Zbuloji te gjitha</p>
                </a>
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


                        </div>
                    </div>
                </div>
            </div>
        @endsection


        