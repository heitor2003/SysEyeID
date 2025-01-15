<x-guest-layout class="light-background light-text">
    <x-authentication-card  class="light-background light-text">
        <x-slot name="logo" class="light-background light-text">
            <img src="{{ asset('images/logov2.jpg') }}" class="h-20 w-auto rounded-full" />
        </x-slot>

        <x-validation-errors class="mb-4 light-background light-text" />

        @session('status')
           <div class="light-background light-text w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" class="light-background light-text" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Manter conectado') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>

    </x-authentication-card>
    <style>
        .light-background { background-color: #c7d1d4; }
        .water-blue-background { background-color: #79b6c8; }
        .light-text { color: #061722; }
    </style>
</x-guest-layout>