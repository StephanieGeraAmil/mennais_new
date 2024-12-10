<p>
    Se ha inscripto:
</p>
<p>
    <table>
        <tr>
            <td>Nombre</td>
            {{-- <td>{{$inscription->userData->name}} {{$inscription->userData->lastname}}</td> --}}
            <td>{{$inscription->userData->name}} </td>
        </tr>
        <tr>
            <td>Documento</td>
            <td>{{$inscription->userData->document}}</td>
        </tr>
        <tr>
            <td>E-Mail</td>
            <td>{{$inscription->userData->email}}</td>
        </tr>
        <tr>
            <td>Tipo</td>
            <td>{{$inscription->type->text()}}</td>
        </tr>
        {{-- <tr>
            <td>Monto</td>
            <td>{{$inscription->payment->amount_deposited}}</td>
        </tr>
        <tr>
            <td>Monto</td>
            <td><a href="{{env('APP_URL').$inscription->payment?->url_payment}}">{{env('APP_URL').$inscription->payment?->url_payment}}</a></td>
        </tr> --}}
         @if($inscription->payment)
            <tr>
                <td>Monto</td>
                <td>{{$inscription->payment->amount_deposited}}</td>
            </tr>
            <tr>
                <td>Pago</td>
                <td>
                    <a href="{{ env('APP_URL').$inscription->payment->url_payment }}">
                        {{ env('APP_URL').$inscription->payment->url_payment }}
                    </a>
                </td>
            </tr>
        @else
            <tr>
                <td>Monto</td>
                <td>No disponible</td>
            </tr>
            <tr>
                <td>Pago</td>
                <td>No disponible</td>
            </tr>
        @endif
    </table>
</p>
@if($inscription->payment && $inscription->payment->url_payment)
    <p>
        <img src="{{ env('APP_URL').$inscription->payment->url_payment }}" alt="Payment Image" />
    </p>
@endif