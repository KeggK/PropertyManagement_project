@extends("layouts.app")
@section('content')
    <!-- ############# Informim per Blogun ############### -->

    <div class="max-w-screen-2xl px-4 mx-auto lg:px-16">
        <form action="{{route('blog-create')}}" method="POST">
            @csrf
            <input type="file" name="image" placeholder="blog image name">
            <input type="text" name="title" placeholder="title">
            <input type="text" name="description" placeholder="blog description">
            <button type="submit">Submit</button>
        </form>
        <div class="flex my-8 justify-between w-full">
            <div>
                <h2 class="font-bold text-2xl">Informohu ne Blogun Tone</h2>
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
                    @for ($i = 0; $i < 3; $i++)
                        <div class="md:w-1/2 lg:w-1/3">
                            <div class="mx-2 border-solid border-slate-200 border-2 rounded-lg bg-slate-50">
                                <a class="" href="">
                                    <img class="w-full h-13"
                                        src="https://hazaar.eu/wp-content/uploads/2024/04/vila_3-2-584x438.jpg"
                                        alt="">
                                </a>
                                <div class=" my-5 align-left px-10">
                                    <h2 class="font-sans font-semibold text-2xl">Apartamente per shitje ne
                                        Astir
                                    </h2>
                                </div>
                                <div>
                                    <ul class="flex align-bottom py-3 px-7 gap-x-10">
                                        <div class="flex">
                                            <li class="mx-3">
                                                <img src="https://hazaar.eu/wp-content/uploads/2023/10/bed.png"
                                                    alt="">
                                            </li>
                                            <li>
                                                <p>2</p>
                                            </li>
                                            <li class="mx-3">
                                                <img src="https://hazaar.eu/wp-content/uploads/2023/10/bathroom.png"
                                                    alt="">
                                            </li>
                                            <li>
                                                <p>2</p>
                                            </li>
                                            <li class="mx-3">
                                                <img src="https://hazaar.eu/wp-content/uploads/2023/10/size.png"
                                                    alt="">
                                            </li>
                                            <li>
                                                <p>143</p>
                                            </li>
                                        </div>
                                        <div class="ml-auto pr-3">
                                            <li class="flex">
                                                <h2 class="font-bold text-lg">165,000 €</h2>
                                            </li>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
