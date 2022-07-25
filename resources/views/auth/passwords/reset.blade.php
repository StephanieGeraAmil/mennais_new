@extends('layouts.logintemplate')

@section('content')
<div class="flex flex-row flex-wrap flex-grow mt-2 justify-center content-center">            
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <!--Table Card-->
        <div class="bg-white border rounded shadow">
            <div class="border-b p-3 bg-green-600 ">
                <h5 class="font-bold uppercase text-white">Reset Password</h5>
            </div>
            <div class="p-5">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    
                    <input type="hidden" name="token" value="{{ $token }}">
                    
                    <div class="flex items-center border-b @error('email') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                        <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Email" aria-label="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus/>			  
                    </div>
                    @error('email')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
                    
                    
                    {{-- <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div> --}}
                    
                    <div class="flex items-center border-b @error('password') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                        <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="password" placeholder="Password" aria-label="Password" name="password" value="{{ $password ?? old('password') }}" required autocomplete="new-password"/>			  
                    </div>
                    @error('password')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
                    
                    <div class="flex items-center border-b @error('password_confirmation') border-red-500 @else border-teal-500 @enderror py-2 w-100">
                        <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="password" placeholder="Confirm Password" aria-label="password confirmation" name="password_confirmation" required autocomplete="new-password"/>			  
                    </div>
                    @error('password_confirmation')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
                    
                    <div class="pt-3">                                
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
