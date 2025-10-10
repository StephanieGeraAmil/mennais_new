<p>Gracias {{$group_inscription->name}} por realizar una Invitación grupal al evento {{env('EVENT_NAME', "La Transformación Educativa en acción")}}.</p>
<p>
   Comparta cada codigo  y link con quien corresponda, recuerde que cada codigo tiene una cantidad asociada de invitaciones, asi que sea cuidadoso con quien los comparte.
</p>
{{-- <p><strong>Código para inscripciones híbridas:</strong> {{ $group_inscription->code_hybrid }}</p>
<p><strong>Código para inscripciones remotas:</strong> {{ $group_inscription->code_remote }}</p> --}}

@if($group_inscription->quantity_hybrid > 0)
    <p>
        <strong>Invitaciones híbridas disponibles:</strong> {{ $group_inscription->quantity_hybrid }}
        <br>
        <strong>Código para inscripciones híbridas:</strong> {{ $group_inscription->code_hybrid }}
    </p>
@endif

@if($group_inscription->quantity_remote > 0)
    <p>
        <strong>Invitaciones virtuales disponibles:</strong> {{ $group_inscription->quantity_remote }}
        <br>
        <strong>Código para inscripciones remotas:</strong> {{ $group_inscription->code_remote }}
    </p>
@endif

<p><a href="{{ $joinUrl }}">Link al que deben acceder para completar la inscripción</a></p>


  
<p>
Saludos,
</p>
<p>
AUDEC.
</p>