<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('images/logov2.jpg') }}" class="h-20 w-auto rounded-full" />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-700">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email Input -->
            <div>
                <x-label for="email" value="{{ __('Email') }}" class="block text-sm font-medium text-black" />
                <x-input id="email" class="block mt-1 w-full px-4 py-2 border border-gray-400 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-700 focus:border-blue-700 transition duration-200" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <!-- Password Input -->
            <div>
                <x-label for="password" value="{{ __('Senha') }}" class="block text-sm font-medium text-gray-800" />
                <x-input id="password" class="block mt-1 w-full px-4 py-2 border border-gray-400 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-700 focus:border-blue-700 transition duration-200" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me Checkbox -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" class="rounded border-gray-500 text-blue-700 shadow-sm focus:ring-blue-700" />
                    <span class="ms-2 text-sm text-gray-800">{{ __('Manter conectado') }}</span>
                </label>

                <!-- Forgot Password Link -->
                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-700 hover:text-blue-800 underline" href="{{ route('password.request') }}">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                @endif
            </div>

            <!-- Login Button -->
            <div>
                <x-button class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-700">
                    {{ __('Entrar') }}
                </x-button>
            </div>
        </form>

        <!-- Register Link -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-800">
                {{ __('Não tem uma conta?') }}
                <a href="{{ route('register') }}" class="text-blue-700 hover:text-blue-800 underline">
                    {{ __('Cadastre-se') }}
                </a>
            </p>
        </div>
    </x-authentication-card>
</x-guest-layout>