@extends('layouts.formtemplate')
@section('title')
Inscripción Indivudual
@endsection
@section('notifications')
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
@endsection
@section('subtitle')
INSCRIPCIÓN INDIVIDUAL
@endsection
@section('left-text-box')
<p>
    Por favor, complete el formulario con sus datos.
  </p>
  <p>
    El miércoles 28 de setiembre cada participante podrá visitar dos centros educativos miembros de AUDEC que ya están implementando experiencias de transformación.
  </p>
  <span>
      Centros disponibles para visitar:
</span>
    <ul>
      <li>
        Colegio Juan Zorrilla de San Martín - Hermanos Maristas - Ciclo Básico, Ed. Inicial y Primaria.
      </li>
      <li>
        Colegio y Liceo San Francisco de Sales - Maturana - Salesianos- Ciclo Básico
      </li>
      <li>
        Colegio San Ignacio - Jesuitas - Ciclo Básico y Bachillerato.      
      </li>
      <li>
        Colegio Stella Maris - Christian Brothers - Ed. Inicial.
      </li>
    </ul>
  <p>
    Las visitas tienen una duración de dos horas cada una.
  </p>
  <p>
    Seleccione la institución que desee visitar en cada turno según su interés.
  </p>
  <p>
    Sólo se mostrarán los colegios con cupos disponibles.
  </p>
@endsection
@section('form')
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
        <input type="text" placeholder="Cédula de Identidad (12345678)" id="document-4c18" name="document" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="" value="{{old('document')}}" onblur="clean_document(this)">
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
        <a onclick="$(this).closest('form').submit()" class="custom-page-typo-item u-active-custom-color-22 u-border-2 u-border-active-palette-1-light-2 u-border-hover-palette-1-dark-1 u-border-palette-1-dark-1 u-btn u-btn-submit u-button-style u-hover-palette-1-dark-1 u-palette-1-light-3 u-btn-1">Enviar</a>
    </div>
</form>
@endsection
@section('custom_script') 
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

    function clean_document(element){
        let input = $(element);
        let input_val = input.val();
        new_input_val = input_val.replace(/\D/g, "");
        input.val(new_input_val);
    }
    </script>
@endsection