<x-app-layout>
<x-slot name="header">
    <div style="display: flex; justify-content: center; align-items: center; padding: 1rem; background-color: #6a0dad; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); overflow: hidden;">
        <h1 id="movingText" style="font-family: 'Arial', sans-serif; font-weight: 900; font-size: 3rem; color: white; text-transform: uppercase; letter-spacing: 4px; background: linear-gradient(to right, #6a0dad, #ff5733); -webkit-background-clip: text; background-clip: text; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); animation: blinkMove 3s linear infinite;">
            PathToSuccess
        </h1>
    </div>
</x-slot>

<style>
    @keyframes blinkMove {
        0% {
            transform: translateX(-100%);
            color: #6a0dad;
        }
        50% {
            transform: translateX(50%);
            color: #ff5733;
        }
        100% {
            transform: translateX(100%);
            color: #6a0dad;
        }
    }

    #movingText {
        animation: blinkMove 3s linear infinite;
    }
</style>
<x-guest>
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
        <x-input-error :messages="$errors->get('general')" class="mt-2" />
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Login') }}
            </x-primary-button>
        </div>
    </form>
    </x-guest>
</x-app-layout>