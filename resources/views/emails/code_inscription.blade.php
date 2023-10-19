<p>Hola {{$code->groupInscription->name}} lo ha invitado a {{env('EVENT_NAME', "La Transformación Educativa en acción")}}
</p>
<p>
    Para completar su inscripción y recibir el enlace de acceso, por favor siga el siguiente link:
    <a href="{!!$code->getUrl()!!}">{!!$code->getUrl()!!}</a><BR/>
</p>
<p>
Saludos,
</p>
<p>
AUDEC.
</p>