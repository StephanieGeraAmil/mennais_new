<p>Gracias {{$inscription->userData->name}} por inscribirse al {{env('EVENT_NAME')}}</p>
<p>
    El día de la Jornada deberá acreditarse con el siguiente código QR para que podamos emitir su certificado.
</p>
<p>
    <img src="{!!$message->embedData(QrCode::format('png')->generate($inscription->qrUrl()), 'QrCode.png', 'image/png')!!}">
</p>
{{-- <p>
El día de la sesión virtual,  a la hora del evento, podrá conectarse a través de este link: <a href="{!!$inscription->url()!!}" target="_blank" >Link de acceso</a>
</p> --}}
<p>
    Saludos,
</p>
<p>
    AUDEC.
</p>


