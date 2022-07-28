{{-- @extends('layouts.logintemplate')

@section('content')
@if (session('status'))
<div class="bg-blue-100 border-t-4 border-blue-500 rounded-b text-blue-900 px-4 py-3 shadow-md" role="alert">
	<div class="flex">
	  <div class="py-1"><svg class="fill-current h-6 w-6 text-blue-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
	  <div>
		<p class="font-bold">{{ session('status') }}</p>		
	  </div>
	</div>
  </div>
@endif
<div class="flex flex-row flex-wrap flex-grow mt-2 justify-center content-center">            
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <!--Table Card-->
        <div class="bg-white border rounded shadow">
            <div class="border-b p-3 bg-green-600 ">
                <h5 class="font-bold uppercase text-white">Resssgister</h5>
            </div>
            <div class="p-5">                        
                
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="flex items-center border-b @error('name') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                        <input id="email" type="email" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail" autofocus>
                    </div>
                    @error('email')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
                    
                    <div class="pt-3"> 
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded">
                            {{ __('Send Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.logintemplate')

@section('content')
@if (session('status'))
<div class="bg-blue-100 border-t-4 border-blue-500 rounded-b text-blue-900 px-4 py-3 shadow-md" role="alert">
	<div class="flex">
	  <div class="py-1"><svg class="fill-current h-6 w-6 text-blue-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
	  <div>
		<p class="font-bold">{{ session('status') }}</p>		
	  </div>
	</div>
  </div>
@endif
<div class="flex flex-row flex-wrap flex-grow mt-2 justify-center content-center">            
    <div class="w-full md:w-1/2 xl:w-1/3 p-3 opacity-80">
        <!--Table Card-->
        <div class="bg-white border rounded-2xl shadow p-12">
            <div class="border-b p-3 ">
                <h5 class="font-bold text-center">Recordar mi contraseña</h5>
            </div>
            <div class="p-5">                        
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="flex items-center border-b @error('name') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                        <input id="email" type="email" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail" autofocus>
                    </div>
                    @error('email')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
                    
                    <div class="pt-3"> 
                        <button type="submit" class="bg-gray-400 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-white rounded-3xl">
                            Enviar link
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
