@extends('_layouts.layout')
@section('meta_description')

<title>404 - Creative Agency Template</title>
<meta name=description content="404 dummy description">

@stop
@section('content')	
<div class="error-page-area">
		<div class="container">
			<div class="row">
				<!--404 text image-->
				<div class="col-xl-12">
					<div class="error-text">
						<h2>sorry we can't found anything</h2>
						<a href="{{ url('home') }}">back to home</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop