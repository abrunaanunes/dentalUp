<?php require $_SERVER['DOCUMENT_ROOT'] . '/' . 'views' . '/partials/app.php'  ?>
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex w-full justify-between items-center">
            <h2 class="text-xl text-gray-400 leading-tight"> Dentistas </h2>

            <div class="place-content-end flex gap-3"><a class="bg-emerald-700 hover:bg-emerald-600 text-white font-semibold px-4 py-2 rounded-md" href="/dentist/create">Cadastrar</a></div>
        </div>
    </div>
</header>
<main>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <?php if (!empty($dentists) && is_array($dentists) || !empty($dentists) && is_object($dentists)) : ?>
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> Nome </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> E-mail </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> CPF </th>
                                            <th scope="col" class="relative px-6 py-3"><span class="sr-only">Ações</span></th>
                                        </tr>
                                        <?php foreach ($dentists as $dentist) : ?>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900"><?php echo $dentist->name; ?></div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900"><?php echo $dentist->email; ?></div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900"><?php echo $dentist->cpf; ?></div>
                                                </td>

                                                <td class="px-6 py-4 flex justify-end gap-1">
                                                    <a class="inline-flex items-center px-4 py-2 bg-gray-300 rounded-md font-semibold text-xs text-gray-500 uppercase tracking-widest hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" title="Alterar" href="#">
                                                        Editar
                                                    </a>
                                                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:ring disabled:opacity-25 transition focus:outline-none bg-gray-300 text-gray-400 hover:bg-gray-400 hover:text-gray-500 active:bg-gray-400 active:text-white focus:border-gray-500 focus:ring-gray-500" title="Mover para lixeira">
                                                        Excluir
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">

                                    </tbody>
                                </table>
                            <?php else : ?>
                                <div class="p-5 bg-gray-200 text-gray-400 font-sm flex items-center gap-3">
                                    <svg class="w-8" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path class="" fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path>
                                    </svg> Nenhum resultado encontrado!
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!--v-if-->
            </div>
        </div>
    </div>
</main>