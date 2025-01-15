<x-guest-layout>
    <div class="pt-4 water-blue-background">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <x-authentication-card-logo />
            </div>

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-light-yellow dark:bg-dark-blue shadow-md overflow-hidden sm:rounded-lg prose dark:prose-invert text-dark-blue dark:text-light-yellow">
                {!! $policy !!}
            </div>
        </div>
    </div>
</x-guest-layout>
