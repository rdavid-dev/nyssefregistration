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
					<h1 class="sample_heading"><i class="icofont-list"></i> Manage Account</h1>
					
					<div class="right_bx mt-3">
					
						 <form class="" id="manage_account_form" method="post"  enctype="multipart/form-data" action="{{ Route('manage-account') }}">
						 <!--<h1 class="heading_stl">Dashboard</h1>-->
							@csrf
							
							
							
							<div class="row mb-3">
								<div class="col-sm-6">
									<div class="form-group">
										<label>First Name<span class="required">*</span></label>
										<input name="first_name" class="form-control" value="{{ (old('first_name') != '') ? old('first_name') : $model->first_name }}" placeholder="Your First Name" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Last Name*</label>
										<input name="last_name" class="form-control" value="{{ (old('last_name') != '') ? old('last_name') : $model->last_name }}" placeholder="Your Last Name" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Email*</label>
										<input name="email" class="form-control" value="{{ (old('email') != '') ? old('email') : $model->email }}" placeholder="Your Email" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-12">
									<div class="form-group">
										<label>Profile Picture:</label>
                                        <div class="fileinput-new thumbnail" >
                                            <img id="output" src="{{ ($model->profile_picture != '') ? URL::asset('public/uploads/frontend/profile_picture/thumb/' . $model->profile_picture) : 'https://via.placeholder.com/150' }}" style="width: 200px; height: 150px;" alt=""> 
                                        </div>
										<div class="input-group file_upload">
											<input placeholder="Upload Profile Picture" type="text" class="form-control" readonly="">
											<label class="input-group-btn d-flex align-items-stretch align-items-center">
												<span class="btn btn-primary up-btn align-self-center">
													<i class="icofont-upload-alt"></i> Upload Profile Picture<input type="file" name="profile_picture" style="display: none;" accept="image/*" onchange="loadFile(event)">
												</span>
											</label>
										</div>
										<span class="help-block"></span>
									</div>
								</div>								
								
								<div class="col-sm-12">
									<div class="text-center">
										<button type="submit" name="manage_account_btn" class="btn nw_cst_btn">SUBMIT</button>
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

    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
@stop