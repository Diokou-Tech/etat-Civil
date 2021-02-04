<x-guest-layout>
    @livewire('header')
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="/"><h1 class="font-bold text-2xl hover:text-gray-400 items-center">Inscription</h1></a>
        </x-slot>

        <x-jet-validation-errors class="mb-2" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('login') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Mot de Passe') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Mot de Passe') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('welcome') }}">
                    {{ __('Déjà inscrit ') }}
                </a>

                <x-jet-button class="ml-4 hover:bg-orange-600">
                    {{ __('S\'incrire') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
    @livewire('footer')
</x-guest-layout>
