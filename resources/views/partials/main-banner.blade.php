<div class="bg-local bg-cover bg-center bg-no-repeat"
    style="background-image: url('{{ asset('images/banner-image.png') }}');">
    <div class="">
        <div class="justify-center py-20">
            <div
                class="max-w-screen-2xl px-4 lg:px-16 mx-auto py-20 items-center justify-center bg-stone-700 bg-opacity-50 rounded-md w-fit">
                <div class="p-4 md:py-10 lg:px-20">
                    <div class="text-white">
                        <div>
                            <h2 class="text-4xl font-extrabold">Gëzo gjithçka që dëshiron!
                                <br>
                                Filloni aventurën tuaj tani!
                            </h2>
                        </div>
                        <div class="my-5">
                            <p class="font-semibold " href="#">Zgjidhni më të mirën me Elite Group – Zbuloni
                                shtëpinë tuaj të ëndrrave!</p>
                        </div>
                    </div>
                    <div class="font-semibold">
                        <ul class="flex space-x-5 my-7  ">
                            <li>
                                <a class=" @if (request()->routeIs('all-properties-page')) bg-black text-orange-500 px-5 py-3 rounded-md @else text-white @endif"
                                    href="{{ route('all-properties-page') }}"> All </a>
                            </li>
                            <li>
                                <a class="@if (request()->routeIs('for-rent-properties-page')) bg-black text-orange-500 px-5 py-3 rounded-md @else text-white @endif"
                                    href="{{ route('for-rent-properties-page') }}"> Me Qira </a>
                            </li>
                            <li>
                                <a class="@if (request()->routeIs('for-sale-properties-page')) bg-black text-orange-500 px-5 py-3 rounded-md @else text-white @endif"
                                    href="{{ route('for-sale-properties-page') }}"> Në Shitje
                                </a>
                            </li>
                        </ul>
                    </div>
                    @php
                        $cities = \App\Models\City::all();
                    @endphp

                    <form action="{{ route('properties-filter') }}" method="POST"
                        class="flex flex-col md:flex-row bg-white rounded-md p-2 justify-center items-center w-full gap-x-3 gap-y-3">
                        @csrf
                        <select name="city_id" id="city_id"
                            class="w-full border-solid border-2 border-black rounded-md py-3 px-5">
                            <option value="" selected>Zgjidh Qytetin </option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        <input name="maxPrice" type="number" placeholder="Cmimi Maximal"
                            class="border-solid border-2 border-black rounded-md my-3 md:my-0 py-3 px-5 w-full">
                        </input>
                            <button type="submit" class=" font-bold bg-orange-500 rounded-md py-3 px-12 text-center w-full md:w-auto">Kerko</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
