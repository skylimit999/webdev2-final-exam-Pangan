<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>    	
		<main class="h-1/2 w-full absolute top-1/2 transform -translate-y-1/2 flex items-center px-6 lg:px-32 bg-blue-500 text-white">
    		<header class="w-full absolute left-0 top-0 p-6 lg:p-32">
    			<div class="flex justify-between">
    				<div>
    					<h1 class="text-3xl">Hello <span class='font-bold'>{{ ucwords($r->name) }}</span>,</h1>
    				</div>
    			</div>
    		</header>
    		<section class="w-full md:w-9/12 xl:w-8/12">
    			
    			<p>Your request has been successfully received and stored to our database.</p>
    		</section>
    		<footer class="absolute right-0 bottom-0 p-6 lg:p-32">
    			<p class="font-bold mb-1">Thank You!</p>
    		</footer>
    	</main>
    </body>
</html>

