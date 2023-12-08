@include('commons.head')
    <div class="w-full">
        <h2 class="mb-7 dark:text-white">En esta sección puedes generar informes entre un rango de fechas según lo necesites.</h2>
        
        <form action="{{ url('informe') }}" method="post" class="mb-7">
        @csrf
            <div class="m-auto flex w-9/12 justify-evenly items-center">
                <div date-rangepicker class="flex items-center w-[550px]">
                    <div class="relative w-1/2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input id="start" name="start" type="text" class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 text-center cursor-pointer" placeholder="Selecciona la fecha de inicio" required>
                    </div>
                    <span class="mx-4 text-white">a</span>
                    <div class="relative w-1/2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input id="end" name="end" type="text" class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 text-center cursor-pointer" placeholder="Selecciona la fecha de fin" required>
                    </div>
                </div>
                <div class="flex gap-4 items-center">
                    <label for="tipo" class="block text-sm font-medium text-gray-900 dark:text-white">Tipo</label>
                    <select id="tipo" name="tipo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                        <option value="1">Productos más vendidos</option>
                        <option value="0">Productos menos vendidos</option>
                        <option value="utilidades">Utilidades</option>
                    </select>
                </div>
                <button type="submit" class="text-sm active:scale-95 text-white flex items-center bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-center py-2 px-3">
                    Generar
                </button>
            </div>
        </form>

        <?php if($informeGenerado): ?>
            <object class="bg-white rounded-lg w-full">
                @include($grafico)
            </object>
        <?php endif; ?>

@include('commons.end')