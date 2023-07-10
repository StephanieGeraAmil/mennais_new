<p>
    Se ha inscripto:
</p>
<p>
    <table>
        <tr>
            <td>Nombre</td>
            <td>{{$inscription->userData->name}} {{$inscription->userData->lastname}}</td>
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
            <td>Teléfono</td>
            <td>{{$inscription->userData->phone}}</td>
        </tr>
        <tr>
            <td>Monto</td>
            <td>{{$inscription->payment->amount_deposited}}</td>
        </tr>
        <tr>
            <td>Monto</td>
            <td><a href="{{env('APP_URL').$inscription->payment->url_payment}}">{{env('APP_URL').$inscription->payment->url_payment}}</a></td>
        </tr>
    </table>
</p>
<p>
    <img src="{{env('APP_URL').$inscription->payment->url_payment}}" />
</p>