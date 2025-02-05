<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Congreso Direccionados 2025</title>
        <meta name="title" content="Congreso Direccionados 2025" />
        <meta name="description" content="Congreso de Jóvenes Direccionados: 17 de mayo de 2025 en el Club Parque Sur de Concepci&oacute;n del Uruguay." />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://direccionados.ar/" />
        <meta property="og:title" content="Congreso Direccionados 2025" />
        <meta property="og:description" content="Congreso de Jóvenes Direccionados: 17 de mayo de 2024 en el Club Parque Sur de Concepci&oacute;n del Uruguay." />
        <meta property="og:image" content="https://direccionados.ar/congreso-direccionados.jpg" />
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:url" content="https://direccionados.ar/" />
        <meta property="twitter:title" content="Congreso Direccionados" />
        <meta property="twitter:description" content="Congreso de Jóvenes Direccionados: 17 de mayo de 2025 en el Club Parque Sur de Concepci&oacute;n del Uruguay." />
        <meta property="twitter:image" content="https://direccionados.ar/congreso-direccionados.jpg" />
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    </head>
    <style>
        .font-press
        {
            font-family: "Press Start 2P", serif;
            font-weight: 400;
            font-style: normal;
        }
    </style>
    <body class="antialiased" style="background:url(/bg.webp) center center no-repeat;background-size:cover;background-attachment: fixed;">
        <div class="w-full h-screen fixed z-40 inset-full flex" id="menu-content" style="background:url(/bg.webp) no-repeat center left;background-size:cover;">
            <nav class="w-full md:w-1/2 flex items-center h-full" id="menu-mobile">
                <ul class="grid uppercase tracking-widest font-press text-white font-semibold mx-auto text-lg text-center md:text-left">
                    <li class="hover:bg-transparente px-4 py-3 rounded"><a href="#vision" id="lvision">Vision</a></li>
                    <li class="hover:bg-transparente px-4 py-3 rounded"><a href="#oradores" id="loradores">Oradores</a></li>
                    <li class="hover:bg-transparente px-4 py-3 rounded"><a href="#lugar" id="llugar">Lugar</a></li>
                    <li class="hover:bg-transparente px-4 py-3 rounded"><a href="#tickets" id="ltickets">Tickets</a></li>
                    <li class="hover:bg-transparente px-4 py-3 rounded"><a href="#faq" id="lfaq">FAQ</a></li>
                    <li class="flex hover:bg-transparente px-4 py-3 rounded">
                        Alojamiento
                        <svg class="w-6 h-6 -mt-0.5 ml-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778"/>
                        </svg>
                    </li>
                </ul>
            </nav>
            <div class="w-full md:w-1/2 h-full hidden md:flex">
                <div class="w-full h-full" style="background:url(/frase.webp) no-repeat center center;background-size:75%;"></div>
            </div>
        </div>
        <div class="w-full h-nav px-general flex justify-between items-center border-white absolute z-50" id="navi">
            <div class="h-nav w-nav items-center flex gap-3 cursor-pointer" id="menu-icon">
                <div>
                    <div class="bg-white w-menuiconw h-menuiconh rounded mx-auto -translate-y-0.5" id="menu-1"></div>
                    <div class="bg-white w-menuiconw h-menuiconh rounded mx-auto translate-y-0.5" id="menu-2"></div>
                </div>
                <span class="text-xs font-bold tracking-widest uppercase text-white"></span>
            </div>
            <img class="h-nav py-2 hidden sm:inline" src="/direccionados-white.webp" alt="Isologo Direccionados" id="iso-top">
            <a href="/tienda" class="text-white uppercase tracking-widest font-bold text-xs px-5 py-2 md:text-sm rounded border-2 border-morado bg-morado hover:border-transparente hover:text-gray-50" id="b-tienda">Tienda</a>
        </div>
        <header class="w-full h-screen grid items-center shadow-inner">
            <h1 class="absolute bottom-2 w-full text-center uppercase text-white font-press text-xs tracking-widest">Congreso Direccionados</h1>
            <div class="w-full md:w-3/4 lg:w-2/3 px-general mx-auto text-white font-press uppercase tracking-widest text-center">
                <h2>Congreso de Jovenes</h2>
                <img class="my-6" src="/logotipo-direccionados.webp" alt="Logotipo Direccionados">
                <p class="text-xs">17 de Mayo de 2025<span class="hidden md:inline"> - </span><br class="inline md:hidden">Club Parque Sur</p>
            </div>
        </header>
        <section role="contentinfo" aria-label="Visión" id="vision" class="w-full bg-white px-general">
            <div class="py-32 w-full md:w-2/3 lg:w-1/2 mx-auto">
                <h3 class="font-bold font-press mx-auto text-center text-xl text-naranja uppercase font-climate tracking-widest mb-6">Vision</h3>
                <p class="text-3xl font-bold text-center text-gray-600">Direccionados es un congreso nacional para jóvenes de visión apostólica y profética que nació en el corazón de Dios, para activar jóvenes en sus propósitos y en el camino que Dios trazó para sus vidas a través de la Palabra, la comunión con otros jóvenes y el mover de la presencia del Espíritu Santo.</p>
            </div>
            <div class="w-full border-b"></div>
        </section>
        <section role="contentinfo" aria-label="Oradores" id="oradores" class="w-full bg-white px-general">
            <div class="py-24 w-full mx-auto">
                <h3 class="font-bold font-press mx-auto text-center text-xl text-naranja uppercase font-climate tracking-widest mb-6">Oradores</h3>
                <div class="w-full mb-6">
                    <div class="w-full md:w-2/3 lg:w-1/2 bg-slate-50 rounded shadow-sm p-4 flex mx-auto animate-pulse gap-6 mb-6">
                        <div class="rounded-full text-gray-100 aspect-square w-1/3 flex items-center">
                            <svg class="w-full aspect-square" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            </svg>
                        </div>
                        <div class="w-full grid">
                            <div class="bg-gray-100 h-6 w-48 rounded-full"></div>
                            <div class="bg-gray-100 h-4 w-24 rounded-full mb-4"></div>
                            <div class="bg-gray-100 h-3 w-48 rounded-full mb-4"></div>
                            <div class="bg-gray-100 h-3 w-full rounded-full"></div>
                            <div class="bg-gray-100 h-3 w-full rounded-full"></div>
                            <div class="bg-gray-100 h-3 w-1/2 rounded-full"></div>
                        </div>
                    </div>
                    <div class="w-full md:w-2/3 lg:w-1/2 bg-slate-50 rounded shadow-sm p-4 flex mx-auto animate-pulse gap-6 mb-6">
                        <div class="rounded-full text-gray-100 aspect-square w-1/3 flex items-center">
                            <svg class="w-full aspect-square" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            </svg>
                        </div>
                        <div class="w-full grid">
                            <div class="bg-gray-100 h-6 w-48 rounded-full"></div>
                            <div class="bg-gray-100 h-4 w-24 rounded-full mb-4"></div>
                            <div class="bg-gray-100 h-3 w-48 rounded-full mb-4"></div>
                            <div class="bg-gray-100 h-3 w-full rounded-full"></div>
                            <div class="bg-gray-100 h-3 w-full rounded-full"></div>
                            <div class="bg-gray-100 h-3 w-1/2 rounded-full"></div>
                        </div>
                    </div>
                    <div class="w-full md:w-2/3 lg:w-1/2 bg-slate-50 rounded shadow-sm p-4 flex mx-auto animate-pulse gap-6 mb-6">
                        <div class="rounded-full text-gray-100 aspect-square w-1/3 flex items-center">
                            <svg class="w-full aspect-square" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            </svg>
                        </div>
                        <div class="w-full grid">
                            <div class="bg-gray-100 h-6 w-48 rounded-full"></div>
                            <div class="bg-gray-100 h-4 w-24 rounded-full mb-4"></div>
                            <div class="bg-gray-100 h-3 w-48 rounded-full mb-4"></div>
                            <div class="bg-gray-100 h-3 w-full rounded-full"></div>
                            <div class="bg-gray-100 h-3 w-full rounded-full"></div>
                            <div class="bg-gray-100 h-3 w-1/2 rounded-full"></div>
                        </div>
                    </div>
                    <div class="w-full md:w-2/3 lg:w-1/2 bg-slate-50 rounded shadow-sm p-4 flex mx-auto animate-pulse gap-6">
                        <div class="rounded-full text-gray-100 aspect-square w-1/3 flex items-center">
                            <svg class="w-full aspect-square" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            </svg>
                        </div>
                        <div class="w-full grid">
                            <div class="bg-gray-100 h-6 w-48 rounded-full"></div>
                            <div class="bg-gray-100 h-4 w-24 rounded-full mb-4"></div>
                            <div class="bg-gray-100 h-3 w-48 rounded-full mb-4"></div>
                            <div class="bg-gray-100 h-3 w-full rounded-full"></div>
                            <div class="bg-gray-100 h-3 w-full rounded-full"></div>
                            <div class="bg-gray-100 h-3 w-1/2 rounded-full"></div>
                        </div>
                    </div>
                </div>
                <button type="button" class="mx-auto flex items-center px-4 py-2 font-semibold leading-6 text-sm text-gray-400 transition ease-in-out duration-150 cursor-not-allowed" disabled="">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Cargando informaci&oacute;n...
                </button>
            </div>
            <div class="w-full border-b"></div>
        </section>
        <section role="contentinfo" aria-label="Lugar" id="lugar" class="px-general bg-white grid gap-6">
            <div class="py-24 w-full mx-auto">
                <h3 class="mx-auto text-xl text-naranja uppercase font-press tracking-widest mb-6 text-center">Lugar</h3>    
                <div class="grid gap-8 grid-cols-1 md:grid-cols-2">
                    <div class="rounded-lg aspect-video" style="background: url({{ url('') }}/estadio-parque-sur.webp) center center; background-size:cover;">
                        <div class="rounded-lg grid place-content-center p-4 aspect-video" style="background-color:rgba(2,51,154,0.75);">
                            <img class="w-1/3 mx-auto aspect-square rounded-full" src="{{ url('') }}/club-parque-sur.webp" alt="Club Parque Sur">
                        </div>
                    </div>
                    <div class="grid content-center gap-4">
                        <h3 class="text-naranja uppercase text-xl font-bold"><span class="text-2xl font-cute">Estadio Cubierto</span><br>Club Parque Sur</h3>
                        <p>Conocido como "Gigante del Sur", se encuentra ubicado en la esquina de Cochabamba y Artigas de la Ciudad de Concepci&oacute;n del Uruguay.</p>
                        <div class="mt-4 flex uppercase">
                            <a href="https://maps.app.goo.gl/tsgyQGGKjQokVBY58" class="text-white bg-naranja hover:bg-verde-800 focus:outline-none font-medium rounded border-2 hover:underline border-naranja hover:border-transparente text-sm px-5 py-2.5 text-center inline-flex" target="_blank">
                                Ver en el mapa
                                <svg class="w-5 h-5 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778"/>
                                </svg>
                            </a>
                            <a href="https://web.facebook.com/media/set/?set=a.760049462831275" class="hover:underline text-naranja focus:outline-none font-medium rounded-full text-sm ml-5 py-2.5 text-center inline-flex" target="_blank">
                                Ver alojamiento
                                <svg class="w-5 h-5 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full border-b"></div>
        </section>
        <section role="contentinfo" aria-label="Tickets" id="tickets" class="px-general bg-white grid gap-6">
            <div class="w-full py-24">
                <h3 class="mx-auto text-center text-xl text-naranja uppercase font-press tracking-widest mb-6">Tickets</h3>
                <div class="w-full mb-6">
                    <div class="w-full md:w-2/3 grid grid-cols-2 lg:grid-cols-4 mx-auto gap-6 mb-6">
                        <article class="bg-slate-50 rounded shadow-sm p-4">
                            <div class="w-full aspect-square rounded flex items-center justify-center" style="background:url(/preventa.webp) no-repeat center center;background-size:cover;"></div>
                            <div class="w-full grid gap-2 justify-center">
                                <h1 class="text-center text-sm"><span class="font-bold text-lg">Preventa</span><br>(primera tanda)</h1>
                                <p class="text-sm text-gray-500 truncate text-center">
                                    <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                        <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                                        Agotado
                                    </span>
                                </p>
                                <span class="text-center text-2xl font-bold my-3 line-through">$6000</span>
                                @if(1==2)
                                <a href="#" class="text-white uppercase tracking-widest font-bold text-xs px-5 py-2 md:text-sm rounded border-2 border-morado bg-morado hover:border-transparente hover:text-gray-50">Comprar</a>-->
                                @endif
                                <a href="#" class="opacity-25 cursor-not-allowed text-white uppercase tracking-widest font-bold text-xs px-5 py-2 md:text-sm rounded border-2 border-morado bg-morado hover:border-transparente hover:text-gray-50">Comprar</a>
                            </div>
                        </article>
                        <article class="bg-slate-50 rounded shadow-sm p-4">
                            <div class="w-full aspect-square rounded flex items-center justify-center" style="background:url(/preventa.webp) no-repeat center center;background-size:cover;"></div>
                            <div class="w-full grid gap-2 justify-center">
                                <h1 class="text-center text-sm"><span class="font-bold text-lg">Preventa</span><br>(segunda tanda)</h1>
                                <p class="text-sm text-gray-500 truncate text-center">
                                    <span class="inline-flex items-center bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                        <span class="w-2 h-2 me-1 bg-yellow-500 rounded-full"></span>
                                        Proximamente
                                    </span>
                                </p>
                                <span class="text-center text-2xl font-bold my-3 line-through">$9000</span>
                                <a href="#" class="opacity-25 cursor-not-allowed text-white uppercase tracking-widest font-bold text-xs px-5 py-2 md:text-sm rounded border-2 border-morado bg-morado hover:border-transparente hover:text-gray-50">Comprar</a>
                            </div>
                        </article>
                        <article class="bg-slate-50 rounded shadow-sm p-4">
                            <div class="w-full aspect-square rounded flex items-center justify-center" style="background:url(/general.webp) no-repeat center center;background-size:cover;"></div>
                            <div class="w-full grid gap-2 justify-center">
                                <h1 class="text-center text-sm"><span class="font-bold text-lg">General</span><br>&nbsp;</h1>
                                <p class="text-sm text-gray-500 truncate text-center">
                                    <span class="inline-flex items-center bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                        <span class="w-2 h-2 me-1 bg-yellow-500 rounded-full"></span>
                                        Proximamente
                                    </span>
                                </p>
                                <span class="text-center text-2xl font-bold my-3 line-through">$13000</span>
                                <a href="#" class="opacity-25 cursor-not-allowed text-white uppercase tracking-widest font-bold text-xs px-5 py-2 md:text-sm rounded border-2 border-morado bg-morado hover:border-transparente hover:text-gray-50">Comprar</a>
                            </div>
                        </article>
                        <article class="bg-slate-50 rounded shadow-sm p-4">
                            <div class="w-full aspect-square rounded flex items-center justify-center" style="background:url(/general.webp) no-repeat center center;background-size:cover;"></div>
                            <div class="w-full grid gap-2 justify-center">
                                <h1 class="text-center text-sm"><span class="font-bold text-lg">General</span><br>&nbsp;</h1>
                                <p class="text-sm text-gray-500 truncate text-center">
                                    <span class="inline-flex items-center bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                        <span class="w-2 h-2 me-1 bg-yellow-500 rounded-full"></span>
                                        Proximamente
                                    </span>
                                </p>
                                <span class="text-center text-2xl font-bold my-3 line-through">$16000</span>
                                <a href="#" class="opacity-25 cursor-not-allowed text-white uppercase tracking-widest font-bold text-xs px-5 py-2 md:text-sm rounded border-2 border-morado bg-morado hover:border-transparente hover:text-gray-50">Comprar</a>
                            </div>
                        </article>
                    </div>
                    <div class="w-full md:w-2/3 flex justify-center mx-auto mb-6">
                        <article class="w-full bg-slate-50 rounded shadow-sm p-4 grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <div class="w-full aspect-square rounded items-center justify-center col-span-1" style="background:url(/combo.webp) no-repeat center center;background-size:contain;"></div>
                            <div class="w-full grid gap-2 col-span-2">
                                <h1 class="text-sm"><span class="font-bold text-lg">Combo Direccionado</span><br>(ticket y remera)</h1>
                                <p>
                                    Tenemos para ofrecer los talles L, XL, 2XL y talle especial; en color blanco con diseño exclusivo de D25.
                                    Ten&eacute; en cuenta que el stock disponible es limitado.
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    <span class="inline-flex items-center bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                        <span class="w-2 h-2 me-1 bg-yellow-500 rounded-full"></span>
                                        Proximamente
                                    </span>
                                </p>
                                <div class="flex justify-between items-center">
                                    <span class="text-2xl font-bold my-3 line-through">$00000</span>
                                    <div><a href="#" class="opacity-25 cursor-not-allowed text-white uppercase tracking-widest font-bold text-xs px-5 py-2 md:text-sm rounded border-2 border-morado bg-morado hover:border-transparente hover:text-gray-50">Comprar</a></div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <div class="w-full border-b"></div>
        </section>
        <section role="contentinfo" aria-label="Preguntas frecuentes" id="faq" class="px-general bg-white py-40 grid gap-6">
            <h3 class="mx-auto text-center text-xl text-naranja uppercase font-press tracking-widest">Preguntas frecuentes</h3>
            <div class="w-full grid gap-6">
                <div class="w-full md:w-2/3 mx-auto md:text-lg grid gap-2">
                    <h3 class="font-bold text-gray-700">Tickets y Remeras</h3>
                    <div id="tickets" data-accordion="collapse" data-active-classes="text-naranja underline" data-inactive-classes="text-gray-500">
                        <h2 id="tickets-heading-1">
                            <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-gray-500 border-b border-gray-200 gap-3" data-accordion-target="#tickets-body-1" aria-expanded="false" aria-controls="tickets-body-1">
                                <span class="flex gap-2"><svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="inline text-left">¿Donde puedo comprar los tickets y remeras?</span></span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="tickets-body-1" class="hidden" aria-labelledby="tickets-heading-1">
                            <div class="py-5 border-b border-gray-200 px-4">
                                Podr&aacute;s comprar los tickets y remeras a trav&eacute;s de nuestra <a href="/tienda" class="text-naranja underline">tienda</a>. Ten&eacute; en cuenta que es el &uacute;nico punto de venta habilitado.
                            </div>
                        </div>
                        <h2 id="tickets-heading-2">
                            <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-gray-500 border-b border-gray-200 gap-3" data-accordion-target="#tickets-body-2" aria-expanded="false" aria-controls="tickets-body-2">
                                <span class="flex gap-2"><svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="inline text-left">¿C&oacute;mo puedo abonar los tickets y remeras?</span></span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="tickets-body-2" class="hidden" aria-labelledby="tickets-heading-2">
                            <div class="py-5 border-b px-4">
                                Podr&aacute;s abonar los tickets y remeras mediante transferencia a una cuenta de Mercado Pago. Los datos de la cuenta se te enviar&aacute;n por mail con el detalle de la compra y el monto total a abonar.
                            </div>
                        </div>
                        <h2 id="tickets-heading-3">
                            <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-gray-500 border-b border-gray-200 gap-3" data-accordion-target="#tickets-body-3" aria-expanded="false" aria-controls="tickets-body-3">
                                <span class="flex gap-2"><svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="inline text-left">¿Los ni&ntilde;os deber&aacute;n abonar el ticket?</span></span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="tickets-body-3" class="hidden" aria-labelledby="tickets-heading-3">
                            <div class="py-5 border-b px-4">
                                Deber&aacute;n abonar el costo total del ticket los ni&ntilde;os a partir de los 4 a&ntilde;os y aquellos menores de 4 a&ntilde;os que ocupen asiento.
                            </div>
                        </div>
                        <h2 id="tickets-heading-4">
                            <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-gray-500 border-b border-gray-200 gap-3" data-accordion-target="#tickets-body-4" aria-expanded="false" aria-controls="tickets-body-4">
                                <span class="flex gap-2"><svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="inline text-left">¿Puedo transferir mi ticket a otra persona?</span></span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="tickets-body-4" class="hidden" aria-labelledby="tickets-heading-4">
                            <div class="py-5 border-b px-4">
                                Si. Se podr&aacute;n transferir los tickets hasta el d&iacute;a previo al congreso. Para ello, deber&aacute;s enviar un correo electr&oacute;nico a <a class="text-naranja underline" href="mailto:registro@direccionados.ar" target="_blank">registro@direccionados.ar</a> para que un asesor te contacte y efect&uacute;e el traspaso.
                            </div>
                        </div>
                        <h2 id="remeras-heading-4">
                            <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-gray-500 border-b border-gray-200 gap-3" data-accordion-target="#remeras-body-4" aria-expanded="false" aria-controls="remeras-body-4">
                                <span class="flex gap-2"><svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="inline text-left">¿C&oacute;mo, donde y cu&aacute;ndo se entregar&aacute;n las remeras?</span></span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="remeras-body-4" class="hidden" aria-labelledby="remeras-heading-4">
                            <div class="py-5 border-b px-4">
                                Las remeras se entregar&aacute;n de manera presencial con el Token Pass en el stand de Merchandising el d&iacute;a del congreso.
                            </div>
                        </div>                            
                        <h2 id="remeras-heading-3">
                            <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-gray-500 border-b border-gray-200 gap-3" data-accordion-target="#remeras-body-3" aria-expanded="false" aria-controls="remeras-body-3">
                                <span class="flex gap-2"><svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="inline text-left">¿Que talles y colores de remeras hay disponibles?</span></span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="remeras-body-3" class="hidden" aria-labelledby="remeras-heading-3">
                            <div class="py-5 border-b px-4">
                                Tenemos para ofrecer los talles L, XL, 2XL y talle especial; en color blanco con diseño exclusivo de D25.
                                Ten&eacute; en cuenta que el stock disponible es limitado.
                            </div>
                        </div>
                    </div>
                    <h3 class="font-bold text-gray-700 mt-6">Ingreso al lugar</h3>
                    <div id="ingreso" data-accordion="collapse" data-active-classes="text-naranja underline" data-inactive-classes="text-gray-500">
                        <h2 id="ingreso-heading-1">
                            <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-gray-500 border-b border-gray-200 gap-3" data-accordion-target="#ingreso-body-1" aria-expanded="false" aria-controls="ingreso-body-1">
                                <span class="flex gap-2"><svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="inline text-left">¿Qu&eacute; necesit&aacute;s para ingresar al congreso?</span></span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="ingreso-body-1" class="hidden" aria-labelledby="ingreso-heading-1">
                            <div class="py-5 border-b border-gray-200 px-4">
                                Para ingresar al congreso tendr&aacute;s que tener el ticket en tu celular o impreso. En la puerta, el equipo de admisi&oacute;n escanear&aacute; el c&oacute;digo con el Token Pass para validar tu ticket y brindarte la pulsera de acceso. Record&aacute; tambi&eacute;n tener a mano tu DNI por si te lo piden.
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-800 mt-6">Si ten&eacute;s alguna duda, inquietud o sugerencia, no dudes en escribirnos a <a class="text-naranja underline" href="mailto:info@direccionados.ar" target="_blank">info@direccionados.ar</a>.</p>
                </div>
            </div>
        </section>
        <footer class="w-full bg-naranja">
            <div class="bg-transparente text-white grid md:flex gap-6 md:justify-between items-center place-items-center px-general py-12">
                <div class="grid md:flex items-center gap-6 place-items-center">
                    <div class="w-24">
                        <img src="/direccionados-white.webp" alt="Isologo Direccionados">
                    </div>
                    <div class="text-xs text-center md:text-left">© Copyright 2023-2025 Congreso Direccionados. <br>Todos los derechos reservados.</div>
                </div>
                <button id="ltop" class="text-sm flex items-center gap-2 font-semibold px-3 py-2 rounded-sm border-white border-2 hover:bg-alpha transition-all ease-in-out">
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                    </svg>
                </button>
            </div>
            <div class="text-gray-50 text-sm px-general py-4 font-semibold text-center md:text-left">Desarrollado por <a href="https://instagram.com/sudacastream" target="_blank" class="hover:underline" aria-label="Sudaca Stream en Instagram">Sudacastream</a></div>
        </footer>
    </body>
</html>