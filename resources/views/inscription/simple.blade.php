@extends('layouts.formtemplate')
@section('title')
 <h3 class="u-align-center u-text u-text-1">Inscripción Individual</h3>

@endsection
@section('notifications')
    @if (Session::has('msg'))

     <section class="u-clearfix u-custom-color-1 u-section-5" id="sec-ef85">
            <div class="u-clearfix u-sheet u-sheet-1">
                <p class="u-align-center u-text u-text-1">
                        <h5 class="u-text u-text-default u-text-1">{!! Session::get('msg') !!}</h5>
                </p>
            </div>
    </section>
    @endif
    @if ($errors->any())
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

@section('form')

    <form 
    action="/store_inscription" 
    method="POST" 
    class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form"
    source="custom" 
    name="Inscripción Individual" 
    style="padding: 10px"
    enctype="multipart/form-data">
        @csrf

    <input type="hidden" name="type" value="hibrido">

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
        <div class="u-form-group u-form-name">
            <label for="document-072d" class="u-label">Cédula de Identidad</label>
            <input
                type="text"
                placeholder="(1234567-8)"
                id="document-072d"
                name="document"
                value="{{ old('document') }}"
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
                name="institution_name"
                value="{{ old('institution_name') }}"
                class="u-input u-input-rectangle"
                required=""
            />
        </div>
        <div class="u-form-group u-form-select u-form-group-6">
            <label for="select-c689" class="u-label"
                >Nivel</label
            >
            <div class="u-form-select-wrapper">
                <select
                    id="select-c689"
                    name="institution_type"
                    class="u-input u-input-rectangle"
                >
                    <option value="Educación Inicial" {{ old('institution_type') == 'Educación Inicial' ? 'selected' : '' }}>Educación Inicial</option>
                    <option value="Primaria" {{ old('institution_type') == 'Primaria' ? 'selected' : '' }}>Primaria</option>
                    <option value="Secundaria" {{ old('institution_type') == 'Secundaria' ? 'selected' : '' }}>Secundaria</option>
                    <option value="Equipo Directivo" {{ old('institution_type') == 'Equipo Directivo' ? 'selected' : '' }}>Equipo Directivo</option>
                    <option value="Otro" {{ old('institution_type') == 'Otro' ? 'selected' : '' }}>Otro</option>
                </select>
                <svg
                    class="u-caret u-caret-svg"
                    version="1.1"
                    id="Layer_1"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    x="0px"
                    y="0px"
                    width="16px"
                    height="16px"
                    viewBox="0 0 16 16"
                    style="fill: currentColor"
                    xml:space="preserve"
                >
                    <polygon
                        class="st0"
                        points="8,12 2,4 14,4 "
                    ></polygon>
                </svg>
            </div>
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

            <a 
            href="https://carlosgera.com"  
            class="u-btn u-btn-submit u-button-style u-btn-3"
            >Volver</a>



             {{-- <a onclick="$(this).closest('form').submit()"
                id="submit-btn"
                class="u-btn u-btn-submit u-button-style u-btn-3"
                >Enviar</a> --}}
                <a id="submit-btn" class="u-btn u-btn-submit u-button-style u-btn-3">Enviar</a>
    </div>
   <script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form[name='Inscripción Individual']");
    const requiredFields = form.querySelectorAll("[required]");
    const submitLink = document.querySelector("#submit-btn");
    const volverLink = document.querySelector("a[href='https://carlosgera.com']");
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


    volverLink.addEventListener("click", function (e) {
        e.preventDefault();
        window.location.href = this.href; 
    });
});
</script>
    </form>
@endsection