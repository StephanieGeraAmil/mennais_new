<p>Hola {{$inscription->userData->name}} {{$inscription->userData->lastname}},</p>
<p>
Gracias por asistir a Workshop Audec.<BR/>
En el siguiente link podrá descargar su certificado de asistencia: {!!$inscription->certificateUrl()!!}
</p>
<p>
Saludos,<BR/>
AUDEC
</p>




