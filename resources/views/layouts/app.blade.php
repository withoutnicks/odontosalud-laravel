<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/4085/PNG/512/meta_logo_icon_259375.png" type="image/x-icon">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Tu Panel de Control</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
  <div class="min-h-screen bg-zinc-100 dark:bg-zinc-900">
    <livewire:layout.navigation />

    <!-- Page Heading -->
    @if (isset($header))
      <header class="bg-zinc-100 dark:bg-zinc-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          {{ $header }}
        </div>
      </header>
    @endif

    <!-- Page Content -->
    <main>
      {{ $slot }}
    </main>
  </div>
</body>

</html>
