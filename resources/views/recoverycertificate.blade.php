@extends('layouts.formtemplate')
@section('title')
Solicitud de certificado
@endsection
@section('notifications')
@isset($errors)                                        
@error('document')                        
<div class="u-size-30">
    <div class="u-layout-col">
        <div class="u-align-center u-container-style u-layout-cell u-palette-2-base u-size-60 u-layout-cell-1">
            <div class="u-container-layout u-valign-middle u-container-layout-1">
                <h5 class="u-text u-text-default u-text-1">
                    El documento ingresado no es correcto.
                </h5>                         
            </div>
        </div>
    </div>
</div>
@enderror                        
@endisset
@isset($wrong_document)
<div class="u-size-30">
    <div class="u-layout-col">
        <div class="u-align-center u-container-style u-layout-cell u-palette-2-base u-size-60 u-layout-cell-1">
            <div class="u-container-layout u-valign-middle u-container-layout-1">
                <h5 class="u-text u-text-default u-text-1">
                    El documento ingresado no es correcto.
                </h5>                         
            </div>
        </div>
    </div>
</div>
@endisset
@isset($success)
<div class="u-size-30">
    <div class="u-layout-col">
        <div class="u-align-center u-container-style u-layout-cell u-palette-2-base u-size-60 u-layout-cell-1">
            <div class="u-container-layout u-valign-middle u-container-layout-1" style="background-color:#2cccc4">
                <h5 class="u-text u-text-default u-text-1">El vínculo se ha enviado correctamente.</h5>
            </div>
        </div>
    </div>
</div>                        
@endisset
@isset($fail)           
<div class="u-size-30">
    <div class="u-layout-col">
        <div class="u-align-center u-container-style u-layout-cell u-palette-2-base u-size-60 u-layout-cell-1">
            <div class="u-container-layout u-valign-middle u-container-layout-1">
                <h5 class="u-text u-text-default u-text-1">
                    Usted no figura acreditado, por favor comuníquese con nosotros al teléfono <a href="tel:24099899">2409 9899</a>, al mail <a href="mailto:secretaria@audec.edu.uy?subject=Solicitud%20de%20Certificado"  >secretaria@audec.edu.uy</a>
                </h5>                         
            </div>
        </div>
    </div>
</div>                    
@endisset
@endsection
@section('subtitle')
Solicitud de certificado  
@endsection
@section('left-text-box')
<p class="u-text u-text-3">Ingrese su documento y le enviaremos a su mail un link donde podrá descargar el certificado.</p>
@endsection
@section('form')
<form class="w-full max-w-sm" action="{{Route('inscription.certificateRecoveryMail')}}" method="POST">
    @csrf
    <div class="u-form-group u-form-name">
        <label for="document-05a8" class="u-form-control-hidden u-label"></label>
        <input type="text" placeholder="Ingrese el documento" id="document-05a8" name="document" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white u-input-1" required="" value="{{old('document')}}" onblur="clean_document(this)">
    </div>											
    <div class="u-align-right u-form-group u-form-submit">                                              
        <a onclick="$(this).closest('form').submit()" class="custom-page-typo-item u-active-custom-color-22 u-border-2 u-border-active-palette-1-light-2 u-border-hover-palette-1-dark-1 u-border-palette-1-dark-1 u-btn u-btn-submit u-button-style u-hover-palette-1-dark-1 u-palette-1-light-3 u-btn-1">Enviar</a>
    </div>
</form>
@endsection
@section('custom_script')
<script>  
    function clean_document(element){
        let input = $(element);
        let input_val = input.val();
        new_input_val = input_val.replace(/\D/g, "");
        input.val(new_input_val);
    }
</script>    
@endsection 