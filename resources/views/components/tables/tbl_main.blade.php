<table class="w-full text-left text-sm text-zinc-500 dark:text-zinc-400">
  <thead class="bg-zinc-50 text-xs uppercase text-zinc-700 dark:bg-zinc-700 dark:text-zinc-400">
    <tr>
      <x-tables.tbl_th class="w-20" value="Status" />
      <x-tables.tbl_th value="Reason" />
      <x-tables.tbl_th class="w-36" value="Date Quote" />
      <x-tables.tbl_th class="w-36" value="Local" />
      <x-tables.tbl_th class="w-56" value="Actions" />
    </tr>
  </thead>
  <tbody>
    @foreach ($quotes as $quote)
      <tr class="border-b bg-white dark:border-zinc-700 dark:bg-zinc-800">
        <th scope="row" class="whitespace-nowrap px-6 py-4">
          @switch($quote->status)
            @case('active')
              <x-tables.tbl_status class="bg-green-200 text-black dark:bg-green-300">
                today
              </x-tables.tbl_status>
            @break

            @case('approved')
              <x-tables.tbl_status class="bg-blue-200 text-black dark:bg-blue-300">
                approved
              </x-tables.tbl_status>
            @break

            @default
              <x-tables.tbl_status class="bg-yellow-200 text-black dark:bg-yellow-300">
                pending
              </x-tables.tbl_status>
          @endswitch
        </th>
        <td class="whitespace-nowrap px-6 py-4">
          {{ $quote->reason }}
        </td>
        <td class="whitespace-nowrap px-6 py-4">
          {{ $quote->date_quote->format('d/m/Y') }}
        </td>
        <td class="whitespace-nowrap px-6 py-4">
          {{ $quote->central->name }}
        </td>
        <td class="flex flex-wrap justify-center gap-2 px-6 py-4">
          <x-tables.tbl_button wire:click='updateQuote({{ $quote }})' class="bg-sky-700 text-white dark:bg-sky-600">
            Edit
          </x-tables.tbl_button>
          <x-tables.tbl_button 
            wire:click='deleteQuote({{ $quote }})' 
            wire:confirm='Seguro que quieres cancelar esta cita?' 
            class="bg-pink-900 text-white dark:bg-pink-700">
            Delete
          </x-tables.tbl_button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>