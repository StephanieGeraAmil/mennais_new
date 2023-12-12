<p>¡Hola!</p>
<p>{{$code->groupInscription->name}}  lo ha invitado a participar en su modalidad {{$code->type->text()}} de {{env('EVENT_NAME')}}
</p>
<p>
    Para que su inscripción quede activada, es indispensable que complete sus datos aquí:
</p>
<p>
    <a href="{!!$code->getUrl()!!}">{!!$code->getUrl()!!}</a><BR/>
</p>
<p>
Saludos,
</p>
<p>
AUDEC.
</p>