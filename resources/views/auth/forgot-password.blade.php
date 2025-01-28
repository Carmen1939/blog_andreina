<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your user address and we will user you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.user') }}">
        @csrf

        <!-- user Address -->
        <div>
            <x-input-label for="user" :value="__('user')" />
            <x-text-input id="user" class="block mt-1 w-full" type="user" name="user" :value="old('user')" required autofocus />
            <x-input-error :messages="$errors->get('user')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('user Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
