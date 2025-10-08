@extends('layouts.formtemplate')
@section('title')

<h3 class="u-align-center u-text u-text-1">Invitación Grupal</h3>
@endsection
@section('notifications')
{{-- @if(Session::has('msg'))
<div class="u-size-30">
    <div class="u-layout-col">
        <div class="u-align-center u-container-style u-layout-cell u-palette-2-base u-size-60 u-layout-cell-1">
            <div class="u-container-layout u-valign-middle u-container-layout-1" style="background-color:#2cccc4">
                <h5 class="u-text u-text-default u-text-1">{!!Session::get("msg")!!}</h5>
            </div>
        </div>
    </div>
</div>                        
@endif --}}
@if (Session::has('msg'))

    <section class="u-clearfix u-custom-color-1 u-section-5" id="sec-ef85">
        <div class="u-clearfix u-sheet u-sheet-1">
            <p class="u-align-center u-text u-text-1">
                    <h5 class="u-text u-text-default u-text-1">{!! Session::get('msg') !!}</h5>
            </p>
        </div>
</section>
@endif
@if($errors->any())            
{{-- <div class="u-size-30">
    <div class="u-layout-col">
        <div class="u-align-center u-container-style u-layout-cell u-palette-2-base u-size-60 u-layout-cell-1">
            <div class="u-container-layout u-valign-middle u-container-layout-1">
                <h5 class="u-text u-text-default u-text-1">
                    @error('name') El campo nombre no es correcto.<br/> @enderror
                    @error('email')  El campo email no es correcto.<br/>  @enderror
                    @error('phone') El campo teléfono no es correcto.<br/> @enderror
                    @error('quantity_insc_remote')  El campo cantidad de invitaciones {{App\Enums\InscriptionTypeEnum::REMOTO->text()}} no es correcto.<br/>  @enderror
                    @error('quantity_insc_hybrid')  El campo cantidad de invitaciones {{App\Enums\InscriptionTypeEnum::HIBRIDO->text()}} no es correcto.<br/>  @enderror
                    @error('payment_file')  El comprobante de pago no es correcto.<br/>  @enderror
                    @error('code', 'payment_id') Hemos encontrado un error al procesar su solicitud. Por favor contacte a la administración.<br/> @enderror
                    @error('amount', 'payment_ref', 'payment_file') Hemos encontrado un error al procesar su solicitud. Por favor contacte a la administración.<br/> @enderror
                </h5>                         
                @if ($errors->any())
                <div style="display:none">{{implode('', $errors->all('<span>:message</span>'))}}</div>
                @endif
            </div>
        </div>
    </div>
</div> --}}
   <section
            class="u-clearfix u-palette-2-light-2 u-section-4"
            id="block-7"
        >
            <div class="u-clearfix u-sheet u-sheet-1">
                         
                            <h5 class="u-text u-text-default u-text-1">
                                
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </h5>
                              
                        
             </div>
        </section>
@endif  
@endsection
{{-- @section('subtitle')
INVITACIÓN GRUPAL
@endsection --}}
{{-- @section('left-text-box')
<p class="u-text u-text-3">Por favor, complete y envíe el formulario con sus datos como responsable de la inscripción grupal.<BR/>
En el siguiente paso le pediremos los datos de sus invitados.</p>
@endsection --}}
@section('form')
 <form 
    action="/store_group_inscription" 
    method="POST" 
    class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form"
    source="custom" 
    name="Inscripción Grupal" 
    style="padding: 10px"
    enctype="multipart/form-data">
        @csrf
          <div class="u-form-group u-form-name">
            <label for="name-072d" class="u-label">Nombre Completo</label>
            <input
                type="text"
                placeholder=""
                id="name-072d"
                name="name"
                value="{{ old('name') }}"
                class="u-input u-input-rectangle"
                required=""
            />
        </div>
        <div class="u-form-email u-form-group">
            <label for="email-072d" class="u-label"
                >Email</label
            >
            <input
                type="email"
                placeholder=""
                id="email-072d"
                name="email"
                value="{{ old('email') }}"
                class="u-input u-input-rectangle"
                required=""
            />
        </div>
          <div class="u-form-group u-form-name">
            <label for="institution-072d" class="u-label">Institución</label>
            <input
                type="text"
                placeholder=""
                id="institution-072d"
                name="institution"
                value="{{ old('institution') }}"
                class="u-input u-input-rectangle"
                required=""
            />
        </div>
             <div class="u-form-group u-form-name">
            <label for="phone-072d" class="u-label">Telefono</label>
            <input
                type="text"
                placeholder=""
                id="phone-072d"
                name="phone"
                value="{{ old('phone') }}"
                class="u-input u-input-rectangle"
                required=""
            />
        </div>

        <div class="u-form-group u-form-name">
            <label for="number-hybrid-072d" class="u-label">Cantidad de Invitaciones Completas</label>
            <input
                type="text"
                placeholder=""
                id="number-hybrid-072d"
                name="quantity_hybrid"
                value="{{ old('quantity_hybrid') }}"
                class="u-input u-input-rectangle"
                required=""
            />
        </div>
          <div class="u-form-group u-form-name">
            <label for="number-virtual-072d" class="u-label">Cantidad de Invitaciones Virtuales</label>
            <input
                type="text"
                placeholder=""
                id="number-virtual-072d"
                name="quantity_remote"
                value="{{ old('quantity_remote') }}"
                class="u-input u-input-rectangle"
                required=""
            />
        </div>
          <div class="u-form-group u-form-name">
            <label for="amount-072d" class="u-label">Monto depósitado</label>
            <input
                type="text"
                placeholder=""
                id="amount-072d"
                name="amount"
                value="{{ old('amount') }}"
                class="u-input u-input-rectangle"
                required=""
            />
        </div>
         <div
             class="u-form-file-upload u-form-group u-form-group-30"
         >
            <label for="file-upload-2d36" class="u-label"
                >Comprobante de pago</label
            >

                            <div class="u-file-input-wrapper">
                                <a class="u-btn u-button-style u-upload-button"
                                    >Adjuntar</a
                                >
                                <div class="u-file-list">
                                    <div class="u-file-item u-file-template">
                                        <span class="u-file-name u-text"
                                            >FileExample.pdf</span
                                        ><span
                                            class="u-file-remove u-icon u-text-grey-30 u-icon-1"
                                            ><svg
                                                class="u-svg-link"
                                                preserveAspectRatio="xMidYMin slice"
                                                viewBox="0 0 51.976 51.976"
                                                style=""
                                            >
                                                <use
                                                    xlink:href="#svg-312f"
                                                ></use></svg><svg
                                                class="u-svg-content"
                                                viewBox="0 0 51.976 51.976"
                                                x="0px"
                                                y="0px"
                                                id="svg-312f"
                                                style="
                                                    enable-background: new 0 0
                                                        51.976 51.976;
                                                "
                                            >
                                                <g>
                                                    <path
                                                        d="M44.373,7.603c-10.137-10.137-26.632-10.138-36.77,0c-10.138,10.138-10.137,26.632,0,36.77s26.632,10.138,36.77,0
		C54.51,34.235,54.51,17.74,44.373,7.603z M36.241,36.241c-0.781,0.781-2.047,0.781-2.828,0l-7.425-7.425l-7.778,7.778
		c-0.781,0.781-2.047,0.781-2.828,0c-0.781-0.781-0.781-2.047,0-2.828l7.778-7.778l-7.425-7.425c-0.781-0.781-0.781-2.048,0-2.828
		c0.781-0.781,2.047-0.781,2.828,0l7.425,7.425l7.071-7.071c0.781-0.781,2.047-0.781,2.828,0c0.781,0.781,0.781,2.047,0,2.828
		l-7.071,7.071l7.425,7.425C37.022,34.194,37.022,35.46,36.241,36.241z"
                                                    ></path>
                                                </g></svg></span>
                                    </div>
                                </div>
                                <p
                                    class="u-file-max u-text u-text-grey-30 u-text-3"
                                >
                                    Tamaño máximo: 10 MB
                                </p>
                <span class="u-file-group">
                    <input
                        type="file"
                        id="file-upload-2d36"
                        name="payment_file"
                        class="u-input u-input-rectangle u-text-black"
                        required=""
                        accept="IMAGES"
                /></span>
            </div>
    </div>

    <div class="u-align-left u-form-group u-form-submit">

                <a id="submit-btn" class="u-btn u-btn-submit u-button-style u-btn-3">Enviar</a>
    </div>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form[name='Inscripción Grupal']");
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
{{-- <form action="/store_group_inscription" method="POST" class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" enctype="multipart/form-data" style="padding: 0px;">
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
        <input type="text" placeholder="Institución" id="institution_name-4c18" name="extra[institution]" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('extra.institution')}}">
    </div>
    <div class="u-form-group u-form-name">
        <input type="text" placeholder="Ciudad" id="city-4c18" name="city" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('city')}}">
    </div>
    <div class="u-form-group u-form-name">
        <input type="number" placeholder="Cantidad de invitaciones {{App\Enums\InscriptionTypeEnum::REMOTO->text()}}" min="0" step="1" pattern="\d*" id="quantity_insc_remote-4c18" name="quantity_insc_remote" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" value="{{old('quantity_insc_remote')}}">
    </div>
    <div class="u-form-group u-form-name">
        <input type="number" placeholder="Cantidad de invitaciones {{App\Enums\InscriptionTypeEnum::HIBRIDO->text()}}" min="0" step="1" pattern="\d*" id="quantity_insc_hybrid-4c18" name="quantity_insc_hybrid" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" value="{{old('quantity_insc_hybrid')}}">
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
</form> --}}
@endsection
{{-- @section('custom_script') 
@endsection --}}