@extends('_layouts.layout')
@section('meta_description')

<title>Users List - Creative Agency Template</title>
<meta name=description content="Users List page dummy description">

@stop
@section('content')	
	<div class="portfolio-hero-banner">
		<div class="portfolio-hero-text">
			<h1>Users List</h1>
			<p style="padding: 5px 75px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a viverra leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a viverra leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a viverra leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a viverra leo. </p>
		</div>
	</div>
	@if(!empty($users_list))					
			<div class="portfolio-main-area">
				<div class="container">					
					<div class="row">
						@foreach($users_list as $users_list_data)
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 default-margin-mt margin-top-lb-30 margin-top-sb-30 portfolio-headmove">
								<div class="single-portfolio">
									<div class="portfolio-image" style="height: 350px; background-color: #bdbcbc">
										@if(!empty($users_list_data->avatar))
										<img src="{{ $users_list_data->avatar }}" class="img_users" alt="">
										@else
											<img src="{{ 'img/portfolio/2.jpg' }}" class="img_users" alt="">
										@endif
									</div>
								</div>
								<div class="portfolio-titile">
									<h4>{{ $users_list_data->first_name }} {{ $users_list_data->last_name }}</h4>
									<p>{{ $users_list_data->email }}</p>
									<p>{{ $users_list_data->phone }}</p>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				<!-- Pagination -->
				<div class="col-xl-12">
					<div class="next-previous-page">
						<nav aria-label="...">							
							{{ $users_list->links() }}
						</nav>
					</div>
				</div>

			</div>
    @endif
@stop
@section('custome_script')
<style>
	.page_item{
		padding: 10px;
	    margin-left: 10%;
	    box-shadow: 10px 10px 5px grey;
	    font-size: 20px;
	    text-align: center;
	    width: 130px;
	}
	.page_item:hover{
		background-color: gray;
		color: #fff !important;
		box-shadow: 5px 5px 1px grey;
	}
	.img_users{
		object-fit: contain;
	    height: 100%;
	    width: 100%;
	    padding: 10px;
	}
</style>               		
<script>
	$(function() {
	  $('.pagination li').addClass('page_item');
	});
</script>
@stop