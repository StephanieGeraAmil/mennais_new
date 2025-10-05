@extends('layouts.formtemplate')
@section('title')
<h3 class="u-align-center u-text u-text-1">Solicitud de certificado</h3>
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
@endsection
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

@section('form')
<form class="w-full max-w-sm certificate_form" action="{{Route('inscription.certificateRecoveryMail')}}" method="POST">
    @csrf
     <div class="u-form-group u-form-name">
            <label for="document-072d" class="u-label">Cédula de Identidad</label>
            <input
                type="text"
                placeholder="(1234567-8)"
                id="document-072d"
                name="document"
                class="u-input u-input-rectangle"
                required=""
            />
     </div>	

        </br>
        </br>
      <div class="u-align-left u-form-group u-form-submit">
             <a onclick="$(this).closest('form').submit()"
                id="submit-btn"
                class="u-btn u-btn-submit u-button-style u-btn-3"
                >Enviar</a>
    </div>
</form>
@endsection
@section('custom_script')
{{-- <script>  
    function clean_document(element){
        let input = $(element);
        let input_val = input.val();
        new_input_val = input_val.replace(/\D/g, "");
        input.val(new_input_val);
    }
</script>     --}}
@endsection 