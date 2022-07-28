<!DOCTYPE html>
<html style="font-size: 16px;" lang="es-UY"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Proeducar
    Educación
    Uruguay
    Congreso
    transformación Educativa">
    <meta name="description" content="Vivenciando la transformación educativa es un evento organizado por AUDEC - Asociación Uruguaya de Educación Católica">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/nicepage.css" media="screen">
    <link rel="stylesheet" href="/css/inscripcion.css" media="screen">
    <script class="u-script" type="text/javascript" src="/js/jquery.js" ></script>    
    <meta name="generator" content="Nicepage 4.15.8, nicepage.com">
    <link rel="icon" href="/images/favicon1.png">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    @yield('custom_css')
    
    
    <script type="application/ld+json">{
        "@context": "http://schema.org",
        "@type": "Organization",
        "name": "Workshop_AUDEC"
    }</script>
    <meta name="theme-color" content="#ddd6f3">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="Vivenciando la transformación educativa es un evento organizado por AUDEC - Asociación Uruguaya de Educación Católica">
    <meta property="og:type" content="website">
</head>
<body class="u-body u-overlap u-xl-mode" data-lang="es"><header class="u-clearfix u-header u-palette-1-dark-1 u-sticky u-sticky-387b u-header" id="sec-055d"><div class="u-clearfix u-sheet u-sheet-1">
    <h5 class="u-custom-font u-font-raleway u-text u-text-default u-text-1">
        <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-white u-btn-1" href="Inicio.html" data-page-id="126800706">VIV​ENCIANDO LA&nbsp;<br>TRANSFORMACIÓN​&nbsp;<br>EDUCATIVA<span style="font-size: 1.875rem;"></span>
            <br>
        </a>
    </h5>
</div></header>
<section class="u-clearfix u-gradient u-section-1" id="sec-3ffd">
    <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
            <div class="u-gutter-0 u-layout">
                <div class="u-layout-col">
                    @yield('notifications')                
                    <div class="u-size-30">
                        <div class="u-layout-row">
                            <div class="u-container-style u-layout-cell u-opacity u-opacity-85 u-shape-rectangle u-size-30 u-layout-cell-2">
                                <div class="u-container-layout u-container-layout-2">
                                    <h4 class="u-text u-text-2">@yield('subtitle')</h4>
                                    <div class="u-container-style u-expanded-width u-group u-opacity u-opacity-70 u-radius-22 u-shape-round u-white u-group-1">
                                        <div class="u-container-layout u-valign-middle u-container-layout-3">
                                            <p class="u-text u-text-3">@yield('left-text-box')</p>
                                        </div>
                                    </div>
                                    @yield('left-form')
                                </div>
                            </div>
                            <div class="u-container-style u-layout-cell u-opacity u-opacity-85 u-shape-rectangle u-size-30 u-layout-cell-3">
                                <div class="u-container-layout u-container-layout-4">
                                    <div class="u-form u-form-1">
                                        @yield('form')
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
<style class="u-overlap-style">.u-overlap:not(.u-sticky-scroll) .u-header {
    background-color: #756c90 !important
}</style>


<footer class="u-align-center u-clearfix u-footer u-palette-1-dark-1 u-footer" id="sec-ca3a">
    <div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Desarrollado por <a href="https://isf.uy/" class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-alt-color u-btn-1" target="_blank">ISF</a>
        </p>
    </div>
</footer>
@yield('custom_script')  
</body>
</html>