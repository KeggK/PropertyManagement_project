@extends('layouts.app')
@section('content')

    <div class="max-w-screen-2xl px-4 mx-auto lg:px-16">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        @endif

        <div class="flex flex-col gap-y-3">
            <form action="{{ route('update-password') }}" method="POST" class="flex flex-col gap-y-3" >
                @csrf
                <input type="password" name="old_password" placeholder="current password" class="font-bold" required="">
                @error('password')
                    <span>{{ $message }}</span>
                @enderror

                <input type="password" name="new_password" placeholder="new password" class="font-bold" required="">
                @error('new-password')
                    <span>{{ $message }}</span>
                @enderror
                <input type="password" name='new_password_confirmation' placeholder="confirm new password" class="font-bold" required="">
                @error('confirm-password')
                    <span>{{ $message }}</span>
                @enderror
                <button type="submit">Submit</button>
                @if (Session::has('success'))
                {{ Session::get('success') }}
            @elseif(Session::has('error'))
                {{ Session::get('error') }}
            @endif
            </form>
        </div>
    </div>
@endsection
