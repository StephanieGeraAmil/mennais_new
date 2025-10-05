<!DOCTYPE html>
<html style="font-size: 16px;" lang="es-UY">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">

   <title>Congreso Pedagógico</title>

    <link rel="stylesheet" href="/css/nicepage-form.css" media="screen" />
    <link rel="stylesheet" href="/css/index-form.css" media="screen" />
    <script
        class="u-script"
        type="text/javascript"
        src="js/jquery.js"
        defer=""
    ></script>
    <script
        class="u-script"
        type="text/javascript"
        src="js/nicepage-form.js"
        defer=""
    ></script>
    <meta name="generator" content="isf.uy">
    <link rel="icon" href="images/favicon1.png">

    <link
        id="u-page-google-font"
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?display=swap&amp;family=Roboto:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800"
    />
    <script type="application/ld+json">
        {
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
        }
    </script>

    <meta name="theme-color" content="#478ac9" />
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
    <meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>
  <body 
  data-path-to-root="./" 
  data-include-products="false" 
  class="u-body u-clearfix u-xl-mode"
  data-lang="es">


    <section 
     class="u-clearfix u-container-align-center u-section-1"
            id="block-1">
          <div
                class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1"
            >
                <img
                    class="u-align-center .u-image.u-logo img"
                    src="images/logo_sist.png"
                    alt=""
                    {{-- data-image-width="750"
                    data-image-height="240" --}}
                />
            </div>
            </section>
    <section class="u-clearfix u-section-2" id="block-6">
        <div class="u-clearfix u-sheet u-sheet-1">
             @yield('title') 
               
        </div>
    </section>
    <section 
        class="u-clearfix u-palette-2-light-2 u-section-4"
        id="block-7" >
        @yield('notifications') 
     </section>
     {{-- <section class="u-clearfix u-section-3" id="block-3">
            <div
                class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1"
            >
                <p class="u-align-center u-text u-text-1">
                    Acá va toda la info escrita de cómo se debe rellenar el
                    formulario, con qué campos, qué se debe adjuntar, qué
                    opciones elegir de los combos, etc. etc. etc.
                </p>
            </div>
        </section> --}}
   <section class="u-clearfix u-section-6" id="block-2">
            <div class="u-clearfix u-sheet u-valign-top u-sheet-1">
                <div class="u-align-center u-form u-form-1">
                    @section('info')
                    @yield('form')
                </div>
            </div>
    </section>

     {{-- <section class="u-clearfix u-grey-25 u-section-8" id="block-5">
            <div class="u-clearfix u-sheet u-sheet-1">
                <p class="u-align-center u-text u-text-1">
                    Este bloque está previsto para utilizar como footer si se
                    necesitara.
                </p>
            </div>
        </section> --}}

</body>
</html>