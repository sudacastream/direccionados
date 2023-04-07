<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
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
                            Nombre completo y DNI
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Iglesia
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pastor
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
                                {{ $pago->apellidos }}, {{ $pago->nombres }} - {{ $pago->dni }}                                
                                @if($pago->funcion == 'pastor')
                                <i class="fa-solid fa-user-tie pt-1 ml-3 text-yellow-600"></i>
                                @elseif($pago->funcion == 'lider')
                                <i class="fa-solid fa-user-check pt-1 ml-3 text-blue-900"></i>
                                @endif
                            </th>
                            <td class="px-6 py-4">
                                {{ $pago->congregacion }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pago->pastor }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pago->ciudad }}, {{ $pago->provincia }}
                            </td>
                            <td class="px-6 py-4">
                                @if($pago->pago)
                                <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">
                                    <span class="hidden md:inline-block"></span>
                                </span>
                                @else
                                <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">
                                    <span class="hidden md:inline-block"></span>
                                </span>
                                @endif
                            </td>
                        </tr>
                        @else
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $pago->apellidos }}, {{ $pago->nombres }} - {{ $pago->dni }}                          
                                @if($pago->funcion == 'pastor')
                                <i class="fa-solid fa-user-tie pt-1 ml-3 text-yellow-600"></i>
                                @elseif($pago->funcion == 'lider')
                                <i class="fa-solid fa-user-check pt-1 ml-3 text-blue-900"></i>
                                @endif
                            </th>
                            <td class="px-6 py-4">
                                {{ $pago->congregacion }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pago->pastor }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pago->ciudad }}, {{ $pago->provincia }}
                            </td>
                            <td class="px-6 py-4">
                                @if($pago->pago)
                                <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">
                                    <span class="hidden md:inline-block"></span>
                                </span>
                                @else
                                <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">
                                    <span class="hidden md:inline-block"></span>
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
