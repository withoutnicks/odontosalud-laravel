<nav class="flex justify-center gap-4">
  @auth
    <a href="{{ url('/quotes') }}"
      class="text-white bg-denim-700 hover:bg-denim-800 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-denim-600 dark:hover:bg-denim-700 focus:outline-none dark:focus:ring-denim-800">
      Join Panel
    </a>
  @else
    <a href="{{ route('login') }}"
      class="py-2.5 px-5 text-sm font-medium text-zinc-900 focus:outline-none bg-white rounded-lg border border-zinc-200 hover:bg-zinc-100 hover:text-denim-700 focus:z-10 dark:bg-zinc-800 dark:text-zinc-400 dark:border-zinc-600
      dark:hover:text-white dark:hover:bg-zinc-700">
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
