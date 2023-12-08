@include('commons.head')

    <div class="w-full">
        <div class="w-full mb-7">
            <div>
                <h2 class="mb-7 dark:text-white">En esta sección puedes ver los pedidos de tus clientes.</h2>
                <div class="w-full h-[32px] flex gap-x-3 mb-7">
                    <form action="{{ url('/pedido/buscar') }}" method="post" class="basis-1/2 h-full">
                        @csrf 
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="number" min="0" id="idPedido" name="idPedido" class="block w-full p-[5px] pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Busca un pedido..." required>
                            <button type="submit" class="text-white absolute right-0 bottom-0 top-0 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
                        </div>
                    </form>
                    <form action="{{ url('/pedido/filtrado') }}" method="post" class="basis-1/2 h-full">
                        @csrf
                        <div class="flex gap-2 h-full">
                            <select id="filtro" name="filtro" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-[5px] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                <option value="0">Pedidos enviados</option>
                                <option value="1">Pedidos por enviar</option>
                                <option value="2">Pedidos cancelados </option>
                                <option value="3">Pedidos por confirmar </option>
                            </select>
                            <button type="submit" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Filtrar
                            </button>
                        </div>
                    </form>
                </div>
                <?php 
        $currentUrl = $_SERVER['REQUEST_URI'];

        // Obtener la porción después de "/producto"
        $parts = explode('/pedido/', $currentUrl);

        // Verificar si el array tiene al menos dos elementos y el segundo elemento es 'buscar'
        if (count($parts) >= 2 && $parts[1] == ('buscar' || 'filtrado' ) ):?>
            <div class="w-full flex justify-center">
                <a href="{{ url('/pedido') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer">Reestablecer búsqueda</a>
            </div>
        <?php endif;?>
            </div>
        </div>

        <!-- Tabla de pedidos -->
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 text-center">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Usuario
                        </th>
                        <th scope="col" class="px-6 py-3">
                            productos
                        </th>
                        <th scope="col" class="px-6 py-3">
                            fecha
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Precio total
                        </th>
                        <th scope="col" class="px-6 py-3" rowspan="2">
                            Dirección
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($pedidos as $pedido): ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $pedido['id'] ?>
                            </th>
                            <td class="p-1 w-[150px] text-green-300">
                                <?php echo $pedido['usuario'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <ul class="list-disc list-inside text-start">
                                    <?php foreach (json_decode($pedido['producto']) as $producto): ?>
                                        <li>
                                            <?php echo $producto->producto; ?> (<?php echo $producto->cantidad; ?>)
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $pedido['fecha']?>
                            </td>
                            <td class="px-6 py-4">
                                $<?php echo $pedido['unit_price']?>
                            </td>
                            <td class="px-6 py-4 text-start">
                            <ul class="list- list-disc">
                                    <li>Estado: <?php echo $pedido['state']?></li>
                                    <li>Municipio: <?php echo $pedido['town']?></li>
                                    <li>Código postal: <?php echo $pedido['postal_code']?></li>
                                    <li>Calle: <?php echo $pedido['street']?></li>
                                    <li>Referencias: <?php echo $pedido['reference']?></li>
                                </ul>
                            </td>
                            <td class="px-6 py-4">
                                <?php if ($pedido['canceled_at'] == null):?>
                                    <?php 
                                        if($pedido['confirmed'] == 0 ){ ?>
                                        <a href="{{ url('/pedido/confirmar/' . $pedido['id']) }}" class="active:scale-95 text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Confirmar</a>
                                    <?php } 
                                        if($pedido['delivery'] == 0 && $pedido['confirmed'] == 1){ ?>
                                        <a data-modal-target="enviar_pedido"   data-modal-toggle="enviar_pedido" class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 shadow-lg shadow-pink-500/50 dark:shadow-lg dark:shadow-pink-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 cursor-pointer" onclick="enviar('<?php echo $pedido['id']?>')">Enviar</a>
                                    <?php } elseif ($pedido['delivery'] == 1){ ?>
                                        <?php echo 'Enviado'; ?>
                                    <?php } if($pedido['delivery'] == 0 ){ ?>
                                        <a data-modal-target="cancelar_pedido" data-modal-toggle="cancelar_pedido"  class="active:scale-95 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 cursor-pointer" onclick="cancelar('<?php echo $pedido['id']?>')">Cancelar</a>
                                    <?php }?>
                                <?php else:?>
                                    <?php echo 'Cancelado'; ?>
                                <?php endif;?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            

        </div>
    </div>

    <!-- Modal cancelar pedido -->
    <div id="cancelar_pedido" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                
                <div class="p-6 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estas seguro de que quieres cancelar el pedido?</h3>
                    <a href="{{ url('/pedido/cancelar/') }}" id="cancelar" type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 cursor-pointer">
                        Sí, estoy seguro
                    </a>
                    <button data-modal-hide="cancelar_pedido" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        No, cancelar</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal enviar pedido -->
    <div id="enviar_pedido" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
      <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
          <!-- Modal content -->
          <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
              <!-- Modal header -->
              <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Enviar pedido</h3>
                  <button type="button" class="relative -top-5 -right-5 active:scale-95 text-gray-400 bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:text-white" data-modal-toggle="enviar_pedido">
                      <svg aria-hidden="true" class="w-7 h-7" fill="white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
              </div>
              <!-- Modal body -->
              <form id="IDorder" action="{{ url('/pedido/enviar/') }}" method="post">
                @csrf
                  <div class="grid gap-6 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="paqueteria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Paquetería</label>
                            <input type="text" name="paqueteria" id="paqueteria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nombre de la paquetería" required="">
                        </div>
                        <div>
                            <label for="num_guia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número de guía</label>
                            <input type="text" name="num_guia" id="num_guia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Número de guía" required="">
                        </div>

                    </div>
                    <div class="flex justify-evenly">
                        <button type="button" class="text-black text-base active:scale-95 text-white flex items-center bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg px-5 py-2.5 text-center mr-2 mb-2" data-modal-toggle="enviar_pedido">
                            Cancelar
                        </button>
                        <button type="submit" class="text-black text-base active:scale-95 text-white flex items-center bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg px-5 py-2.5 text-center mr-2 mb-2">
                            Aceptar
                        </button>
                    </div>
              </form>
          </div>
      </div>
    </div>

    <script>
        function cancelar(id) {
            // Obtén la etiqueta <a> por su ID
            var link = document.getElementById("cancelar");

            // Concatena el número `id` al atributo `href`
            link.href = link.href + '/' + id;
        }
        
        function enviar(id){
            // Obtén la etiqueta <a> por su ID
            var link = document.getElementById("IDorder");
    
            // Concatena el número `id` al atributo `href`
            link.action = link.action + '/' + id;

        }
    </script>

@include('commons.end')