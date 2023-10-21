<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            background: url("{{ URL::asset('images') }}/proeducar_certificado_blco_c.jpeg"); 
            background-size: 1024px 722px; 
            background-repeat: no-repeat;
        }
    </style>
</head>
<body style="width: 1024px; font-size:24px; font-family:'Open Sans',sans-serif"; >
    <div style="width:934px; margin-top:200px; text-align:right">
        Montevideo, miércoles 25 de octubre de 2023
        </div>
    <div style="margin-left:80px; margin-top:49px">
        Se certifica que:
    </div>
    <div style="width:100%; text-align:center;margin-top:10px; font-size: 24px;font-weight: bold;letter-spacing:2px">
        {{$name}}, C.I.: {{$document}} 
    </div>
    <div style="width:904px;margin-left:60px; margin-top:10px">
        Ha participado de los encuentros {{env('EVENT_NAME')}}, liderados por Melina Furman y organizados por AUDEC.<BR/>
        Dichos encuentros fueron realizados el 2 de agosto y el 25 de octubre, con una duración de 2 horas y media cada uno.
    </div>
</body>
</html>