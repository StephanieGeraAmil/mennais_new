<p>Hola {{$inscription->userData->name}} {{$inscription->userData->lastname}},</p>
<p>
    Le recordamos que mañana martes comienza el Workshop Vivenciando la transformación Educativa, a las 14:00 hs en el Colegio Seminario (Soriano 1472).
</p>
<p>
    Para acreditarse necesitará el siguiente QR:
</p>
<p>
    <img src="{!!$message->embedData(QrCode::format('png')->generate($inscription->url()), 'QrCode.png', 'image/png')!!}">
</p>
<p>
    Saludos,
</p>
<p>
    AUDEC.
</p>