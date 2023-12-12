{{-- <p>Gracias {{$inscription->userData->name}} por inscribirse al {{env('EVENT_NAME')}}</p>
<p>
    Presentando el siguiente código QR podrá ingresar al evento.
    <img src="{!!$message->embedData(QrCode::format('png')->generate($inscription->qrUrl()), 'QrCode.png', 'image/png')!!}">
</p>
<p>
Para las sesiones virtuales, podrán conectarse a través de este link: <a href="{!!$inscription->url()!!}" target="_blank" >Link de acceso</a>
</p>
<p>
    Saludos,
</p>
<p>
    AUDEC.
</p> --}}