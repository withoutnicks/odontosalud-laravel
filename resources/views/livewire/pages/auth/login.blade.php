<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form wire:submit="login">
    <!-- Email Address -->
    <div>
      <x-breeze.input-label for="email" :value="__('Email')" />
      <x-breeze.text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required
        autofocus autocomplete="email" />
      <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-breeze.input-label for="password" :value="__('Password')" />

      <x-breeze.text-input wire:model="form.password" id="password" class="block mt-1 w-full" type="password" name="password"
        required autocomplete="current-password" />

      <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
      <label for="remember" class="inline-flex items-center">
        <input wire:model="form.remember" id="remember" type="checkbox"
          class="rounded dark:bg-zinc-900 border-zinc-300 dark:border-zinc-700 text-denim-600 shadow-sm focus:ring-denim-500 dark:focus:ring-denim-600 dark:focus:ring-offset-zinc-800"
          name="remember">
        <span class="ms-2 text-sm text-zinc-600 dark:text-zinc-400">{{ __('Remember me') }}</span>
      </label>
    </div>

    <div class="flex items-center justify-end mt-4">
      @if (Route::has('password.request'))
        <a class="underline text-sm text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-denim-500 dark:focus:ring-offset-zinc-800"
          href="{{ route('password.request') }}" wire:navigate>
          {{ __('Forgot your password?') }}
        </a>
      @endif

      <x-primary-button class="ms-3">
        {{ __('Log in') }}
      </x-primary-button>
    </div>
  </form>
</div>
