<!DOCTYPE html>
<html>
<head>
	<title>{{ config('app.name') }} - Certificado</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="content-type" content="text-html; charset=utf-8">
    <link rel="stylesheet" href="{{ public_path('css/invoice.css') }}">
    <style type="text/css">
        @page {
            margin: 0cm;
            font-family: calibri, arial;
        }
        .background {
            background-color: #fff;
            background-repeat: repeat;
            background: url("{{ public_path('img/pattern.jpg') }}");
        }
    </style>
</head>

<body class="background">
    <div>
        <table class="w-full center mt-10">
            <tr>
                <td></td>
                <td class="text-lg font-semibold">
                    <img src="{{ public_path('ms-icon-150x150.png') }}" class="w-12 h-12">
                    Más Código</td>
                <td></td>
            </tr>
        </table>
    </div>
    <div>
        <p>
            El presente
        </p>
    </div>
    <div class="center">
        <h2 class="font-serif text-gray-800 text-6xl">CERTIFICADO</h2>
    </div>
    <div class="center">
        <label class="text-gray-800 text-2xl font-bold block font-serif">CURSO DE</label>
        <label class="text-gray-800 text-2xl font-bold">DEPLOY DE APLICACIONES LARAVEL</label>
    </div>
    <div>
        <p>
            El presente
        </p>
    </div>
    <table class="center w-full border">
        <tr>
            <td width="5"></td>
            <td width="30" class="text-sm font-sans">
                <span class="block">Sergio Gualberto Cruz Espinoza</span>
                <small class="uppercase font-semibold">CEO Más Código</small>
            </td>
            <td width="30" class="center" align="center">
                <div class="bg-red-500 w-20 h-20 block p-3 border borde-white" style="border-radius:50px">
                    <img src="{{ public_path('storage/icons/20022020_1582243504.svg') }}" class="w-20 h-20">
                </div>
            </td>
            <td width="30">text 3</td>
            <td width="5"></td>
        </tr>
    </table>
</body>
</html>
