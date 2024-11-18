<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
        <img src="{{ asset('images/logov2.jpg') }}" class="h-20 w-auto rounded-full mt-5" />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Seleção do Tipo de Usuário -->
            <div class="mt-4">
                <x-label for="user_type" value="{{ __('Tipo de Usuário') }}" />
                <div class="flex items-center space-x-6 mt-2">
                    <label>
                        <input type="radio" name="user_type" value="medico" onclick="toggleForm()" checked required>
                        {{ __('Médico') }}
                    </label>
                    <label>
                        <input type="radio" name="user_type" value="clinica" onclick="toggleForm()">
                        {{ __('Clínica') }}
                    </label>
                </div>
            </div>

            <!-- Campos para Médico -->
            

            <!-- Campos para Clínica -->
            

            <!-- Outros Campos -->
            <div class="mt-4">
                <x-label for="name" value="{{ __('Nome') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div id="medico-fields" class="mt-4">
                <x-label for="crm" value="{{ __('CRM') }}" />
                <x-input id="crm" class="block mt-1 w-full" type="text" name="crm" :value="old('crm')" />
            </div>

            <div id="clinica-fields" class="mt-4 hidden">
                <x-label for="cnpj" value="{{ __('CNPJ') }}" />
                <x-input id="cnpj" class="block mt-1 w-full" type="text" name="cnpj" :value="old('cnpj')" />

                <x-label for="address" value="{{ __('Endereço') }}" class="mt-4" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" />
            </div>

            <div class="mt-4">
                <x-label for="phone" value="{{ __('Telefone') }}" />
                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar Senha') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Já registrado?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<script>
    function toggleForm() {
        const medicoFields = document.getElementById('medico-fields');
        const clinicaFields = document.getElementById('clinica-fields');
        const userType = document.querySelector('input[name="user_type"]:checked').value;

        if (userType === 'medico') {
            medicoFields.classList.remove('hidden');
            clinicaFields.classList.add('hidden');
        } else if (userType === 'clinica') {
            clinicaFields.classList.remove('hidden');
            medicoFields.classList.add('hidden');
        }
    }

    // Inicializar o formulário para mostrar os campos corretos com base na seleção padrão
    document.addEventListener('DOMContentLoaded', toggleForm);
</script>
