<div class="bg-local bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('images/banner-image.png') }}');">
            <div class="">
                <div class="justify-center py-20">
                    <div
                        class="max-w-screen-2xl px-4 lg:px-16 mx-auto py-20 items-center justify-center bg-stone-700 bg-opacity-50 rounded-md w-fit">
                        <div class="py-10 px-20">
                            <div class="text-white">
                                <div>
                                    <h2 class="text-4xl font-extrabold">Gëzo gjithçka që dëshiron!
                                       <br>
                                        Filloni aventurën tuaj tani!
                                    </h2>
                                </div>
                                <div class="my-5">
                                    <p class="font-semibold " href="#">Zgjidhni më të mirën me Elite Group – Zbuloni shtëpinë tuaj të ëndrrave!</p>
                                </div>
                            </div>
                            <div class="font-semibold">
                                <ul class="flex space-x-5 my-7  ">
                                    <li>
                                        <a class="bg-black text-orange-500 px-5 py-3 rounded-md"
                                            href="{{ route('all-properties-page') }}"> All </a>
                                    </li>
                                    <li>
                                        <a class="text-white " href="{{ route('for-rent-properties-page') }}"> Me Qira </a>
                                    </li>
                                    <li>
                                        <a class="text-white " href="{{ route('for-sale-properties-page') }}"> Në Shitje
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            @php
                                $cities = \App\Models\City::all();
                            @endphp

                            <form action="{{route('properties-filter')}}" method="POST"
                                class="block md:flex bg-white rounded-md md:rounded-full p-2 justify-center items-center w-full md:w-fit space-y-3 md:space-y-0 md:space-x-3">
                                @csrf
                                <div class=" border-solid border-2 border-black rounded-full py-3 px-10">
                                    <select name="city_id" id="city_id">
                                        <option value="" selected>Zgjidh Qytetin </option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach


                                    </select>
                                </div>
                                <input name="maxPrice" type="number" placeholder="Cmimi Maximal"
                                    class="border-solid border-2 border-black rounded-full py-3 px-12">
                                </input>

                                <div class=" font-bold bg-orange-500 rounded-full py-3 px-12">
                                    <button type="submit" class="">Kerko</button>
                                </div>
                            </form>
                            {{-- <div
                                class="block  md:flex my-5 w-full justify-items-center md:space-x-10 space-y-5 md:space-y-0 justify-between">
                                <div class="">
                                    <a class="font-bold bg-orange-500 p-2 rounded-lg" href="#">Kerko duke vizatuar
                                        ne
                                        harte</a>
                                </div>
                                <div>
                                    <a class="font-bold bg-orange-500 p-2 rounded-lg" href="#">Kerko manualisht ne
                                        harte</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
