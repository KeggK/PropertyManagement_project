@extends('layouts.app')
@section('content')
<!-- hero seciton -->
<div class="relative w-full h-[320px]" id="home">
    <div class="absolute inset-0 opacity-70">
        <img src="{{ asset('images/banner-image.png') }}" alt="Background Image" class="object-cover object-center w-full h-full" />

    </div>
    <div class="absolute inset-9 flex flex-col md:flex-row items-center justify-between">
        <div class="md:w-1/2 mb-4 md:mb-0 ">
            <h1 class="text-4xl text-orange-500 font-extrabold">Elite Group</h1>
            <p class="font-regular text-xl mb-8 mt-4 text-orange">Zbuloni shtëpinë tuaj të ëndrrave me ne</p>
            <a href="#contactUs"
                class="px-6 py-3 bg-black text-orange-500 font-medium rounded-full transition duration-200">Na kontaktoni</a>
        </div>
    </div>
</div>


<!-- about us -->
<section class="bg-gray-100" id="aboutus">
    <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
            <div class="max-w-lg">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Rreth nesh</h2>
                <p class="mt-4 text-gray-600 text-lg">
                    Shfletoni faqen tonë të internetit për të parë listat tona aktuale, duke përfshirë përshkrime të hollësishme, fotografi të mahnitshme dhe ture virtuale që japin jetë secilës pronë. Ekipi ynë i përvojësuar i profesionistëve të pasurive të patundshme është i angazhuar për të ofruar shërbim personalizuar, sigurimin një përvojë të pafund në momentin që filloni kërkimin deri në ditën kur hyni në shtëpi.

Në Grupin Elite të Pasurive të Patundshme, ne besojmë në krijimin e më shumë se vetëm shtëpive - ne kuratojmë përvoja që e ngrisin jetën tuaj të përditshme. Qoftë se jeni duke blerë, duke shitur, ose thjesht duke eksploruar, le të udhëheqim ju në rrugëtimin tuaj për të gjetur pronën perfekte.</p>
            </div>
            <div class="mt-12 md:mt-0">
                <img src="https://images.unsplash.com/photo-1531973576160-7125cd663d86" alt="About Us Image" class="object-cover rounded-lg shadow-md">
            </div>
        </div>
    </div>
</section>

<!-- why us  -->
<section class="text-gray-700 body-font mt-10">
    <div class="flex justify-center text-3xl font-bold text-gray-800 text-center">
        Pse ne?
    </div>
    <div class="container px-5 py-12 mx-auto">
        <div class="flex flex-wrap text-center justify-center">
            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="https://image3.jdomni.in/banner/13062021/58/97/7C/E53960D1295621EFCB5B13F335_1623567851299.png?output-format=webp" class="w-32 mb-3">
                    </div>
                    <h2 class="title-font font-regular text-2xl text-gray-900">Shërbim Personalizuar</h2>
                </div>
            </div>

            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="https://image2.jdomni.in/banner/13062021/3E/57/E8/1D6E23DD7E12571705CAC761E7_1623567977295.png?output-format=webp" class="w-32 mb-3">
                    </div>
                    <h2 class="title-font font-regular text-2xl text-gray-900">Eksperiencë Unike</h2>
                </div>
            </div>

            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="https://image3.jdomni.in/banner/13062021/16/7E/7E/5A9920439E52EF309F27B43EEB_1623568010437.png?output-format=webp" class="w-32 mb-3">
                    </div>
                    <h2 class="title-font font-regular text-2xl text-gray-900">Dizajn i Përsosur
                    </h2>
                </div>
            </div>

            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="https://image3.jdomni.in/banner/13062021/EB/99/EE/8B46027500E987A5142ECC1CE1_1623567959360.png?output-format=webp" class="w-32 mb-3">
                    </div>
                    <h2 class="title-font font-regular text-2xl text-gray-900">Luks dhe Vendndodhje
                    </h2>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Visit us section -->
<section class="bg-gray-100">
    <div class="max-w-screen-2xl mx-auto py-8 px-4 sm:px-6 lg:py-20">
        <div class="max-w-2xl lg:max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-extrabold text-gray-900" id="contactUs">Vizitoni lokacionin tone</h2>
            <p class="mt-3 text-lg text-gray-500">Na lejoni tju japim me te miren/p>
        </div>
        <div class="mt-8 lg:mt-20">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <div id="googleMap" class="rounded-lg overflow-hidden order-none sm:order-first">

                        <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11981.839352931134!2d19.803607412835085!3d41.34235783897204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13503173e66c0dcf%3A0x65b9cafdcd236ca7!2sStacioni%20i%20Trenit%2C%20Tirana%2C%20Albania!5e0!3m2!1sen!2s!4v1718703802171!5m2!1sen!2s"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <div class="px-3 mx-auto w-full bg-white font-[sans-serif]">
                    <h1 class="text-3xl text-[#333] font-extrabold text-center">Kontakt</h1>
                    <form action="{{route('about-contact')}}" method="POST" class="mt-8 space-y-4">
                        @csrf
                        <input name="name" type='text' placeholder='Name'
                            class="w-full rounded-md py-3 px-4 bg-gray-100 text-sm outline-blue-500" />
                        <input name="email" type='email' placeholder='Email'
                            class="w-full rounded-md py-3 px-4 bg-gray-100 text-sm outline-blue-500" />
                        <input name="subject" type='text' placeholder='Subject'
                            class="w-full rounded-md py-3 px-4 bg-gray-100 text-sm outline-blue-500" />
                        <textarea name="message" placeholder='Message' rows="6"
                            class="w-full rounded-md px-4 bg-gray-100 text-sm pt-3 outline-blue-500"></textarea>
                        <button type='submit'
                            class="text-black bg-orange-500 hover:bg-orange-600 font-semibold rounded-md text-sm px-4 py-3 w-full">Send</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>




@endsection
