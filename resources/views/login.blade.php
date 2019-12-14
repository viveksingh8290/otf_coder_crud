@extends('_layouts.layout')
@section('meta_description')

<title>Login - Creative Agency Template</title>
<meta name=description content="Login page dummy description">

@stop
@section('content')	
	<div class="contact-hero-banner" style="background-image: url({{ 'img/contact-bg.jpg' }});">
		<div class="contact-banner-text">
			<h1>Login</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In quis aliquet eros. Integer <br> placerat ultricesLorem ipsum dolor sit amet, consectetur adipiscing elit. In quis .</p>
		</div>
	</div>
	<div class="contactus-area" style="padding: 0 0 120px 0;">
		<div class="container">
			<!--contact form area-->
			<div class="row">
				<div class="col-xl-12">
					<div class="contact-form-area">
						<!--contact left bg-->
						<div class="contact-left-bg">
							<img src="{{'img/contact-p-2.png'}}" alt="">
						</div>
						<div class="contact-form-heading">
							<h3>Prove your identity</h3>
						</div>						
						<div class="contact-form">
							<form id="login_form" method="post">
								<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
								<input type="email" name="email" id="email" placeholder="Enter your email">
								<input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="new-password" style="width: 100%; margin-top: 20px" required />
								<p class="text-center" id="success_message" style="color: green; margin-top: 20px"></p>
								<p class="text-center" id="error_message" style="color: red; margin-top: 20px"></p>
								<div class="send-btn" style="margin-top: 5px">
									<input type="button" value="login" id="formsend" onclick="submitLoginForm()">
								</div>
							</form>
						</div>
						<!--contact right bg-->
						<div class="contact-right-bg">
							<img src="{{'img/contact-p-1.png'}}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
@section('custome_script')               		
<script>
	function submitLoginForm() {
		$("#error_message").html('');
		$("#success_message").html('');
		$.ajax({
	      url:'login-user',
	      data:new FormData($("#login_form")[0]),
	      dataType:'json',
	      async:false,
	      type:'post',
	      processData: false,
	      contentType: false,
	      success:function(response){
	        if(response.status != 200){
	        	$("#error_message").html(response.message);
	        }else{
	        	$("#success_message").html(response.message);
	        	window.location.href = '{{url("home")}}';
	        }
	      },
	    });
	}
</script>
@stop