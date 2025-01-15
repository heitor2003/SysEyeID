<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('API Tokens') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 light-background water-blue-background">
            @livewire('api.api-token-manager')
        </div>
    </div>
</x-app-layout>

<style>
    .light-background { background-color: #c7d1d4; }
    .water-blue-background { background-color: #79b6c8; }
    .light-text { color: #061722; }
</style>
