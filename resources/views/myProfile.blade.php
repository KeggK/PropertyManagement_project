@extends('layouts.app')
@section('content')
    @include('partials.sidemenu')

    <div class="max-w-screen-2xl px-4 mx-auto lg:px-16">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        @endif
        <div class="flex justify-center  mt-20 px-8">
            <form action=" {{ route('update-profile', ['id' => $userData->id]) }} " method="POST"
                enctype="multipart/form-data">
                <div class="">
                    @csrf


                    {{-- <div class="flex flex-col gap-y-5 md:flex-wrap">
                    <input type="image" name="image" value="{{ $userData->photo }}">
                    {{-- <img src="{{ asset('storage/hazaar-images/' . $userData->photo) }}" alt="">
                    <div class="max-w-screen-2xl px-4 lg:px-16 mx-auto flex flex-col gap-y-5 pb-3">
                        <div>
                            <input type="text" name="name" value="{{ $userData->name }}" class="font-bold text-2xl" />
                        </div>
                        <div>
                            <input type="date" name="birthday" value="{{ $userData->birthday }}"
                                class="font-bold text-2xl">

                        </div>
                        <div> --}}
                    @php

                        $genders = [
                            ['key' => 'F', 'value' => 'Female'],
                            ['key' => 'M', 'value' => 'Male'],
                            ['key' => 'O', 'value' => 'Other'],
                        ]; //dd('rtkjgtrkgkrektgr4',$genders);
                    @endphp
                    {{-- <select name="gender" id="gender">
                                <option value="" disabled>No gender selected</option>

                                @foreach ($genders as $gender)
                                    <option {{ $gender['key'] == $userData->sex ? 'selected' : '' }}
                                        value="{{ $gender['key'] }}">
                                        {{ $gender['value'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <input type="email" name="email" value="{{ $userData->email }}" class="font-bold text-2xl">
                        </div> --}}

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
                        {{-- <button type="submit"
                                class=" bg-black text-green-500 px-5 py-3 rounded-md text-lg font-semibold">
                                Update Profile</button> --}}

                    </div>
                {{-- </div> --}}
        {{-- </div> --}}

    {{-- </div> --}}

    

        <div class="flex justify-center flex-wrap border shadow rounded-lg p-3 dark:bg-gray-600">
            <h2 class="text-xl text-gray-600 dark:text-gray-300 pb-2">Update profile:</h2>

            <div class="flex flex-col gap-2 w-full border-gray-400">

                <div>
                    <label class="text-gray-600 dark:text-gray-400">User
                        name
                    </label>
                    <input
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100"
                        type="text" name="name" value="{{ $userData->name }}">
                </div>

                <div>
                    <label class="text-gray-600 dark:text-gray-400">Birth Date
                    </label>
                    <input
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100"
                        type="date" name="birthday" value="{{ $userData->birthday }}">
                </div>

                <div>
                    <label class="text-gray-600 dark:text-gray-400">Gender
                    </label>
                    <select name="gender" id="gender"
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100">

                        <option value="" disabled>No gender selected</option>

                        @foreach ($genders as $gender)
                            <option {{ $gender['key'] == $userData->sex ? 'selected' : '' }} value="{{ $gender['key'] }}">
                                {{ $gender['value'] }}</option>
                        @endforeach
                    </select>

                </div>

                <div>
                    <label class="text-gray-600 dark:text-gray-400">Email</label>
                    <input
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100"
                        type="email" name="email" value="{{ $userData->email }}">
                </div>


                <div class="flex justify-end">
                    <button
                        class="py-1.5 px-3 m-1 text-center bg-orange-500 border rounded-md text-white  hover:bg-orange-700 hover:text-gray-100 dark:text-gray-200 dark:bg-orange-700"
                        type="submit">Save changes</button>
                </div>
            </div>

        </div>
        </form>


        <form action="{{ route('update-password') }}" method="POST" class="flex flex-col gap-y-3">
            @csrf
            <div class="flex flex-wrap border shadow rounded-lg p-3 dark:bg-gray-600">
                <h2 class="text-xl text-gray-600 dark:text-gray-300 pb-2">Change Password:</h2>

                <div class="flex flex-col gap-2 w-full border-gray-400">

                    <div>
                        <label class="text-gray-600 dark:text-gray-400">Current Password
                        </label>
                        <input
                            class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100"
                            type="password" name="old_password" placeholder="current password" required="">
                        @error('password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-600 dark:text-gray-400">New Password</label>
                        <input
                            class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100"
                            type="password" name="new_password" placeholder="new password" required="">
                        @error('new-password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-600 dark:text-gray-400">Confirm new password</label>
                        <input
                            class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100"
                            type="password" name='new_password_confirmation' placeholder="confirm new password"
                            required="">
                        @error('confirm-password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="flex justify-end">
                        <button
                            class="py-1.5 px-3 m-1 text-center bg-orange-500 border rounded-md text-white  hover:bg-orange-700 hover:text-gray-100 dark:text-gray-200 dark:bg-orange-700"
                            type="submit">Save changes</button>
                        @if (Session::has('success'))
                            {{ Session::get('success') }}
                        @elseif(Session::has('error'))
                            {{ Session::get('error') }}
                        @endif
                    </div>
                </div>
            </div>
        </form>

    
    </div>

@endsection
