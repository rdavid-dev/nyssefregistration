@extends('layouts.main') 
@section('css')
<link rel="stylesheet" href="{{URL::asset('public/frontend/css/jquery-confirm.css')}}" />
@stop
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
                    <div class="tp_hd_nw">
                        <h1 class="sample_heading">Dashboard</h1>
                        @if(Auth()->guard('frontend')->user()->type_id === '2')
                        <span class="code">Your Code: <span class="font-bold">{{ Auth()->guard('frontend')->user()->teacher_generated_code }}</span></span>
                        @endif
                    </div>
                    <div class="right_bx">
                        <div class="bottom-part-1">
                            <div class="row row_width">
                                @if(Auth()->guard('frontend')->user()->type_id === '2')
                                <!--<div class="col-md-4">
                                        <div class="inner-box gradient-bg-7">
                                                <div class="media">
                                                        <div class="media-left">
                                                                <h2>Event Start</h2>
                                                                <h3>{{\Carbon\Carbon::parse($event->event_start_date)->format('d M Y')}}</h3>
                                                        </div>
                                                        <div class="media-right">
                                                                <img class="media-object" src="images/sml_thum_3.png" alt="">
                                                        </div>
                                                </div>
                                        </div> 
</div>
<div class="col-md-4">
                                        <div class="inner-box gradient-bg-1">
                                                <div class="media">
                                                        <div class="media-left">
                                                                <h2>Event End</h2>
                                                                <h3>{{\Carbon\Carbon::parse($event->event_end_date)->format('d M Y')}}</h3>
                                                        </div>
                                                        <div class="media-right">
                                                                <img class="media-object" src="images/sml_thum_3.png" alt="">
                                                        </div>
                                                </div>
                                        </div>
</div>-->
                                <div class="col-md-6">
                                    <div class="inner-box gradient-bg-6">
                                        <div class="media">
                                            <div class="media-left">
                                                <h2>Total Registration</h2>
                                                <h3>{{$total_registration}}</h3>
                                            </div>
                                            <div class="media-right">
                                                    <!--<img class="media-object" src="images/sml_thum_1.png" alt="">-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inner-box gradient-bg-2">
                                        <div class="media">
                                            <div class="media-left">
                                                <h2>Andromeda Registration</h2>
                                                <h3>{{$total_andromeda_registration}}</h3>
                                            </div>
                                            <div class="media-right top">
                                                    <!--<img class="media-object" src="images/sml_thum_2.png" alt="">-->
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="inner-box gradient-bg-4">
                                        <div class="media">
                                            <div class="media-left">
                                                <h2>Broadcom Registration</h2>
                                                <h3>{{$total_broadcom_registration}}</h3>
                                            </div>
                                            <div class="media-right">
                                                    <!--<img class="media-object" src="images/sml_thum_3.png" alt="">-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inner-box gradient-bg-3">
                                        <div class="media">
                                            <div class="media-left">
                                                <h2>NYSSEF ISEF Registration</h2>
                                                <h3>{{$total_nyssef_registration}}</h3>
                                            </div>
                                            <div class="media-right">
                                                    <!--<img class="media-object" src="images/sml_thum_3.png" alt="">-->
                                            </div>
                                        </div>
                                    </div> 
                                </div>

                                @elseif(Auth()->guard('frontend')->user()->type_id === '3')
                                <!--<div class="col-md-4">
                                        <div class="inner-box gradient-bg-7">
                                                <div class="media">
                                                        <div class="media-left">
                                                                <h2>Event Start</h2>
                                                                <h3>{{\Carbon\Carbon::parse($event->event_start_date)->format('d M Y')}}</h3>
                                                        </div>
                                                        <div class="media-right">
                                                                <img class="media-object" src="images/sml_thum_3.png" alt="">
                                                        </div>
                                                </div>
                                        </div>                                    
</div>
<div class="col-md-4">
                                        <div class="inner-box gradient-bg-2">
                                                <div class="media">
                                                        <div class="media-left">
                                                                <h2>Event End</h2>
                                                                <h3>{{\Carbon\Carbon::parse($event->event_end_date)->format('d M Y')}}</h3>
                                                        </div>
                                                        <div class="media-right">
                                                                <img class="media-object" src="images/sml_thum_3.png" alt="">
                                                        </div>
                                                </div>
                                        </div>
</div>-->
                                <div class="col-md-6">
                                    <div class="inner-box gradient-bg-6">
                                        <div class="media">
                                            <div class="media-left">
                                                <h2>Teacher's Name</h2>
                                                <h3>
                                                    @php
                                                    $teacher_details = \App\Http\Controllers\Controller::get_user_details(Auth()->guard('frontend')->user()->teacher_id);
                                                    if(isset($teacher_details->first_name) && isset($teacher_details->last_name)){
                                                    echo $teacher_details->first_name.' '.$teacher_details->last_name;
                                                    }else{
                                                    echo 'N/A';
                                                    }
                                                    @endphp
                                                </h3>
                                            </div>
                                            <div class="media-right top">
                                                <img class="media-object" src="images/sml_thum_2.png" alt="">
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ Route('broadcom-registration') }}">
                                        <div class="inner-box gradient-bg-3">
                                            <div class="media">
                                                <div class="media-left">
                                                    <h2>Broadcom Registration</h2>
                                                    <h3>{{isset($broadcom_registration->created_at)?\Carbon\Carbon::parse($broadcom_registration->created_at)->format('d M Y'):'Not Register yet'}}</h3>
                                                </div>
                                                <div class="media-right">
                                                    <img class="media-object" src="images/sml_thum_3.png" alt="">
                                                </div>
                                            </div>
                                        </div> 
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ Route('andromeda-registration') }}">
                                        <div class="inner-box gradient-bg-4">
                                            <div class="media">
                                                <div class="media-left">
                                                    <h2>Andromeda Registration</h2>
                                                    <h3>{{isset($andromeda_registration->created_at)?\Carbon\Carbon::parse($andromeda_registration->created_at)->format('d M Y'):'Not Register yet'}}</h3>
                                                </div>
                                                <div class="media-right top">
                                                    <img class="media-object" src="images/sml_thum_2.png" alt="">
                                                </div>
                                            </div>
                                        </div> 
                                    </a>
                                </div>                                
                                <div class="col-md-6">
                                    <a href="{{ Route('isef-registration') }}">
                                        <div class="inner-box gradient-bg-5">
                                            <div class="media">
                                                <div class="media-left">
                                                    <h2>NYSSEF ISEF Registration</h2>
                                                    <h3>{{isset($nyssef_registration->created_at)?\Carbon\Carbon::parse($nyssef_registration->created_at)->format('d M Y'):'Not Register yet'}}</h3>
                                                </div>
                                                <div class="media-right">
                                                    <img class="media-object" src="images/sml_thum_3.png" alt="">
                                                </div>
                                            </div>
                                        </div> 
                                    </a>
                                </div>                                
                                @endif
                            </div>
                        </div>
                    </div>
                    @if(Auth()->guard('frontend')->user()->type_id === '2')
                    <div class="right_bx mt-3">
                        <div class="clearfix">
                            <div class="table-scrollable table-responsive" style="border: none;">
                                <table class="ui celled table table-bordered" cellspacing="0" width="100%" id="students-management">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Registered On</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!--                    <div class="right_bx mt-3">
                    
                                            <form class="" id="user_login_form" action="user_dashboard.html">
                                            <h1 class="heading_stl">Dashboard</h1>
                                                   <div class="row mb-3">
                                                           <div class="col-sm-6">
                                                                   <div class="form-group">
                                                                           <label>First Name</label>
                                                                           <input class="form-control" placeholder="First Name*" type="text">
                                                                   </div>
                                                           </div>
                    
                                                           <div class="col-sm-6">
                                                                   <div class="form-group">
                                                                           <label>Grade</label>
                                                                           <select class="form-control">
                                                                                   <option>Select</option>
                                                                                   <option>Select</option>
                                                                                   <option>Select</option>
                                                                           </select>
                                                                   </div>
                                                           </div>
                                                           <div class="col-sm-6">
                                                                   <div class="form-group">
                                                                           <label>Project Type</label>
                                                                           <ul class="pl-0">
                                                                                   <li class="list-inline-item">
                                                                                           <div class="custom-control custom-radio custom-control-inline">
                                                                                                   <input type="radio" id="customRadioInline1-1" name="customRadioInline1" class="custom-control-input">
                                                                                                   <label class="custom-control-label" for="customRadioInline1-1">Individual</label>
                                                                                           </div>
                                                                                   </li>
                                                                                   <li class="list-inline-item">
                                                                                           <div class="custom-control custom-radio custom-control-inline">
                                                                                                   <input type="radio" id="customRadioInline1-2" name="customRadioInline1" class="custom-control-input">
                                                                                                   <label class="custom-control-label" for="customRadioInline1-2">Team</label>
                                                                                           </div>
                                                                                   </li>
                                                                           </ul>
                    
                    
                                                                   </div>
                                                           </div>
                                                           <div class="col-sm-6">
                                                                   <div class="form-group">
                                                                           <label>Project Type</label>
                                                                           <ul class="pl-0">
                                                                                   <li class="list-inline-item">
                                                                                           <div class="custom-control custom-checkbox mr-sm-2">
                                                                                                   <input type="checkbox" class="custom-control-input" id="custom_chk_55">
                                                                                                   <label class="custom-control-label" for="custom_chk_55">Animal Sciences</label>
                                                                                           </div>
                                                                                   </li>
                                                                                   <li class="list-inline-item">
                                                                                           <div class="custom-control custom-checkbox mr-sm-2">
                                                                                                   <input type="checkbox" class="custom-control-input" id="custom_chk_56">
                                                                                                   <label class="custom-control-label" for="custom_chk_56">Animal Sciences</label>
                                                                                           </div>
                                                                                   </li>
                                                                           </ul>
                    
                    
                                                                   </div>
                                                           </div>
                    
                                                           <div class="col-sm-12">
                                                                   <div class="form-group">
                                                                           <label>Upload Image</label>
                                                                           <div class="input-group file_upload">
                                                                                   <input type="text" class="form-control" readonly="">
                                                                                   <label class="input-group-btn d-flex align-items-stretch align-items-center">
                                                                                           <span class="btn btn-primary up-btn align-self-center">
                                                                                                   <i class="icofont-upload-alt"></i> Upload Image<input type="file" style="display: none;" multiple="">
                                                                                           </span>
                                                                                   </label>
                    
                                                                           </div>
                    
                    
                                                                   </div>
                                                           </div>
                                                           
                                                   </div>
                                            <h1 class="heading_stl">Dashboard</h1>
                                                   <div class="row">
                                                           <div class="col-sm-6">
                                                                   <div class="form-group">
                                                                           <label>First Name</label>
                                                                           <input class="form-control" placeholder="First Name*" type="text">
                                                                   </div>
                                                           </div>
                    
                                                           <div class="col-sm-6">
                                                                   <div class="form-group">
                                                                           <label>Grade</label>
                                                                           <select class="form-control">
                                                                                   <option>Select</option>
                                                                                   <option>Select</option>
                                                                                   <option>Select</option>
                                                                           </select>
                                                                   </div>
                                                           </div>
                                                           <div class="col-sm-6">
                                                                   <div class="form-group">
                                                                           <label>Project Type</label>
                                                                           <ul class="pl-0">
                                                                                   <li class="list-inline-item">
                                                                                           <div class="custom-control custom-radio custom-control-inline">
                                                                                                   <input type="radio" id="customRadioInline1-1" name="customRadioInline1" class="custom-control-input">
                                                                                                   <label class="custom-control-label" for="customRadioInline1-1">Individual</label>
                                                                                           </div>
                                                                                   </li>
                                                                                   <li class="list-inline-item">
                                                                                           <div class="custom-control custom-radio custom-control-inline">
                                                                                                   <input type="radio" id="customRadioInline1-2" name="customRadioInline1" class="custom-control-input">
                                                                                                   <label class="custom-control-label" for="customRadioInline1-2">Team</label>
                                                                                           </div>
                                                                                   </li>
                                                                           </ul>
                    
                    
                                                                   </div>
                                                           </div>
                                                           <div class="col-sm-6">
                                                                   <div class="form-group">
                                                                           <label>Project Type</label>
                                                                           <ul class="pl-0">
                                                                                   <li class="list-inline-item">
                                                                                           <div class="custom-control custom-checkbox mr-sm-2">
                                                                                                   <input type="checkbox" class="custom-control-input" id="custom_chk_55">
                                                                                                   <label class="custom-control-label" for="custom_chk_55">Animal Sciences</label>
                                                                                           </div>
                                                                                   </li>
                                                                                   <li class="list-inline-item">
                                                                                           <div class="custom-control custom-checkbox mr-sm-2">
                                                                                                   <input type="checkbox" class="custom-control-input" id="custom_chk_56">
                                                                                                   <label class="custom-control-label" for="custom_chk_56">Animal Sciences</label>
                                                                                           </div>
                                                                                   </li>
                                                                           </ul>
                    
                    
                                                                   </div>
                                                           </div>
                    
                                                           <div class="col-sm-12">
                                                                   <div class="form-group">
                                                                           <label>Upload Image</label>
                                                                           <div class="input-group file_upload">
                                                                                   <input type="text" class="form-control" readonly="">
                                                                                   <label class="input-group-btn d-flex align-items-stretch align-items-center">
                                                                                           <span class="btn btn-primary up-btn align-self-center">
                                                                                                   <i class="icofont-upload-alt"></i> Upload Image<input type="file" style="display: none;" multiple="">
                                                                                           </span>
                                                                                   </label>
                    
                                                                           </div>
                    
                    
                                                                   </div>
                                                           </div>
                                                           <div class="col-sm-12">
                                                                   <div class="text-center">
                                                                           <button class="btn nw_cst_btn">SUBMIT</button>
                                                                   </div>
                                                           </div>
                                                   </div>
                                           </form> 
                                        </div>-->
                </div>
            </div>
        </div> 
    </div>
</div>
@stop

@section('js')
<script type="text/javascript" src="{{URL::asset('public/frontend/js/jquery-confirm.js')}}"></script>
<script>
    $(function () {

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
	
	// confirmation
	function deleteStudent(student_id, student_name){
		/*$.confirm({
			title: 'A secure action',
			content: 'Its smooth to do multiple confirms at a time. <br> Click confirm or cancel for another modal',
			icon: 'fa fa-question-circle',
			animation: 'scale',
			closeAnimation: 'scale',
			opacity: 0.5,
			buttons: {
				'confirm': {
					text: 'Proceed',
					btnClass: 'btn-blue',
					action: function(){
						$.confirm({
							title: 'This maybe critical',
							content: 'Critical actions can have multiple confirmations like this one.',
							icon: 'fa fa-warning',
							animation: 'scale',
							closeAnimation: 'zoom',
							buttons: {
								confirm: {
									text: 'Yes, sure!',
									btnClass: 'btn-orange',
									action: function(){
										$.alert('A very critical action <strong>triggered!</strong>');
									}
								},
								cancel: function(){
									$.alert('you clicked on <strong>cancel</strong>');
								}
							}
						});
					}
				},
				cancel: function(){
					$.alert('you clicked on <strong>cancel</strong>');
				},
				//moreButtons: {
				//	text: 'something else',
				//	action: function(){
				//		$.alert('you clicked on <strong>something else</strong>');
				//	}
				//},
			}
		});*/
		
		$.confirm({
			title: 'Student Delete',
			content: 'Are you confirm to delete "'+student_name+'"?',
			icon: 'fa fa-warning',
			animation: 'scale',
			closeAnimation: 'zoom',
			opacity: 0.5,
			buttons: {
				confirm: {
					text: 'Yes, sure!',
					btnClass: 'btn-green',
					action: function(){
						//$.alert('A very critical action <strong>triggered!</strong>');
						event.preventDefault();
						ajaxindicatorstart();						
						var url = full_path + 'delete-student';
						var csrf_token = $('meta[name="csrf-token"]').attr('content');
						$.ajax({
							url: url,
							headers: {'X-CSRF-TOKEN': csrf_token},
							type: 'POST',
							dataType: 'json',
							//processData: false,
							//contentType: false,
							data: {student_id: student_id},
							success: function (resp) {
								if (resp.status && resp.status === 200) {
									notie.alert({
										type: 'success',
										text: '<i class="fa fa-check"></i> ' + resp.msg,
										time: 3
									});
									location.reload();
								} else {
									notie.alert({
										type: 'error',
										text: '<i class="fa fa-times"></i> ' + resp.msg,
										time: 3
									});
								}								
								ajaxindicatorstop();
							},
							error: function (resp) {
								console.log('error');
								ajaxindicatorstop();
								notie.alert({
									type: 'error',
									text: '<i class="fa fa-times"></i> Sorry! some problem is there.',
									time: 3
								});
								
							}
						});
						return false;
					}
				},
				cancel: function(){
					//$.alert('you clicked on <strong>cancel</strong>');
				}
			}
		});
	}
</script>
@stop