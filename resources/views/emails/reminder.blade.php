<p>Hola {{$inscription->userData->name}} {{$inscription->userData->lastname}},</p>
<p>
    Le recordamos que está inscripto al encuentro {!!env("EVENT_NAME", "La Transformación Educativa en acción")!!} el próximo miércoles 25 de octubre a las 18:30 hs.
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