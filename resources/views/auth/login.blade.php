@extends('layouts.logintemplate')

@section('content')
<div class="flex flex-row flex-wrap flex-grow mt-2 justify-center content-center">            
    <div class="w-full md:w-1/2 xl:w-1/3 p-3 opacity-80">
        <!--Table Card-->
        <div class="bg-white border rounded-2xl shadow">
            <div class="border-b p-3 ">
                <h5 class="font-bold text-center">Ingreso</h5>
            </div>
            <div class="p-5">                        
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="flex items-center border-b @error('email') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                        <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="email" aria-label="email" name="email" value="{{old('email')}}"/>			  
                    </div>
                    @error('email')<p class="text-red-500 text-xs italic">Invalid Name.</p>@enderror
                    
                    <div class="flex items-center border-b @error('password') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                        <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="password" placeholder="password" aria-label="password" name="password" value="{{old('password')}}"/>			  
                    </div>
                    @error('password')<p class="text-red-500 text-xs italic">Invalid Name.</p>@enderror
                    

                    <div class="">
                        <div class="pt-3">
                            <button type="submit" class="bg-purple-900 hover:bg-purple-700 text-white font-bold py-2 px-4 border border-white rounded-3xl">
                                Ingresar
                            </button>

                            @if (Route::has('password.request'))
                                <a class="float-right pt-2" href="{{ route('password.request') }}">
                                    ¿Olvidó su contraseña?
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
