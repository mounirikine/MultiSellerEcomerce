{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('user.layouts.master')
@section('content')
<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 m-auto ">
        
    <form  method="POST" action="{{ route('login') }} ">
        @csrf
        <div class="login-form ">
            <div class="col-lg-3">
                <div class="logo pb-sm-30 pb-xs-30 mb-4" style="margin-left: 100%" >
                    <a href="index.html">
                        <img src="{{ asset('user/images/menu/logo/1.jpg') }}" alt="">
                    </a>
                </div>
            </div>
            <h4 class="login-title">Login</h4>
            <div class="row">
                <div class="col-md-12 col-12 mb-20">
                    <label>Email Address*</label>
                    <input class="mb-0" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="col-12 mb-20">
                    <label>Password</label>
                    <input class="mb-0" type="password" id="password" name="password" required autocomplete="current-password" placeholder="Password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                </div>
                <div class="col-md-8">
                    <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                        <input  id="remember_me" type="checkbox"  name="remember">
                        <label for="remember_me">Remember me</label>
                    </div>
                </div>
                <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                    <a href="#"> Forgotten pasward?</a>
                </div>
                <div class="col-md-4 mt-10 mb-20  text-md-right">
                    <a href="{{url('register')}}" class="text-black">Create Account Now !</a>
                </div>
                <div class="col-md-12">
                    <button class="register-button mt-0">Login</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

