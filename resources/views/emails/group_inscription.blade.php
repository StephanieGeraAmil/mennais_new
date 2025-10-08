<p>Gracias {{$group_inscription->name}} por realizar una Invitación grupal al evento {{env('EVENT_NAME', "La Transformación Educativa en acción")}}.</p>
<p>
   Comparta cada codigo  y link con quien corresponda, recuerde que cada codigo tiene una cantidad asociada de invitaciones, asi que sea cuidadoso con quien los comparte.
</p>
<p><strong>Código para inscripciones híbridas:</strong> {{ $group_inscription->code_hybrid }}</p>
<p><strong>Código para inscripciones remotas:</strong> {{ $group_inscription->code_remote }}</p>

$joinUrl = route('group.inscription.join', ['id' => $this->groupInscription->id]);
<p><a href="{{ $joinUrl }}">Link al que deben acceder para completar la inscripcion</a></p>
{{-- <p>
    Ud. puede gestionar sus invitaciones desde el siguiente link:
    {!!$group_inscription->getUrl()!!}<BR/>
</p> --}}


<p>
Saludos,
</p>
<p>
AUDEC.
</p>