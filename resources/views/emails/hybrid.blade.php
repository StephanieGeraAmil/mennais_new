<p>Gracias {{$inscription->userData->name}} por inscribirse al {{env('EVENT_NAME')}}</p>
<p>
    El día de la Jornada deberá presentar el siguiente código QR podrá ingresar al evento.
</p>
<p>
    <img src="{!!$message->embedData(QrCode::format('png')->generate($inscription->qrUrl()), 'QrCode.png', 'image/png')!!}">
</p>
<p>
Los días de las sesiones virtuales, a la hora del evento, podrá conectarse a través de este link: <a href="{!!$inscription->url()!!}" target="_blank" >Link de acceso</a>
</p>
<p>
    Saludos,
</p>
<p>
    AUDEC.
</p>