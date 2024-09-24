<section class="px-12">
	<form >
		<label for="default-search" class="sr-only mb-2 text-sm font-medium text-zinc-900 dark:text-white">
			Search
		</label>
		<div class="relative">
			<div class="pointer-events-none absolute top-5 flex items-center ps-4">
				<x-svg.search />
			</div>
			<input type="text" id="default-search"
				class="block w-full rounded-lg border border-zinc-300 bg-zinc-50 p-4 ps-10 text-sm text-zinc-900 focus:border-denim-500 focus:ring-denim-500 dark:border-zinc-600 dark:bg-zinc-700 dark:text-white dark:placeholder-zinc-400 dark:focus:border-denim-500 dark:focus:ring-denim-500"
				placeholder="Search Name User" wire:model.live="search" required autocomplete="off" />
	</form>
	<article>
		@if (count($searches) > 0)
			<ul
				class="absolute z-10 mt-2 max-h-40 w-full overflow-y-auto rounded-lg border border-zinc-700 bg-zinc-100 dark:bg-zinc-800">
				@foreach ($searches as $user)
					<li wire:key="{{ $user->id }}"
						class="cursor-pointer px-4 py-2 text-zinc-800 hover:bg-zinc-200 dark:text-zinc-300 hover:dark:bg-zinc-900"
						wire:click="loadQuotes({{ $user->id }})">
						{{ $user->name }} <br>
						<small class="text-zinc-800 dark:text-zinc-400">{{ $user->email }}</small>
					</li>
				@endforeach
			</ul>
		@endif
	</article>

	@if ($selectedUserId && count($quotes) > 0)
		<div class="mt-4">
			<x-tables.tbl_main :$quotes />
		</div>
	@else
		<div
      class="my-4 rounded-lg bg-blue-50 p-4 text-sm text-blue-800 dark:bg-zinc-800 dark:text-blue-400"
      role="alert">
      <span class="font-medium">Por favor seleccione un usuario para ver sus citas.</span>
    </div>
  @endif
</section>
