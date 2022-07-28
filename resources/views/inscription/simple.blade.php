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
          @error('amount') El campo monto depositado no es correcto.<br/> @enderror
          @error('payment_ref') El campo referencia de pago no es correcto.<br/> @enderror
          @error('payment_file') El campo comprobante de pago no es correcto.<br/> @enderror
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
Por favor, complete y envíe el formulario con sus datos
@endsection
@section('form')
<form action="/store_inscription" method="POST" class="u-clearfix u-form-spacing-12 u-form-vertical u-inner-form" source="custom" name="Inscripción Individual" style="padding: 18px;" enctype="multipart/form-data" >
  @csrf
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
    <input type="text" placeholder="Cédula de Identidad (1234567-8)" id="name-b2b6" name="document" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white u-input-3" required="" value="{{old('document')}}">
  </div>
  <div class="u-form-email u-form-group">
    <label for="email-05a8" class="u-form-control-hidden u-label"></label>
    <input type="email" placeholder="email" id="email-05a8" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white u-input-4" required=""  value="{{old('email')}}">
  </div>
  <div class="u-form-group u-form-phone u-form-group-5">
    <label for="phone-bfdf" class="u-form-control-hidden u-label"></label>
    <input type="tel" placeholder="Teléfono" id="phone-bfdf" name="phone" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white u-input-5" required=""  value="{{old('phone')}}">
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
    <input type="text" placeholder="Institución" id="text-59c6" name="institution_name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white u-input-6"  value="{{old('institution_name')}}">
  </div>                                            
  <div class="u-form-group u-form-group-8">
    <label for="text-8b97" class="u-form-control-hidden u-label"></label>
    <input type="text" placeholder="Ciudad" id="text-8b97" name="city" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white u-input-8"  value="{{old('city')}}">
  </div>
  <div class="u-form-group u-form-group-9">
    <label for="text-1207" class="u-form-control-hidden u-label"></label>
    <input type="text" placeholder="Monto depositado" id="text-1207" name="amount" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white u-input-9"  value="{{old('amount')}}">
  </div>
  <div class="u-form-group u-form-group-10">
    <label for="text-83e2" class="u-form-control-hidden u-label"></label>
    <input type="text" placeholder="Número de comprobante de pago" id="text-83e2" name="payment_ref" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white u-input-10"  value="{{old('payment_ref')}}">
  </div>
  <div class="u-form-group u-form-group-11">
    <label for="text-c55e" class="u-form-control-hidden u-label"></label>
    <input type="file" placeholder="Adjunte un comprobante de pago" id="payment_file-4c18" name="payment_file" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10" required="">
  </div>
  <div class="u-align-right u-form-group u-form-submit">                                                    
    <input type="submit" class="u-active-custom-color-3 u-border-2 u-border-active-white u-border-hover-white u-border-white u-btn u-btn-round u-btn-submit u-button-style u-hover-custom-color-4 u-none u-radius-50 u-btn-1" value="Enviar">
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
</script>    
@endsection 