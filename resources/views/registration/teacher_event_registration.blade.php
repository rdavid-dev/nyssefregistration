@extends('layouts.main') 
@section('content')

<div class="index-body body_content">
	<!--div class="dash_top_banner d-flex align-items-center justify-content-center">
		<div class="overlay"></div>
		<h1>Sample heading</h1>
	</div>-->

	<div class="dash_bx bacolor_one">
		<div class="container"> 
			<div class="top_section">
				<div class="alert_danger_bx alert-danger">
					<div class="row">
						<div class="col-md-12">
							<div class="media align-self-center">								
								<div class="media-body">
									<p><i class="icofont-exclamation-tringle"></i> Please submit your event registration to get your account's access</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<!--<div class="col-md-3">
								
				</div>-->
				<div class="col-md-12">
					<h1 class="sample_heading"><i class="icofont-list"></i> Teacher's Event Registration</h1>
					
					<div class="right_bx mt-3">
					
						 <form class="" id="teacher_event_registration_form" method="post"  enctype="multipart/form-data" action="{{ Route('teacher-event-registration') }}">
						 <!--<h1 class="heading_stl">Dashboard</h1>-->
							@csrf
														
							<div class="row mb-3">
								<div class="col-sm-6">
									<div class="form-group">
										<label>School Type*</label>
										<select class="form-control" name="school_type_id" id="school_type">
										<option></option>
										</select>
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>School Name*</label>
										<input name="school_name" class="form-control" placeholder="School Name" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-12">
									<div class="form-group">
										<label>School Address*</label>
										<input name="school_address" class="form-control" placeholder="School Address" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>School City*</label>
										<input name="school_city" class="form-control" placeholder="School City" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>School State*</label>
										<select class="form-control" name="school_state" id="all_state"></select>
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>School Zip Code*</label>
										<input name="school_zipcode" class="form-control" placeholder="School Zip Code" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>School District*</label>
										<input name="school_district" class="form-control" placeholder="School District" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>School County*</label>
										<input name="school_county" class="form-control" placeholder="School County" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>School Phone*</label>
										<input name="school_phone" class="form-control" placeholder="School Phone" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Principal Name*</label>
										<input name="school_prinicipal_name" class="form-control" placeholder="Principal Name" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Principal Email*</label>
										<input name="school_principal_email" class="form-control" placeholder="Principal Email" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>March 11-17th, 2021 judging, 2021 NYSSEF ISEF liaisons do not need to sign up to volunteer!*</label>
										<ul class="pl-0">
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="isef_divisions[]" type="checkbox" id="customRadioInline-1" class="custom-control-input" value="1st Floor Monitor 9-10AM">
													<label class="custom-control-label" for="customRadioInline-1">1st Floor Monitor 9-10AM</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="isef_divisions[]" type="checkbox" id="customRadioInline-2" class="custom-control-input" value="1st Floor Monitor 10-11AM">
													<label class="custom-control-label" for="customRadioInline-2">1st Floor Monitor 10-11AM</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="isef_divisions[]" type="checkbox" id="customRadioInline-3" class="custom-control-input" value="1st Floor Monitor 11-12AM">
													<label class="custom-control-label" for="customRadioInline-3">1st Floor Monitor 11-12AM</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="isef_divisions[]" type="checkbox" id="customRadioInline-4" class="custom-control-input" value="1st Floor Monitor 12-1PM">
													<label class="custom-control-label" for="customRadioInline-4">1st Floor Monitor 12-1PM</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="isef_divisions[]" type="checkbox" id="customRadioInline-5" class="custom-control-input" value="2nd Floor Monitor 9-10AM">
													<label class="custom-control-label" for="customRadioInline-5">2nd Floor Monitor 9-10AM</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="isef_divisions[]" type="checkbox" id="customRadioInline-6" class="custom-control-input" value="2nd Floor Monitor 10-11AM">
													<label class="custom-control-label" for="customRadioInline-6">2nd Floor Monitor 10-11AM</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="isef_divisions[]" type="checkbox" id="customRadioInline-7" class="custom-control-input" value="2nd Floor Monitor 11-12PM">
													<label class="custom-control-label" for="customRadioInline-7">2nd Floor Monitor 11-12PM</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="isef_divisions[]" type="checkbox" id="customRadioInline-8" class="custom-control-input" value="2nd Floor Monitor 12-1PM">
													<label class="custom-control-label" for="customRadioInline-8">2nd Floor Monitor 12-1PM</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="isef_divisions[]" type="checkbox" id="customRadioInline-9" class="custom-control-input" value="2nd Floor Monitor 1-2PM">
													<label class="custom-control-label" for="customRadioInline-9">2nd Floor Monitor 1-2PM</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="isef_divisions[]" type="checkbox" id="customRadioInline-10" class="custom-control-input" value="2nd Floor Monitor 2-3PM">
													<label class="custom-control-label" for="customRadioInline-10">2nd Floor Monitor 2-3PM</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="isef_divisions[]" type="checkbox" id="customRadioInline-11" class="custom-control-input" value="Teacher's Room 9-11AM">
													<label class="custom-control-label" for="customRadioInline-11">Teacher's Room 9-11AM</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="isef_divisions[]" type="checkbox" id="customRadioInline-12" class="custom-control-input" value="Teacher's Room 11-1PM">
													<label class="custom-control-label" for="customRadioInline-12">Teacher's Room 11-1PM</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="isef_divisions[]" type="checkbox" id="customRadioInline-13" class="custom-control-input" value="Teacher's Room 1-3PM">
													<label class="custom-control-label" for="customRadioInline-13">Teacher's Room 1-3PM</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="isef_divisions[]" type="checkbox" id="customRadioInline-14" class="custom-control-input" value="1C and Form 7 Check">
													<label class="custom-control-label" for="customRadioInline-14">1C and Form 7 Check</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="isef_divisions[]" type="checkbox" id="customRadioInline-15" class="custom-control-input" value="LUNCH Ticket and Food Monitor 12-1PM">
													<label class="custom-control-label" for="customRadioInline-15">LUNCH Ticket and Food Monitor 12-1PM</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="isef_divisions[]" type="checkbox" id="customRadioInline-16" class="custom-control-input" value="LUNCH Ticket and Food Monitor 1-2PM">
													<label class="custom-control-label" for="customRadioInline-16">LUNCH Ticket and Food Monitor 1-2PM</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="isef_divisions[]" type="checkbox" id="customRadioInline-17" class="custom-control-input" value="Snacks and Food Monitor 2-3PM">
													<label class="custom-control-label" for="customRadioInline-17">Snacks and Food Monitor 2-3PM</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="isef_divisions[]" type="checkbox" id="customRadioInline-18" class="custom-control-input" value="Photography">
													<label class="custom-control-label" for="customRadioInline-18">Photography</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="isef_divisions[]" type="checkbox" id="customRadioInline-19" class="custom-control-input" value="SRC review 1:15 PM - 3:15 PM">
													<label class="custom-control-label" for="customRadioInline-19">SRC review 1:15 PM - 3:15 PM</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="isef_divisions[]" type="checkbox" id="customRadioInline-20" class="custom-control-input" value="Not Attending NYSSEF ISEF">
													<label class="custom-control-label" for="customRadioInline-20">Not Attending NYSSEF ISEF</label>
												</div>
											</li>											
										</ul>
										<span class="help-block"></span>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Broadcom Judging*</label><br>
										<input type="radio" name="broadcom_judging" value="yes" checked>Yes
										<input type="radio" name="broadcom_judging" value="no">No
										<span class="help-block"></span>
									</div>
									<div class="form-group" id="cat-pre">
										<ul class="pl-0">
											<li class="list-inline-item d-block">
												<div style="display: flex;">
												<div class="custom-control custom-checkbox custom-control-inline col-sm-6">
													<input name="broadcom_category1" type="checkbox" id="customRadio-1" class="custom-control-input" value="Behavioral Science">
													<label class="custom-control-label" for="customRadio-1">Behavioral Science</label>
												</div>
												<div class="custom-control custom-checkbox custom-control-inline col-sm-4">
													<select class="form-control" name="broadcom_preference1">
														<option value="" selected disabled>Preference</option>
														<option value="1st">1st</option>
														<option value="2nd">2nd</option>
														<option value="3rd">3rd</option>
													</select>
												</div>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div style="display: flex;">
												<div class="custom-control custom-checkbox custom-control-inline col-sm-6">
													<input name="broadcom_category2" type="checkbox" id="customRadio-2" class="custom-control-input" value="Life Sciences">
													<label class="custom-control-label" for="customRadio-2">Life Sciences</label>
												</div>
												<div class="custom-control custom-checkbox custom-control-inline col-sm-4">
													<select class="form-control" name="broadcom_preference2">
														<option value="" selected disabled>Preference</option>
														<option value="1st">1st</option>
														<option value="2nd">2nd</option>
														<option value="3rd">3rd</option>
													</select>
												</div>
											</div>
											</li>
											<li class="list-inline-item d-block">
												<div style="display: flex;">
												<div class="custom-control custom-checkbox custom-control-inline col-sm-6">
													<input name="broadcom_category3" type="checkbox" id="customRadio-3" class="custom-control-input" value="Physical Sciences">
													<label class="custom-control-label" for="customRadio-3">Physical Sciences</label>
												</div>
												<div class="custom-control custom-checkbox custom-control-inline col-sm-4">
													<select class="form-control" name="broadcom_preference3">
														<option value="" selected disabled>Preference</option>
														<option value="1st">1st</option>
														<option value="2nd">2nd</option>
														<option value="3rd">3rd</option>
													</select>
												</div>
											</div>
											</li>
											<li class="list-inline-item d-block"></li>
										</ul>
										<span class="help-block"></span>
									</div>
									<div class="form-group">
										<label>Andromeda Judging*</label><br>
										<input type="radio" name="andromeda_judging" value="yes" checked>Yes
										<input type="radio" name="andromeda_judging" value="no">No
										<span class="help-block"></span>
									</div>
									<div class="form-group" id="cata-pref">
										<ul class="pl-0">
											<li class="list-inline-item d-block">
												<div style="display: flex;">
												<div class="custom-control custom-checkbox custom-control-inline col-sm-6">
													<input name="andromeda_category1" type="checkbox" id="customRadioButton-1" class="custom-control-input" value="Behavioral Science">
													<label class="custom-control-label" for="customRadioButton-1">Behavioral Science</label>
												</div>
												<div class="custom-control custom-checkbox custom-control-inline col-sm-4">
													<select class="form-control" name="andromeda_preference1">
														<option value="" selected disabled>Preference</option>
														<option value="1st">1st</option>
														<option value="2nd">2nd</option>
														<option value="3rd">3rd</option>
														<option value="4th">4th</option>
														<option value="5th">5th</option>
														<option value="6th">6th</option>
														<option value="7th">7th</option>
														<option value="8th">8th</option>
														<option value="9th">9th</option>
														<option value="10th">10th</option>
													</select>
												</div>
											</div>
											</li>
											<li class="list-inline-item d-block">
												<div style="display: flex;">
												<div class="custom-control custom-checkbox custom-control-inline col-sm-6">
													<input name="andromeda_category2" type="checkbox" id="customRadioButton-2" class="custom-control-input" value="Biology">
													<label class="custom-control-label" for="customRadioButton-2">Biology</label>
												</div>
												<div class="custom-control custom-checkbox custom-control-inline col-sm-4">
													<select class="form-control" name="andromeda_preference2">
														<option value="" selected disabled>Preference</option>
														<option value="1st">1st</option>
														<option value="2nd">2nd</option>
														<option value="3rd">3rd</option>
														<option value="4th">4th</option>
														<option value="5th">5th</option>
														<option value="6th">6th</option>
														<option value="7th">7th</option>
														<option value="8th">8th</option>
														<option value="9th">9th</option>
														<option value="10th">10th</option>
													</select>
												</div>
											</div>
											</li>
											<li class="list-inline-item d-block">
												<div style="display: flex;">
												<div class="custom-control custom-checkbox custom-control-inline col-sm-6">
													<input name="andromeda_category3" type="checkbox" id="customRadioButton-3" class="custom-control-input" value="Chemistry">
													<label class="custom-control-label" for="customRadioButton-3">Chemistry</label>
												</div>
												<div class="custom-control custom-checkbox custom-control-inline col-sm-4">
													<select class="form-control" name="andromeda_preference3">
														<option value="" selected disabled>Preference</option>
														<option value="1st">1st</option>
														<option value="2nd">2nd</option>
														<option value="3rd">3rd</option>
														<option value="4th">4th</option>
														<option value="5th">5th</option>
														<option value="6th">6th</option>
														<option value="7th">7th</option>
														<option value="8th">8th</option>
														<option value="9th">9th</option>
														<option value="10th">10th</option>
													</select>
												</div>
											</div>
											</li>
											<li class="list-inline-item d-block">
												<div style="display: flex;">
												<div class="custom-control custom-checkbox custom-control-inline col-sm-6">
													<input name="andromeda_category4" type="checkbox" id="customRadioButton-4" class="custom-control-input" value="Computer Science">
													<label class="custom-control-label" for="customRadioButton-4">Computer Science</label>
												</div>
												<div class="custom-control custom-checkbox custom-control-inline col-sm-4">
													<select class="form-control" name="andromeda_preference4">
														<option value="" selected disabled>Preference</option>
														<option value="1st">1st</option>
														<option value="2nd">2nd</option>
														<option value="3rd">3rd</option>
														<option value="4th">4th</option>
														<option value="5th">5th</option>
														<option value="6th">6th</option>
														<option value="7th">7th</option>
														<option value="8th">8th</option>
														<option value="9th">9th</option>
														<option value="10th">10th</option>
													</select>
												</div>
											</div>
											</li>
											<li class="list-inline-item d-block">
												<div style="display: flex;">
												<div class="custom-control custom-checkbox custom-control-inline col-sm-6">
													<input name="andromeda_category5" type="checkbox" id="customRadioButton-5" class="custom-control-input" value="Engineering">
													<label class="custom-control-label" for="customRadioButton-5">Engineering</label>
												</div>
												<div class="custom-control custom-checkbox custom-control-inline col-sm-4">
													<select class="form-control" name="andromeda_preference5">
														<option value="" selected disabled>Preference</option>
														<option value="1st">1st</option>
														<option value="2nd">2nd</option>
														<option value="3rd">3rd</option>
														<option value="4th">4th</option>
														<option value="5th">5th</option>
														<option value="6th">6th</option>
														<option value="7th">7th</option>
														<option value="8th">8th</option>
														<option value="9th">9th</option>
														<option value="10th">10th</option>
													</select>
												</div>
											</div>
											</li>
											<li class="list-inline-item d-block">
												<div style="display: flex;">
												<div class="custom-control custom-checkbox custom-control-inline col-sm-6">
													<input name="andromeda_category6" type="checkbox" id="customRadioButton-6" class="custom-control-input" value="Environmental Sciences">
													<label class="custom-control-label" for="customRadioButton-6">Environmental Sciences</label>
												</div>
												<div class="custom-control custom-checkbox custom-control-inline col-sm-4">
													<select class="form-control" name="andromeda_preference6">
														<option value="" selected disabled>Preference</option>
														<option value="1st">1st</option>
														<option value="2nd">2nd</option>
														<option value="3rd">3rd</option>
														<option value="4th">4th</option>
														<option value="5th">5th</option>
														<option value="6th">6th</option>
														<option value="7th">7th</option>
														<option value="8th">8th</option>
														<option value="9th">9th</option>
														<option value="10th">10th</option>
													</select>
												</div>
											</div>
											</li>
											<li class="list-inline-item d-block">
												<div style="display: flex;">
												<div class="custom-control custom-checkbox custom-control-inline col-sm-6">
													<input name="andromeda_category7" type="checkbox" id="customRadioButton-7" class="custom-control-input" value="Earth, Space, Energy">
													<label class="custom-control-label" for="customRadioButton-7">Earth, Space, Energy</label>
												</div>
												<div class="custom-control custom-checkbox custom-control-inline col-sm-4">
													<select class="form-control" name="andromeda_preference7">
														<option value="" selected disabled>Preference</option>
														<option value="1st">1st</option>
														<option value="2nd">2nd</option>
														<option value="3rd">3rd</option>
														<option value="4th">4th</option>
														<option value="5th">5th</option>
														<option value="6th">6th</option>
														<option value="7th">7th</option>
														<option value="8th">8th</option>
														<option value="9th">9th</option>
														<option value="10th">10th</option>
													</select>
												</div>
											</div>
											</li>
											<li class="list-inline-item d-block">
												<div style="display: flex;">
												<div class="custom-control custom-checkbox custom-control-inline col-sm-6">
													<input name="andromeda_category8" type="checkbox" id="customRadioButton-8" class="custom-control-input" value="Mathematics">
													<label class="custom-control-label" for="customRadioButton-8">Mathematics</label>
												</div>
												<div class="custom-control custom-checkbox custom-control-inline col-sm-4">
													<select class="form-control" name="andromeda_preference8">
														<option value="" selected disabled>Preference</option>
														<option value="1st">1st</option>
														<option value="2nd">2nd</option>
														<option value="3rd">3rd</option>
														<option value="4th">4th</option>
														<option value="5th">5th</option>
														<option value="6th">6th</option>
														<option value="7th">7th</option>
														<option value="8th">8th</option>
														<option value="9th">9th</option>
														<option value="10th">10th</option>
													</select>
												</div>
											</div>
											</li>
											<li class="list-inline-item d-block">
												<div style="display: flex;">
												<div class="custom-control custom-checkbox custom-control-inline col-sm-6">
													<input name="andromeda_category9" type="checkbox" id="customRadioButton-9" class="custom-control-input" value="Medicine and Health">
													<label class="custom-control-label" for="customRadioButton-9">Medicine and Health</label>
												</div>
												<div class="custom-control custom-checkbox custom-control-inline col-sm-4">
													<select class="form-control" name="andromeda_preference9">
														<option value="" selected disabled>Preference</option>
														<option value="1st">1st</option>
														<option value="2nd">2nd</option>
														<option value="3rd">3rd</option>
														<option value="4th">4th</option>
														<option value="5th">5th</option>
														<option value="6th">6th</option>
														<option value="7th">7th</option>
														<option value="8th">8th</option>
														<option value="9th">9th</option>
														<option value="10th">10th</option>
													</select>
												</div>
											</div>
											</li>
											<li class="list-inline-item d-block">
												<div style="display: flex;">
												<div class="custom-control custom-checkbox custom-control-inline col-sm-6">
													<input name="andromeda_category10" type="checkbox" id="customRadioButton-10" class="custom-control-input" value="Physics">
													<label class="custom-control-label" for="customRadioButton-10">Physics</label>
												</div>
												<div class="custom-control custom-checkbox custom-control-inline col-sm-4">
													<select class="form-control" name="andromeda_preference10">
														<option value="" selected disabled>Preference</option>
														<option value="1st">1st</option>
														<option value="2nd">2nd</option>
														<option value="3rd">3rd</option>
														<option value="4th">4th</option>
														<option value="5th">5th</option>
														<option value="6th">6th</option>
														<option value="7th">7th</option>
														<option value="8th">8th</option>
														<option value="9th">9th</option>
														<option value="10th">10th</option>
													</select>
												</div>
											</div>
											</li>
											<li class="list-inline-item d-block"></li>
										</ul>
										<span class="help-block"></span>
									</div>
								</div>
								<!-- <div class="col-sm-6">
									<div class="form-group">
										<label>Andromeda/Broadcom Judging*</label> -->
										<!--<ul class="pl-0">
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="andromeda_broadcom_judging[]" type="checkbox" id="customRadioInline2-1" class="custom-control-input" value="Set up day of the fair(5:30AM) at the venue">
													<label class="custom-control-label" for="customRadioInline2-1">Set up day of the fair(5:30AM) at the venue</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="andromeda_broadcom_judging[]" type="checkbox" id="customRadioInline2-2" class="custom-control-input" value="Judges Registration">
													<label class="custom-control-label" for="customRadioInline2-2">Judges Registration</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="andromeda_broadcom_judging[]" type="checkbox" id="customRadioInline2-3" class="custom-control-input" value="School Registration">
													<label class="custom-control-label" for="customRadioInline2-3">School Registration</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="andromeda_broadcom_judging[]" type="checkbox" id="customRadioInline2-4" class="custom-control-input" value="Main Lobby Monitor">
													<label class="custom-control-label" for="customRadioInline2-4">Main Lobby Monitor</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="andromeda_broadcom_judging[]" type="checkbox" id="customRadioInline2-5" class="custom-control-input" value="Upstairs Lobby Monitor">
													<label class="custom-control-label" for="customRadioInline2-5">Upstairs Lobby Monitor</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="andromeda_broadcom_judging[]" type="checkbox" id="customRadioInline2-6" class="custom-control-input" value="Room Monitor">
													<label class="custom-control-label" for="customRadioInline2-6">Room Monitor</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="andromeda_broadcom_judging[]" type="checkbox" id="customRadioInline2-7" class="custom-control-input" value="Lunch Ticket Monitor">
													<label class="custom-control-label" for="customRadioInline2-7">Lunch Ticket Monitor</label>
												</div>
											</li>
											<li class="list-inline-item d-block">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input name="andromeda_broadcom_judging[]" type="checkbox" id="customRadioInline2-8" class="custom-control-input" value="Day 1 Forms Checker">
													<label class="custom-control-label" for="customRadioInline2-8">Day 1 Forms Checker</label>
												</div>
											</li>
										</ul>-->
										<!-- <select name="andromeda_broadcom_judging" class="form-control">
											<option value="">---Select Category---</option>
											<option value="Behavioral Science">Behavioral Science</option>
											<option value="Life Sciences">Life Sciences</option>
											<option value="Physical Sciences">Physical Sciences</option>
										</select>
										<span class="help-block"></span>
									</div>
								</div> -->
								
								<div class="col-sm-6 mb-3">
									<div class="form-group">
										<label>Payment Method*</label>
										<select name="payment_method" class="form-control">
											<option value="">---Select Payment Method---</option>
											<option value="Check">Check</option>
											<option value="BOCES">BOCES</option>
										</select>
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
    $(document).ready(function () {
        //get_school_name();
        get_school_type();
        get_all_state();
    });
$("input[type='radio']"). click(function(){
    var broadcom_judging=$("input[name='broadcom_judging']:checked"). val();
    if(broadcom_judging=="no")
    {
    	$("#cat-pre").hide();
    }else{
    	$("#cat-pre").show();
    }
    var andromeda_judging=$("input[name='andromeda_judging']:checked"). val();
    if(andromeda_judging=="no")
    {
    	$("#cata-pref").hide();
    }else{
    	$("#cata-pref").show();
    }
});
</script>
@stop