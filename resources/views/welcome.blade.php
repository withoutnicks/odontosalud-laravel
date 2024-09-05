<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/4085/PNG/512/meta_logo_icon_259375.png"
    type="image/x-icon">
  <title>Centro Odontologico</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  <!-- Styles -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-zinc-200 dark:bg-zinc-900 h-screen">
  {{-- Navbar --}}
  <section class="w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="#" class="flex items-center space-x-3">
        <img src="https://cdn.icon-icons.com/icons2/4085/PNG/512/meta_logo_icon_259375.png" class="h-10"
          alt="Empresa Logo">
      </a>
      @if (Route::has('login'))
        <livewire:welcome.navigation />
      @endif
    </div>
  </section>
  {{-- CTA --}}
  <section>
    <div class="mx-auto px-4 py-8 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <div class="bg-denim-600 p-8 md:p-12 lg:px-16 lg:py-24">
          <div class="mx-auto max-w-lg text-center">
            <h2 class="text-2xl font-bold text-white md:text-3xl">
              Tu salud bucal, al alcance de un clic
            </h2>

            <p class="hidden text-white/90 sm:mt-4 sm:block">
              Ingresa a tu cuenta dental personalizada, desarrollada con Laravel y PHP, y toma el control de tu salud bucal. Agenda citas en línea, consulta tu historial clínico, conoce tus tratamientos y mucho más. ¡Experimenta la odontología del futuro desde la comodidad de tu hogar!
            </p>

            <div class="mt-4 md:mt-8">
              <a href="{{ route('login') }}"
                class="inline-block rounded border border-white bg-white px-12 py-3 text-sm font-medium text-denim-500 transition hover:bg-transparent hover:text-white focus:outline-none focus:ring focus:ring-yellow-400">
                Acceder a mi cuenta
              </a>
            </div>
          </div>
        </div>

        <div class="grid grid-cols-2 gap-4 md:grid-cols-1 lg:grid-cols-2">
          <img alt=""
            src="https://images.pexels.com/photos/15771799/pexels-photo-15771799/free-photo-of-oficina-metal-clinica-medicina.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
            class="h-40 w-full object-cover sm:h-56 md:h-full" />

          <img alt=""
            src="https://images.pexels.com/photos/6529057/pexels-photo-6529057.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
            class="h-40 w-full object-cover sm:h-56 md:h-full" />
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="max-w-screen-xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center">
        <div class="text-sm text-gray-500 dark:text-gray-400">
          © 2024 Centro Odontologico.
        </div>
        <div class="flex space-x-4">
          <a href="#" class="text-sm text-gray-500 dark:text-gray-400">Política de privacidad</a>
          <a href="#" class="text-sm text-gray-500 dark:text-gray-400">Términos y condiciones</a>
        </div>
      </div>
    </div>
  </footer>

</body>

</html>
