<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('src/ajolote.svg') }}" type="image/svg+xml" />
    <!-- !CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            backgroundImage: {
              login: "url({{ asset('src/backgrounds/fondo_login.svg') }})",
            },
            fontFamily: {
              titan: ["titan One"],
              raleway: ["raleway"],
            },
          },
        },
      };
    </script>
    <!-- !fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Raleway:wght@700;900&display=swap"
      rel="stylesheet"
    />
    <title>ARTEMEX - inicio de sesión</title>
  </head>
  <body class="h-screen bg-[#131921] flex items-center justify-center">
    <?php $session = session() ?>
    <form
      action="{{ url('/login') }}"
      method="post"
      class="block w-1/3 max-w-xl h-3/4 rounded-xl p-4 bg-login bg-cover flex items-center justify-center"
    >
    @csrf
    <div class="w-full h-full flex flex-col items-center justify-evenly gap-2">
        <div class="mb-6 w-4/5 text-center">
            <figure>
                <img src="{{ asset('src/ajolote.svg') }}" alt="ARTEMEX logo" class="w-1/2 mx-auto mb-2">
                <figcaption class="mb-5 text-6xl font-titan">Artemex</figcaption>
            </figure>
            <h3 class="font-raleway text-xl">Ingresa tus datos para acceder a tu cuenta</h3>
        </div>
        <div class="mb-6 w-4/5">
          <label
            for="email"
            class="block mb-2 text-2xl font-black text-black font-raleway"
            >Correo electrónico</label
          >
          <input
            type="email"
            id="email"
            name="email"
            class="bg-white border font-raleway border-gray-300 text-sm text-gray-900 rounded-lg focus:ring-4 focus:outline-none focus:ring-[#d8e2dc] focus:bg-[#f4f4f6] block w-full p-2.5"
            placeholder="Ingresa tu correo electrónico aquí"
            required
          />
        </div>
        <div class="mb-6 w-4/5">
          <label
            for="password"
            class="block mb-2 text-2xl font-black text-black font-raleway"
            >Contraseña</label
          >
          <input
            type="password"
            id="password"
            name="password"
            class="bg-white border font-raleway border-gray-300 text-sm text-gray-900 rounded-lg focus:ring-4 focus:outline-none focus:ring-[#d8e2dc] focus:bg-[#f4f4f6] block w-full p-2.5"
            placeholder="Ingresa tu contraseña aquí"
            minlength="8"
            required
          />
        </div>

        <div class="flex items-start mb-6">
          <button
            type="submit"
            class="text-white font-black bg-[#FFA5AC] hover:bg-[#E77E9F] focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-lg px-5 py-2.5 text-center font-raleway"
          >
            Iniciar sesión
          </button>
        </div>
      </div>
    </form>
  </body>
</html>
