<?php require $_SERVER['DOCUMENT_ROOT'] . '/' .'views' . '/partials/app.php'  ?>
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl text-gray-400 leading-tight"><?php if(empty($data['appointment'])) { echo "Cadastrar consulta"; } else { echo "Editar consulta"; } ?></h2>
    </div>
</header>
<main>
    <div class="py-4">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="block w-full p-5">
                    <!--v-if-->
                    <form class="flex flex-col gap-4" action="<?php if(empty($data['id'])) {echo 'http://' . $_SERVER['HTTP_HOST']. '/appointment/store';} else {echo 'http://' . $_SERVER['HTTP_HOST']. '/appointment/update/' . $data['id'];}?>"  method="post">
                        <?php 
                            if(!empty($data['registerError'])) {
                                echo '<span style="font-size: 14px; font-weight: 300; line-height: 18px; color: red;">' . $data['registerError'] . '</span>';
                            }
                        ?>
                        <div>
                            <label class="block"></label>
                            <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">
                                Data e hora da consulta
                            </span>
                            <input type="datetime-local" name="appointment_date" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" required value="<?php if(!empty($appointment['appointment_date'])) { echo $appointment['appointment_date']; }?>" />
                        </div>
                        <div>
                            <label class="block"></label>
                            <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">
                                Cliente
                            </span>
                            <select name="client_id" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" required>
                                <?php if (!empty($clients) && is_array($clients) || !empty($clients) && is_object($clients)) : ?>    
                                    <option value="" disabled selected>Selecione</option>
                                    <?php foreach ($clients as $client) : ?>
                                        <option value="<?php echo $client->id; ?>" <?php if(!empty($appointment) && $appointment['client_id'] == $client->id) { echo 'selected'; } ?> ><?php echo $client->name; ?></option>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <option value="" disabled selected>Não há clientes cadastrados</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div>
                            <label class="block"></label>
                            <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">
                                Dentista
                            </span>
                            <select name="dentist_id" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" required>
                            <?php if (!empty($dentists) && is_array($dentists) || !empty($dentists) && is_object($dentists)) : ?>    
                                    <option value="" disabled selected>Selecione</option>
                                    <?php foreach ($dentists as $dentist) : ?>
                                        <option value="<?php echo $dentist->id; ?>" <?php if(!empty($appointment) && $appointment['dentist_id'] == $dentist->id) { echo 'selected'; } ?> ><?php echo $dentist->name; ?></option>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <option value="" disabled selected>Não há dentistas cadastrados</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div>
                            <label class="block"></label>
                            <span class="block text-sm font-medium text-slate-700">
                                Descrição
                            </span>
                            <textarea rows="5" name="appointment_reason" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"><?php if(!empty($appointment['appointment_reason'])){ echo $appointment['appointment_reason'];} ?></textarea>
                        </div>

                        <div class="flex flex-row justify-end gap-4">
                            <a href="/" class="text-white bg-gray-400 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-md text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Cancelar</a>

                            <input type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer" value="Salvar"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>