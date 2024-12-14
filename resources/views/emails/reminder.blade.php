<p>Hola {{$inscription->userData->name}},</p>
<p>Te reenviamos la información para acceder al evento:</p>
@if ($inscription->type !== \App\Enums\InscriptionTypeEnum::HIBRIDO)
<p>Jornada Presencial:</p>
<p>6 de febrero 08:00 h</p>
<p>Auditorio Nacional Adela Reta - Sodre</p>
<p>
    <img src="{!!$message->embedData(QrCode::format('png')->generate($inscription->qrUrl()), 'QrCode.png', 'image/png')!!}">
</p>
@endif
<p>Sesión Virtual:</p>
<p>20 de febrero 14:00 h </p>
<p>Podrá acceder a las dos sesiones unos minutos antes del comienzo a través del <strong>link</strong> :
 <button style="font-weight: bold; font: inherit; cursor: pointer; color: blue;" onclick="window.open('{!!$inscription->url()!!}', '_blank')">Acceso al Zoom</button></p>

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

<p>Saludos,</p>
<p>Equipo de AUDEC.</p>




