<!DOCTYPE html>
<html style="font-size: 16px;">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Solicitud de certificado</title>
    <link rel="stylesheet" href="/css/nicepage.css?v=13" media="screen">
    <link rel="stylesheet" href="/css/inscripcion.css?v=13" media="screen">
    <script class="u-script" type="text/javascript" src="/js/jquery.js?v=6" defer=""></script>
    {{-- <script class="u-script" type="text/javascript" src="nicepage.js?v=6" defer=""></script> --}}
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
    <meta property="og:title" content="Solicitud de certificado">
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
<section class="u-clearfix u-gradient u-section-1" id="sec-3ffd"  style="min-height: calc(100vh - 76px)">
    <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
            <div class="u-gutter-0 u-layout">
                <div class="u-layout-col">                                       
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
                    <div class="u-size-30">
                        <div class="u-layout-row">
                            <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                                <div class="u-container-layout u-container-layout-2">
                                    <h4 class="u-text u-text-2">SOLICITUD DE CERTIFICADO</h4>
                                    <p class="u-text u-text-body-alt-color u-text-3">Ingrese su documento y le enviaremos a su mail un link donde podrá descargar el certificado.</p>
                                </div>
                            </div>
                            <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-3">
                                <div class="u-container-layout u-container-layout-3">
                                    <div class="u-form u-form-1">
                                        <form class="w-full max-w-sm" action="{{Route('inscription.certificateRecoveryMail')}}" method="POST">
                                            @csrf
                                            <div class="u-form-group u-form-name">
                                                <label for="document-05a8" class="u-form-control-hidden u-label"></label>
                                                <input type="text" placeholder="Ingrese el documento" id="document-05a8" name="document" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white u-input-1" required="" value="{{old('document')}}">
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