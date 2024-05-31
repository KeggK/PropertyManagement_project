@extends('layouts.app')
@section('content')
    <div class="max-w-screen-2xl px-4 mx-auto lg:px-16">

        <div class="flex flex-col gap-y-5 md:flex-wrap">
            <img src="{{ $userData->photo }}" alt="">
            <div class="max-w-screen-2xl px-4 lg:px-16 mx-auto flex flex-col gap-y-5 pb-3">
                <div>
                    <input type="text" name="name" value="{{ $userData->name }}" class="font-bold text-2xl" />
                </div>
                <div>
                    <input type="date" name="birthday" value="{{ $userData->birthday }}" class="font-bold text-2xl">

                </div>
                <div>
                    @php
                   
                        $genders = [
                            ['key' => 'F', 'value' => 'Female'],
                            ['key' => 'M', 'value' => 'Male'],
                            ['key' => 'O', 'value' => 'Other'],
                        ]; //dd('rtkjgtrkgkrektgr4',$genders);
                    @endphp
                    <select name="gender" id="gender">
                        <option value="" disabled>No gender selected</option>
                      
                        @foreach ($genders as $gender)
                        <option
                        {{$gender['key'] == $userData->sex ? 'selected' :''}}
                         value="{{$gender['key']}}">{{$gender['value']}}</option>
                            
                        @endforeach
                    </select>
                </div>
                <div>
                    <input type="email" name="email" value="{{ $userData->email }}" class="font-bold text-2xl">
                </div>
                <div><button class="bg-black text-green-500 px-5 py-3 rounded-md text-lg font-semibold">Edit
                        Profile</button></div>
            </div>
        </div>
    </div>
@endsection
