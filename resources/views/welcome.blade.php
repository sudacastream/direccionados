<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Congreso Direccionados 2024</title>
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
    <body class="antialiased">
        <nav class="w-80 h-screen bg-verde z-50 fixed px-general" id="menu">
            <div class="w-full h-24 flex justify-between">
                <div class="grid content-center"><img src="{{ url('') }}/direccionados-white.svg" alt="Congreso Direccionados" height="30" width="59"></div>
                <div class="w-8 cursor-pointer grid content-center right-0" id="close-menu-btn">
                    <svg class="w-8 h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6m0 12L6 6"/>
                    </svg>
                </div>
            </div>
            <ul class="grid items-center font-climate uppercase text-white tracking-widest pt-8 gap-8">
                <li class="text-center"><a id="mvision" href="#vision">Vision</a></li>
                <li class="text-center"><a id="moradores" href="#oradores">Oradores</a></li>
                <li class="text-center"><a id="mlugar" href="#lugar">Lugar</a></li>
                <li class="text-center"><a id="mtickets" href="#tickets">Tickets</a></li>
                <li class="text-center"><a id="mfaq" href="#faq">FAQ</a></li>
                <li class="text-center mb-6">
                    <a class="flex items-center place-content-center" href="https://web.facebook.com/media/set/?set=a.760049462831275" target="_blank">
                        Alojamiento
                        <svg class="w-6 h-6 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778"/>
                        </svg>
                    </a>
                </li>
                <li class="text-center">
                    <a class="border px-6 py-4 rounded-full" href="{{ route('tienda') }}">Tienda</a>
                </li>
            </ul>
        </nav>
        <div class="w-full h-screen bg-black hidden z-40 backdrop-blur-sm bg-gray-700/30" id="backdrop"></div>
        <header class="w-full h-screen shadow-innerxl" style="background: url({{ url('') }}/bg.webp) no-repeat center top; background-size:cover;">
            <div id="sticky" class="w-full h-24 px-general flex justify-between z-30">
                <div class="grid content-center"><img src="{{ url('') }}/direccionados-white.svg" alt="Congreso Direccionados" height="45" width="89"></div>
                <ul class="hidden md:flex items-center gap-4 font-climate uppercase text-white tracking-widest text-sm">
                    <li><a id="lvision" href="#vision">Vision</a></li>
                    <li><a id="loradores" href="#oradores">Oradores</a></li>
                    <li><a id="llugar" href="#lugar">Lugar</a></li>
                    <li><a id="ltickets" href="#tickets">Tickets</a></li>
                    <li><a id="lfaq" href="#faq">FAQ</a></li>
                    <li>
                        <a class="flex items-center" href="https://web.facebook.com/media/set/?set=a.760049462831275" target="_blank">
                            Alojamiento
                            <svg class="w-6 h-6 ml-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778"/>
                            </svg>
                        </a>
                    </li>
                    <li id="btn-tienda" class="ml-3 bg-verde px-6 py-4 rounded-full">
                        <a href="{{ route('tienda') }}">Tienda</a>
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
        <main class="w-full grid">
            <section id="vision" class="px-general bg-white py-40 grid gap-y-6">
                <h2 class="mx-auto text-center text-xl md:text-2xl text-verde uppercase font-climate tracking-widest col-span-3">Vision</h2>
                <p class="mx-auto text-2xl w-full md:w-1/2 px-general text-center">Direccionados es un congreso nacional para j&oacute;venes de visi&oacute;n apost&oacute;lica y prof&eacute;tica que naci&oacute; en el coraz&oacute;n de Dios, para activar j&oacute;venes en sus prop&oacute;sitos y en el camino que Dios traz&oacute; para sus vidas a trav&eacute;s de la Palabra, la comuni&oacute;n con otros j&oacute;venes y el mover de la presencia del Esp&iacute;ritu Santo.</p>
            </section>
            <section id="oradores" class="px-general bg-gray-50 py-40 grid gap-10 grid-cols-1 md:grid-cols-3">
                <h2 class="mx-auto text-center text-xl md:text-2xl text-verde uppercase font-climate tracking-widest cols-span-1 md:col-span-3">Oradores</h2>
                <article class="gap-4">
                    <img class="w-1/2 mb-3 mx-auto" src="{{ url('') }}/carlos-schultz.webp" alt="Ap&oacute;stol Carlos Schultz">
                    <h3 class="mb-4 mx-auto text-center text-xl font-climate text-verde uppercase"><span class="font-cute text-2xl">Apostol</span><br>Carlos Schultz</h3>
                    <div class="flex gap-3 place-content-center text-sm text-gray-700"><div class="h-5 w-5 rounded-full"><img class="h-5 w-5 rounded-full" src="{{ url ('') }}/argentina.webp" alt="Rep&uacute;blica Argentina"></div><span>Paran&aacute;, Entre R&iacute;os</span></div>
                    <p class="my-2.5 px-3 text-sm text-center">Ap&oacute;stol y Pastor principal de la Iglesia Vida y Esperanza, colabora como presidente de la Asociaci&oacute;n de Pastores de Entre R&iacute;os y el Consejo Pastoral de Paran&aacute;.</p>
                </article>
                <article class="gap-4">
                    <img class="w-1/2 mb-3 mx-auto" src="{{ url('') }}/veronica-lugo.webp" alt="Profeta Ver&oacute;nica Lugo">
                    <h3 class="mb-4 mx-auto text-center text-xl font-climate text-verde uppercase"><span class="font-cute text-2xl">Profeta</span><br>Ver&oacute;nica Lugo</h3>
                    <div class="flex gap-3 place-content-center text-sm text-gray-700"><div class="h-5 w-5 rounded-full"><img class="h-5 w-5 rounded-full" src="{{ url ('') }}/argentina.webp" alt="Rep&uacute;blica Argentina"></div><span>San Nicol&aacute;s de los Arroyos, Buenos Aires</span></div>
                    <p class="my-2.5 px-3 text-sm text-center">Profeta y Maestra de la Palabra; directora y fundadora de la Fundaci&oacute;n Red Beraca (de enseñanza y capacitaci&oacute;n ministerial y apost&oacute;lica).</p>
                </article>
                <article class="gap-4">
                    <img class="w-1/2 mb-3 mx-auto" src="{{ url('') }}/david-sensini.webp" alt="Pastor David Sensini">
                    <h3 class="mb-4 mx-auto text-center text-xl font-climate text-verde uppercase"><span class="font-cute text-2xl">Pastor</span><br>David Sensini</h3>
                    <div class="flex gap-3 place-content-center text-sm text-gray-700"><div class="h-5 w-5 rounded-full"><img class="h-5 w-5 rounded-full" src="{{ url ('') }}/argentina.webp" alt="Rep&uacute;blica Argentina"></div><span>Rosario, Santa Fe</span></div>
                    <p class="my-2.5 px-3 text-sm text-center">Pastor de la Iglesia Redil de Cristo, lleva adelante el ministerio empresarial y de emprendedores en la Rep&uacute;blica Argentina.</p>
                </article>
            </section>
            
            <section id="lugar" class="px-general bg-white py-40 grid grid-cols-1 gap-y-10">
                <h2 class="mx-auto text-center text-xl md:text-2xl text-verde uppercase font-climate tracking-widest cols-span-1 md:col-span-2">Lugar</h2>
                <div class="grid gap-8 grid-cols-1 md:grid-cols-2 px-8 md:px-0">
                    <div class="rounded-lg aspect-video" style="background: url({{ url('') }}/estadio-parque-sur.webp) center center; background-size:cover;">
                        <div class="bg-azul rounded-lg grid place-content-center p-4 aspect-video">
                            <img class="w-1/3 mx-auto aspect-square rounded-full" src="{{ url('') }}/club-parque-sur.webp" alt="Club Parque Sur">
                        </div>
                    </div>
                    <div class="grid content-center gap-4">
                        <h3 class="text-verde uppercase text-xl font-climate"><span class="text-2xl font-cute">Estadio Cubierto</span><br>Club Parque Sur</h3>
                        <p>Conocido como "Gigante del Sur", se encuentra ubicado en la esquina de Cochabamba y Artigas de la Ciudad de Concepci&oacute;n del Uruguay.</p>
                        <div class="mt-4 flex uppercase">
                            <a href="https://maps.app.goo.gl/tsgyQGGKjQokVBY58" class="text-white bg-verde hover:bg-verde-800 focus:outline-none font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex" target="_blank">
                                Ver en el mapa
                                <svg class="w-5 h-5 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778"/>
                                </svg>
                            </a>
                            <a href="https://web.facebook.com/media/set/?set=a.760049462831275" class="hover:underline text-verde focus:outline-none font-medium rounded-full text-sm ml-5 py-2.5 text-center inline-flex" target="_blank">
                                Ver alojamiento
                                <svg class="w-5 h-5 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <section id="tickets" class="px-general bg-gray-50 py-40 grid grid-cols-1 gap-y-6">
                <h2 class="mx-auto text-center text-xl md:text-2xl text-verde uppercase font-climate tracking-widest col-span-3">Tickets</h2>
                <div class="grid md:flex place-content-center gap-4">
                    <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold leading-none text-gray-900">Tickets</h3>
                            <a href="{{ route('tienda') }}" class="text-sm font-medium text-verde hover:underline">
                                Ir a la tienda
                            </a>
                        </div>
                        <div class="flow-root">
                            <ul role="list" class="divide-y divide-gray-200">
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img class="w-8 h-8 rounded-full" src="{{ url('') }}/preventa.webp" alt="Preventa">
                                        </div>
                                        <div class="flex-1 min-w-0 ms-4">
                                            <p class="text-sm font-medium text-gray-900 truncate">
                                                Preventa (primer tanda)
                                            </p>
                                            <p class="text-sm text-gray-500 truncate">
                                                <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                    <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                                                    Agotado
                                                </span>
                                            </p>
                                        </div>
                                        <div class="inline-flex items-center text-base font-semibold text-gray-900 line-through">
                                            $3000
                                        </div>
                                    </div>
                                </li>
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center ">
                                        <div class="flex-shrink-0">
                                            <img class="w-8 h-8 rounded-full" src="{{ url('') }}/preventa.webp" alt="Preventa">
                                        </div>
                                        <div class="flex-1 min-w-0 ms-4">
                                            <p class="text-sm font-medium text-gray-900 truncate">
                                                Preventa (segunda tanda)
                                            </p>
                                            <p class="text-sm text-gray-500 truncate">
                                                <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                    <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                                                    Agotado
                                                </span>
                                            </p>
                                        </div>
                                        <div class="inline-flex items-center text-base font-semibold text-gray-900 line-through">
                                            $4500
                                        </div>
                                    </div>
                                </li>
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img class="w-8 h-8 rounded-full" src="{{ url('') }}/general.webp" alt="General">
                                        </div>
                                        <div class="flex-1 min-w-0 ms-4">
                                            <p class="text-sm font-medium text-gray-900 truncate">
                                                General
                                            </p>
                                            <p class="text-sm text-gray-500 truncate">
                                                <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                    <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                                                    Agotado
                                                </span>
                                            </p>
                                        </div>
                                        <div class="inline-flex items-center text-base font-semibold text-gray-900 line-through">
                                            $6500
                                        </div>
                                    </div>
                                </li>
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center ">
                                        <div class="flex-shrink-0">
                                            <img class="w-8 h-8 rounded-full" src="{{ url('') }}/general.webp" alt="General">
                                        </div>
                                        <div class="flex-1 min-w-0 ms-4">
                                            <p class="text-sm font-medium text-gray-900 truncate">
                                                General
                                            </p>
                                            <p class="text-sm text-gray-500 truncate">
                                                <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                    <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                                                    Disponible hasta el 5/5.
                                                </span>
                                            </p>
                                        </div>
                                        <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                            $8000
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="flex items-center justify-end md:mt-5">
                            <a href="{{ route('tienda') }}" class="text-white bg-verde hover:bg-verde-800 focus:outline-none font-medium rounded-full text-sm px-5 py-2.5 text-center">Comprar</a>
                        </div>
                    </div>
                    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <div class="px-6">
                            <a href="{{ route('tienda') }}">
                                <img class="p-8 rounded-t-lg" src="{{ url('') }}/combo.webp" alt="Remera y Ticket" />
                            </a>
                        </div>
                        <div class="px-5 pb-5">
                            <a href="{{ route('tienda') }}">
                                <h3 class="text-xl font-semibold tracking-tight text-gray-900">Combo Direccionado (Ticket y Remera)</h3>
                            </a>
                            <div class="flex items-center mt-2.5 mb-5">                    
                                <span class="inline-flex items-center bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                    <span class="w-2 h-2 me-1 bg-yellow-500 rounded-full"></span>
                                    Hasta agotar stock
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-3xl font-bold text-gray-900">$17000</span>
                                <a href="{{ route('tienda') }}" class="text-white bg-verde hover:bg-verde-800 focus:outline-none font-medium rounded-full text-sm px-5 py-2.5 text-center">Comprar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="faq" class="px-general bg-white py-40 grid gap-6">
                <h2 class="mx-auto text-center text-xl md:text-2xl text-verde uppercase font-climate tracking-widest">Preguntas frecuentes</h2>
                <div class="w-full grid gap-6">
                    <div class="w-full md:w-2/3 mx-auto md:text-lg grid gap-2">
                        <h3 class="font-bold text-verde">Tickets y Remeras</h3>
                        <div id="tickets" data-accordion="collapse" data-active-classes="text-verde underline" data-inactive-classes="text-gray-500">
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
                                    Podr&aacute;s comprar los tickets y remeras a trav&eacute;s de nuestra <a href="{{ route('tienda') }}" class="text-verde underline">tienda</a>. Ten&eacute; en cuenta que es el &uacute;nico punto de venta habilitado.
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
                                    Si. Se podr&aacute;n transferir los tickets hasta el d&iacute;a previo al congreso. Para ello, deber&aacute;s enviar un correo electr&oacute;nico a <a class="text-verde underline" href="mailto:registro@direccionados.ar" target="_blank">registro@direccionados.ar</a> para que un asesor te contacte y efect&uacute;e el traspaso.
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
                                    Tenemos para ofrecer los talles L, XL, 2XL y talle especial; en colores negro (con inscripciones en blanco) y blanco (con inscripciones en negro).
                                    Ten&eacute; en cuenta que el stock disponible es de 50 unidades.
                                </div>
                            </div>
                        </div>
                        <h3 class="font-bold text-verde mt-6">Ingreso al lugar</h3>
                        <div id="ingreso" data-accordion="collapse" data-active-classes="text-verde underline" data-inactive-classes="text-gray-500">
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
                        <p class="text-gray-800 mt-6">Si ten&eacute;s alguna duda, inquietud o sugerencia, no dudes en escribirnos a <a class="text-verde underline" href="mailto:info@direccionados.ar" target="_blank">info@direccionados.ar</a>.</p>
                    </div>
                </div>
            </section>
        </main>
        <footer class="text-sm px-general grid grid-cols-1 text-center md:flex place-content-between py-12 border-t gap-4">
            <div>&copy;2024 Congreso Direccionados - Todos los derechos reservados.</div>
            <div>Desarrollado por <a class="font-semibold hover:text-verde hover:underline" href="https://instagram.com/sudacastream" target="_blank">Sudaca Stream</a>.</div>
        </footer>
        <div id="toast-notification" class="w-full fixed z-50 bottom-5 right-5 max-w-xs p-4 text-gray-900 bg-white rounded-lg shadow border" role="alert">
            <div class="flex items-center mb-3">
                <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">Notificación</span>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white justify-center items-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-notification" aria-label="Close">
                    <span class="sr-only">Cerrar</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <div class="flex items-center">
                <div class="relative inline-block shrink-0">
                    <div class="w-12 h-12 rounded-full bg-verde grid place-content-center">
                        <span class="text-white text-lg font-bold">3X2</span>
                        <!--<img src="{{ url('') }}/direccionados-white.svg" alt="Congreso Direccionados" height="32" width="32">-->
                    </div>
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center text-right translate-x-2 w-5 h-5 bg-greens-500 rounded-full">
                        <svg class="w-6 h-6 text-naranja" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.597 3.2A1 1 0 0 0 7.04 4.289a3.49 3.49 0 0 1 .057 1.795 3.448 3.448 0 0 1-.84 1.575.999.999 0 0 0-.077.094c-.596.817-3.96 5.6-.941 10.762l.03.049a7.73 7.73 0 0 0 2.917 2.602 7.617 7.617 0 0 0 3.772.829 8.06 8.06 0 0 0 3.986-.975 8.185 8.185 0 0 0 3.04-2.864c1.301-2.2 1.184-4.556.588-6.441-.583-1.848-1.68-3.414-2.607-4.102a1 1 0 0 0-1.594.757c-.067 1.431-.363 2.551-.794 3.431-.222-2.407-1.127-4.196-2.224-5.524-1.147-1.39-2.564-2.3-3.323-2.788a8.487 8.487 0 0 1-.432-.287Z"/>
                        </svg>                          
                        <!--<svg class="w-5 h-5 text-naranja" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                        </svg>-->
                    </span>
                </div>
                <div class="ms-3 text-sm font-normal">
                    <!--<div class="text-sm font-semibold text-gray-900">¡Faltan {{ \Carbon\Carbon::parse('2024-05-18 09:00 GMT-0300')->diffInDays() }} d&iacute;as!</div>
                    <div class="text-sm font-normal">No te olvides de sacar tu ticket.</div> 
                    <span class="text-xs font-medium text-verde">
                        <a href="{{ route('tienda') }}">
                            Ir a la tienda
                            <svg class="w-4 h-4 inline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                            </svg>                              
                        </a>
                    </span>-->
                    <div class="text-sm font-semibold text-gray-900">¡3X2 en tickets</div>
                    <div class="text-sm font-normal">Compr&aacute; 3 tickets y pag&aacute; 2.</div> 
                    <span class="text-xs font-medium text-verde">
                        {{ \Carbon\Carbon::parse('2024-04-15 00:00 GMT-0300')->diffForHumans() }}
                    </span>
                </div>
            </div>
        </div>
    </body>
</html>