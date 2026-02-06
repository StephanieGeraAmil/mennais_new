<!DOCTYPE html>
<html lang="en">
{{-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            background: url("{{ URL::asset('images') }}/certificado.jpg"); 
            /* background: url("{{ URL::asset('images') }}/certificado_2023_c.jpg");  */
            background-size: 1024px 722px; 
            background-repeat: no-repeat;
        }
    </style>
</head> --}}
<head>
<meta charset="UTF-8">
<style>
    @page {
        margin: 0;
    }

    html, body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
    }

    body {
        width: 1024px;
        height: 722px;
        font-size: 20px;
        font-family: 'Open Sans', sans-serif;
        background-image: url("{{ public_path('images/certificado.jpg') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
</head>
<body style="width: 1024px; font-size:20px; font-family:'Open Sans',sans-serif"; >
    <div style="width:934px; margin-top:200px; text-align:right">
        Montevideo, miércoles 6 de agosto de 2025
        </div>
    <div style="margin-left:80px; margin-top:49px">
        Se certifica que:
    </div>
    <div style="width:100%; text-align:center;margin-top:10px; font-size: 20px;font-weight: bold;letter-spacing:2px">
        {{$name}}, C.I.: {{$document}} 
    </div>
    
    {{-- <div style="width:85%;margin-left:80px; margin-top:10px;text-align:center;">
        Ha participado de {{env('EVENT_NAME')}}, <BR/>
        organizado por AUDEC, el día {!! $attendance_text !!}
  
    </div> --}}
     <div style="width:85%;margin-left:80px; margin-top:10px;text-align:center;">
        Ha participado del Congreso Pedagógico Educación Emocional<BR/> Desarrollando competencias para el siglo XXI <BR/>
        organizado por el Colegio La Mennais, el día 2 de agosto del 2025
  
    </div>
</body>
</html>