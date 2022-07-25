<p>Ha recibido una invitación</p>
<p>
{{$code->groupInscription->name}} de {{$code->groupInscription->institution->institution}} le ha invitado a participar de {{env('EVENT_NAME')}}, que se realizará los días 8 y 9 de julio de 2022 en el Teatro del Colegio La Mennais – Montevideo.
</p>
<p>
Usted deberá completar su inscripción sin costo con sus datos personales en el siguiente vínculo:<BR/>
<a href="{!!$code->getUrl()!!}">{!!$code->getUrl()!!}</a><BR/>
</p>
<p>
Saludos,
</p>
<p>
AUDEC.
</p>