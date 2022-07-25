<p>Hola {{$group_inscription->name}},</p>
<p>
Gracias por la inscripción grupal a {{env('EVENT_NAME')}}.
</p>
<p>
Cantidad de invitaciones disponibles: {{$group_inscription->quantity}}
</p>
<p>
Accediendo al siguiente vínculo usted podrá gestionar sus invitaciones:<BR/>
{!!$group_inscription->getUrl()!!}<BR/>
A cada persona que invite lle llegará un mail para que complete su inscripción con sus datos personales.
</p>
<p>
Saludos,
</p>
<p>
AUDEC.
</p>