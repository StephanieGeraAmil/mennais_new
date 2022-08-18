<p>Hola {{$inscription->userData->name}} {{$inscription->userData->lastname}},</p>
<p>
    Gracias por inscribirse al Workshop VIVENCIANDO LA TRANSFORMACIÓN EDUCATIVA.
</p>
<p>
    Usted se agendó para visitar los siguientes colegios el día 28 de setiembre:
</p>
<p> 
    <table>
        <tr>
            <td>TURNO 1 -</td>
            <td>
                @if ($inscription->first_workshop_group_id > 0)
                {{$inscription->firstWorkshopGroup->school->name}} de {{Carbon\Carbon::parse($inscription->firstWorkshopGroup->start_at)->format('H:i')}} a {{Carbon\Carbon::parse($inscription->firstWorkshopGroup->end_at)->format('H:i')}}
                @else
                No asistiré
                @endif
            </td>
            
            @endif
        </tr>
        @if ($inscription->first_workshop_group_id > 0)        
        <tr>
            <td></td>
            <td><a href="{!!$inscription->firstWorkshopGroup->school->map_link!!}" target="_Blank">{{$inscription->firstWorkshopGroup->school->address}}</a></td>
        </tr>
        @endif
    </table>
    <br>
    <table>
        <tr>
            <td>TURNO 2 -</td>
            <td>
                @if ($inscription->second_workshop_group_id > 0)
                {{$inscription->secondWorkshopGroup->school->name}} de {{Carbon\Carbon::parse($inscription->secondWorkshopGroup->start_at)->format('H:i')}} a {{Carbon\Carbon::parse($inscription->secondWorkshopGroup->end_at)->format('H:i')}}                
                @else
                No asistiré
                @endif
            </td>
        </tr>
        @if ($inscription->second_workshop_group_id > 0)
        <tr>
            <td></td>
            <td><a href="{!!$inscription->secondWorkshopGroup->school->map_link!!}" target="_Blank">{{$inscription->secondWorkshopGroup->school->address}}</a></td>
        </tr>
        @endif
    </table>
</p>
<p>
    El siguiente código QR es su pase al evento y le será requerido al acreditarse.
</p>
<p>
    <img src="{!!$message->embedData(QrCode::format('png')->generate($inscription->url()), 'QrCode.png', 'image/png')!!}">
</p>
<p>
    Saludos,
</p>
<p>
    AUDEC.
</p>