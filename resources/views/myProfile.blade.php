@extends('layouts.app')
@section('content')

<div class="max-w-screen-2xl px-4 mx-auto lg:px-16">
    <div class="flex flex-col gap-y-5 bg-slate-50 md:flex-row-reverse lg:hidden">
        <form action="{{route('my-profile-page')}}" method="POST">
            @csrf
        <img src="https://hazaar.eu/wp-content/uploads/2023/11/Explore-Area-1.png" alt="">
        <div><img src="" alt=""></div>
        <div class="max-w-screen-2xl px-4 lg:px-16 mx-auto flex flex-col gap-y-5 pb-3">
            <div>
                <h2 class="font-bold text-2xl">Eksploro sipas zonave</h2>
            </div>
            <div>
                <p>Në qytet, në zona bregdetare, rurale apo në vendndodhje të njohura – Hazaar është kudo me ju!
                    Zbuloni
                    çdo pronë brenda perimetrit të ëndrrave tuaja. Lehtësoni kërkimin tuaj në çdo zonë të
                    Shqipërisë.
                    Klikoni tani për një të ardhme të sigurt!</p>
            </div>
            <div><button class="bg-black text-green-500 px-5 py-3 rounded-md text-lg font-semibold">Eksploro
                    tani</button></div>
        </div>
    </div>
</div>
</form>

@endsection