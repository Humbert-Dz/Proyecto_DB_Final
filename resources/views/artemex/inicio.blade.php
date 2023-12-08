@include('commons.head')

<div class="w-full h-full grid grid-cols-fit justify-items-center gap-2">
  <a href="{{ url('producto') }}"
    class="block bg-[#090E1D] bg-product bg-cover w-[300px] h-[200px] rounded-xl p-2 active:scale-95 hover:bg-[#1F2733] shadow-lg shadow-[#3E3E3E]">
    <figure class="w-full h-full flex flex-col justify-evenly items-center">
      <img src="src/icons/admi_products.svg" alt="" class="w-1/4" />
      <figcaption class="text-2xl text-center font-black text-white">Administrar productos</figcaption>
    </figure>
  </a>
  <a href="{{ url('informe') }}"
    class="block bg-[#090E1D] bg-inform bg-cover w-[300px] h-[200px] rounded-xl p-2 active:scale-95 hover:bg-[#1F2733] shadow-lg shadow-[#3E3E3E]">
    <figure class="w-full h-full flex flex-col justify-evenly items-center">
      <img src="src/icons/inform.svg" alt="" class="w-1/4" />
      <figcaption class="text-2xl text-center font-black text-white">Generar informe</figcaption>
    </figure>
  </a>
  <a href="{{ url('pedidos') }}"
      class="block bg-[#090E1D] bg-packages bg-cover w-[300px] h-[200px] rounded-xl p-2 active:scale-95 hover:bg-[#1F2733] shadow-lg shadow-[#3E3E3E]">
      <figure class="w-full h-full flex flex-col justify-evenly items-center">
        <img src="src/icons/packages.svg" alt="" class="w-1/4" />
        <figcaption class="text-2xl text-center font-black text-white">Pedidos</figcaption>
      </figure>
  </a>
  <a href="{{ url('cuentas') }}"
      class="block bg-[#090E1D] bg-account bg-cover w-[300px] h-[200px] rounded-xl p-2 active:scale-95 hover:bg-[#1F2733] shadow-lg shadow-[#3E3E3E]">
      <figure class="w-full h-full flex flex-col justify-evenly items-center">
        <img src="src/icons/user.svg" alt="" class="w-1/4" />
        <figcaption class="text-2xl text-center font-black text-white">Cuentas</figcaption>
      </figure>
  </a>
</div>

@include('commons.end')