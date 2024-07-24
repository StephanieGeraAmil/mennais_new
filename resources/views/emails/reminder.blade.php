<p>Hola {{$inscription->userData->name}},</p>
<p>Te reenviamos tu código QR, para que mañana sea más ágil tu ingreso.</p>
<p>
    <img src="{!!$message->embedData(QrCode::format('png')->generate($inscription->qrUrl()), 'QrCode.png', 'image/png')!!}">
</p>
<p>Te esperamos a las 8:00 h en la entrada principal de la Universidad Católica..</p>
<!--<p>Le recordamos que está inscripto PROEDUCAR XXXII - HACIA UNA INNOVACIÓN CON SENTIDO.</p>-->
<!--<p>Lo esperamos el próximo jueves 8 de febrero a las 8:00 HS en el SALÓN DE ACTOS DEL COLEGIO SANTO DOMINGO  - PALMAR 2288 ESQ. ACEVEDO DÍAZ.</p>-->

 {{--<p>Le recordamos las próximas actividades del PROEDUCAR XXXIII</p>
<p>
    <ul>
         <li> Jueves 25 de julio a las 8:00 hs </li>
         <li> Miércoles 21 de febrero a las 18:00 hs - Segunda Sesión virtual</li> 
    </ul>
</p>--}}
{{-- <p>Podrá acceder a las dos sesiones unos minutos antes del comienzo a través del <strong>mismo link</strong> :
 <button style="font-weight: bold; font: inherit; cursor: pointer; color: blue;" onclick="window.open('{!!$inscription->url()!!}', '_blank')">Acceso al Zoom</button></p> --}}

{{--<p>Para más información sobre sobre los contenidos, visite:  <a href="audec.org">audec.org</a></p>
<p>Lo esperamos,</p>--}}

<!--<p>Saludos,</p>-->
<p>Equipo de AUDEC.</p>
