@include('commons.head')

<div class="w-full">

    <h2 class="mb-7 dark:text-white">En esta sección puedes realizar operaciones como agregar, actualizar o eliminar
        productos.</h2>
    <div class="w-full h-[32px] flex gap-x-3 mb-7">
        <form action="{{ url('/producto/buscar') }}" method="post" class="basis-1/2 h-full">
            @csrf
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="name" name="name"
                    class="block w-full p-[5px] pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Busca producto..." required>
                <button type="submit"
                    class="text-white absolute right-0 bottom-0 top-0 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
            </div>
        </form>
        <form action="{{ url('/producto/filtrado') }}" method="post" class="basis-1/2 h-full">
            @csrf
            <div class="flex gap-2 h-full">
                <select id="filtro" name="filtro"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-[5px] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    required>
                    <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category['name'] ?>">
                        <?php echo $category['name'] ?>
                    </option>
                    <?php endforeach; ?>
                    <option value="1">Productos disponibles</option>
                    <option value="0">Productos NO disponibles</option>
                </select>
                <button type="submit"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Filtrar
                </button>
            </div>
        </form>
    </div>

    <div class="w-full flex flex-col gap-2 justify-center items-center mb-7">
        <a id="defaultModalButton" data-modal-toggle="defaultModal"
            class="block bg-[#090E1D] bg-addProduct bg-cover w-[300px] rounded-xl py-2.5 px-1 active:scale-95 hover:bg-[#1F2733] shadow-lg shadow-[#3E3E3E] cursor-pointer">
            <figure class="w-full flex justify-evenly items-center">
                <img src="{{ asset('src/icons/admi_products.svg') }}" alt="" class="w-8" />
                <figcaption class="text-xl text-center font-black text-white">
                    Agregar producto
                </figcaption>
            </figure>
        </a>
    </div>

    <?php
    $currentUrl = request()->getRequestUri();

    // Obtener la porción después de "/producto"
    $parts = explode('/producto/', $currentUrl);

    // Verificar si el array tiene al menos dos elementos y el segundo elemento es 'buscar' o 'filtrado'
    if (count($parts) >= 2 && in_array($parts[1], ['buscar', 'filtrado'])):
        ?>
        <a href="{{ url('/producto') }}" class="block mb-7 w-fit mx-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer">Reestablecer búsqueda</a>
    <?php endif; ?>



    <!-- Tabla productos -->
    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 text-center">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                <tr>
                    <th scope="col" class="px-4 py-4">
                        ID
                    </th>
                    <th scope="col" class="p-1 py-4">
                        Imagen
                    </th>
                    <th scope="col" class="px-2 py-4">
                        Nombre
                    </th>
                    <th scope="col" class="px-2 py-4">
                        Peso
                    </th>
                    <th scope="col" class="px-2 py-4">
                        Caducidad
                    </th>
                    <th scope="col" class="px-2 py-4">
                        Categoría
                    </th>
                    <th scope="col" class="px-2 py-4">
                        Costo
                    </th>
                    <th scope="col" class="px-2 py-4">
                        Precio
                    </th>
                    <th scope="col" class="px-2 py-4">
                        Utilidad
                    </th>
                    <th scope="col" class="px-2 py-4">
                        Descripción
                    </th>
                    <th scope="col" class="px-2 py-4">
                        Stock
                    </th>
                    <th scope="col" class="px-2 py-4">
                        Disponible
                    </th>
                    <th scope="col" class="px-2 py-4">
                        Agregado por
                    </th>
                    <th scope="col" class="px-2 py-4">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($productos as $producto): ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $producto['id'] ?>
                    </th>
                    <td class="p-1 w-[150px]">
                        <img src="{{ asset($producto['image']) }}" alt="imagen de producto"
                            class="w-full rounded-lg shadow-chica">
                    </td>
                    <td class="px-2 py-4">
                        <?php echo $producto['name'] ?>
                    </td>
                    <td class="px-2 py-4">
                        <?php echo $producto['weight'] ?> kg
                    </td>
                    <td class="px-2 py-4">
                        <?php echo $producto['expiration_date'] ?>
                    </td>
                    <td class="px-2 py-4">
                        <?php echo $producto['category'] ?>
                    </td>
                    <td class="px-2 py-4">
                        $
                        <?php echo $producto['cost'] ?>
                    </td>
                    <td class="px-2 py-4">
                        $
                        <?php echo $producto['price_sale'] ?>
                    </td>
                    <td class="px-2 py-4">
                        $
                        <?php echo $producto['utilidad'] ?>
                    </td>
                    <td class="px-2 py-4">
                        <?php echo $producto['description'] ?>
                    </td>
                    <td class="px-2 py-4">
                        <?php echo $producto['stock'] ?> pz.
                    </td>
                    <td class="px-2 py-4">
                        <?php echo ($producto['status'] == 1)? 'SÍ' : 'NO'; ?>
                    </td>
                    <td class="px-2 py-4">
                        <?php echo $producto['added_by'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <div class="min-h-max flex flex-col justify-center items-between">
                            <a href="{{ url('/producto/editar/' . $producto['id']) }}"
                                class="active:scale-95 text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                                title="Actualiza este producto!">Editar</a>
                            <a data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                onclick="eliminar('<?php echo $producto['id']?>')"
                                class="active:scale-95 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 cursor-pointer"
                                title="Elimina este producto!">Eliminar</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <div>

            <!-- Modal agregar producto -->
            <div id="defaultModal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                        <!-- Modal header -->
                        <div
                            class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Agregar producto</h3>
                            <button type="button"
                                class="relative -top-5 -right-5 active:scale-95 text-gray-400 bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:text-white"
                                data-modal-toggle="defaultModal">
                                <svg aria-hidden="true" class="w-7 h-7" fill="white" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form action="{{ url('/producto/agregar') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="grid gap-6 mb-4 sm:grid-cols-2">
                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                    <input type="text" name="name" id="name" minlength="2"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Nombre del producto" required="">
                                </div>
                                <div>
                                    <label for="category"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
                                    <select id="category" name="category"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required="">
                                        <option selected="">Seleccione la categoría</option>
                                        <?php foreach($categories as $category): ?>
                                        <option value="<?php echo $category['id']?>">
                                            <?php echo $category['name']?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="flex gap-2">
                                    <div>
                                        <label for="cost"
                                            class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio
                                            compra</label>
                                        <input type="number" name="cost" id="cost" min="5"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="$" required="">
                                    </div>
                                    <div>
                                        <label for="precio"
                                            class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio
                                            venta</label>
                                        <input type="number" name="precio" id="precio" min="5"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="$" required="">
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <div class="basis-1/2">
                                        <label for="stock"
                                            class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad</label>
                                        <input type="number" name="stock" id="stock" min="0"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="#" required="">
                                    </div>
                                    <div class="basis-1/2">
                                        <label for="status"
                                            class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Disponible</label>
                                        <select id="status" name="status"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option value="1">Sí</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label for="caducidad"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Caducidad</label>
                                    <input type="date" name="caducidad" id="caducidad"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required="">
                                </div>
                                <div>
                                    <label for="peso"
                                        class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Peso</label>
                                    <input type="number" name="peso" id="peso" min="0"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="#" required="">
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="imagen">Imagen del producto</label>
                                    <input type="file" name="imagen" id="imagen"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                                    <textarea id="description" name="description" rows="4" minlength="8"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Escribe una descripción del producto" required></textarea>
                                </div>
                            </div>
                            <div class="flex justify-evenly">
                                <button type="button"
                                    class="text-black text-base active:scale-95 text-white flex items-center bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg px-5 py-2.5 text-center mr-2 mb-2"
                                    data-modal-toggle="defaultModal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="white" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Cancelar
                                </button>
                                <button type="submit"
                                    class="text-black text-base active:scale-95 text-white flex items-center bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg px-5 py-2.5 text-center mr-2 mb-2">
                                    <svg aria-hidden="true" class="w-6 h-6" fill="white" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Aceptar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal eliminar -->
            <div id="popup-modal" tabindex="-1"
                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                        <div class="p-6 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estas seguro de que
                                quieres eliminar el producto?</h3>
                            <a type="button" id="eliminar" href="{{ url('/producto/eliminar/') }}"
                                class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                Sí, estoy seguro
                            </a>
                            <button data-modal-hide="popup-modal" type="button"
                                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                No, cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function(event) {
        document.getElementById('defaultModalButton').click();
      });
      function eliminar(id) {
            // Obtén la etiqueta <a> por su ID
            var link = document.getElementById("eliminar");

            // Concatena el número `id` al atributo `href`
            link.href = link.href + '/' + id;
        }
    </script>

        @include('commons.end')