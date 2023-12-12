<p>Evento Virtual</p>
<p>Gracias {{$inscription->userData->name}} {{$inscription->userData->lastname}} por inscribirse a {{env('EVENT_NAME', "La Transformación Educativa en acción")}}.</p>
<p>
    A través del siguiente link podrá acceder al Zoom el 25 de octubre a partir de las 18:30 hs:
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