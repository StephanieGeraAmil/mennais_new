<p>Hola {{$inscription->userData->name}} {{$inscription->userData->lastname}}, Agradecemos su participación en el PROEDUCAR XXXII - HACIA UNA INNOVACIÓN CON SENTIDO.</p>
<!--<p>
    En este enlace encontrará la grabación de la segunda sesión: <a href="https://www.youtube.com/watch?v=dOBDNueFvZg">https://www.youtube.com/watch?v=dOBDNueFvZg</a>
</p>-->
<p>
    En el siguiente enlace puede descargarse su  certificado de asistencia: <a href="{!!$inscription->certificateUrl()!!}">{!!$inscription->certificateUrl()!!}</a>
</p>
<p>
    Cordiales saludos;
</p>
<p>
    Equipo de AUDEC<BR/>
    Asociación Uruguaya de Educación Católica
</p>

