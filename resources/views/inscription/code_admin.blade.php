@extends('layouts.formtemplate')
@section('title')
Inscripción Grupal
@endsection
@section('custom_css')
<link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
<link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('notifications')
@if(Session::has('msg'))
<div class="u-size-30">
    <div class="u-layout-col">
        <div class="u-align-center u-container-style u-layout-cell u-palette-2-base u-size-60 u-layout-cell-1">
            <div class="u-container-layout u-valign-middle u-container-layout-1" style="background-color:#2cccc4">
                <h5 class="u-text u-text-default u-text-1">{!!Session::get("msg")!!}</h5>
            </div>
        </div>
    </div>
</div>                        
@endif
@if($errors->any())            
<div class="u-size-30">
    <div class="u-layout-col">
        <div class="u-align-center u-container-style u-layout-cell u-palette-2-base u-size-60 u-layout-cell-1">
            <div class="u-container-layout u-valign-middle u-container-layout-1">
                <h5 class="u-text u-text-default u-text-1">
                    @error('email')  {{ ($message == "The email has already been taken.")?"Ya se envió un código a este email.": "El campo email no es válido." }}.<br/> @enderror                                            
                </h5>                         
            </div>
        </div>
    </div>
</div>
@endif 
@endsection
@section('subtitle')
INSCRIPCIÓN GRUPAL
@endsection
@section('left-text-box')
<p class="u-text">
    Por favor ingrese el correo de las personas que desea invitar (UNO POR VEZ) y presione ENVIAR.<BR/><BR/>
    De esta forma, cada invitado recibirá un mail para completar su inscripción con sus datos personales.<BR/><BR/>
    Puede chequear si sus invitados completaron su inscripción volviendo a esta web a través del link que recibió en su correo.<BR/><BR/>
</p>
@endsection
@section('left-form')
<div class="u-form u-form-1">
    <form action="/send_inscripton" method="POST" class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" enctype="multipart/form-data" style="padding: 0px;">
        @csrf
        <input type="hidden" name="group_inscription_id" value="{{$group_inscription->id}}">
        <div class="u-form-email u-form-group">                                                    
            <input type="email" placeholder="Email para enviar invitación" id="email-4c18" name="email" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('email')}}">
        </div>
        <div class="u-align-right u-form-group u-form-submit">                                                    
            <a onclick="$(this).closest('form').submit()" class="custom-page-typo-item u-active-custom-color-22 u-border-2 u-border-active-palette-1-light-2 u-border-hover-palette-1-dark-1 u-border-palette-1-dark-1 u-btn u-btn-submit u-button-style u-hover-palette-1-dark-1 u-palette-1-light-3 u-btn-1">Enviar</a>
        </div>
    </form>
</div>
@endsection
@section('form')
<div class="u-container-layout u-valign-top u-container-layout-2" style="min-height: 460px;background-color:#ffffff80;margin-top:65px">
    <h5 class="u-text u-text-custom-color-2 u-text-default u-text-2">Invitaciones enviadas: {{$group_inscription->usedCodes()}} / Restantes: {{$group_inscription->codes->count() - $group_inscription->usedCodes() }}</h5>
    <div class="u-expanded-width u-table u-table-responsive u-table-2">
        <div style="width: 100%;border-bottom: 1px solid #D3D3D3;padding: 3px;"></div>
        <TABLE>
            @foreach ($group_inscription->codes as $code)
            @if ($code->status > 0)
            <TR>
                <td style="width: 45px">@if ($code->status == 1) <i class="fa-solid fa-user-clock" style="color:#A9A9A9"></i> @else <i class="fa-solid fa-user-check" style="color:#00A36C "></i> @endif</td>
                <td>{{$code->email}}</td>
                <td>
                    <form action="/code/{{$code->id}}/delete" method="post" id="delete_{{$code->id}}">
                        @csrf
                        <input type="hidden" name="group_id" value="{{$group_inscription->id}}" >
                        <input type="hidden" name="code" value="{{$group_inscription->code}}" >          
                    </form>
                    @if ($code->status == 1) <i class="fa-solid fa-trash" style="color:#A9A9A9" onclick="delete_item('delete_{{$code->id}}')"></i>@endif
                </td>
            </TR>                                                            
            @endif
            @endforeach
        </TABLE>
    </div>
</div>
@endsection
@section('custom_script') 
<script>
    function delete_item(form_id){
        if(confirm('Está seguro que desea eliminar esta invitación.')){
            $('#'+form_id).submit();
        }
    }    
</script> 
@endsection