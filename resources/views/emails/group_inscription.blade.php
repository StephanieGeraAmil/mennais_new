<p>Gracias {{$group_inscription->name}} por realizar una inscripción grupal al evento {{env('EVENT_NAME')}}.</p>
<p>
    A cada uno de sus invitados le llegará por mail indicaciones para completar su inscripción.
</p>
<p>
    Ud. puede gestionar sus invitaciones desde el siguiente link:
    {!!$group_inscription->getUrl()!!}<BR/>
</p>
<p>
Saludos,
</p>
<p>
AUDEC.
</p>