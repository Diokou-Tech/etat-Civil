<div class="m-30 p-40">
    <x-guest-layout>
            <x-jet-validation-errors class="mb-4" />
    
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <div class="flex flex-column">
                <form method="POST" action="{{ route('login') }}" class="w-full">
                    @csrf
        
                    <div>
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-3/4" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
        
                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-3/4" type="password" name="password" required autocomplete="current-password" />
                    </div>
        
                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de Moi') }}</span>
                        </label>
                    </div>
                    <x-jet-button class="mt-4 bg-blue-600">
                        <i class="fa fa-sign-in-alt m-1 font-bold"> Se connecter</i>
                    </x-jet-button>
                    <div class="flex items-center mt-4 mb-4 ">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                Mot de passe oublié ?
                            </a>
                        @endif
                    </div>
                </form>
                <div class="w-full shadow-xl">
                  <img src="{{asset('images/login.svg')}}" alt="image illustrative" class="inline h-56">
                </div>
            </div>

    </x-guest-layout>
    
</div>

