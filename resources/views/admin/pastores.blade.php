<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Listado de asistentes - Congreso Direccionados</title>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre completo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            DNI
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Iglesia
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Lugar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pago
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pagos as $pago)
                        @if($loop->iteration % 2 == 0)
                        <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $pago->apellidos }}, {{ $pago->nombres }}                                
                                @if($pago->funcion == 'pastor')
                                <span title="Pastor/a" class="inline-flex items-center bg-yellow-100 text-yellow-600 text-xs font-medium p-2.5 ml-2 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                                    <i class="fa-solid fa-user-tie"></i>
                                </span>
                                @elseif($pago->funcion == 'lider')
                                <span title="L&iacute;der" class="inline-flex items-center bg-blue-100 text-blue-600 text-xs font-medium p-2.5 ml-2 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                    <i class="fa-solid fa-user-check"></i>
                                </span>
                                @endif
                            </th>
                            <td class="px-6 py-4">
                                {{ $pago->dni }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pago->congregacion }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pago->ciudad }}, {{ $pago->provincia }}
                            </td>
                            <td class="px-6 py-4">
                                @if($pago->pago)
                                <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium p-2.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                    <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                </span>
                                @else                    
                                <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium p-2.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                    <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                </span>
                                @endif
                            </td>
                        </tr>
                        @else
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $pago->apellidos }}, {{ $pago->nombres }}                          
                                @if($pago->funcion == 'pastor')
                                <span title="Pastor/a" class="inline-flex items-center bg-yellow-100 text-yellow-600 text-xs font-medium p-2.5 ml-2 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                                    <i class="fa-solid fa-user-tie"></i>
                                </span>
                                @elseif($pago->funcion == 'lider')
                                <span title="L&iacute;der" class="inline-flex items-center bg-blue-100 text-blue-600 text-xs font-medium p-2.5 ml-2 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                    <i class="fa-solid fa-user-check"></i>
                                </span>
                                @endif
                            </th>
                            <td class="px-6 py-4">
                                {{ $pago->dni }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pago->congregacion }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pago->ciudad }}, {{ $pago->provincia }}
                            </td>
                            <td class="px-6 py-4">
                                @if($pago->pago)
                                <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium p-2.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                    <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                </span>
                                @else                    
                                <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium p-2.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                    <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                </span>
                                @endif
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
