<p>Gracias {{$inscription->userData->name}} por inscribirse al {{env('EVENT_NAME')}} en su versión virtual.</p>
<p>
Podrá conectarse a través de este link: <a href="{!!$inscription->url()!!}" target="_blank" >Link de acceso</a>
</p>
<p>
    Saludos,
</p>
<p>
    AUDEC.
</p>