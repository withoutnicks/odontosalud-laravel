<main class="mx-auto h-screen max-w-6xl">

	<div class="flex justify-center gap-4 p-2 flex-wrap sm:flex-nowrap">
		<x-dashboard.card title="Number of users" :number="$users">
      <x-svg.users />
    </x-dashboard.card>
    <x-dashboard.card title="Number of quotes" :number="$quotes">
      <x-svg.files />
    </x-dashboard.card>
    <x-dashboard.card title="Quotes actives" :number="$quotesActive">
      <x-svg.active />
    </x-dashboard.card>
	</div>

</main>
