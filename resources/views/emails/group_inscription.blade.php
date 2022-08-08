<p>Hola {{$group_inscription->name}},</p>
<p>
Gracias por la inscripción grupal al Workshop VIVENCIANDO LA TRANSFORMACIÓN EDUCATIVA.
</p>
<p>
Cantidad de invitaciones disponibles: {{$group_inscription->quantity}}
</p>
<p>
Accediendo al siguiente vínculo usted podrá gestionar sus invitaciones:<BR/>
{!!$group_inscription->getUrl()!!}<BR/>
A cada persona que invite le llegará un mail para que complete su inscripción con sus datos personales.
</p>
<p>
Saludos,
</p>
<p>
AUDEC.
</p>