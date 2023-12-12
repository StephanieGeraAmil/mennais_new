<p>Gracias {{$group_inscription->name}} por realizar una Invitación grupal al evento {{env('EVENT_NAME', "La Transformación Educativa en acción")}}.</p>
<p>
    A cada uno de sus invitados le llegará por mail indicaciones para completar su inscripción. Es indispensable que lo hagan para que reciban link de conexión.
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