@extends('_layouts.layout')
@section('meta_description')

<title>My Profile - Creative Agency Template</title>
<meta name=description content="My Profile page dummy description">

@stop
@section('content')	
	<div class="portfolio-hero-banner">
		<div class="portfolio-hero-text">
			<h1>My Profile</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a viverra leo. </p>
		</div>
	</div>
	@if(!empty($my_profile_data))
		<div class="portfolio-details">
			<div class="container">
				<div class="portfolio-details-box">
					<div class="row">
						<!--single project slider-->
						<div class="col-xl-6 col-lg-6 col-md-12">
							<div class="single-project-slider">
								<div class="portfolio-screenshot" style="height: 400px">
									@if(!empty($my_profile_data->avatar))
										<img src="{{ $my_profile_data->avatar }}" class="img_users" alt="">
									@else
										<img src="{{ 'img/portfolio/portfolio-screen.jpg' }}" class="img_users" alt="">
									@endif
									
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-12" style="padding: 25px">
							<!--single project name-->
							<div class="project-name">
								<div class="edit_button" style="box-shadow: 10px 10px 5px grey;    height: 31px;float: right;margin: 20px;width: 60px;text-align: center;">
									<a data-toggle="modal" href="#updateUserProfile">Edit</a>
								</div>
								<h3>{{ $my_profile_data->first_name }} {{ $my_profile_data->last_name }}</h3>
								<p>
									<i>
										<?php echo $my_profile_data->role == '1'? 'Super Admin' : ''; ?>
									</i>
								</p>
								<p>{{ $my_profile_data->email }}</p>
								<p>{{ $my_profile_data->phone }}</p>
							</div>
							<!--single project description-->
							<div class="project-description">
								<h3>Note</h3>
								<p>There are so many dummy data only for the beautiful look and feel. Please ignore all that dummy content. Here, the only used content is USER NAME, USER EMAIL, USER PHONE and USER ROLE.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<!--single project description-->
					<div class="col-xl-6">
						<div class="project-brief">
							<div class="project-description">
								<h3>Challanges we face</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a viverra leo. Morbi purus augue, lacinia vel molestie.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a viverra leo. Morbi purus augue, lacinia vel molestie. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a viverra leo.</p>
							</div>
							<div class="project-description margin-top-project">
								<h3>Solution we made</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a viverra leo. Morbi purus augue, lacinia vel molestie.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a viverra leo. Morbi purus augue, lacinia vel molestie. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a viverra leo. Morbi purus augue, lacinia vel molestie.Lorem ipsum dolor sit amet. Morbi purus augue, lacinia vel molestie. </p>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
					<!--single project technology-->
					<div class="project-technology">
						<h3>Technology we used</h3>
						<ul>
							<li>html</li>
							<li>css</li>
							<li>jquery</li>
							<li>php</li>
							<li>wordpress</li>
						</ul>
					</div>
					<!--single project info-->
						<div class="project-info">
							<h3>Project Info</h3>
							<h4>client: <span>Lorem ipsum dolor sit amet.</span></h4>
							<h4>Budjet: <span>Lorem ipsum dolor sit amet.</span></h4>
							<h4>Category: <span>Lorem ipsum dolor sit amet.</span></h4>
							<h4>Date: <span>20 July, 2019</span></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
<!-- Modal User Update Profile -->
<div class="modal fade" id="updateUserProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" id="update_profile_form">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputEmail3">First Name</label>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <input type="text" placeholder="First Name" name="first_name" id="first_name" value="{{ $my_profile_data->first_name }}" style="width: 100%;" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-6 control-label" for="inputPassword3">Last Name</label>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <input class="margin-top-lb-30 margin-top-sb-30" type="text" placeholder="Last Name" name="last_name" id="last_name" value="{{ $my_profile_data->last_name }}" style="width: 100%;" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-6 control-label" for="inputPassword3">Phone</label>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <input type="tel" placeholder="Phone Number" name="phone" id="phone" value="{{ $my_profile_data->phone }}" style="width: 100%;">
                        </div>
                    </div>                    
                    <div class="form-group">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <input type="file" accept="image/*" name="avatar" id="user_avatar" onchange="readURL(this);" style="width: 100%;" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="update_profile_image_container" id="preview_area_user">
								<span style="float: right; height: 20px; width: 20px;">
									<a onclick="clearUploadedMedia()" style="cursor: pointer;">
										<i class="fa fa-times" style="font-size: 20px; color: #000"></i>
									</a>
								</span>
								<div id="image_preview_user" style="height: 200px;">
									<img src="{{ $my_profile_data->avatar }}" class="img_users" alt="user image">
								</div>
							</div>
							<input type="hidden" name="previos_image" value="{{ $my_profile_data->avatar }}" />
							<input type="hidden" name="id" value="{{ $my_profile_data->id }}" />
							<p class="text-center" id="success_message" style="color: green;"></p>
							<p class="text-center" id="error_message" style="color: red;"></p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="updateFormValidation()">
                    Update
                </button>
            </div>
        </div>
    </div>
</div>		
    @endif
@stop
@section('custome_script')
	<style>
		.img_users{
			object-fit: contain;
		    height: 100%;
		    width: 100%;
		    padding: 10px;
		}
		.edit_button:hover{
			background: linear-gradient(252.62deg, #48D6F2 8.92%, #84FC6A 96.59%);
    		box-shadow: 0px 2px 15px rgba(164, 164, 164, 0.25);
		}
	</style>
	<script>
		function updateFormValidation(){
			var first_name = $("#first_name").val();
			var last_name = $("#last_name").val();
			var phone = $("#phone").val();
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
			}else if(phone != '' && isValidPhone(phone) === false){		
				error_code = 1;
				$("#phone").addClass('errorMode');
				$("#error_message").html('Please enter valid phone number');			
			}
			if(error_code === 0){
				submitUpdateForm();
			}
		}
		function submitUpdateForm() {
			$.ajax({
		      url:'update-user-profile',
		      data:new FormData($("#update_profile_form")[0]),
		      dataType:'json',
		      async:false,
		      type:'post',
		      processData: false,
		      contentType: false,
		      success:function(response){
		      	alert(response);
		        if(response.status != 200){
		        	$("#error_message").html(response.message);
		        }else{
		        	$("#success_message").html(response.message);
		        	window.location.href = '{{url("my-profile")}}';
		        }
		      },
		    });
		}
		function readURL(input) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();
	            reader.onload = function (e) {
	            	$("#preview_area_user").removeClass('hidden_area');
	                $('#image_preview_user').html('<img src='+e.target.result+' class="img-responsive img_users" alt="preview image">');
	            }
	            reader.readAsDataURL(input.files[0]);
	        }
	    }
	    function clearUploadedMedia(){
	    	$("#user_avatar").val('');
	    	$("#preview_area_user").addClass('hidden_area');
	        $('#image_preview_user').html('');
	    }
	</script>
@stop
