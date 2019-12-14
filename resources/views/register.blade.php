@extends('_layouts.layout')
@section('meta_description')

<title>Register - Creative Agency Template</title>
<meta name=description content="Register page dummy description">

@stop
@section('content')	
	<div class="contact-hero-banner" style="background-image: url({{ 'img/contact-bg.jpg' }});">
		<div class="contact-banner-text">
			<h1>Register</h1>
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
							<h3>Register with us</h3>							
						</div>
						<div>
							<form id="register_form" method="post">
								<input type="text" placeholder="First Name *" name="first_name" id="first_name" required />

								<input class="margin-top-lb-30 margin-top-sb-30" type="text" placeholder="Last Name" name="last_name" id="last_name">

								<input type="email" placeholder="Email *" name="email" id="email" required />

								<input type="tel" placeholder="Phone Number" name="phone" id="phone">
								<input type="password" placeholder="Password *" autocomplete="new-password" name="password" id="password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />
								
								<input type="password" name="confirm_password" id="confirm_password" class="margin-top-lb-30 margin-top-sb-30" placeholder="Confirm Password *" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />								
								
								<input type="file" accept="image/*" name="avatar" id="avatar" onchange="readURL(this);">
								<div class="hidden_area register_image_container" id="preview_area">
									<span style="float: right; height: 20px; width: 20px;">
										<a onclick="clearUploadedMedia()" style="cursor: pointer;">
											<i class="fa fa-times" style="font-size: 20px; color: #000"></i>
										</a>
									</span>
									<div id="image_preview" style="padding-top: 10px;padding-bottom: 10px">
									</div>
								</div>
								<p class="text-center" id="success_message" style="color: green;"></p>
								<p class="text-center" id="error_message" style="color: red;"></p>
								<div class="send-btn" style="margin-top: 5px">
									<input type="button" value="register" id="formsend" onclick="validateForm()">
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
	function validateForm(){
		$('#formsend').attr('value', 'Processing..');
		var first_name = $("#first_name").val();
		var last_name = $("#last_name").val();
		var email = $("#email").val();
		var phone = $("#phone").val();
		var password = $("#password").val();
		var confirm_password = $("#confirm_password").val();
		var error_code = 0;
		$("#error_message").html('');
		$("#success_message").html('');

		if(isValidName(first_name) === false){
			error_code = 1;
			$("#first_name").addClass('errorMode');
			$("#error_message").html('Please enter valid first name');		
		}else if(last_name != '' && isValidName(last_name) === false){		
			error_code = 1;
			$("#last_name").addClass('errorMode');
			$("#error_message").html('Please enter valid last name');			
		}else if(isValidEmailAddress(email) === false){
			error_code = 1;
			$("#email").addClass('errorMode');
			$("#error_message").html('Please enter valid email');		
		}else if(phone != '' && isValidPhone(phone) === false){		
			error_code = 1;
			$("#phone").addClass('errorMode');
			$("#error_message").html('Please enter valid phone number');			
		}else if(isValidPassword(password) === false){		
			error_code = 1;
			$("#password").addClass('errorMode');	
			$("#error_message").html('Please enter valid password. Ex: Sample1234 (Do not include special characters) ');		
		}else if(isValidPassword(confirm_password) === false){		
			error_code = 1;
			$("#confirm_password").addClass('errorMode');
			$("#error_message").html('Please enter valid password. Ex: Sample1234 (Do not include special characters)');			
		}else if(password !== confirm_password){
			error_code = 1;
			$("#confirm_password").addClass('errorMode');
			$("#error_message").html('Password mismatch');
		}
		if(error_code === 0){
			submitRegisterForm();
		}else{
			$("#formsend").val('register');
		}

	}
	function submitRegisterForm() {			
		$.ajax({
	      url:'register-user',
	      data:new FormData($("#register_form")[0]),
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
	        	window.location.href = '{{url("login")}}';
	        }
	      },
	    });
	    $("#formsend").val('register');
	}
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            	$("#preview_area").removeClass('hidden_area');
                $('#image_preview').html('<img src='+e.target.result+' class="img-responsive appended_img" alt="preview image">');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function clearUploadedMedia(){
    	$("#avatar").val('');
    	$("#preview_area").addClass('hidden_area');
        $('#image_preview').html('');
    }
	$(document).ready(function(){
	   $("#register_form input").on('change', function(){
		    $(this).removeClass('errorMode');
		});
	});
   
</script>
@stop