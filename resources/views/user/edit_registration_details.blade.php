@extends('layouts.main') 
@section('content')
@php 
use App\EventUploadedForm;
@endphp	
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
					<h1 class="sample_heading"><i class="icofont-list"></i> Edit {{isset($model->divison->name)?ucfirst($model->divison->name):''}} Registration Details</h1>
					
					<div class="right_bx mt-3">
					
						 <form class="" id="edit_registration_form" method="post"  enctype="multipart/form-data" action="{{ Route('edit-registration') }}">
						 <!--<h1 class="heading_stl">Dashboard</h1>-->
							@csrf
							<input type="hidden" name="id" value="{{$model->id}}">
							<input type="hidden" name="division_id" value="{{$model->division_id}}" />
							
							<div class="row mb-3">
								<div class="col-sm-6">
									<div class="form-group">
										<label>First Name<span class="required">*</span></label>
										<input name="first_name" class="form-control" placeholder="Your First Name" value="{{$model->first_name}}" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Last Name*</label>
										<input name="last_name" class="form-control" placeholder="Your Last Name" value="{{$model->last_name}}" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Email*</label>
										<input name="email" class="form-control" placeholder="Your Email" value="{{$model->email}}" type="text">
										<span class="help-block"></span>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<label>Grade*</label>
										<select name="grade" class="form-control">
                                            @if($model->divison->name=="Broadcom")
											<option value="">---Select Grade---</option>
											<option value="6th Grade" {{($model->grade=='6th Grade')?'selected':''}}>6th Grade</option>
											<option value="7th Grade" {{($model->grade=='7th Grade')?'selected':''}}>7th Grade</option>
											<option value="8th Grade" {{($model->grade=='8th Grade')?'selected':''}}>8th Grade</option>
                                            @elseif($model->divison->name=="Andromeda" || $model->divison->name=="NYSSEF ISEF")
                                            <option value="">---Select Grade---</option>
											<option value="9th Grade" {{($model->grade=='9th Grade')?'selected':''}}>9th Grade</option>
											<option value="10th Grade" {{($model->grade=='10th Grade')?'selected':''}}>10th Grade</option>
											<option value="11th Grade" {{($model->grade=='11th Grade')?'selected':''}}>11th Grade</option>
											<option value="12th Grade" {{($model->grade=='12th Grade')?'selected':''}}>12th Grade</option>
                                            @endif
                                        </select>
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Teacher Liaison*</label>
										<input name="teacher_liaison" class="form-control" placeholder="Teacher Liaison" value="{{$model->teacher_liaison}}" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Teacher Email*</label>
										<input name="teacher_email" class="form-control" placeholder="Teacher Email" value="{{$model->teacher_email}}" type="text">
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
										<input name="school_name" class="form-control" placeholder="School Name" value="{{$model->school_name}}" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Address*</label>
										<input name="school_address" class="form-control" placeholder="School Address" value="{{$model->school_address}}" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>City*</label>
										<input name="school_city" class="form-control" placeholder="School City" value="{{$model->school_city}}" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Zip Code*</label>
										<input name="school_zipcode" class="form-control" placeholder="School Zip Code" value="{{$model->school_zipcode}}" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Phone Number*</label>
										<input name="school_phone" class="form-control" placeholder="School Phone Number" value="{{$model->school_phone}}" type="text">
										<span class="help-block"></span>
									</div>
								</div>
							</div>
							
							<h1 class="heading_stl">Student Information</h1>
							<div class="row mb-3">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Address*</label>
										<input name="address_line1" class="form-control" placeholder="Your Address" value="{{$model->address_line1}}" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>City*</label>
										<input name="city" class="form-control" placeholder="Your City" value="{{$model->city}}" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Zip Code*</label>
										<input name="zipcode" class="form-control" placeholder="Your Zip Code" value="{{$model->zipcode}}" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Phone Number*</label>
										<input name="phone" class="form-control" placeholder="Your Phone Number" value="{{$model->phone}}" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Gender*</label>
										<select name="gender" class="form-control">
											<option value="">---Select Gender---</option>
											<option value="Male" {{($model->gender=="Male")?"selected":''}}>Male</option>
											<option value="Female" {{($model->gender=="Female")?"selected":''}}>Female</option>
										</select>
										<span class="help-block"></span>
									</div>									
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Meal type*</label>
										<select name="meal_type" class="form-control">
											<option value="">---Select Meal---</option>
											<option value="Turkey" {{($model->meal_type=="Turkey")?"selected":''}}>Turkey</option>
											<option value="Ham" {{($model->meal_type=="Ham")?"selected":''}}>Ham</option>
											<option value="Kosher" {{($model->meal_type=="Kosher")?"selected":''}}>Kosher</option>
											<option value="Vegetarian" {{($model->meal_type=="Vegetarian")?"selected":''}}>Vegetarian</option>
										</select>
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>T-Shirt Size*</label>
										<select name="tshirt_size" class="form-control">
											<option value="">---Select Size---</option>
											<option value="Small" {{($model->tshirt_size=="Small")?"selected":''}}>Small</option>
											<option value="Medium" {{($model->tshirt_size=="Medium")?"selected":''}}>Medium</option>
											<option value="Large" {{($model->tshirt_size=="Large")?"selected":''}}>Large</option>
											<option value="X-Large" {{($model->tshirt_size=="X-Large")?"selected":''}}>X-Large</option>
										</select>
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Race (Optional)</label>
										<input name="race" class="form-control" placeholder="Your Race" value="{{$model->race}}" type="text">
										<span class="help-block"></span>
									</div>
								</div>
							</div>
							
							<h1 class="heading_stl">Project Information</h1>
							<div class="row mb-3">	
							
								<div class="col-sm-6">
									<div class="form-group">
										<label>Project Title*</label>
										<input name="project_title" class="form-control" placeholder="Project Title" value="{{$model->project_title}}" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Project Category*</label>
										<select name="project_category" class="form-control">
                                            @if($model->divison->name=="Broadcom")
											<option value="">---Select Category---</option>
											<option value="Behavioral Science" {{($model->project_category=="Behavioral Science")?"selected":''}}>Behavioral Science</option>
											<option value="Life Sciences" {{($model->project_category=="Life Sciences")?"selected":''}}>Life Sciences</option>
											<option value="Physical Sciences" {{($model->project_category=="Physical Sciences")?"selected":''}}>Physical Sciences</option>
                                            @elseif($model->divison->name=="Andromeda")
                                            <option value="">---Select Category---</option>
											<option value="Behavioral Science" {{($model->project_category=="Behavioral Science")?"selected":''}}>Behavioral Science</option>
											<option value="Biology" {{($model->project_category=="Biology")?"selected":''}}>Biology</option>
											<option value="Chemistry"  {{($model->project_category=="Chemistry")?"selected":''}}>Chemistry</option>
											<option value="Computer Science"  {{($model->project_category=="Computer Science")?"selected":''}}>Computer Science</option>
											<option value="Engineering"  {{($model->project_category=="Engineering")?"selected":''}}>Engineering</option>
											<option value="Environmental Sciences"  {{($model->project_category=="Environmental Sciences")?"selected":''}}>Environmental Sciences</option>
											<option value="Earth, Space, Energy"  {{($model->project_category=="Earth, Space, Energy")?"selected":''}}>Earth, Space, Energy</option>
											<option value="Mathematics"  {{($model->project_category=="Mathematics")?"selected":''}}>Mathematics</option>
											<option value="Medicine and Health"  {{($model->project_category=="Medicine and Health")?"selected":''}}>Medicine and Health</option>
											<option value="Physics"  {{($model->project_category=="Physics")?"selected":''}}>Physics</option>
                                            @else
                                            <option value="">---Select Category---</option>
											<option value="Animal Science" {{($model->project_category=="Animal Science")?"selected":''}}>Animal Science</option>
											<option value="Behavioral and Social Sciences" {{($model->project_category=="Behavioral and Social Sciences")?"selected":''}}>Behavioral and Social Sciences</option>
											<option value="Biochemistry" {{($model->project_category=="Biochemistry")?"selected":''}}>Biochemistry</option>
											<option value="Biomedical and Health Sciences" {{($model->project_category=="Biomedical and Health Sciences")?"selected":''}}>Biomedical and Health Sciences</option>
											<option value="Biomedical Engineering" {{($model->project_category=="Biomedical Engineering")?"selected":''}}>Biomedical Engineering</option>
											<option value="Cellular and Molecular Biology" {{($model->project_category=="Cellular and Molecular Biology")?"selected":''}}>Cellular and Molecular Biology</option>
											<option value="Chemistry" {{($model->project_category=="Chemistry")?"selected":''}}>Chemistry</option>
											<option value="Computational Biology and BioInformatics" {{($model->project_category=="Computational Biology and BioInformatics")?"selected":''}}>Computational Biology and BioInformatics</option>
											<option value="Earth and Environmental Sciences" {{($model->project_category=="Earth and Environmental Sciences")?"selected":''}}>Earth and Environmental Sciences</option>
											<option value="Embedded Systems" {{($model->project_category=="Embedded Systems")?"selected":''}}>Embedded Systems</option>
											<option value="Energy Sustainable Materials and Design" {{($model->project_category=="Energy Sustainable Materials and Design")?"selected":''}}>Energy: Sustainable Materials and Design</option>
											<option value="Engineering Mechanics" {{($model->project_category=="Engineering Mechanics")?"selected":''}}>Engineering Mechanics</option>
											<option value="Environmental Engineering" {{($model->project_category=="Environmental Engineering")?"selected":''}}>Environmental Engineering</option>
											<option value="Materials Science" {{($model->project_category=="Materials Science")?"selected":''}}>Materials Science</option>
											<option value="Mathematics" {{($model->project_category=="Mathematics")?"selected":''}}>Mathematics</option>
											<option value="Microbiology" {{($model->project_category=="Microbiology")?"selected":''}}>Microbiology</option>
											<option value="Physics and Astronomy" {{($model->project_category=="Physics and Astronomy")?"selected":''}}>Physics and Astronomy</option>
											<option value="Plant Sciences" {{($model->project_category=="Plant Sciences")?"selected":''}}>Plant Sciences</option>
											<option value="Robotics and Intelligent Machines" {{($model->project_category=="Robotics and Intelligent Machines")?"selected":''}}>Robotics and Intelligent Machines</option>
											<option value="Systems Software" {{($model->project_category=="Systems Software")?"selected":''}}>Systems Software</option>
											<option value="Translational Medical Sciences" {{($model->project_category=="Translational Medical Sciences")?"selected":''}}>Translational Medical Sciences</option>
                                            @endif
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
													<input name="project_type" type="radio" id="customRadioInline1-1" class="custom-control-input" {{($model->project_type=="Individual")?"checked":''}} value="Individual">
													<label class="custom-control-label" for="customRadioInline1-1">Individual</label>
												</div>
											</li>
											<li class="list-inline-item">
												<div class="custom-control custom-radio custom-control-inline">
													<input name="project_type" type="radio" id="customRadioInline1-2" class="custom-control-input" {{($model->project_type=="Team")?"checked":''}} value="Team">
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
										<input name="partner1_name" class="form-control" placeholder="Partner 1 Name" value="{{$model->partner1_name}}" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Partner 1 School Name*</label>
										<input name="partner1_school_name" class="form-control" placeholder="Partner 1 School Name" value="{{$model->partner1_school_name}}" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Partner 2 Name*</label>
										<input name="partner2_name" class="form-control" placeholder="Partner 2 Name" value="{{$model->partner2_name}}" type="text">
										<span class="help-block"></span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>Partner 2 School Name*</label>
										<input name="partner2_school_name" class="form-control" placeholder="Partner 2 School Name" value="{{$model->partner2_school_name}}" type="text">
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
                                </div>
                            <div class="row">
                                <div class="col-sm-12">								
                                @if($model->division_id == '1')
                                <h1 class="heading_stl">Upload proof of participation at your New York State regional competition or letter of waiver
                                from the regional competition</h1>
                                <div class="row mb-5">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Upload proof of participation at your New York State regional competition or letter of waiver
                                                from the regional competition HERE*:</label>
                                            @if(!empty($model->participation_proof_filename))
                                            <a href="{{URL::asset('public/uploads/frontend/user_isef_forms/' . $model->participation_proof_filename)}}" target="_blank" class="btn btn-sm attachment-form col-3"><i class="icofont-download"></i> Download Form</a>
                                            @endif
                                            <div class="input-group file_upload">
                                                <input placeholder="Signed Application Form" type="text" class="form-control" readonly="">
                                                <label class="input-group-btn d-flex align-items-stretch align-items-center">
                                                    <span class="btn btn-primary up-btn align-self-center">
                                                        <i class="icofont-upload-alt"></i> Upload Application Form<input type="file" name="participation_proof_filename" style="display: none;">
                                                    </span>
                                                </label>
                                            </div>
                                            <span class="help-block"></span>

                                        </div>
                                    </div>											
                                </div>



                                <h1 class="heading_stl">Upload project abstract on the ISEF 2020 form</h1>
                                <div class="row mb-5">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Upload project abstract on the ISEF 2020 form HERE*:</label>
                                            @if(!empty($model->isef_abstract_filename))
                                            <a href="{{URL::asset('public/uploads/frontend/user_isef_forms/' . $model->isef_abstract_filename)}}" target="_blank" class="btn btn-sm attachment-form col-3"><i class="icofont-download"></i> Download Form</a>
                                            @endif
                                            <div class="input-group file_upload">
                                                <input placeholder="Signed Application Form" type="text" class="form-control" readonly="">
                                                <label class="input-group-btn d-flex align-items-stretch align-items-center">
                                                    <span class="btn btn-primary up-btn align-self-center">
                                                        <i class="icofont-upload-alt"></i> Upload Application Form<input type="file" name="isef_abstract_filename" style="display: none;">
                                                    </span>
                                                </label>
                                            </div>
                                            <span class="help-block"></span>

                                            
                                        </div>
                                    </div>											
                                </div>


                                <h1 class="heading_stl">Upload 1 page print out of required forms stated as needed after completing the ISEF 2020
                                    rules wizard include student names on this form (and project title)</h1>
                                <div class="row mb-5">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Upload 1 page print out of required forms stated as needed after completing the ISEF 2020
                                                rules wizard include student names on this form (and project title) HERE*:</label>
                                            @if(!empty($model->isef_rules_wizard_filename))
                                            <a href="{{URL::asset('public/uploads/frontend/user_isef_forms/' . $model->isef_rules_wizard_filename)}}" target="_blank" class="btn btn-sm attachment-form col-3"><i class="icofont-download"></i> Download Form</a>
                                            @endif
                                            <div class="input-group file_upload">
                                                <input placeholder="Signed Application Form" type="text" class="form-control" readonly="">
                                                <label class="input-group-btn d-flex align-items-stretch align-items-center">
                                                    <span class="btn btn-primary up-btn align-self-center">
                                                        <i class="icofont-upload-alt"></i> Upload Application Form<input type="file" name="isef_rules_wizard_filename" style="display: none;">
                                                    </span>
                                                </label>
                                            </div>
                                            <span class="help-block"></span>

                                        </div>
                                    </div>											
                                </div>


                                <h1 class="heading_stl">Upload Research Plan including student name (s), project title and category on the first page of
                                    the plan</h1>
                                <div class="row mb-5">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Upload Research Plan including student name (s), project title and category on the first page of
                                                the plan HERE*:</label>
                                            @if(!empty($model->research_plan_filename))
                                            <a href="{{URL::asset('public/uploads/frontend/user_isef_forms/' . $model->research_plan_filename)}}" target="_blank" class="btn btn-sm attachment-form col-3"><i class="icofont-download"></i> Download Form</a>
                                            @endif
                                            <div class="input-group file_upload">
                                                <input placeholder="Signed Application Form" type="text" class="form-control" readonly="">
                                                <label class="input-group-btn d-flex align-items-stretch align-items-center">
                                                    <span class="btn btn-primary up-btn align-self-center">
                                                        <i class="icofont-upload-alt"></i> Upload Application Form<input type="file" name="research_plan_filename" style="display: none;">
                                                    </span>
                                                </label>
                                            </div>
                                            <span class="help-block"></span>

                                        </div>
                                    </div>											
                                </div>


                                <h1 class="heading_stl">Upload a color PDF of project research paper (MAX. 5MB). A research paper should minimally
                                    contain an introduction, methodology, results/discussion, conclusion and references</h1>
                                <div class="row mb-5">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Upload a color PDF of project research paper (MAX. 5MB). A research paper should minimally
                                                contain an introduction, methodology, results/discussion, conclusion and references HERE*:</label>
                                            @if(!empty($model->research_paper_filename))
                                            <a href="{{URL::asset('public/uploads/frontend/user_isef_forms/' . $model->research_paper_filename)}}" target="_blank" class="btn btn-sm attachment-form col-3"><i class="icofont-download"></i> Download Form</a>
                                            @endif
                                            <div class="input-group file_upload">
                                                <input placeholder="Signed Application Form" type="text" class="form-control" readonly="">
                                                <label class="input-group-btn d-flex align-items-stretch align-items-center">
                                                    <span class="btn btn-primary up-btn align-self-center">
                                                        <i class="icofont-upload-alt"></i> Upload Application Form<input type="file" name="research_paper_filename" style="display: none;">
                                                    </span>
                                                </label>
                                            </div>
                                            <span class="help-block"></span>

                                            
                                        </div>
                                    </div>											
                                </div>

                                <!--  --------------- - Static Form End Here   - -------------------->


                                @if(isset($all_forms) && count($all_forms) > 0)
                                @foreach($all_forms as $form)								
                                <h1 class="heading_stl">{{ $form->form_name }}</h1>
                                <div class="row mb-5">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Download Student's Completed and Signed Form HERE*:</label>
                                            @php
                                            $filemodel = EventUploadedForm::where('event_participation_id',$model->id)->where('form_id', $form->id)->first();													
                                            @endphp

                                            @if(count($filemodel)>0)
                                            <a href="{{URL::asset('public/uploads/frontend/user_isef_forms/' . $filemodel->uploaded_filename)}}" target="_blank" class="btn btn-sm attachment-form col-3"><i class="icofont-download"></i> Download Form</a>
                                            @endif
                                            <label>Upload the Completed and Signed <span class="font-bold" style="font-style: italic;font-size: 16px;text-decoration: underline;">{{ $form->form_name }}</span> HERE*:</label>
                                            <div class="input-group file_upload">
                                                <input placeholder="Signed Application Form" type="text" class="form-control" readonly="">
                                                <label class="input-group-btn d-flex align-items-stretch align-items-center">
                                                    <span class="btn btn-primary up-btn align-self-center">
                                                        <i class="icofont-upload-alt"></i> Upload Application Form<input type="file" name="signed_application_form1[{{ $form->id }}][]" style="display: none;" multiple="">
                                                    </span>
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>											
                                </div>
                                @endforeach
                                @endif
                                @endif
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
           //yearRange:'2018:2030'
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