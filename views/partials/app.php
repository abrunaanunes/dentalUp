<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard</title>
        <link rel="stylesheet" href="/public/css/dashboard.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <div class="bg-gray-100 relative">
            <nav class="bg-emerald-600 border-b border-gray-100 text-white sticky z-50 top-0">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="w-full flex justify-between h-16">
                        <div class="w-full flex justify-between items-center">
                            <!-- Logo -->
                            <div class="flex-shrink-0 flex items-center">
                                <a href="/dashboard">
                                    <img src="../public/img/dentalup_logo.png" class="w-6/12">
                                </a>
                            </div>
                            <!-- Navigation Links -->
                            <div class="hidden space-x-6 sm:-my-px sm:ml-10 sm:flex">
                                <a class="inline-flex items-center px-1 pt-1 border-b-3 border-transparent text-sm font-medium leading-5 text-white focus:outline-none focus:text-w6-700 focus:border-white transition" href="/client"> Clientes </a>
                                
                                <a class="inline-flex items-center px-1 pt-1 border-b-3 border-transparent text-sm font-medium leading-5 text-white focus:outline-none focus:text-w6-700 focus:border-white transition" href="/dentist"> Dentistas </a>

                                <a class="inline-flex items-center px-1 pt-1 border-b-3 border-transparent text-sm font-medium leading-5 text-white focus:outline-none focus:text-w6-700 focus:border-white transition" href="/appointment"> Consultas </a>

                                <a class="inline-flex items-center px-1 pt-1 border-b-3 border-transparent text-sm font-medium leading-5 text-white focus:outline-none focus:text-w6-700 focus:border-white transition" href="#"> Agenda </a>

                                <a class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white hover:text-w6-800 focus:outline-none transition" href="/logout" style="background-color: #33967f"> Sair </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <style>
            .bg-emerald-600 {
                background-color: #58af9b !important;
            }
        </style>
        <script src="https://kit.fontawesome.com/63b2114156.js" crossorigin="anonymous"></script>
    </body>
</html>
