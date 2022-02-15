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
										<label>Phone</label>
										<input name="phone" class="form-control" value="{{ (old('phone') != '') ? old('phone') : $model->phone }}" placeholder="Your Phone Number" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Gender</label>
										<ul class="pl-0">
											<li class="list-inline-item">
												<div class="custom-control custom-radio custom-control-inline">
													<input name="gender" type="radio" id="customRadio1" class="custom-control-input" {{($model->gender=="M")?"checked":""}} value="M">
													<label class="custom-control-label" for="customRadio1">Male</label>
												</div>
											</li>
											<li class="list-inline-item">
												<div class="custom-control custom-radio custom-control-inline">
													<input name="gender" type="radio" id="customRadio2" class="custom-control-input" {{($model->gender=="F")?"checked":""}} value="F">
													<label class="custom-control-label" for="customRadio2">Female</label>
												</div>
											</li>
											<li class="list-inline-item">
												<div class="custom-control custom-radio custom-control-inline">
													<input name="gender" type="radio" id="customRadio3" class="custom-control-input" {{($model->gender=="O")?"checked":""}} value="O">
													<label class="custom-control-label" for="customRadio3">Other</label>
												</div>
											</li>
										</ul>
										<span class="help-block"></span>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Address</label>
										<input name="address" class="form-control" value="{{ (old('address') != '') ? old('address') : $model->address_line1 }}" placeholder="Your Address" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>City</label>
										<input name="city" class="form-control" value="{{ (old('city') != '') ? old('city') : $model->city }}" placeholder="Your City" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>State</label>
										<select class="form-control" name="state">
											<option value="" selected disabled>------Select State------</option>
											@foreach($state as $key=>$value)
												<option value="{{$value->code}}" {{($value->code==$model->state)?"selected":""}}>{{$value->name}}</option>
											@endforeach
										</select>
										<span class="help-block"></span>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Zip Code</label>
										<input name="zipcode" class="form-control" value="{{ (old('zipcode') != '') ? old('zipcode') : $model->zipcode }}" placeholder="Your Zip Code" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>County </label>
										<input name="county" class="form-control" value="{{ (old('county') != '') ? old('county') : $model->county }}" placeholder="Your County" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								<!-- <div class="col-sm-6">
									<div class="form-group">
										<label>District </label>
										<input class="form-control" name="district" value="{{ (old('zipcode') != '') ? old('zipcode') : $model->zipcode }}" placeholder="Your District" type="text">
										<span class="help-block"></span>
									</div>
								</div> 
								<div class="col-sm-6">
									<div class="form-group">
										<label>Country </label>
										<input class="form-control" name="country" value="{{ (old('country') != '') ? old('country') : $model->country }}" placeholder="Your Country" type="text">
										<span class="help-block"></span>
									</div>
								</div>-->
								<div class="col-sm-12">
									<div class="form-group">
										<label>How many years have participated at our fair?</label>
										<ul class="pl-0">
											<li class="list-inline-item">
												<div class="custom-control custom-radio custom-control-inline">
													<input name="participation_at_our_fair" type="radio" id="customRadioInline2-1" {{($model->participation_at_our_fair=="0")?"checked":""}} class="custom-control-input" value="0">
													<label class="custom-control-label" for="customRadioInline2-1">0</label>
												</div>
											</li>
											<li class="list-inline-item">
												<div class="custom-control custom-radio custom-control-inline">
													<input name="participation_at_our_fair" type="radio" id="customRadioInline2-2" {{($model->participation_at_our_fair=="1")?"checked":""}} class="custom-control-input" value="1">
													<label class="custom-control-label" for="customRadioInline2-2">1</label>
												</div>
											</li>
											<li class="list-inline-item">
												<div class="custom-control custom-radio custom-control-inline">
													<input name="participation_at_our_fair" type="radio" id="customRadioInline2-3" {{($model->participation_at_our_fair=="2")?"checked":""}} class="custom-control-input" value="2">
													<label class="custom-control-label" for="customRadioInline2-3">2</label>
												</div>
											</li>
											<li class="list-inline-item">
												<div class="custom-control custom-radio custom-control-inline">
													<input name="participation_at_our_fair" type="radio" id="customRadioInline2-4" {{($model->participation_at_our_fair=="3+")?"checked":""}} class="custom-control-input" value="3+">
													<label class="custom-control-label" for="customRadioInline2-4">3</label>
												</div>
											</li>
											<li class="list-inline-item">
												<div class="custom-control custom-radio custom-control-inline">
													<input name="participation_at_our_fair" type="radio" id="customRadioInline2-5" {{($model->participation_at_our_fair=="5+")?"checked":""}} class="custom-control-input" value="5+">
													<label class="custom-control-label" for="customRadioInline2-5">5+</label>
												</div>
											</li>
											<li class="list-inline-item">
												<div class="custom-control custom-radio custom-control-inline">
													<input name="participation_at_our_fair" type="radio" id="customRadioInline2-6" {{($model->participation_at_our_fair=="10+")?"checked":""}} class="custom-control-input" value="10+">
													<label class="custom-control-label" for="customRadioInline2-6">10+</label>
												</div>
											</li>
											<li class="list-inline-item">
												<div class="custom-control custom-radio custom-control-inline">
													<input name="participation_at_our_fair" type="radio" id="customRadioInline2-7" {{($model->participation_at_our_fair=="20+")?"checked":""}} class="custom-control-input" value="20+">
													<label class="custom-control-label" for="customRadioInline2-7">20+</label>
												</div>
											</li>
										</ul>
										<span class="help-block"></span>
									</div>
								</div>
								
								
								<div class="col-sm-3">
									<div class="form-group">
										<label>Profile Picture:</label>
                                        <div class="fileinput-new thumbnail" >
                                            <img id="output" src="{{ ($model->profile_picture != '') ? URL::asset('public/uploads/frontend/profile_picture/thumb/' . $model->profile_picture) : 'https://via.placeholder.com/150' }}" style="width: 100%; height: auto;" alt=""> 
                                        </div>										
									</div>
								</div>	

								<div class="col-sm-9">
									<div class="form-group">
										<label>Upload Profile Picture:</label>
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