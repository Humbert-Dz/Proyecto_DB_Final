<!DOCTYPE html>
<html lang="es-MX">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" href="{{ asset('src/ajolote.svg') }}" type="image/svg+xml" />
    <!-- !CDNs -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css"
      rel="stylesheet"
    />
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              titan: ["titan One"],
              raleway: ["raleway"],
            },
            backgroundImage: {
              product:
                "url( {{ asset('src/backgrounds/product.svg') }})",
              inform:
                  "url( {{ asset('src/backgrounds/informe.svg') }})",
              packages:
                  "url( {{ asset('src/backgrounds/packages.svg') }})",
              account:
                  "url( {{ asset('src/backgrounds/account.svg') }})",
              addProduct:
                  "url( {{ asset('src/backgrounds/addProduct.svg') }})",
              database:
                  "url( {{ asset('src/backgrounds/database.svg') }})",
            },
            gridTemplateColumns: {
              'fit': 'repeat(auto-fit, minmax(300px, 1fr))',
            },
            boxShadow: {
              'chica': '0px 0px 15px rgb(202,240,248)',
            }
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
    <title>ARTEMEX<?php echo ' - ' . $title?></title>
  </head>
  <body class="font-raleway dark:bg-[#606975]">
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-[#131921] dark:border-gray-700">
      <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
          <div class="flex items-center justify-start">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
              <span class="sr-only">Open sidebar</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
              </svg>
            </button>
            <a href="{{ url('inicio') }}" class="flex ml-2 md:mr-24">
              <img src="{{ asset('src/ajolote.svg') }}" class="h-8 mr-3" alt="Logo" />
              <span class="self-center text-xl font-normal sm:text-2xl whitespace-nowrap dark:text-white font-titan">ARTEMEX</span>
            </a>
          </div>
          <h1 class="text-white text-2xl font-black text-center mx-auto"><?php echo $title?></h1>
          <a href="{{ url('/logout') }}" class="flex items-center p-2 text-white rounded-lg bg-slate-500 hover:bg-slate-600 active:scale-95 active:scale-95">
            <img class="flex-shrink-0 w-5 h-5 transition duration-75 text-white" src="{{ asset('src/icons/cerrar_sesion.svg') }}"/>
            <span class="flex-1 ml-3 whitespace-nowrap text-sm">Cerrar sesión</span>
          </a>
        </div>
      </div>
    </nav>

    <aside id="logo-sidebar" 
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-[#131921] dark:border-gray-700"
      aria-label="Sidebar">
      <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-[#131921]">
        <ul class="space-y-2 font-black text-base">
          <li>
            <a
              href="{{ url('inicio') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group active:scale-95">
              <img src="{{ asset('src/icons/inicio.svg') }}" alt="" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"/>
              <span class="flex-1 ml-3 whitespace-nowrap">Inicio</span>
            </a>
          </li>
          <li>
            <a
              href="{{ url('producto') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group active:scale-95">
              <img src="{{ asset('src/icons/admi_products.svg') }}" alt="" class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"/>
              <span class="ml-3">Administrar productos</span>
            </a>
          </li>
          <li>
            <a href="{{ url('informe') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group active:scale-95">
              <img src="{{ asset('src/icons/inform.svg') }}" alt="" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"/>
              <span class="flex-1 ml-3 whitespace-nowrap">Generar informe</span>
            </a>
          </li>
          <li>
            <a href="{{ url('pedido') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group active:scale-95">
              <img src="{{ asset('src/icons/packages.svg') }}" alt="" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"/>
              <span class="flex-1 ml-3 whitespace-nowrap">Pedidos</span>
            </a>
          </li> 
          <li>
            <a href="{{ url('cuentas') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group active:scale-95">
              <img src="{{ asset('src/icons/user.svg') }}" alt="" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"/>
              <span class="flex-1 ml-3 whitespace-nowrap">Cuentas</span>
            </a>
          </li> 
          <li>
            <a href="{{ url('respaldo') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group active:scale-95">
              <img src="{{ asset('src/icons/database.svg') }}" alt="" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"/>
              <span class="flex-1 ml-3 whitespace-nowrap" title="Respalda la base de datos aquí">Respaldo DB</span>
            </a>
          </li> 
        </ul>
        <h4 href="#" class="absolute bottom-0 left-0 right-0 flex items-center p-2 text-gray-900 text-center dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
          <span class="flex-1 ml-3 whitespace-nowrap">Bienvenid@ <?php echo session()->get('name') . '!'?></span>
    </h4>
      </div>
    </aside>

    <div class="p-4 sm:ml-64">
      <div class="mt-14">