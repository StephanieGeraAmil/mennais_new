<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="/css/nicepage.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <!--Replace with your tailwind.css once created-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>



</head>

<body class="bg-red-100 font-sans leading-normal tracking-normal">
	<div class="flex flex-col h-screen justify-between ">
    

	@yield('content')
    
	{{-- <footer class="bg-white border-t border-green-800 border-b-2 shadow">
        <div class="container max-w-md mx-auto flex py-8">

			<div class="w-full mx-auto flex flex-wrap justify-center">
				<div class="px-8">
						<h3 class="font-bold font-bold text-green-900">Designed by ISF</h3>			
					</div>
				</div>
			</div>
		</div>
	</footer> --}}
</div>
</div>
</body>
</html>
