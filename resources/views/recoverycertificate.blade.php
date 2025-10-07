{{-- @extends('layouts.formtemplate')
@section('title')
<h3 class="u-align-center u-text u-text-1">Solicitud de certificado</h3>
@endsection
@section('notifications')
    @isset($errors)                                        
        @error('document')                        
       <section
            class="u-clearfix u-palette-2-light-2 u-section-4"
            id="block-7"
        >
            <div class="u-clearfix u-sheet u-sheet-1">
                
                        <h5 class="u-text u-text-default u-text-1">
                            El documento ingresado no es correcto.
                        </h5>                         
            </div>
               
        </section>
        @enderror                        
    @endisset

    @isset($wrong_document)
     <section
            class="u-clearfix u-palette-2-light-2 u-section-4"
            id="block-7"
        >
            <div class="u-clearfix u-sheet u-sheet-1">
                
                    <h5 class="u-text u-text-default u-text-1">
                        El documento ingresado no es correcto.
                    </h5>                         
                
            </div>
        </section>
   
    @endisset
    @isset($success)
        <section class="u-clearfix u-custom-color-1 u-section-5" id="sec-ef85">
            <div class="u-clearfix u-sheet u-sheet-1">
                <p class="u-align-center u-text u-text-1">
                        <h5 class="u-text u-text-default u-text-1">   El vínculo se ha enviado correctamente.</h5>
                </p>
            </div>
    </section>
                        
    @endisset
    @isset($fail)           
   <section
            class="u-clearfix u-palette-2-light-2 u-section-4"
            id="block-7"
        >
            <div class="u-clearfix u-sheet u-sheet-1">
                
                    <h5 class="u-text u-text-default u-text-1">
                        Usted no figura acreditado, por favor comuníquese con nosotros al teléfono <a href="tel:24099899">2409 9899</a>, al mail <a href="mailto:secretaria@audec.edu.uy?subject=Solicitud%20de%20Certificado"  >secretaria@audec.edu.uy</a>
                    </h5>                         
               
            </div>
       
        </section>                    
@endisset
@endsection

@section('form')
 <form 
    action="/inscription/certificateRecoveryMail" 
    method="POST" 
    class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form"
    source="custom" 
    name="Certificate" 
    style="padding: 10px"
    enctype="multipart/form-data">
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
<script>  
    function clean_document(element){
        let input = $(element);
        let input_val = input.val();
        new_input_val = input_val.replace(/\D/g, "");
        input.val(new_input_val);
    }
</script>     
@endsection  --}}



@extends('layouts.formtemplate')
@section('title')
<h3 class="u-align-center u-text u-text-1">Solicitud de certificado</h3>
@endsection
@section('notifications')
    @isset($errors)                                        
        @error('document')                        
       <section
            class="u-clearfix u-palette-2-light-2 u-section-4"
            id="block-7"
        >
            <div class="u-clearfix u-sheet u-sheet-1">

                        <h5 class="u-text u-text-default u-text-1">
                            El documento ingresado no es correcto.
                        </h5>                         
            </div>

        </section>
        @enderror                        
    @endisset

    @isset($wrong_document)
     <section
            class="u-clearfix u-palette-2-light-2 u-section-4"
            id="block-7"
        >
            <div class="u-clearfix u-sheet u-sheet-1">

                    <h5 class="u-text u-text-default u-text-1">
                        El documento ingresado no es correcto.
                    </h5>                         

            </div>
        </section>

    @endisset
    @isset($success)
     <section
            class="u-clearfix u-palette-2-light-2 u-section-4"
            id="block-7"
        >
        <section class="u-clearfix u-custom-color-1 u-section-5" id="sec-ef85">
            <div class="u-clearfix u-sheet u-sheet-1">
                
                        <h5 class="u-text u-text-default u-text-1">
                            El vínculo se ha enviado correctamente.
                        </h5>
            </div>
          
      
    </section>                        
    </section>
                        
    @endisset
    @isset($fail)           
   <section
            class="u-clearfix u-palette-2-light-2 u-section-4"
            id="block-7"
        >
            <div class="u-clearfix u-sheet u-sheet-1">

                    <h5 class="u-text u-text-default u-text-1">
                        Usted no figura acreditado, por favor comuníquese con nosotros al teléfono <a href="tel:24099899">2409 9899</a>, al mail <a href="mailto:secretaria@audec.edu.uy?subject=Solicitud%20de%20Certificado"  >secretaria@audec.edu.uy</a>
                    </h5>                         

            </div>

        </section>                    
@endisset
@endsection

@section('form')
<form id="Certificate Recovery" class="w-full max-w-sm certificate_form" action="{{Route('inscription.certificateRecoveryMail')}}" method="POST">
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
             {{-- <a onclick="$(this).closest('form').submit()"
                id="submit-btn"
                class="u-btn u-btn-submit u-button-style u-btn-3"
                >Enviar</a> --}}
             <a id="submit-btn" class="u-btn u-btn-submit u-button-style u-btn-3">Enviar</a>
    </div>

      <script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form[name='Certificate Recovery']");
    const requiredFields = form.querySelectorAll("[required]");
    const submitLink = document.querySelector("#submit-btn");
   
    function allFieldsFilled() {
        for (let field of requiredFields) {
            if (field.type === "file" && !field.files.length) return false;
            if (field.type !== "file" && !field.value.trim()) return false;
        }
        return true;
    }

    function updateLinkState() {
        if (allFieldsFilled()) {
            submitLink.classList.remove("disabled");
            submitLink.style.pointerEvents = "auto";
            submitLink.style.opacity = "1";
        } else {
            submitLink.classList.add("disabled");
            submitLink.style.pointerEvents = "none"; 
            submitLink.style.opacity = "0.5"; 
        }
    }


    updateLinkState();


    requiredFields.forEach((field) => {
        field.addEventListener("input", updateLinkState);
        field.addEventListener("change", updateLinkState);
    });

   
   submitLink.addEventListener("click", function (e) {
        e.preventDefault();
        if (allFieldsFilled()) {
            submitLink.style.pointerEvents = "none";
            submitLink.style.opacity = "0.5";
            submitLink.textContent = "Enviando...";
            form.submit(); 
        }
    });


});
</script>
</form>
@endsection
@section('custom_script')