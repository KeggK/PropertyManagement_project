@extends('layouts.app')
@section('content')
    <div class="max-w-screen-2xl px-4 mx-auto lg:px-16">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif

        <form action=" {{ route('update-profile', ['id' => $userData->id]) }} " method="POST"
            enctype="multipart/form-data">
            <div class="">
                @csrf


        <div class="flex flex-col gap-y-5 md:flex-wrap">
            <input type="image" name="image" value="{{ $userData->photo }}">
            {{-- <img src="{{ asset('storage/hazaar-images/' . $userData->photo) }}" alt=""> --}}
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
                            <option {{ $gender['key'] == $userData->sex ? 'selected' : '' }} value="{{ $gender['key'] }}">
                                {{ $gender['value'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <input type="email" name="email" value="{{ $userData->email }}" class="font-bold text-2xl">
                </div>

                {{-- <div class="flex flex-col gap-y-3">
                    <form action="{{route('update-password')}}" method="POST">
                        @csrf
                        <input type="password" name="password" placeholder="current password" class="font-bold">
                        @error('password')
                        <span>{{ $message }}</span>
                    @enderror
        
                        <input type="password" name="new-password" placeholder="new password" class="font-bold ">
                        @error('new-password')
                        <span>{{ $message }}</span>
                    @enderror
                        <input type="password" name='confirm-password' placeholder="confirm new password" class="font-bold ">
                        @error('confirm-password')
                        <span>{{ $message }}</span>
                    @enderror

                    </form>
                </div> --}}

                <div>
                    
                            {{-- <a href="{{ route('edit-profile-page', ['id' => $userData->id]) }}"
                            class=" bg-black text-green-500 px-5 py-3 rounded-md text-lg font-semibold">
                            Edit Profile
                        </a> --}}
                            <button type="submit"
                                class=" bg-black text-green-500 px-5 py-3 rounded-md text-lg font-semibold">
                                Update Profile</button>
                    
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection
