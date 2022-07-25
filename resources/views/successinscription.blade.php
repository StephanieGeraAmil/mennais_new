@extends('layouts.template')
@section('title')
ISF EMS register success
@endsection
@section('styles')
@endsection
@section('content')
{{-- <img src="/QRCodes/mycode.svg" alt="">     --}}
<div class="max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0">
	{{-- {!! QrCode::size(100)->generate(Request::url()); !!} --}}

	<!--Main Col-->
	<div id="profile" class="w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white opacity-90 mx-6 lg:mx-0">
		<div class="p-4 md:p-12 text-center lg:text-left">
			<div class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center" style="background-image: url('/images/profile.jpg')"></div>			
			<h3 class="font-bold text-green-700">You have been register.</h3>
			<div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25"></div>
        	<p class="py-4 text-sm text-gray-400">
				Hi {{$user_data->name}},<BR/>
				Thank you for your registration.<br/>
				We sent you an email with an access qr code.
				This code is personal and not transferable.<BR/>
				See you in event.<BR/>
				Best regards.
			</p>
			</div>
			
		</div>
		
		<!--Img Col-->
		<div class="w-full lg:w-2/5">
			<!-- Big profile image for side bar (desktop) -->
			<img src="/images/profile.jpg" class="rounded-none lg:rounded-lg shadow-2xl hidden lg:block">
			<!-- Image from: http://unsplash.com/photos/MP0IUfwrn0A -->
			
		</div>
		
		
		<!-- Pin to top right corner -->
		{{-- <div class="absolute top-0 right-0 h-12 w-18 p-4">
			<button class="js-change-theme focus:outline-none">🌙</button>
		</div> --}}
		
	</div>
	
	@endsection
	@section('scripts')
	<script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
	<script src="https://unpkg.com/tippy.js@4"></script>
	<script>
		//Init tooltips
		tippy('.link',{
			placement: 'bottom'
		})
		
		//Toggle mode
		const toggle = document.querySelector('.js-change-theme');
		const body = document.querySelector('body');
		const profile = document.getElementById('profile');
		
		
		toggle.addEventListener('click', () => {
			
			if (body.classList.contains('text-gray-900')) {
				toggle.innerHTML = "☀️";
				body.classList.remove('text-gray-900');
				body.classList.add('text-gray-100');
				profile.classList.remove('bg-white');
				profile.classList.add('bg-gray-900');
			} else
			{
				toggle.innerHTML = "🌙";
				body.classList.remove('text-gray-100');
				body.classList.add('text-gray-900');
				profile.classList.remove('bg-gray-900');			
				profile.classList.add('bg-white');
				
			}
		});
		
	</script>
	@endsection