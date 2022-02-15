@extends('layouts.main') 
@section('content')

<div class="index-body body_content">
	<!--div class="dash_top_banner d-flex align-items-center justify-content-center">
		<div class="overlay"></div>
		<h1>Sample heading</h1>
	</div>-->

	<div class="dash_bx bacolor_one">
		<div class="container"> 
			<div class="row">
				<div class="col-md-3">
					@include('partials.leftpanel')					
				</div>
				<div class="col-md-9">
					<h1 class="sample_heading"><i class="icofont-list"></i> Andromeda Registration</h1>
					
					<div class="right_bx mt-3">
					
						 <form class="" id="broadcom_registration_form" method="post"  enctype="multipart/form-data" action="{{ Route('registration') }}">
						 <!--<h1 class="heading_stl">Dashboard</h1>-->
							@csrf
							
							<input type="hidden" name="division_id" value="2" />
							
							<div class="row mb-3">
								<div class="col-sm-6">
									<div class="form-group">
										<label>First Name<span class="required">*</span></label>
										<input name="first_name" class="form-control" placeholder="Your First Name" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Last Name*</label>
										<input name="last_name" class="form-control" placeholder="Your Last Name" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Email*</label>
										<input name="email" class="form-control" placeholder="Your Email" type="text">
										<span class="help-block"></span>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<label>Grade*</label>
										<select name="grade" class="form-control">
											<option value="">---Select Grade---</option>
											<option value="9th Grade">9th Grade</option>
											<option value="10th Grade">10th Grade</option>
											<option value="11th Grade">11th Grade</option>
											<option value="12th Grade">12th Grade</option>
										</select>
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Teacher Liaison*</label>
										<input name="teacher_liaison" class="form-control" placeholder="Teacher Liaison" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Teacher Email*</label>
										<input name="teacher_email" class="form-control" placeholder="Teacher Email" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<!--<div class="col-sm-6">
									<div class="form-group">
										<label>Form Submission Date*</label>										
										<div class="input-group"> 										
											<input name="form_submitted_date" class="form-control datepicker" placeholder="Form Submission Date" type="text" aria-describedby="basic-addon1">
											<div class="input-group-append">
											<span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
											</div>																
										</div>
										<span class="help-block"></span>
									</div>
								</div>-->
								
							</div>
							
							<h1 class="heading_stl">School Information</h1>
							<div class="row mb-3">
								<div class="col-sm-6">
									<div class="form-group">
										<label>School Name*</label>
										<input name="school_name" class="form-control" placeholder="School Name" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Address*</label>
										<input name="school_address" class="form-control" placeholder="School Address" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>City*</label>
										<input name="school_city" class="form-control" placeholder="School City" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Zip Code*</label>
										<input name="school_zipcode" class="form-control" placeholder="School Zip Code" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Phone Number*</label>
										<input name="school_phone" class="form-control" placeholder="School Phone Number" type="text">
										<span class="help-block"></span>
									</div>
								</div>
							</div>
							
							<h1 class="heading_stl">Student Information</h1>
							<div class="row mb-3">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Address*</label>
										<input name="address_line1" class="form-control" placeholder="Your Address" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>City*</label>
										<input name="city" class="form-control" placeholder="Your City" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Zip Code*</label>
										<input name="zipcode" class="form-control" placeholder="Your Zip Code" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Phone Number*</label>
										<input name="phone" class="form-control" placeholder="Your Phone Number" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Gender*</label>
										<select name="gender" class="form-control">
											<option value="">---Select Gender---</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
										<span class="help-block"></span>
									</div>									
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Meal type*</label>
										<select name="meal_type" class="form-control">
											<option value="">---Select Meal---</option>
											<option value="Turkey">Turkey</option>
											<option value="Ham">Ham</option>
											<option value="Kosher">Kosher</option>
											<option value="Vegetarian">Vegetarian</option>
										</select>
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>T-Shirt Size*</label>
										<select name="tshirt_size" class="form-control">
											<option value="">---Select Size---</option>
											<option value="Small">Small</option>
											<option value="Medium">Medium</option>
											<option value="Large">Large</option>
											<option value="X-Large">X-Large</option>
										</select>
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Race (Optional)</label>
										<input name="race" class="form-control" placeholder="Your Race" type="text">
										<span class="help-block"></span>
									</div>
								</div>
							</div>
							
							<h1 class="heading_stl">Project Information</h1>
							<div class="row mb-3">	
							
								<div class="col-sm-6">
									<div class="form-group">
										<label>Project Title*</label>
										<input name="project_title" class="form-control" placeholder="Project Title" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Project Category*</label>
										<select name="project_category" class="form-control">
											<option value="">---Select Category---</option>
											<option value="Behavioral Science">Behavioral Science</option>
											<option value="Biology">Biology</option>
											<option value="Chemistry">Chemistry</option>
											<option value="Computer Science">Computer Science</option>
											<option value="Engineering">Engineering</option>
											<option value="Environmental Sciences">Environmental Sciences</option>
											<option value="Earth, Space, Energy">Earth, Space, Energy</option>
											<option value="Mathematics">Mathematics</option>
											<option value="Medicine and Health">Medicine and Health</option>
											<option value="Physics">Physics</option>
										</select>
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Project Type*</label>
										<ul class="pl-0">
											<li class="list-inline-item">
												<div class="custom-control custom-radio custom-control-inline">
													<input name="project_type" type="radio" id="customRadioInline1-1" class="custom-control-input" value="Individual">
													<label class="custom-control-label" for="customRadioInline1-1">Individual</label>
												</div>
											</li>
											<li class="list-inline-item">
												<div class="custom-control custom-radio custom-control-inline">
													<input name="project_type" type="radio" id="customRadioInline1-2" class="custom-control-input" value="Team">
													<label class="custom-control-label" for="customRadioInline1-2">Team</label>
												</div>
											</li>
										</ul>
										<span class="help-block"></span>
									</div>
								</div>
							</div>	
							
							<p class="mt-3">If you are in a team, Please fill out your partners name and School</p>
							
							<div class="row">	
								<div class="col-sm-6">
									<div class="form-group">
										<label>Partner 1 Name*</label>
										<input name="partner1_name" class="form-control" placeholder="Partner 1 Name" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Partner 1 School Name*</label>
										<input name="partner1_school_name" class="form-control" placeholder="Partner 1 School Name" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Partner 2 Name*</label>
										<input name="partner2_name" class="form-control" placeholder="Partner 2 Name" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Partner 2 School Name*</label>
										<input name="partner2_school_name" class="form-control" placeholder="Partner 2 School Name" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-12">
									<div class="form-group">
										<label>Upload the Completed and Signed Application Form HERE*:</label>
										<div class="input-group file_upload">
											<input placeholder="Signed Application Form" type="text" class="form-control" readonly="">
											<label class="input-group-btn d-flex align-items-stretch align-items-center">
												<span class="btn btn-primary up-btn align-self-center">
													<i class="icofont-upload-alt"></i> Upload Application Form<input type="file" name="signed_application_form" style="display: none;" multiple="">
												</span>
											</label>
										</div>
										<span class="help-block"></span>
									</div>
								</div>								
								
								<div class="col-sm-12">
									<div class="text-center">
										<button type="submit" name="registration_submit_btn" class="btn nw_cst_btn">SUBMIT</button>
									</div>
								</div>
							</div>
						</form> 
					</div>
				</div>
			</div>
		</div> 
	</div>
</div>
@stop

@section('js')

<script>
	$(function () {
		$(".datepicker").datepicker({
           dateFormat: 'dd/mm/yy',
           autoclose: true,
           changeMonth:true,
           changeYear:true,
           todayHighlight: true,
           maxDate: '-0m',
           yearRange:'2019:2030'
       });

		// We can attach the `fileselect` event to all file inputs on the page
		$(document).on('change', ':file', function () {
			var input = $(this),
					numFiles = input.get(0).files ? input.get(0).files.length : 1,
					label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
			input.trigger('fileselect', [numFiles, label]);
		});

		// We can watch for our custom `fileselect` event like this
		$(document).ready(function () {
			$(':file').on('fileselect', function (event, numFiles, label) {

				var input = $(this).parents('.input-group').find(':text'),
						log = numFiles > 1 ? numFiles + ' files selected' : label;

				if (input.length) {
					input.val(log);
				} else {
					if (log)
						alert(log);
				}

			});
		});

	});
</script>
@stop