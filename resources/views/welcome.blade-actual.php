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
        <meta property="og:description" content="Congreso de Jóvenes Direccionados: 17 de mayo de 2025 en el Club Parque Sur de Concepci&oacute;n del Uruguay." />
        <meta property="og:image" content="https://direccionados.ar/congreso-direccionados.jpg?v=2" />
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:url" content="https://direccionados.ar/" />
        <meta property="twitter:title" content="Congreso Direccionados 2025" />
        <meta property="twitter:description" content="Congreso de Jóvenes Direccionados: 17 de mayo de 2025 en el Club Parque Sur de Concepci&oacute;n del Uruguay." />
        <meta property="twitter:image" content="https://direccionados.ar/congreso-direccionados.jpg?v=2" />
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
        .px-general
        {
        padding-left: 10px;
        padding-right: 10px;
        }
        @media (min-width: 768px) 
        {
            .px-general
            {
                padding-left: 30px;
                padding-right: 30px;
            }
        }
        @media (min-width: 992px) 
        {
            .px-general
            {
                padding-left: 40px;
            }
        }
    </style>
    <body class="antialiased">
        <header class="w-full h-screen" style="background:url(/bg.jpg) center center no-repeat;background-size:cover;">
            <img class="w-20 fixed left-1/2 -translate-x-1/2 top-2" src="/direccionados-white.png" alt="Isologo Direccionados">
            <h1 class="font-press text-xs uppercase text-transparent tracking-widest fixed bottom-2 w-full text-center">Congreso Direccionados</h1>
            <div class="px-general w-full md:w-2/3 fixed top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 grid gap-6 justify-center">
                <img class="w-full" src="/logotipo-direccionados.png" alt="Logotipo Direccionados">
                <h2 class="font-press uppercase text-white text-2xl md:text-3xl tracking-widest text-center">Muy pronto</h2>
            </div>
            <img class="w-28 fixed bottom-3 left-1/2 -translate-x-1/2" src="/icons-3.png" alt="Iconos">
        </header>
    </body>
</html>