<!DOCTYPE html>
<html style="font-size: 16px;">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Inscripción Grupal</title>
    <link rel="stylesheet" href="/css/nicepage.css" media="screen">
    <link rel="stylesheet" href="/css/inscripcion.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.11.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="icon" href="/images/favicon.png">
    
    <script type="application/ld+json">{
        "@context": "http://schema.org",
        "@type": "Organization",
        "name": "Proeducar",
        "logo": "/images/ano_cab.png"
    }</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Inscripción Indivudual">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
</head>
<body class="u-body u-overlap u-xl-mode"><header class="u-clearfix u-custom-color-4 u-header u-sticky u-sticky-387b u-header" id="sec-055d"><div class="u-clearfix u-sheet u-sheet-1">
    <a href="/" data-page-id="126800706" class="u-image u-logo u-image-1" data-image-width="150" data-image-height="150" title="Inicio">
        <img src="/images/ano_cab.png" class="u-logo-image u-logo-image-1">
    </a>
    <h5 class="u-custom-font u-font-raleway u-text u-text-default u-text-1">
        <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-white u-btn-1" href="/" data-page-id="126800706">PROEDUCAR<span style="font-weight: 700;"></span>
        </a>
    </h5>
</div></header>
<section class="u-clearfix u-gradient u-section-1" id="sec-3ffd" style="min-height: calc(100vh - 76px)">
    <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
            <div class="u-gutter-0 u-layout">
                <div class="u-layout-col">
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
                                        @error('code','institution_id', 'payment_id') Hemos encontrado un error al procesar su solicitud. Por favor contacte a la administración.<br/> @enderror
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
                    <div class="u-size-30">
                        <div class="u-layout-row">
                            <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                                <div class="u-container-layout u-container-layout-2">
                                    <h4 class="u-text u-text-2">INSCRIPCIÓN GRUPAL</h4>
                                    <p class="u-text u-text-body-alt-color u-text-3">Por favor, complete y envíe el formulario con sus datos</p>
                                </div>
                            </div>
                            <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-3">
                                <div class="u-container-layout u-container-layout-3">
                                    <div class="u-form u-form-1">
                                        <form action="/store_group_inscription" method="POST" class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" enctype="multipart/form-data" style="padding: 0px;">
                                            @csrf
                                            <div class="u-form-group u-form-name">
                                                {{-- <label for="name-4c18" class="u-label">Nombre: *</label> --}}
                                                <input type="text" placeholder="Nombre de quien inscribe" id="name-4c18" name="name" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('name')}}">
                                            </div>
                                            <div class="u-form-email u-form-group">
                                                {{-- <label for="email-4c18" class="u-label">Email personal: *</label> --}}
                                                <input type="email" placeholder="Email de quien inscribe" id="email-4c18" name="email" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('email')}}">
                                            </div>
                                            <div class="u-form-group u-form-name">
                                                {{-- <label for="phone-4c18" class="u-label">Teléfono: *</label> --}}
                                                <input type="text" placeholder="Teléfono de quien inscribe" id="phone-4c18" name="phone" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('phone')}}">
                                            </div>                                            
                                            <div class="u-form-group u-form-name">
                                                {{-- <label for="phone-4c18" class="u-label">Teléfono: *</label> --}}
                                                <input type="text" placeholder="Institución" id="institution_name-4c18" name="institution_name" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('institution_name')}}">
                                            </div>
                                            {{-- <div class="u-form-group u-form-name">
                                                
                                                <select id="institution_type-4c18" name="institution_type" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10">
                                                    <option value="0" {{old('institution_type') == 0?"selected":""}}>Formal</option>
                                                        <option value="1" {{old('insitution_type')==1?"selected":""}}>No Formal</option>
                                                </select>
                                            </div> --}}
                                            <div class="u-form-group u-form-name">
                                                {{-- <label for="phone-4c18" class="u-label">Teléfono: *</label> --}}
                                                <input type="text" placeholder="Ciudad" id="city-4c18" name="city" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('city')}}">
                                            </div>
                                            <div class="u-form-group u-form-name">
                                                {{-- <label for="phone-4c18" class="u-label">Teléfono: *</label> --}}
                                                <input type="number" placeholder="Cantidad a inscribir" min="0" step="1" pattern="\d*" id="quantity_insc-4c18" name="quantity_insc" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('quantity_insc')}}">
                                            </div>
                                            <div class="u-form-group u-form-name">
                                                {{-- <label for="phone-4c18" class="u-label">Teléfono: *</label> --}}
                                                <input type="number" placeholder="Monto depositado" min="0" step="1" pattern="\d*" id="amount-4c18" name="amount" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('amount')}}">
                                            </div>
                                            <div class="u-form-group u-form-name">
                                                {{-- <label for="phone-4c18" class="u-label">Teléfono: *</label> --}}
                                                <input type="text" placeholder="Número de comprobante de pago" id="payment_ref-4c18" name="payment_ref" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('payment_ref')}}">
                                            </div>
                                            <div class="u-form-group u-form-name">
                                                {{-- <label for="phone-4c18" class="u-label">Teléfono: *</label> --}}
                                                <input type="file" placeholder="Adjunte un comprobante de pago" id="payment_img-4c18" name="payment_file" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="">
                                            </div>
                                            <div class="u-align-right u-form-group u-form-submit">                                                    
                                                <input type="submit" class="u-active-custom-color-3 u-border-2 u-border-active-white u-border-hover-white u-border-white u-btn u-btn-round u-btn-submit u-button-style u-hover-custom-color-4 u-none u-radius-50 u-btn-1" value="Enviar">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="u-align-center u-clearfix u-custom-color-4 u-footer u-footer" id="sec-ca3a"><div class="u-clearfix u-sheet u-sheet-1">
    <p class="u-small-text u-text u-text-variant u-text-1">Desarrollado por <a href="https://isf.uy/" class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-palette-1-base u-btn-1" target="_blank">ISF</a></p>
</div>
</footer>    
</body>
</html>