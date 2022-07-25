<!DOCTYPE html>
<html style="font-size: 16px;">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Inscripción Grupal</title>
    <link rel="stylesheet" href="/css/nicepage.css?v=13" media="screen">
    <link rel="stylesheet" href="/css/inscripcion.css?v=13" media="screen">
    <script class="u-script" type="text/javascript" src="/js/jquery.js?v=6" defer=""></script>
    {{-- <script class="u-script" type="text/javascript" src="nicepage.js?v=6" defer=""></script> --}}
    <meta name="generator" content="Nicepage 4.11.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
<body class="u-body u-overlap u-xl-mode">
    <i class="fa-solid fa-user-check"></i>
    <header class="u-clearfix u-custom-color-4 u-header u-sticky u-sticky-387b u-header" id="sec-055d">
        <div class="u-clearfix u-sheet u-sheet-1">
            <a href="/" data-page-id="126800706" class="u-image u-logo u-image-1" data-image-width="150" data-image-height="150" title="Inicio">
                <img src="/images/ano_cab.png" class="u-logo-image u-logo-image-1">
            </a>
            <h5 class="u-custom-font u-font-raleway u-text u-text-default u-text-1">
                <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-white u-btn-1" href="/" data-page-id="126800706">PROEDUCAR<span style="font-weight: 700;"></span>
                </a>
            </h5>
        </div>
    </header>    
    <section class="u-clearfix u-gradient u-section-1" id="sec-3ffd"  style="min-height: calc(100vh - 102px)">
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
                                            @error('email')  {{ ($message == "The email has already been taken.")?"Ya se envió un código a este email.": "El campo email no es válido." }}.<br/> @enderror                                            
                                        </h5>                         
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif 
                        
                        <div class="u-size-30">
                            <div class="u-layout-row">                                
                                <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-3" style="padding: 10px 0 0 0;">
                                    <div class="u-container-layout u-container-layout-3">                                        
                                        <h4 class="u-text u-text-2">INSCRIPCIÓN GRUPAL</h4>
                                        <p class="u-text u-text-body-alt-color u-text-3" style="color:white">
                                            Por favor ingrese el correo de las personas que desea invitar (UNO POR VEZ) y presione ENVIAR.<BR/><BR/>
                                            De esta forma, cada invitado recibirá un mail para completar su inscripción con sus datos personales.<BR/><BR/>
                                            Puede chequear si sus invitados completaron su inscripción volviendo a esta web a través del link que recibió en su correo.<BR/><BR/>
                                        </p>
                                        <div class="u-form u-form-1">
                                            <form action="/send_inscripton" method="POST" class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" enctype="multipart/form-data" style="padding: 0px;">
                                                @csrf
                                                <input type="hidden" name="group_inscription_id" value="{{$group_inscription->id}}">
                                                <div class="u-form-email u-form-group">                                                    
                                                    <input type="email" placeholder="Email para enviar invitación" id="email-4c18" name="email" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('email')}}">
                                                </div>
                                                <div class="u-align-right u-form-group u-form-submit">                                                    
                                                    <input type="submit" class="u-active-custom-color-3 u-border-2 u-border-active-white u-border-hover-white u-border-white u-btn u-btn-round u-btn-submit u-button-style u-hover-custom-color-4 u-none u-radius-50 u-btn-1" value="Enviar">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2" style="padding: 25px 0 0 0;">
                                    <div class="u-container-layout u-container-layout-2">
                                        {{-- Table --}}
                                        <div class="u-container-style u-layout-cell u-opacity u-opacity-90 u-radius-15 u-shape-round u-size-30 u-white u-layout-cell-2">
                                            <div class="u-container-layout u-valign-top u-container-layout-2" style="min-height: 460px;">
                                                <h5 class="u-text u-text-custom-color-2 u-text-default u-text-2">Invitaciones enviadas: {{$group_inscription->usedCodes()}} / Restantes: {{$group_inscription->codes->count() - $group_inscription->usedCodes() }}</h5>
                                                <div class="u-expanded-width u-table u-table-responsive u-table-2">
                                                    <div style="width: 100%;border-bottom: 1px solid #D3D3D3;padding: 3px;"></div>
                                                    <TABLE>
                                                        @foreach ($group_inscription->codes as $code)
                                                        @if ($code->status > 0)
                                                        <TR>
                                                            <td style="width: 45px">@if ($code->status == 1) <i class="fa-solid fa-user-clock" style="color:#A9A9A9"></i> @else <i class="fa-solid fa-user-check" style="color:#00A36C "></i> @endif</td>
                                                            <td>{{$code->email}}</td>
                                                            <td>
                                                                <form action="/code/{{$code->id}}/delete" method="post" id="delete_{{$code->id}}">
                                                                    @csrf
                                                                    <input type="hidden" name="group_id" value="{{$group_inscription->id}}" >
                                                                    <input type="hidden" name="code" value="{{$group_inscription->code}}" >          
                                                                </form>
                                                                @if ($code->status == 1) <i class="fa-solid fa-trash" style="color:#A9A9A9" onclick="delete_item('delete_{{$code->id}}')"></i>@endif</td>
                                                            </TR>                                                            
                                                            @endif
                                                            @endforeach
                                                        </TABLE>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>    
        <footer class="u-align-center u-clearfix u-custom-color-4 u-footer u-footer" id="sec-ca3a">
            <div class="u-clearfix u-sheet u-sheet-1">
                <p class="u-small-text u-text u-text-variant u-text-1">Desarrollado por <a href="https://isf.uy/" class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-palette-1-base u-btn-1" target="_blank">ISF</a></p>
            </div>
        </footer>   
        <script>
            function delete_item(form_id){
                if(confirm('Está seguro que desea eliminar esta invitación.')){
                    $('#'+form_id).submit();
                }
            }    
        </script> 
    </body>
    </html>