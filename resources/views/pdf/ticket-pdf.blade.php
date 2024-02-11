<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $token }}</title>
</head>
<style>
    body, html
    {
        background: #efefef;
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 0;
    }
    .brand
    {
        background: url('https://direccionados.ar/bg-ticket.jpg') center center;
        background-size: 140%;
        border-radius: 0 0 1.65em 1.65em;
        height: 75%;
        margin: 0;
        padding: 0;
        width: 100%;
    }
    .info
    {
        background: #efefef;
        bottom: 0;
        height: 25%;
        position: fixed;
        text-align: center;
        width: 100%;
    }
    .info .barcode
    {
        margin-top: 1.3em;
    }
    .info .barcode span
    {
        display: block;
        font-family: 'Courier New', Courier, monospace;
        font-size: 0.8em;
        font-weight: bold;
        padding-top: 0.5em;
    }
    .logo
    {
        bottom: 5px;
        height: 20%;
        padding-right: .5em;
        position: fixed;
        right: 0;
        width: 11%;
    }
    .logo img
    {
        margin-top: .9em;
        width: 100%;
    }
    .pinb
    {
        background: #c5c5c5;
        bottom: 0;
        height: 1px;
        position: fixed;
        width: 100%;
    }
    .info h4
    {
        font-weight: lighter;
        text-transform: uppercase;
    }
    .info .leyenda
    {
        font-size: .5em;
        position: absolute;
        text-transform: uppercase;
        transform: rotate(90deg), translateY(150%), translateX(60%);
    }
    .brand .logotipo
    {
        position: absolute;
        top: 4%;
        right: 10%;
        width: 7%;
    }
    .brand .logotipo img
    {
        width: 100%;
    }
    .brand .tipo
    {
        position: absolute;
        left: 50%;
        top: 4%;
        transform: translateX(-50%);
        width: 10%;
    }
    .brand .tipo img
    {
        width: 100%;
    }
    .brand .lugar
    {
        position: absolute;
        left: 10%;
        top: 4%;
        width: 13%;
    }
    .brand .lugar img
    {
        width: 100%;
    }
    .brand .sitio
    {
        bottom: 28%;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 70%;
    }
    .brand .sitio img
    {
        width: 100%;
    }
</style>
<body>
    <div class="brand">
        <div class="logotipo">
            <img src="https://direccionados.ar/brand-ticket.png">
        </div>
        <div class="tipo">
            <img src="https://direccionados.ar/{{ $tipo }}.png">
        </div>
        <div class="lugar">
            <img src="https://direccionados.ar/lugar.png">
        </div>
        <div class="sitio">
            <img src="https://direccionados.ar/sitio.png">
        </div>
    </div>
    <div class="info">
        <span class="leyenda">Presentar en puerta<br>para ingresar</span>
        <h4>Ticket de Ingreso</h4>
        <div class="barcode"><img src="data:image/png;base64,{{ $code }}" alt="barcode"   /><span>{{ $token }}</span></div>
    </div>
    <div class="logo">
        <img src="https://direccionados.ar/logo-ticket.png" alt="">
    </div>
    <div class="pinb"></div>
</body>
</html>