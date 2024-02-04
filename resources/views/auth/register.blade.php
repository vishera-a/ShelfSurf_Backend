<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="Ime" :value="__('Ime')" />
            <x-text-input id="Ime" class="block mt-1 w-full" type="text" name="Ime" :value="old('Ime')" required autofocus autocomplete="Ime" />
            <x-input-error :messages="$errors->get('Ime')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="Prezime" :value="__('Prezime')" />
            <x-text-input id="Prezime" class="block mt-1 w-full" type="text" name="Prezime" :value="old('Prezime')" required autofocus autocomplete="Prezime" />
            <x-input-error :messages="$errors->get('Prezime')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="Telefon" :value="__('Telefon')" />
            <x-text-input id="Telefon" class="block mt-1 w-full" type="text" name="Telefon" :value="old('Telefon')" required autofocus autocomplete="Telefon" />
            <x-input-error :messages="$errors->get('Telefon')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="Adresa1" :value="__('Adresa 1')" />
            <x-text-input id="Adresa1" class="block mt-1 w-full" type="text" name="Adresa1" :value="old('Adresa1')" required autofocus autocomplete="Adresa1" />
            <x-input-error :messages="$errors->get('Adresa1')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="Adresa2" :value="__('Adresa 2')" />
            <x-text-input id="Adresa2" class="block mt-1 w-full" type="text" name="Adresa2" :value="old('Adresa2')" autofocus autocomplete="Adresa2" />
            <x-input-error :messages="$errors->get('Adresa2')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
