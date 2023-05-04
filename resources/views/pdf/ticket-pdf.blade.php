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
        background: url('https://pass.direccionados.ar/bg-ticket.jpg') bottom center;
        background-size: 140%;
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 0;
    }
    .brand
    {
        height: 80%;
        margin: 0;
        padding: 0;
        width: 100%;
    }
    .brand h2
    {
        color: #fff;
        font-size: 14px;
        text-align: center;
        transform: rotate(180);
    }
    .brand .img
    {
        height:80%;
        text-align: center;
        transform: translateY(5%);
    }
    .brand .img img
    {
        height:100%;
    }
    .type
    {
        position: fixed;
        right: 1em;
        top: 2em;
        width: 5%;
        z-index: 999;
    }
    .type img
    {
        width: 100%;
    }
    .info
    {
        background: #efefef;
        border-top: dashed #161616 1px;
        bottom: 0;
        height: 20%;
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
    .info .details
    {
        bottom: 0;
        font-size: 0.4em;
        padding: 2.5em 0;
        position: absolute;
        text-align: center;
        width: 100%;
    }
    .logo
    {
        bottom: 0;
        height: 20%;
        padding-right: .5em;
        position: fixed;
        right: 0;
        width: 11%;
    }
    .logo img
    {
        margin-top: .8em;
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
</style>
<body>
    <div class="brand">
        <h2>direccionados.ar</h2>
        <div class="img">
            <img src="https://pass.direccionados.ar/brand-ticket.png" alt="">
        </div>
    </div>
    <div class="type">
        <img src="https://pass.direccionados.ar/{{ $tipo }}.png" alt"">
    </div>
    <div class="info">
        <div class="barcode"><img src="data:image/png;base64,{{ $code }}" alt="barcode"   /><span>{{ $token }}</span></div>
        <div class="details">{!! $details !!}</div>
    </div>
    <div class="logo">
        <img src="https://pass.direccionados.ar/logo-ticket.png" alt="">
    </div>
    <div class="pinb"></div>
</body>
</html>