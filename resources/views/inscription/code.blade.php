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
Por favor, complete el formulario con sus datos.
@endsection
@section('form')
<form action="/store_code_inscription" method="POST" class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" enctype="multipart/form-data" style="padding: 0px;">
    @csrf
    <input type="hidden" name="code" value="{{$code->id}}">
    
    <div class="u-form-group u-form-name">
        <label for="name-05a8" class="u-form-control-hidden u-label"></label>
        <input type="text" placeholder="Nombre" id="name-05a8" name="name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white u-input-1" required="" value="{{old('name')}}">
      </div>
      <div class="u-form-group u-form-group-2">
        <label for="text-8cb6" class="u-form-control-hidden u-label"></label>
        <input type="text" placeholder="Apellido" id="text-8cb6" name="lastname" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white u-input-2" value="{{old('lastname')}}">
      </div>
      <div class="u-form-group u-form-name u-form-group-3">
        <label for="name-b2b6" class="u-form-control-hidden u-label"></label>
        <input type="text" placeholder="Cédula de Identidad, sin puntos ni guiones (12345678)" id="name-b2b6" name="document" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white u-input-3" onblur="clean_document(this)" required="" value="{{old('document')}}">
      </div>
      <div class="u-form-email u-form-group">
        <label for="email-05a8" class="u-form-control-hidden u-label"></label>
        <input type="email" placeholder="email" id="email-05a8" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white u-input-4" required=""  value="{{$code->email}}" readonly>
      </div>
      <div class="u-form-group u-form-phone u-form-group-5">
        <label for="phone-bfdf" class="u-form-control-hidden u-label"></label>
        <input type="tel" placeholder="Teléfono" id="phone-bfdf" name="phone" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white u-input-5" required=""  value="{{old('phone')}}">
      </div>
      <div class="u-form-group u-form-group-6">
        <label for="text-59c6" class="u-form-control-hidden u-label"></label>
        <input type="text" placeholder="Centro Educativo" id="text-59c6" name="extra[centro_educativo]" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white u-input-6"  value="{{old('extra.centro_educativo')??$code->institution}}">    
      </div>  
      <div class="u-form-group u-form-group-11">
        <label for="text-c55e" class="u-form-control-hidden u-label"></label>
        <select id="place" name="extra[place]" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10">
          <option value="montevideo">Montevideo</option>
          <option value="interior">Interior</option>
        </select>
      </div>
      <div class="u-form-group u-form-group-11">
        <label for="text-c55e" class="u-form-control-hidden u-label"></label>
        <select id="place" name="extra[role]" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10">
          <option value="docente">Docente</option>
          <option value="gestión">Gestión</option>
        </select>
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