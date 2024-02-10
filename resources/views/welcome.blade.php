<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Congreso Direccionados 2024</title>
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
        <header class="w-full h-screen shadow-innerxl" style="background: url({{ url('') }}/bg.jpg) no-repeat center top; background-size:cover;">
            <div class="w-full h-24 px-general flex justify-between">
                <div class="grid content-center"><img src="{{ url('') }}/direccionados-white.png" alt="Congreso Direccionados" height="45" width="89"></div>
                <ul class="hidden md:flex items-center gap-4 font-climate uppercase text-white tracking-widest">
                    <li>Vision</li>
                    <li><a id="loradores" href="#oradores">Oradores</a></li>
                    <li><a id="llugar" href="#lugar"></a>Lugar</li>
                    <li>Ticket</li>
                    <li><a id="lfaq" href="#faq">FAQ</a></li>
                    <li class="ml-3 bg-verde px-6 py-4 rounded-full">
                        <a href="{{ route('tienda') }}">Tienda</a>
                    </li>
                </ul>
            </div>
            <div class="w-full h-header grid place-items-center content-center gap-4">
                <img class="w-10/12 md:w-1/2" src="{{ url('') }}/logotipo-direccionados.png" alt="Congreso Direccionados">
                <span class="uppercase font-cute text-white text-2xl md:text-4xl">18 de Mayo de 2024 - Club Parque Sur</span>
            </div>
            <h1 class="w-full absolute bottom-0 text-center uppercase font-cute text-white text-xl tracking-widest">Congreso de Jovenes Direccionados</h1>
        </header>
        <main class="w-full grid">
            <section id="vision" class="px-general bg-gray-50 py-24 grid">
                <h2 class="animate-pulse mx-auto text-center text-xl md:text-2xl text-verde uppercase font-climate tracking-widest col-span-3">Vision</h2>
                
            </section>
            <section id="oradores" class="px-general bg-gray-50 py-24 grid gap-10 grid-cols-3">
                <h2 class="animate-pulse mx-auto text-center text-xl md:text-2xl text-verde uppercase font-climate tracking-widest col-span-3">Oradores</h2>
                <article class="animate-pulse gap-4">
                    <svg class="w-1/2 mb-3 text-gray-200 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    </svg>
                    <div class="h-6 bg-gray-300 rounded-full w-2/3 mb-4 mx-auto"></div>
                    <div class="h-4 bg-gray-200 rounded-full mb-2.5"></div>
                    <div class="h-4 bg-gray-200 rounded-full mb-2.5"></div>
                    <div class="h-4 bg-gray-200 rounded-full w-2/3"></div>
                </article>
                <article class="animate-pulse gap-4">
                    <svg class="w-1/2 mb-3 text-gray-200 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    </svg>
                    <div class="h-6 bg-gray-300 rounded-full w-2/3 mb-4 mx-auto"></div>
                    <div class="h-4 bg-gray-200 rounded-full mb-2.5"></div>
                    <div class="h-4 bg-gray-200 rounded-full mb-2.5"></div>
                    <div class="h-4 bg-gray-200 rounded-full w-2/3"></div>
                </article>
                <article class="animate-pulse gap-4">
                    <svg class="w-1/2 mb-3 text-gray-200 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    </svg>
                    <div class="h-6 bg-gray-300 rounded-full w-2/3 mb-4 mx-auto"></div>
                    <div class="h-4 bg-gray-200 rounded-full mb-2.5"></div>
                    <div class="h-4 bg-gray-200 rounded-full mb-2.5"></div>
                    <div class="h-4 bg-gray-200 rounded-full w-2/3"></div>
                </article>
            </section>
            <section id="faq" class="px-general bg-white py-24 grid gap-6">
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
    </body>
</html>