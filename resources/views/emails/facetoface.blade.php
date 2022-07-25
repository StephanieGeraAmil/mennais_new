<p>Hola {{$inscription->userData->name}} {{$inscription->userData->lastname}},</p>
<p>
Gracias por inscribirse a PROEDUCAR.
</p>
<p>
El siguiente código QR es su pase al evento y le será requerido al acreditarse.
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