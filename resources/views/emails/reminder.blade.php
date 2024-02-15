<p>Hola {{$inscription->userData->name}} {{$inscription->userData->lastname}},</p>
<!--<p>Le recordamos que está inscripto PROEDUCAR XXXII - HACIA UNA INNOVACIÓN CON SENTIDO.</p>-->
<!--<p>Lo esperamos el próximo jueves 8 de febrero a las 8:00 HS en el SALÓN DE ACTOS DEL COLEGIO SANTO DOMINGO  - PALMAR 2288 ESQ. ACEVEDO DÍAZ.</p>-->
<!--<img src="{!!$message->embedData(base64_decode($qrCodeData), 'QrCode.png', 'image/png')!!}">-->
<p>Le recordamos las próximas actividades del PROEDUCAR XXXII</p>
<p>
    <ul>
         <li> Lunes 19 de febrero a las 18:00 hs - Primera Sesión Virtual </li>
         <li> Miércoles 21 de febrero a las 18:00 hs - Segunda Sesión virtual</li>
    </ul>
</p>
<p>Podrá acceder a las dos sesiones unos minutos antes del comienzo a través del <a href="{!!$inscription->url()!!}" target="_blank">mismo link</a></p>

<p>Para más información sobre las sesiones y los oradores puede visitar: <a href="audec.org">audec.org</a></p>

<p>Lo esperamos,</p>

<!--<p>Saludos,</p>-->
<p>AUDEC.</p>
