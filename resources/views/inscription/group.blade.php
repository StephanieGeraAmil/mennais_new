@extends('layouts.formtemplate')
@section('title')
Inscripción Grupal
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
                    @error('name') El campo nombre no es correcto.<br/> @enderror
                    @error('email')  El campo email no es correcto.<br/>  @enderror
                    @error('phone') El campo teléfono no es correcto.<br/> @enderror
                    @error('quantity')  El campo cantidad no es correcto.<br/>  @enderror
                    @error('code', 'payment_id') Hemos encontrado un error al procesar su solicitud. Por favor contacte a la administración.<br/> @enderror
                    @error('amount', 'payment_ref', 'payment_file') Hemos encontrado un error al procesar su solicitud. Por favor contacte a la administración.<br/> @enderror
                </h5>                         
                @if ($errors->any())
                <div style="display:none">{{implode('', $errors->all('<span>:message</span>'))}}</div>
                @endif
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
<p class="u-text u-text-3">Por favor, complete y envíe el formulario con sus datos</p>
@endsection
@section('form')
<form action="/store_group_inscription" method="POST" class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" enctype="multipart/form-data" style="padding: 0px;">
    @csrf
    <div class="u-form-group u-form-name">
        <input type="text" placeholder="Nombre de quien inscribe" id="name-4c18" name="name" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('name')}}">
    </div>
    <div class="u-form-email u-form-group">
        <input type="email" placeholder="Email de quien inscribe" id="email-4c18" name="email" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('email')}}">
    </div>
    <div class="u-form-group u-form-name">
        <input type="text" placeholder="Teléfono de quien inscribe" id="phone-4c18" name="phone" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('phone')}}">
    </div>                                            
    <div class="u-form-group u-form-name">
        <input type="text" placeholder="Institución" id="institution_name-4c18" name="extra[institution]" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('institution_name')}}">
    </div>
    <div class="u-form-group u-form-name">
        <input type="text" placeholder="Ciudad" id="city-4c18" name="city" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('city')}}">
    </div>
    <div class="u-form-group u-form-name">
        <input type="number" placeholder="Cantidad a inscribir Presencial" min="0" step="1" pattern="\d*" id="quantity_insc-4c18" name="quantity_insc" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('quantity_insc')??0}}">
    </div>
    <div class="u-form-group u-form-name">
        <input type="number" placeholder="Cantidad a inscribir Remoto" min="0" step="1" pattern="\d*" id="quantity_insc_remote-4c18" name="quantity_insc_remote" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('quantity_insc_remote')??0}}">
    </div>
    <div class="u-form-group u-form-name">
        <input type="number" placeholder="Cantidad a inscribir Ambas" min="0" step="1" pattern="\d*" id="quantity_insc_hybrid-4c18" name="quantity_insc_hybrid" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('quantity_insc_hybrid')??0}}">
    </div>
    <div class="u-form-group u-form-name">
        <input type="number" placeholder="Monto depositado" min="0" step="1" pattern="\d*" id="amount-4c18" name="amount" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('amount')}}">
    </div>    
    <div class="u-form-group u-form-name">
        <input type="file" placeholder="Adjunte un comprobante de pago" id="payment_img-4c18" name="payment_file" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="">
        <div style="width: 100%;text-align: center;"><small>Adjunte el comprobante de pago (pdf o jpg)</small></div>
    </div>
    <div class="u-align-right u-form-group u-form-submit">                                                    
        <a onclick="$(this).closest('form').submit()" class="custom-page-typo-item u-active-custom-color-22 u-border-2 u-border-active-palette-1-light-2 u-border-hover-palette-1-dark-1 u-border-palette-1-dark-1 u-btn u-btn-submit u-button-style u-hover-palette-1-dark-1 u-palette-1-light-3 u-btn-1">Enviar</a>
    </div>
</form>
@endsection
@section('custom_script') 
@endsection