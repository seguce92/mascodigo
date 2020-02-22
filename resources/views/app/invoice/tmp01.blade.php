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
            background: url("{{ public_path('img/certificate/7878RFDKXD.jpg') }}");
            background-size: 100%; 
        }
        .border-bottom {
            border-bottom: 1px dotted #718096
        }
    </style>
</head>

<body class="background px-32 py-32">
    <div class="mb-2">
        <table class="w-full text-center">
            <tr>
                <td></td>
                <td class="text-lg font-semibold" align="center">
                    <img src="{{ public_path('ms-icon-150x150.png') }}" class="w-12 h-12">
                    Más Código</td>
                <td></td>
            </tr>
        </table>
    </div>
    <div class="mx-16">
        Confiere el presente:
    </div>
    <div class="center">
        <h2 class="font-serif text-gray-900 text-6xl p-0 m-0">CERTIFICADO</h2>
    </div>
    <div class="ml-16 mr-16 mt-8">
        <table class="w-full" style="border:border-collapse">
            <tr>
                <td width="5%">
                    <h2 class="font-mono text-gray-900 text-2xl m-0 p-0">A:</h2>
                </td>
                <td width="95%" align="center" class="text-center text-3xl font-serif border-bottom">
                    Sergio Gualberto Cruz Espinoza
                </td>
            </tr>
        </table>
    </div>
    <div class="mx-16 mt-2">
        Por haber concluido y aprobado el curso de:
    </div>
    <div class="center mt-8">
        <label class="text-gray-800 text-2xl font-bold m-0 p-0">DEPLOY DE APLICACIONES LARAVEL</label>
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
