<p>Hola {{$inscription->userData->name}} {{$inscription->userData->lastname}},</p>
<p>
    Le recordamos que está inscripto al  {!!env("EVENT_NAME", "Workshop VIVENCIANDO LA TRANSFORMACIÓN EDUCATIVA")!!} el próximo miércoles 2 de agosto a las 18:30 hs.
</p>
<p>
    <a href="{!!$inscription->url()!!}" target="_blank" >Link de acceso</a>
</p>
<p>
    Saludos,
</p>
<p>
    AUDEC.
</p>