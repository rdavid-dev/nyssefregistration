@extends('layouts.main') 
@section('content')
<div class="index-body body_content">

	<div class="top_section">
		<!--<div class="container">  
			<div class="alert_bx alert-success">
				<div class="row">
					<div class="col-md-12">
						<div class="media align-self-center">
							<img class="mr-3" src="{{URL::asset('public/frontend/images/promotion.png')}}" data-holder-rendered="true" alt="">
							<div class="media-body">
								<h1>New Requirements</h1>
								<p>All participating students, in all divisions, are now required to submit their ISEF forms for pre-approval before experimentation can begin.
									<br>Get your project pre-approved before you begin your experimentation</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>-->

		<div class="top_shedule bacolor_one">
			<div class="container"> 
				<h1 class="big_hd text-center">{{($event!="")?$event->event_title:""}}</h1>
				<div class="row">
					<!--<div class="col-md-12">-->
						<div class="col-md-6 left_bx">
							<h1 class="sml_hd mb-1">@php echo ($event->address_line1!="") ? nl2br($event->address_line1) : ""; @endphp</h1>
							<div class="media align-self-center">
								<i class="icofont-location-pin"></i>
								<div class="media-body">
									<p>{{($event!="")?$event->address_line2:""}}<br>
										{{($event!="")?$event->city:""}}, {{($event!="")?$event->state:""}} {{($event!="")?$event->zipcode:""}}</p> 
								</div>
							</div>
							@if($event->facebook_link!='')
							<!--<a href="{{ $event->facebook_link }}" class="custom-btn modal_btn_nw facebook">
								<span class="main_span"><span class="img-span"><i class="icofont-facebook"></i></span><span class="text">Find us on Facebook</span></span>
							</a>-->
							@endif
							<!--<p class="notice">{{($event!="")?$event->parking_notes:""}}</p>-->
						</div>
						@if($event->is_second_event_show=="1")
						<div class="col-md-6 left_bx">
							<h1 class="sml_hd mb-1">@php echo ($event->second_event_title!="") ? nl2br($event->second_event_title) : ""; @endphp</h1>
							<div class="media align-self-center">
								<i class="icofont-location-pin"></i>
								<div class="media-body">
									<p>@php echo ($event->second_event_address!="") ? nl2br($event->second_event_address) : ""; @endphp</p> 
								</div>
							</div>
							<!--<p class="notice">{{($event!="")?$event->parking_notes:""}}</p>-->
						</div>
						@endif
					</div>
					<!-- MAP -->
				<!--</div>-->
			</div> 
		</div>
		@if(!empty($schedule))
		<div class="top_shedule bacolor_two">
			<div class="container"> 
				<h1 class="big_hd text-left">Schedule of Events</h1>
				<div class="row">
					<div class="col-md-12">
						<!-- @foreach($schedule as $key=>$value)
							<div class="shidule_smi_bx">
								<h1 class="sml_hd"><i class="icofont-ui-calendar"></i>{{date("l, F jS, Y", strtotime($value->scheduled_date))}}</h1>

								<div class="smi_bx_md ml-3">
									@php
									$all_schedule=unserialize($value->schedules);
									@endphp
									@foreach($all_schedule['start_time'] as $key=>$data)
									<div class="card_bx">
										<div class="row">
											<div class="col-sm-2">
												<h1>{{$data}} - {{$all_schedule['end_time'][$key]}}</h1>
											</div>
											<div class="col-sm-10">
												<h2>{{$all_schedule['description'][$key]}}</h2>
											</div>
										</div>
									</div>
									@endforeach
								</div>
								
								<div class="shidule_smi_bx mt-3">
									<h1 class="sml_hd"><i class="icofont-ui-calendar"></i> Judge Schedule of Events</h1>
									<div class="smi_bx_md ml-3">
										<div class="card_bx">
											<div class="row">
												<div class="col-sm-12">
													<h2>@php 
													if($event!="")
													{
														echo $value->event_judge_schedule;
													}
													 @endphp</h2>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach -->
						
						<div class="shidule_smi_bx mt-3">
							<h1 class="sml_hd"><i class="icofont-ui-calendar"></i>Monday, February 01, 2021</h1>
							<div class="smi_bx_md ml-3">
								<div class="card_bx">
									<div class="row">
										<div class="col-sm-12">
											<h2><p>Online Registration OPENS at 8:00 AM</p></h2>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="shidule_smi_bx mt-3">
							<h1 class="sml_hd"><i class="icofont-ui-calendar"></i>Wednesday, February 10, 2021</h1>
							<div class="smi_bx_md ml-3">
								<div class="card_bx">
									<div class="row">
										<div class="col-sm-12">
											<h2><p>Technical Support CLOSES at 5:00 PM All requests for technical support and NYSSEF website assistance must be submitted prior to the Technical Support Deadline to guarantee a resolution before the online registration deadline passes.</p></h2>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <div class="shidule_smi_bx mt-3">
							<h1 class="sml_hd"><i class="icofont-ui-calendar"></i>Thursday, February 11, 2021</h1>
							<div class="smi_bx_md ml-3">
								<div class="card_bx">
									<div class="row">
										<div class="col-sm-12">
											<h2><p>Online Registration CLOSES at 5:00 PM. EACH student must complete the INITIAL online registration process and upload the NYSSEF application form electronically by this date. Failure to register initially, by this date, will result in Disqualification and participation in NYSSEF ISEF 2021!!</p></h2>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="shidule_smi_bx mt-3">
							<h1 class="sml_hd"><i class="icofont-ui-calendar"></i>Monday, March 1, 2021</h1>
							<div class="smi_bx_md ml-3">
								<div class="card_bx">
									<div class="row">
										<div class="col-sm-12">
											<h2><p>Final Payments Due by 5:00 PM. ALL NYSSEF application forms and payments MAILED and RECEIVED BY 5:00 PM</p></h2>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="shidule_smi_bx mt-3">
							<h1 class="sml_hd"><i class="icofont-ui-calendar"></i>Wednesday, March 3, 2021</h1>
							<div class="smi_bx_md ml-3">
								<div class="card_bx">
									<div class="row">
										<div class="col-sm-12">
											<h2><p>Liaison Confirmations Due by 5:00 PM. Liaison project CONFIRMATION – ONE EMAIL per SCHOOL PLEASE must be sent to info@nyssef.org.  Email responses should state: “Review of all student participants and divisions are confirmed as accurate” or provide an explanation of inaccurate information, including duplicate entries or missing partner information.</p></h2>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="shidule_smi_bx mt-3">
							<h1 class="sml_hd"><i class="icofont-ui-calendar"></i>Thursday, March 11, 2021</h1>
							<div class="smi_bx_md ml-3">
								<div class="card_bx">
									<div class="row">
										<div class="col-sm-12">
											<h2><p>All ISEF paperwork and student presentation videos must be electronically uploaded by this date.</p></h2>
											<ol style="list-style-type:decimal;padding-left:1em">
											    <li>Please note: Failure to provide payment by March 1, 2021 at 5:00PM will result in disqualification. In the event of a disqualification, no refunds will be issued. If a payment check is returned, there will be a $30 fee.</li>
											    <li>Please do not ask for signature requests on overnight/Fed Ex/UPS deliveries; packages requiring signature will be returned to the sender and students will be disqualified for non-payment.</li>
											    <li>Mail to: New York State Science and Engineering Fair Attn: Robert Hildebrand, Treasurer P. O. Box 605 Valley Stream, NY 11582</li>
											    <li>**ALL CHECKS SHOULD BE MADE PAYABLE TO NYSSEF, INC.</li>
											</ol>
										</div>
									</div>
								</div>
								<div class="card_bx">
									<div class="row">
										<div class="col-sm-12 text-center">
											<h2><b>After creating your account all students and teachers MUST log back in to the NYSSEF website to complete the registration process</b></h2>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="shidule_smi_bx">
							<h1 class="sml_hd"></i>NYSSEF-ISEF Division</h1>
							<h1 class="sml_hd"><i class="icofont-ui-calendar"></i>Monday, March 11th, 2021</h1>
							<div class="smi_bx_md ml-3">
								<div class="card_bx">
									<div class="row">
										<div class="col-sm-2">
											<h1>7:30 AM - 8:30 AM</h1>
										</div>
										<div class="col-sm-10">
											<h2>Student/Poster Check-in</h2>
										</div>
									</div>
								</div>
								<div class="card_bx">
									<div class="row">
										<div class="col-sm-2">
											<h1>7:30 AM - 8:30 AM</h1>
										</div>
										<div class="col-sm-10">
											<h2>Judge Check-in</h2>
										</div>
									</div>
								</div>
								<div class="card_bx">
									<div class="row">
										<div class="col-sm-2">
											<h1>9:00 AM - 3:00 PM</h1>
										</div>
										<div class="col-sm-10">
											<h2>Open floor for Judges (No guest viewing of presentations)</h2>
										</div>
									</div>
								</div>
							</div>
							
							<div class="shidule_smi_bx mt-3">
								<h1 class="sml_hd"><i class="icofont-ui-calendar"></i> Judge Schedule of Events</h1>
								<div class="smi_bx_md ml-3">
									<div class="card_bx">
										<div class="row">
											<div class="col-sm-12">
												<h2><p>Judge check-in will be from 7:30 AM - 8:30 AM. Judging with students will be from 9:00 AM to 5:00 PM, approximately</p></h2>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
						<div class="shidule_smi_bx">
							<h1 class="sml_hd">NYSSEF-Andromeda Broadcom Division (CANCELLED)</h1>
							
							<div class="smi_bx_md ml-3">
								
							</div>
							
							<div class="shidule_smi_bx mt-3">
								<h1 class="sml_hd"><i class="icofont-ui-calendar"></i> Student : Teacher judge ratio (5:1)</h1>
								<div class="smi_bx_md ml-3">
									<div class="card_bx">
										<div class="row">
											<div class="col-sm-12">
												<h2><p>All teacher, liaisons, administrators etc. must register to serve as judges for Andromeda & Broadcom fairs with a 5:1 student to judge ratio.</p></h2>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
							
							
							@if($participation!="")
							<div class="shidule_smi_bx">
								<h1 class="sml_hd"><i class="icofont-ui-note"></i> NYSSEF Participation Forms:</h1>
								<div class="smi_bx_md ml-3">
									<div class="card_bx">
										<div class="row">
											<div class="col-sm-12">
												<ul class="btn_ul row">
													@foreach($participation as $k=>$v)
													<li class="col-sm-3"> <a href="{{URL::asset('public/uploads/frontend/participation_file/' . $v->form_filename)}}" target="_blank" class="btn"><i class="icofont-download"></i> {{$v->form_name}}</a> <span>{{$v->form_description}}</span></li>
													@endforeach
												</ul>

											</div>
										</div>
									</div>
								</div>
							</div>
							@endif 
							<div class="btn_wrp">
								<div class="row justify-content-center">
									<div class="col-sm-9">
										<div class="row">
											<div class="col-sm-6">
												<a href="{{ Route('register') }}" class="btn">Teacher & Student Registration</a>
											</div>
											<div class="col-sm-6">
												<a href="{{ Route('judge-volunteer') }}" class="btn">Judges & Volunteers Registration</a>                                            
											</div>
										</div>
									</div>
                                </div>

                            </div>
							
					</div>
				</div>
				<div>
				</div>


			</div>
		</div>
		@endif
		<div class="top_shedule bacolor_one table_bx">
			<div class="container"> 
				<div class="row">
					<div class="col-sm-12">
						<div class="table-responsive">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th scope="col" class="green_color">Registration Deadlines</th>
										<th scope="col" class="text-center">Opens on</th>
										<th scope="col" class="text-center">Closes on</th>
										<th scope="col" class="text-center">Final Revisions Close*</th>
										<th scope="col" class="text-center">Status</th>
									</tr>
								</thead>
								<tbody>
								@if($register_setting!="")
								@foreach($register_setting as $k=>$setting)
									<tr>
										<td class="text_sni_bld">{{$setting->title}}</td>
										<td class="text-center">
										@if($setting->id == '5')
											Open
										@else
										{{date("M d, Y (l)", strtotime($setting->started_at))}}
										@endif
										</td>
										<td class="text-center">
										@if($setting->id == '6')
											Join Us
										@else
											@if($setting->under_tab == 'teacher_student')
												{{($setting->closed_at!="")?date("M d, Y (l)", strtotime($setting->closed_at))." 5PM":"n/a"}}
											@else	
												{{($setting->closed_at!="")?date("M d, Y (l)", strtotime($setting->closed_at)):"n/a"}}
											@endif
										@endif
										</td>
										<td class="text-center">
										{{($setting->final_revision_closed_at!="")?date("M d, Y (l)", strtotime($setting->final_revision_closed_at)):"n/a"}}
										</td>
										@if($setting->registration_status=="0")
										<td class="text-center" style="color:orange">Opening Soon</td>
										@elseif($setting->registration_status=="1")
										<td class="text-center" style="color:green">Open</td>
										@else
										<td class="text-center" style="color:red">Closed</td>
										@endif
									</tr>
								@endforeach
								@endif
								</tbody>
							</table>
						</div>
						<p class="notice">*final revision indicates the last date when you can re-upload your forms/paperwork when requested by our staff.</p>
					</div>
				</div>
			</div>
		</div>

		
		<!--<div class="top_shedule bacolor_two">
			<div class="container"> 
				<h1 class="big_hd text-left">Divisions and Categories</h1>
				<div class="row">
					<div class="col-md-12">
				   
				@php
				if($event!="")
				{
					echo $event->division_categories;
				}
				@endphp
					</div>
				</div>
				<div>
				</div>


			</div>
		</div>-->
		
		@stop
