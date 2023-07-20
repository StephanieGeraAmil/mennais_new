<p>Hola {{$inscription->userData->name}} {{$inscription->userData->lastname}},</p>
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