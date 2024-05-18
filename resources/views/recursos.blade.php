<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Recursos &#8226; Congreso Direccionados 2024</title>
        <meta name="title" content="Congreso Direccionados 2024" />
        <meta name="description" content="Congreso de Jóvenes Direccionados: 18 de mayo de 2024 en el Club Parque Sur de Concepci&oacute;n del Uruguay." />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://direccionados.ar/" />
        <meta property="og:title" content="Congreso Direccionados 2024" />
        <meta property="og:description" content="Congreso de Jóvenes Direccionados: 18 de mayo de 2024 en el Club Parque Sur de Concepci&oacute;n del Uruguay." />
        <meta property="og:image" content="https://direccionados.ar/congreso-direccionados.jpg" />
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:url" content="https://direccionados.ar/" />
        <meta property="twitter:title" content="Congreso Direccionados" />
        <meta property="twitter:description" content="Congreso de Jóvenes Direccionados: 18 de mayo de 2024 en el Club Parque Sur de Concepci&oacute;n del Uruguay." />
        <meta property="twitter:image" content="https://direccionados.ar/congreso-direccionados.jpg" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&family=Cute+Font&display=swap" rel="stylesheet">
    </head>
    <style>
        .font-climate
        {
            font-family: 'Climate Crisis', sans-serif;
        }
        .font-cute
        {
            font-family: 'Cute Font', sans-serif;
        }
    </style>
    <body class="w-full h-screen" style="background:url({{ url('') }}/bg-verde.webp) top center no-repeat;background-size:cover;">
        @isset($dni)
        @isset($user)
        <header class="text-white">
            <div id="sticky" class="w-full h-24 px-general flex justify-between z-30">
                <div class="flex items-center gap-6">
                    <img src="{{ url('') }}/direccionados-white.svg" alt="Congreso Direccionados" height="45" width="89">
                    <h1 class="font-climate text-xl">Recursos</h1>
                </div>
                <ul class="hidden md:flex items-center gap-4 font-climate uppercase text-white tracking-widest text-sm">
                    <li><a id="lcronograma" href="#cronograma">Cronograma</a></li>
                    <li><a id="lbosquejos" href="#bosquejos">Bosquejos</a></li>
                    <li><a id="lofrendas" href="#ofrendas">Ofrendas</a></li>
                    <li>
                        <a class="flex items-center" href="https://web.facebook.com/media/set/?set=a.760049462831275" target="_blank">
                            Alojamiento
                            <svg class="w-6 h-6 ml-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778"/>
                            </svg>
                        </a>
                    </li>
                </ul>
                <div class="grid md:hidden content-center">
                    <div class="w-10 h-10 cursor-pointer" id="menu-btn">
                        <svg class="w-10 h-10 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h10"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="w-full h-header grid place-items-center content-center gap-4">
                <span class="uppercase font-cute text-white text-2xl md:text-4xl">Congreso de Jovenes</span>
                <img class="w-10/12 md:w-1/2" src="{{ url('') }}/logotipo-direccionados.webp" alt="Congreso Direccionados">
                <span class="uppercase font-cute text-white text-2xl md:text-4xl">18 de Mayo de 2024 - Club Parque Sur</span>
            </div>
            <h1 class="w-full absolute bottom-0 text-center uppercase font-cute text-white text-xl tracking-widest">Congreso de Jovenes Direccionados</h1>
        </header>
        @endisset
        @empty($user)
        <main class="w-full h-screen grid place-content-center items-center gap-4">
            <div class="justify-between bg-white p-4 rounded-lg shadow grid gap-4">
                <h1 class="font-climate text-verde text-2xl text-center">Recursos</h1>
                <form action="{{ route('recursos') }}" method="POST">
                @csrf
                <label for="table-search" class="sr-only"></label>
                <div class="relative mt-1">
                    <button class="absolute inset-y-0 right-2 flex items-center cursor-pointer">
                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
                        </svg>                      
                    </button>
                    <input @isset($dni) value="{{ $dni }}" @endisset type="text" name="dni" required autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5 " placeholder="Ingrese su DNI (sin puntos)">
                </div>
                </form>
                <div class="flex box-border justify-center">
                    <span class="bg-yellow-200 text-yellow-600 px-3 py-2 rounded text-sm">
                        <svg class="inline w-3 h-3 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        {{ $status }}
                    </span>
                </div>
            </div>        
        </main>
        <aside class="fixed bottom-2 bg-gray-100 px-6 py-4 rounded-lg text-gray-700 text-sm left-1/2 -translate-x-1/2">
            <svg class="inline w-4 h-4 me-1 -mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            Los Recursos s&oacute;lo est&aacute;n disponibles para los asistentes al Congreso Direccionados.
        </aside>
        @endempty
        @endisset
        @empty($dni)
        <main class="w-full h-screen grid place-content-center items-center">
            <div class="justify-between bg-white p-4 rounded-lg shadow grid gap-4">
                <h1 class="font-climate text-verde text-2xl text-center">Recursos</h1>
                <form action="{{ route('recursos') }}" method="POST">
                @csrf
                <label for="table-search" class="sr-only"></label>
                <div class="relative mt-1">
                    <button class="absolute inset-y-0 right-2 flex items-center cursor-pointer">
                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
                        </svg>                      
                    </button>
                    <input type="text" name="dni" required autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-4 p-2.5 " placeholder="Ingrese su DNI (sin puntos)">
                </div>
                </form>
            </div>
        </main>
        <aside class="fixed bottom-2 bg-gray-100 px-6 py-4 rounded-lg text-gray-700 text-sm left-1/2 -translate-x-1/2">
            <svg class="inline w-4 h-4 me-1 -mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            Los Recursos s&oacute;lo est&aacute;n disponibles para los asistentes al Congreso Direccionados.
        </aside>
        @endempty
    </body>
</html>
