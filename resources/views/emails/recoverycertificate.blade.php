<p>Hola {{$inscription->userData->name}} {{$inscription->userData->lastname}},</p>
<p>
    Gracias por asistir a {{env('EVENT_NAME')}}.<BR/>
    En el siguiente link podrá descargar su certificado de asistencia: {!!$inscription->certificateUrl()!!}
</p>
<p>
    Le solicitamos completar este breve formulario de evaluación, con el objetivo de seguir mejorando y acercando propuestas de valor.<BR/>
    COMPLETAR AQUÍ:  <a href="https://forms.gle/RZUTkgc1d3aTJemR7" target="_blank">https://forms.gle/RZUTkgc1d3aTJemR7</a>
</p>
<p>
    Saludos,<BR/>
    AUDEC
</p>




