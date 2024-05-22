@extends('layouts.app')
@section('content')
    <div class="">
        <div class="bg-local bg-cover bg-center bg-no-repeat"
            style="background-image: url('https://hazaar.eu/wp-content/uploads/2023/10/home-page-image.jpg');">
            <div class="">
                <div class="justify-center py-20">
                    <div
                        class="max-w-screen-2xl px-4 lg:px-16 mx-auto py-20 items-center justify-center bg-stone-700 bg-opacity-50 rounded-md w-fit">
                        <div class="py-10 px-20">
                            <div class="text-white">
                                <div>
                                    <h2 class="text-4xl font-extrabold"> Çdo pronë në dorën tënde!
                                        <br>
                                        Lundro tani!
                                    </h2>
                                </div>
                                <div class="my-5">
                                    <p class="font-semibold " href="#">Siguri, Cilësi, Komoditet – Pasuri të
                                        paluajtshme në të gjithë
                                        vendin!</p>
                                </div>
                            </div>
                            <div class="font-semibold">
                                <ul class="flex space-x-5 my-7  ">
                                    <li>
                                        <a class="bg-black text-green-500 px-5 py-3 rounded-md" href="#"> All </a>
                                    </li>
                                    <li>
                                        <a class="text-white " href="#"> Me Qira </a>
                                    </li>
                                    <li>
                                        <a class="text-white " href="#"> Në Shitje </a>
                                    </li>
                                </ul>
                            </div>
                            <div
                                class="block md:flex bg-white rounded-md md:rounded-full p-2 justify-center items-center w-full md:w-fit space-y-3 md:space-y-0 md:space-x-3">
                                <div class=" border-solid border-2 border-black rounded-full py-3 px-10">
                                    <label class=" text-slate-400">Zgjidh qytetin...</label>
                                </div>
                                <div class="border-solid border-2 border-black rounded-full py-3 px-12">
                                    <label class="">Cmimi max</label>
                                </div>
                                <div class=" font-bold bg-green-500 rounded-full py-3 px-12">
                                    <button class="">Kerko</button>
                                </div>
                            </div>
                            <div
                                class="block  md:flex my-5 w-full justify-items-center md:space-x-10 space-y-5 md:space-y-0 justify-between">
                                <div class="">
                                    <a class="font-bold bg-green-500 p-2 rounded-lg" href="#">Kerko duke vizatuar
                                        ne
                                        harte</a>
                                </div>
                                <div>
                                    <a class="font-bold bg-green-500 p-2 rounded-lg" href="#">Kerko manualisht ne
                                        harte</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ############# Per Shitje ############### -->


    <div class="max-w-screen-2xl px-4 mx-auto lg:px-16">
        <div class="flex my-8 justify-between w-full">
            <div>
                <h2 class="font-bold text-2xl">All Properties</h2>
            </div>
            <div>
            </div>
        </div>
        <div class="flex mb-20">
            <div class="flex justify-between">
                <div class="flex flex-wrap ">
                    @foreach ($properties as $property)
                        <div class="">

                            <div class="mx-2 border-solid border-slate-200 border-2 rounded-lg bg-slate-50">
                                <a href="{{ route('single-property', ['id' => $property->id]) }}">


                                    <img class="w-full h-13" src="{{ asset('storage/hazaar-images/' . $property->photo) }}"
                                        alt="">
                                </a>
                                <div class=" my-5 align-left px-10">
                                    <h2 class="font-sans font-semibold text-2xl">
                                        {{ $property->title }}
                                    </h2>
                                    <div>
                                        <p>{{ $property->description }}</p>
                                    </div>
                                </div>
                                <div class="flex align-left py-3 px-7 gap-x-5">
                                    <a href="{{ route('edit-property-page', ['id' => $property->id]) }}"
                                        class=" text-black-500  bg-transparent norder-b-2 border-black px-5 py-3 rounded-md">
                                        Edit
                                    </a>
                                    <form action="{{ route('delete-property', ['id' => $property->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-black text-green-500 px-5 py-3 rounded-md">
                                            Delete
                                        </button>
                                    </form>
                                    @if (Session::has('success'))
                                        {{ Session::get('success') }}
                                    @elseif(Session::has('error'))
                                        {{ Session::get('error') }}
                                    @endif
                                </div>
                                <div>
                                    {{-- @dd($property) --}}
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
                                    </ul>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
