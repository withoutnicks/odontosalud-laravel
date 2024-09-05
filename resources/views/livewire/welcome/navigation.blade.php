<nav class="flex justify-center gap-4">
  @auth
    <a href="{{ url('/dashboard') }}"
      class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
      Dashboard
    </a>
  @else
    <a href="{{ route('login') }}"
      class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-denim-700 focus:z-10 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600
      dark:hover:text-white dark:hover:bg-gray-700">
      Log in
    </a>

    @if (Route::has('register'))
      <a href="{{ route('register') }}"
        class="text-white bg-denim-700 hover:bg-denim-800 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-denim-600 dark:hover:bg-denim-700 focus:outline-none dark:focus:ring-denim-800">
        Register
      </a>
    @endif
  @endauth
</nav>
