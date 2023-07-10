<p>Hola {{$code->groupInscription->name}} lo ha invitado a {{env('EVENT_NAME')}}
</p>
<p>
    Para completar su inscripción, por favor siga el siguiente link:
    <a href="{!!$code->getUrl()!!}">{!!$code->getUrl()!!}</a><BR/>
</p>
<p>
Saludos,
</p>
<p>
AUDEC.
</p>