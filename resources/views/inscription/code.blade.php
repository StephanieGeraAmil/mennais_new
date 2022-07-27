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
    <title>Inscripción Indivudual</title>
    <link rel="stylesheet" href="/css/nicepage.css" media="screen">
    <link rel="stylesheet" href="/css/inscripcion.css" media="screen">
    <script class="u-script" type="text/javascript" src="/js/jquery.js"></script>
    <script class="u-script" type="text/javascript" src="/js/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.14.1, nicepage.com">
    <link rel="icon" href="images/favicon1.png">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <script type="application/ld+json">{
        "@context": "http://schema.org",
        "@type": "Organization",
        "name": "Workshop_AUDEC"
    }</script>
    <meta name="theme-color" content="#ddd6f3">
    <meta property="og:title" content="Inscripción Indivudual">
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
                                        @error('lastname')  El campo apellido no es correcto.<br/>  @enderror
                                        @error('document')  {{ ($message == "The document has already been taken.")?"El documento ya está en uso": "El campo documento no es válido." }}.<br/> @enderror
                                        @error('email')  El campo email no es correcto.<br/>  @enderror
                                        @error('phone') El campo teléfono no es correcto.<br/> @enderror
                                        @error('institution_name') El campo institución no es correcto.<br/> @enderror
                                        @error('institution_type') El campo tipo de institución no es correcto.<br/> @enderror
                                        @error('city') El campo ciudad no es correcto.<br/> @enderror
                                        @error('code') El código no es correcto, por favor contacte con la administración.<br/> @enderror                                        
                                    </h5>                         
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="u-size-30">
                        <div class="u-layout-row">
                            <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                                <div class="u-container-layout u-container-layout-2">
                                    <h4 class="u-text u-text-2">INSCRIPCIÓN INDIVIDUAL</h4>
                                    <p class="u-text u-text-body-alt-color u-text-3">Por favor, complete y envíe el formulario con sus datos</p>
                                </div>
                            </div>
                            <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-3">
                                <div class="u-container-layout u-container-layout-3">
                                    <div class="u-form u-form-1">
                                        <form action="/store_code_inscription" method="POST" class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" enctype="multipart/form-data" style="padding: 0px;">
                                            @csrf
                                            <input type="hidden" name="code" value="{{$code->id}}">
                                            
                                            <div class="u-form-group u-form-name">                                                
                                                <input type="text" placeholder="Ingrese su nombre" id="name-4c18" name="name" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('name')}}">
                                            </div>
                                            <div class="u-form-group u-form-name">                                                
                                                <input type="text" placeholder="Ingrese su apellido" id="lastname-4c18" name="lastname" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('lastname')}}">
                                            </div>
                                            <div class="u-form-group u-form-name">                                                
                                                <input type="text" placeholder="Cédula de Identidad (1234567-8)" id="document-4c18" name="document" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('document')}}">
                                            </div>
                                            <div class="u-form-email u-form-group">                                                
                                                <input type="email" placeholder="Ingrese su email" id="email-4c18" name="email" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{$code->email}}" readonly>
                                            </div>
                                            <div class="u-form-group u-form-name">                                                
                                                <input type="text" placeholder="Ingrese su teléfono" id="phone-4c18" name="phone" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('phone')}}">
                                            </div>
                                            <div class="u-form-group u-form-select u-form-group-7">
                                                <label for="first_workshop_group_id" class="u-form-control-hidden u-label"></label>
                                                <div class="u-form-select-wrapper">
                                                    <select id="first_workshop_group_id" name="first_workshop_group_id" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white">
                                                        @foreach ($first_workshop_groups as $first_workshop_group)
                                                            <option value="{{$first_workshop_group->id}}">{{$first_workshop_group->getString()}}</option>
                                                        @endforeach
                                                        <option value="0">No asistiré en este horario</option>
                                                    </select>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                                                </div>
                                            </div>
                                            <div class="u-form-group u-form-select u-form-group-7">
                                                <label for="second_workshop_group_id" class="u-form-control-hidden u-label"></label>
                                                <div class="u-form-select-wrapper">
                                                    <select id="second_workshop_group_id" name="second_workshop_group_id" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white">     
                                                    </select>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                                                </div>
                                            </div>
                                            <div class="u-form-group u-form-group-6">
                                                <label for="text-59c6" class="u-form-control-hidden u-label"></label>
                                                <input type="text" placeholder="Institución" id="text-59c6" name="institution_name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white u-input-6"  value="{{$institution->institution}}">
                                            </div>
                                            <div class="u-form-group u-form-group-8">
                                                <label for="text-8b97" class="u-form-control-hidden u-label"></label>
                                                <input type="text" placeholder="Ciudad" id="text-8b97" name="city" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white u-input-8"  value="{{$institution->city}}">
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
<footer class="u-align-center u-clearfix u-footer u-palette-1-dark-1 u-footer" id="sec-ca3a">
    <div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Desarrollado por <a href="https://isf.uy/" class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-alt-color u-btn-1" target="_blank">ISF</a></p>
    </div>
</footer>
<script>
    jQuery( document ).ready(function() {
        loadSecondWorkshopGroup();
        $('#first_workshop_group_id').change(function(ev){
            loadSecondWorkshopGroup();
        })
    });
    
    function loadSecondWorkshopGroup(){
        let first_workshop_group = $('#first_workshop_group_id').val();
        let second_workshop_group = $('#second_workshop_group_id');
        $.ajax({
            url: '/api/second_workshop_group/'+first_workshop_group
        }).done(function(data){
            second_workshop_group.children().remove();
            if('data' in data){
                if(Array.isArray(data.data)){
                    data.data.forEach(function(valor, indice, array){
                        second_workshop_group.append(new Option(valor.text,valor.id));
                    });
                    second_workshop_group.append(new Option('No asistiré en este horario.',0));
                }
            }
        });
    }
    </script>
</body>
</html>