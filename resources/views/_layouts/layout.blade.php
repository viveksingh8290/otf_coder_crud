<!DOCTYPE html>
<html lang="ZXX">
	<head>	
	    <meta charset="utf-8">
	    <meta name="csrf-token" content="{{ csrf_token() }}" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name=author content="Vivek Singh">
		<link rel="icon" href="{{ 'img/favicon.png' }}" type="image/png">

		@section('meta_description')	

		@show
		@section('meta_keywords')		

		@show		
		
		@include('_layouts.style')
		<script>
		window.Laravel = {!! json_encode([
		'csrfToken' => csrf_token(),
		]) !!};
		</script>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
	</head>
	<body>	 
		<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

		<!--  Preloader Start -->
		<div id='preloader'>
			<div id='status'>
				<img src="{{ 'img/loading.gif' }}" alt='LOADING....!!!!!' />
			</div>
		</div>   
            @include('_layouts.navbar') 

                @section('slider')                    

                @show
                @section('heading')

                @show
                @section('content')                		

                @show		

            	@include('_layouts.footer')
	        	@include('_layouts.script')
	        	
	        	@section('custome_script')                		

                @show
	</body>
</html>