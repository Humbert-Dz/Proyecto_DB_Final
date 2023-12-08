@include('commons.head')

<div class="w-full">
    <h2 class="mb-7 dark:text-white">En esta sección puedes crear un respaldo de la base de datos artemex.</h2>

    <div class="w-full flex flex-col gap-2 justify-center items-center mb-7">
        <a href="{{ url('/respaldoDB') }}"
            class="block bg-[#090E1D] bg-database bg-cover w-[300px] rounded-xl py-2.5 px-1 active:scale-95 hover:bg-[#1F2733] shadow-lg shadow-[#3E3E3E] cursor-pointer">
            <figure class="w-full flex justify-evenly items-center">
                <img src="{{ asset('src/icons/database.svg') }}" alt="" class="w-8" />
                <figcaption class="text-xl text-center font-black text-white">
                    Respaldar DB
                </figcaption>
            </figure>
        </a>
    </div>
</div>


@include('commons.end')