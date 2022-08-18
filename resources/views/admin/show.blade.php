@extends('layouts.admintemplate')
@section('title')
Admin Panel
@endsection
@section('custom_style')
@endsection
@section('container_body')
<!--Container-->
<div class="container w-full mx-auto pt-20">
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 m-0 rounded relative" role="alert">
        @foreach ($errors->all() as $error)        
        <span class="block">{{ $error }}</span><br/>
        @endforeach        
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>    
    @endif
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">        
        <div class="flex flex-row flex-wrap flex-grow mt-2">
            <div class="w-full md:w-1/4 p-3">
                <!--Table Card-->                
                <div class="h-full bg-white border rounded shadow">
                    <div class="border-b p-3">
                        <h5 class="font-bold uppercase text-gray-600">Datos Personales</h5>
                    </div>                    
                    <div class="w-full overflow-hidden shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <div class="u-form u-form-1">
                                <form action="/admin/user_data/{{$inscription->userData->id}}" method="POST" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="customphp" name="form" style="padding: 10px;">
                                    @csrf
                                    @method('PUT')
                                    <div class="flex items-center border-b @error('name') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                                        <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Nombre" aria-label="Nombre" name="name" value="{{$inscription->userData->name}}"/>	  
                                    </div>
                                    <div class="flex items-center border-b @error('lastname') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                                        <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Apellido" aria-label="Apellido" name="lastname" value="{{$inscription->userData->lastname}}"/>	  
                                    </div>
                                    <div class="flex items-center border-b @error('document') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                                        <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Documento" aria-label="Documento" name="document" value="{{$inscription->userData->document}}"/>	  
                                    </div>
                                    <div class="flex items-center border-b @error('email') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                                        <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="E-Mail" aria-label="E-Mail" name="email" value="{{$inscription->userData->email}}"/>	  
                                    </div>
                                    <div class="flex items-center border-b @error('phone') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                                        <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Teléfono" aria-label="Teléfono" name="phone" value="{{$inscription->userData->phone}}"/>	  
                                    </div>
                                    {{-- <div class="flex items-center border-b @error('email') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                                        <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="E-Mail" aria-label="E-Mail" name="email" value="{{$inscription->userData->email}}"/>	  
                                    </div> --}}
                                    <div class="">
                                        <div class="pt-3">
                                            <button type="submit" class="bg-gray-400 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-white rounded-xl">
                                                Guardar cambios
                                            </button>                
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!--/table Card-->
            </div>
            
            <div class="w-full md:w-1/4 p-3">
                <!--Table Card-->                
                <div class="h-full bg-white border rounded shadow">
                    <div class="border-b p-3">
                        <h5 class="font-bold uppercase text-gray-600">Datos de la institución</h5>
                    </div>                    
                    <div class="w-full overflow-hidden shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <div class="flex items-center border-b py-2 w-100">
                                <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" value="{{$inscription->institution->institution}}" readonly/>	  
                            </div>
                            {{-- <div class="flex items-center border-b py-2 w-100">
                                <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" value="{{($inscription->institution->is_formal_institution ==1)?"Formal":"No Formal"  }}" readonly/>	  
                            </div> --}}
                            <div class="flex items-center border-b py-2 w-100">
                                <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" value="{{$inscription->institution->city}}" readonly/>	  
                            </div>                            
                        </div>
                    </div>                    
                    <div class="border-b p-3 mt-3">
                        <h5 class="font-bold uppercase text-gray-600">WorkShops</h5>
                    </div>                    
                    <div class="w-full overflow-hidden shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <form action="/admin/inscription/{{$inscription->id}}" method="POST" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="customphp" name="form" style="padding: 10px;">
                                @csrf
                                @method('PUT')                                
                                <div class="flex items-center border-b @error('first_workshop_group') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                                    <select name="first_workshop_group_id" id="first_workshop_group_id" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">
                                        <option value="0" {{($inscription->first_workshop_group_id == 0)?"Selected":""}}>No asistiré</option>
                                        @foreach ($first_workshop_groups as $first_workshop_group)
                                        <option value="{{$first_workshop_group->id}}" {{($first_workshop_group->id == $inscription->first_workshop_group_id)?"Selected":""}}>{{$first_workshop_group->full_name}}</option>                                                
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex items-center border-b @error('first_workshop_group') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                                    <select name="second_workshop_group_id" id="second_workshop_group_id" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">
                                        <option value="0" {{($inscription->second_workshop_group_id == 0)?"Selected":""}}>No asistiré</option>
                                        @foreach ($second_workshop_groups as $second_workshop_group)
                                        <option value="{{$second_workshop_group->id}}" {{($second_workshop_group->id == $inscription->second_workshop_group_id)?"Selected":""}}>{{$second_workshop_group->full_name}}</option>                                                
                                        @endforeach
                                    </select>
                                </div>
                                <div class="">
                                    <div class="pt-3">
                                        <button type="submit" class="bg-gray-400 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-white rounded-xl">
                                            Guardar cambios
                                        </button>                
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>                    
                </div>
                <!--/table Card-->
                
            </div>
            
            <div class="w-full md:w-1/4 p-3">
                <!--Table Card-->                
                <div class="h-full bg-white border rounded shadow">
                    <div class="border-b p-3">
                        <h5 class="font-bold uppercase text-gray-600">Datos del pago</h5>
                    </div>                    
                    <div class="w-full overflow-hidden shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <div class="flex items-center border-b py-2 w-100">
                                <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" value="{{$inscription->payment->amount_deposited}}" readonly/>	  
                            </div>
                            <div class="flex items-center border-b py-2 w-100">
                                <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" value="{{$inscription->payment->reference}}" readonly/>	  
                            </div>
                            <div class="justify-center flex items-center border-b py-2 w-100">
                                <a class="w-9/12" href="{{$inscription->payment->url_payment}}" target="_blank"><img src="{{$inscription->payment->url_payment}}" alt="payment" onerror="this.src='/assetsadmin/images/payment_default.png'"></a>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                <!--/table Card-->
            </div>
            
            <div class="w-full md:w-1/4 p-3">
                <!--Table Card-->                
                <div class="h-full bg-white border rounded shadow">
                    <div class="border-b p-3">
                        <h5 class="font-bold uppercase text-gray-600">Acciones</h5>
                    </div>                    
                    <div class="w-full overflow-hidden shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <div class="flex items-center py-2 w-100">
                                <a href="{!!$inscription->certificateUrl()!!}" class="mx-3.5 border-b bg-gray-400 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-white rounded-xl">
                                    link a certificado <i class="fas fa-certificate"></i>
                                </a>
                            </div>
                            <div class="flex items-center py-2 w-100">
                                <a href="/admin/resend_qr/{{$inscription->id}}" class="mx-3.5 border-b bg-gray-400 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-white rounded-xl">
                                    Reenviar código <i class="fas fa-qrcode"></i> 
                                </a>
                            </div>
                            <form action="/admin/attendance" method="post">
                                @csrf
                                <input type="hidden" name="inscription_id" value="{{$inscription->id}}">
                                <div class="flex items-center @error('name') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                                    <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="date" placeholder="Nombre" aria-label="" name="acreditation_date" value=""/>	  
                                </div>
                                <div class="flex items-center py-2 w-100">
                                    <button type="submit" class="bg-gray-400 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-white rounded-xl">
                                        Acreditación Manual
                                    </button>
                                </div>
                            </form>
                            <div class="flex items-center py-2 w-100">                                
                                <ul>
                                    @foreach ($inscription->attendances as $attendance)
                                    <li>{{Carbon\Carbon::parse($attendance->date)->format('d-m-Y')}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!--/table Card-->
            </div>
            
            
        </div>
        
        <!--/ Console Content-->
        
    </div>
    
    
</div> 
<!--/container-->
@endsection