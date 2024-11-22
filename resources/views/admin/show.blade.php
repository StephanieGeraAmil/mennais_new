@extends('layouts.admintemplate')
@section('title')
    Admin Panel
@endsection
@section('custom_style')
@endsection
@section('container_body')
    <div class="container w-full mx-auto pt-20">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 m-0 rounded relative" role="alert">
                @foreach ($errors->all() as $error)
                    <span class="block">{{ $error }}</span><br />
                @endforeach
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        @endif
        <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
            <div class="flex flex-row flex-wrap flex-grow mt-2">
                <div class="w-full md:w-1/4 p-3">
                    <div class="h-full bg-white border rounded shadow">
                        <div class="border-b p-3">
                            <h5 class="font-bold uppercase text-gray-600">Datos Personales</h5>
                        </div>
                        <div class="w-full overflow-hidden shadow-xs">
                            <div class="w-full overflow-x-auto">
                                <div class="u-form u-form-1">
                                    <form action="/admin/user_data/{{ $inscription->userData->id }}" method="POST"
                                        class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="customphp"
                                        name="form" style="padding: 10px;">
                                        @csrf
                                        @method('PUT')
                                        <div
                                            class="flex items-center border-b @error('name') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                                            <input
                                                class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                                type="text" placeholder="Nombre" aria-label="Nombre" name="name"
                                                value="{{ $inscription->userData->name }}" />
                                        </div>
                                        <div
                                            class="flex items-center border-b @error('document') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                                            <input
                                                class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                                type="text" placeholder="Documento" aria-label="Documento"
                                                name="document" value="{{ $inscription->userData->document }}" />
                                        </div>
                                        <div
                                            class="flex items-center border-b @error('email') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                                            <input
                                                class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                                type="text" placeholder="E-Mail" aria-label="E-Mail" name="email"
                                                value="{{ $inscription->userData->email }}" />
                                        </div>
                                        <div class="flex items-center border-b py-2 w-100">
                                            <select id="type" name="type"
                                                class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10">
                                                <option value="virtual"
                                                    {{ old('type') ?? $inscription->type->value == 'virtual' ? 'Selected' : '' }}>
                                                    {{ App\Enums\InscriptionTypeEnum::REMOTO->text() }}</option>
                                                <option value="hibrido"
                                                    {{ old('type') ?? $inscription->type->value == 'hibrido' ? 'Selected' : '' }}>
                                                    {{ App\Enums\InscriptionTypeEnum::HIBRIDO->text() }}</option>
                                            </select>
                                        </div>
                                        <div
                                        class="flex items-center border-b @error('institution_name') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                                        <input
                                            class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                            type="text" placeholder="Ciudad" aria-label="Ciudad"
                                            name="city"
                                            value="{{ $inscription->userData->city }}" />
                                    </div>
                                        <div
                                            class="flex items-center border-b @error('institution_name') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                                            <input
                                                class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                                type="text" placeholder="Institucion" aria-label="Institucion"
                                                name="institution_name"
                                                value="{{ $inscription->userData->institution_name }}" />
                                        </div>
                                        {{-- <div
                                            class="flex items-center border-b @error('institution_type') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                                            <input
                                                class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                                type="text" placeholder="Tipo de institución"
                                                aria-label="Tipo de institución" name="institution_type"
                                                value="{{ $inscription->userData->institution_type }}" />
                                        </div> --}}
                                        <div class="flex items-center border-b py-2 w-100">
                                            <select id="institution_type" name="institution_type"
                                                class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10">
                                                <option value="Educación Inicial"
                                                    {{ old('type') ?? $inscription->userData->institution_type == 'Educación Inicial' ? 'Selected' : '' }}>
                                                    Educación Inicial</option>
                                                <option value="Primaria"
                                                    {{ old('type') ?? $inscription->userData->institution_type == 'Primaria' ? 'Selected' : '' }}>
                                                    Primaria</option>
                                                <option value="Secundaria"
                                                    {{ old('type') ?? $inscription->userData->institution_type == 'Secundaria' ? 'Selected' : '' }}>
                                                    Secundaria</option>
                                                <option value="Dirección General"
                                                    {{ old('type') ?? $inscription->userData->institution_type == 'Dirección General' ? 'Selected' : '' }}>
                                                    Dirección General</option>
                                                <option value="Otro"
                                                    {{ old('type') ?? $inscription->userData->institution_type == 'Otro' ? 'Selected' : '' }}>
                                                    Otro</option>


                                            </select>
                                        </div>
                                        <div class="">
                                            <div class="pt-3">
                                                <button type="submit"
                                                    class="bg-gray-400 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-white rounded-xl">
                                                    Guardar cambios
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/4 p-3">
                    <div class="h-full bg-white border rounded shadow">
                        <div class="border-b p-3">
                            <h5 class="font-bold uppercase text-gray-600">Datos Extras</h5>
                        </div>
                        <div class="w-full overflow-hidden shadow-xs">
                            {{--     <div class="w-full overflow-x-auto">
                            @foreach ($inscription?->userData?->jsonextra ?? [] as $key => $extra)
                            <div class="m-2"><label for="">{{$key}}: {{$extra}}</label></div>
                            @endforeach                                
                        </div>      --}}

                            {{-- <form action="/admin/user_data/{{ $inscription->userData->id }}" method="POST"
                                class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="customphp"
                                name="form" style="padding: 10px;">
                                @csrf
                                @method('PUT')
                                <div
                                    class="flex items-center border-b @error('name') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                                    <input
                                        class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                        type="text" placeholder="Institucion" aria-label="Institucion" name="institution_name"
                                        value="{{ $inscription->userData->institution_name }}" />
                                </div>
                                <div
                                    class="flex items-center border-b @error('document') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                                    <input
                                        class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                        type="text" placeholder="Tipo de institución" aria-label="Tipo de institución" name="institution_type"
                                        value="{{ $inscription->userData->institution_type }}" />
                                </div>
                               
                                <div class="">
                                    <div class="pt-3">
                                        <button type="submit"
                                            class="bg-gray-400 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-white rounded-xl">
                                            Guardar cambios
                                        </button>
                                    </div>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/4 p-3">
                    <div class="h-full bg-white border rounded shadow">
                        <div class="border-b p-3">
                            <h5 class="font-bold uppercase text-gray-600">Datos del pago</h5>
                        </div>
                        <div class="w-full overflow-hidden shadow-xs">
                            <div class="w-full overflow-x-auto">
                                <div class="flex items-center border-b py-2 w-100">
                                    <input
                                        class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                        type="text" value="{{ $inscription->payment->amount_deposited }}" readonly />
                                </div>
                                <div class="flex items-center  py-2 w-100">
                                    <input
                                        class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                        type="text" value="{{ $inscription->payment->reference }}" readonly />
                                </div>
                                <div class="justify-center flex items-center border-b py-2 w-100">
                                    <a class="w-9/12" href="{{ $inscription->payment->url_payment }}" target="_blank"><img
                                            src="{{ $inscription->payment->url_payment }}" alt="payment"
                                            onerror="this.src='/assetsadmin/images/payment_default.png'"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/4 p-3">
                    <div class="h-full bg-white border rounded shadow">
                        <div class="border-b p-3">
                            <h5 class="font-bold uppercase text-gray-600">Acciones</h5>
                        </div>
                        <div class="w-full overflow-hidden shadow-xs">
                            <div class="w-full overflow-x-auto">

                                <div class="flex items-center py-2 w-100">
                                    @if (count($inscription->attendances) > 0)
                                        <a href="{!! $inscription->certificateUrl() !!}"
                                            class="mx-3.5 border-b bg-gray-400 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-white rounded-xl">
                                            link a certificado <i class="fas fa-certificate"></i>
                                        </a>
                                    @else
                                        <span class="px-4 text-gray-500">Certificado no disponible</span>
                                    @endif
                                </div>
                                <div class="flex items-center py-2 w-100">
                                    <a href="/admin/resend_qr/{{ $inscription->id }}"
                                        class="mx-3.5 border-b bg-gray-400 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-white rounded-xl">
                                        Reenviar código <i class="fas fa-qrcode"></i>
                                    </a>
                                </div>
                                <form action="/admin/attendance" method="post">
                                    @csrf
                                    <input type="hidden" name="inscription_id" value="{{ $inscription->id }}">
                                    <div
                                        class="flex items-center @error('name') border-red-500 @else border-teal-500 @enderror py-2 w-100 border-t ">
                                        <input
                                            class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                            type="date" placeholder="acreditation_date" aria-label=""
                                            name="acreditation_date" value="" />
                                    </div>
                                    <div class="flex items-center p-2 w-100">
                                        <select id="type" name="type"
                                            class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-10">
                                            {{-- <option value="virtual" {{ old('type') == 'virtual' ? 'Selected' : '' }}>
                                                {{ App\Enums\InscriptionTypeEnum::REMOTO->text() }}</option> --}}
                                            <option value="hibrido" {{ old('type') == 'hibrido' ? 'Selected' : '' }}>
                                                {{ App\Enums\InscriptionTypeEnum::HIBRIDO->text() }}</option>
                                        </select>
                                    </div>
                                    <div class="flex items-center p-2 w-100">
                                        <button type="submit"
                                            class="bg-gray-400 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-white rounded-xl">
                                            Acreditación Manual
                                        </button>
                                    </div>
                                </form>
                                <div class="flex items-center p-2 w-100">
                                    <ul>
                                        @foreach ($inscription->attendances as $attendance)
                                            <li>{{ Carbon\Carbon::parse($attendance->date)->format('d-m-Y') }} -
                                                ({{ $attendance->type->value }})
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
