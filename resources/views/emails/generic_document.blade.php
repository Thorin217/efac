<!DOCTYPE html>
<html lang="es">
@php
    $urlLogo = !empty($photoEntity) && is_file(public_path($photoEntity)) ? $photoEntity : 'img/pdf/app-logo.png';
@endphp

<head>
    <meta charset="UTF-8">
    <title>email-DTE</title>
    <style>
        @font-face {
            font-family: 'TitilliumWeb-Regular';
            src: url(data:font/ttf;charset=utf-8;base64,{{ base64_encode(file_get_contents(resource_path('fonts/TitilliumWeb-Regular.ttf'))) }}) format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'TitilliumWeb-Regular', Arial;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 1%;
            margin-bottom: 1%;
        }

        .header {
            /* background-color: #f0f0f0;*/
            text-align: center;
            margin-bottom: 20px;
            padding: 20px 0;
        }

        .body {
            margin-bottom: 20px;
            color: #333;
        }

        .footer {
            background-color: #f0f0f0;
            padding: 10px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }

        /* .image-container {
            text-align: center;
        } */

        .client-info {
            text-align: center;
        }

        .condition {
            margin-top: 5%;
            text-align: justify;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            {{--  <img src="{{ $urlLogo }}" alt="app-logo" style="max-width: 100%; height: auto; margin: 0 auto;"> --}}
            <img src="{{ $message->embed(public_path($urlLogo)) }}" alt="app-logo"
                style="max-width: 100%; height: auto; margin: 0 auto;">
        </div>
        <hr>
        <div class="body">
            <div class="client-info">
                <h2>¡Estimado cliente!</h2>
                <p>{{ $receiverName }}</p>
            </div>
            <div class="condition">
                Adjunto a este correo encontrará un Comprobante Electrónico en formato JSON y su correspondiente
                representación en formato PDF. Lo anterior con base en las especificaciones del Ministerio de Hacienda.
                <ul style="list-style-type: none">
                    <li>*** Este mensaje se ha generado automáticamente.</li>
                    <li>*** No conteste a este mensaje ya que no recibirá ninguna respuesta.</li>
                </ul>
            </div>
        </div>

        <div class="footer">
            <p>© {{ now()->format('Y') }} {{ config('app.name') }}, All Rights Reserved.</p>
            <p>{{ $completeAddress }}</p>
        </div>
    </div>
</body>

</html>
