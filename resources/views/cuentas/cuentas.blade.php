@include('commons.head')

<h2 class="mb-7 dark:text-white">En cualquiera de las secciones tendrás control total sobre las cuentas con las que administradores y clientes pueden acceder al sistema.</h2>

<div class="w-3/4 mx-auto h-full grid grid-cols-fit justify-items-center gap-2">
  <a href="{{ url('cuentas/administradores') }} "
    class="block bg-[#090E1D] bg-product bg-cover w-[300px] h-[200px] rounded-xl p-2 active:scale-95 hover:bg-[#1F2733] shadow-lg shadow-[#3E3E3E]">
    <figure class="w-full h-full flex flex-col justify-evenly items-center">
      <img src="src/icons/user.svg" alt="" class="w-1/4" />
      <figcaption class="text-2xl text-center font-black text-white">Cuentas administradores</figcaption>
    </figure>
  </a>
  <a href="{{ url('cuentas/clientes') }} "
    class="block bg-[#090E1D] bg-inform bg-cover w-[300px] h-[200px] rounded-xl p-2 active:scale-95 hover:bg-[#1F2733] shadow-lg shadow-[#3E3E3E]">
    <figure class="w-full h-full flex flex-col justify-evenly items-center">
      <img src="src/icons/user.svg" alt="" class="w-1/4" />
      <figcaption class="text-2xl text-center font-black text-white">Cuentas de clientes</figcaption>
    </figure>
  </a>
</div>

@include('commons.end')