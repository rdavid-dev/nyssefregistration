@extends('layouts.main') 
@section('content')
<div class="index-body body_content">

            <section class="form_box">
                <div class="container">
                    <div class="form-bx-inner">
                        <div class="top_heading">
                            <img class="mr-4 img-fluid" src="{{URL::asset('public/frontend/images/site-logo.jpg')}}" data-holder-rendered="true" alt="">
                            <h1 class="heading text-center">JUDGE REGISTRATION<br>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form class="" method="post" id="judge_registration_form" action="{{Route('judge-registration')}}">
									@csrf
                                    
									<div id="student_registration_form_content" style="">
										<div class="row mb-4 mt-2">
											<div class="col-sm-1"></div>
											<div class="col-sm-10">
												<div class="chk_goup_bx">
													<div class="row">
														<input type="hidden" name="event_id" value="<?= ($running_event_id) ? $running_event_id : ''; ?>" />
														<div class="col-sm-6">
															<div class="form-group">
																<label>First Name: </label>
																<input class="form-control" name="first_name" placeholder="" type="text">
																<span class="help-block"></span>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label>Last Name: </label>
																<input class="form-control" name="last_name" placeholder="" type="text">
																<span class="help-block"></span>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label>Contact Email :</label>
																<input class="form-control" name="email" placeholder="" type="text">
																<span class="help-block"></span>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label>Confirm Contact Email :</label>
																<input class="form-control" name="confirm_email" placeholder="" type="text">
																<span class="help-block"></span>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label>Access Password</label>
																<input class="form-control" name="password" placeholder=" " type="password">
																<span class="help-block"></span>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label>Confirm Password</label>
																<input class="form-control" name="confirm_password" placeholder=" " type="password">
																<span class="help-block"></span>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label>Phone Number</label>
																<input class="form-control" name="phone" placeholder=" " type="text">
																<span class="help-block"></span>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label>Gender*</label>
																<select name="gender" class="form-control">
																	<option value="">---Select Gender---</option>
																	<option value="M">Male</option>
																	<option value="F">Female</option>
																</select>
																<span class="help-block"></span>
															</div>
														</div>
													</div>
													<h1 class="heading_stl"></h1>
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<label>Highest Degree Completed*</label>
																<select name="degree" class="form-control">
																	<option value="">---Select Degree---</option>
																	@php
																	if(count($degrees)){
																		foreach($degrees as $degree){
																			echo '<option value="'.$degree->degree_code.'">'.$degree->degree.'</option>';
																		}
																	}																		
																	@endphp
																</select>
																<span class="help-block"></span>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label>Dietary Restrictions</label>
																<input class="form-control" name="dietary_restrictions" placeholder=" " type="text">
																<span class="help-block"></span>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label>Are you retired?</label>
																<select name="is_retired" class="form-control">
																	<option value="">---Select---</option>
																	<option value="1">Yes</option>
																	<option value="0">No</option>
																</select>
																<span class="help-block"></span>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label>Organization you are representing</label>
																<input class="form-control" name="organization" placeholder=" " type="text">
																<span class="help-block"></span>
															</div>
														</div>
														<div class="col-sm-6">
															<!--<div class="form-group">
																<label>How many years did you participate as a judge at our fair?*</label><br />																
																<input name="participation_at_our_fair" value="0" placeholder=" " type="radio">0
																<input name="participation_at_our_fair" value="1" placeholder=" " type="radio">1
																<input name="participation_at_our_fair" value="2" placeholder=" " type="radio">2
																<input name="participation_at_our_fair" value="3+" placeholder=" " type="radio">3+
																<input name="participation_at_our_fair" value="5+" placeholder=" " type="radio">5+
																<input name="participation_at_our_fair" value="10+" placeholder=" " type="radio">10+
																<input name="participation_at_our_fair" value="20+" placeholder=" " type="radio">20+
																<br>
																<span class="help-block"></span>                                                        
															</div>-->
															<div class="form-group">
																<label>How many years did you participate as a judge at our fair?*</label>
																<ul class="pl-0">
																	<li class="list-inline-item">
																		<div class="custom-control custom-radio custom-control-inline">
																			<input name="participation_at_our_fair" type="radio" id="customRadioInline1-1" class="custom-control-input" value="0">
																			<label class="custom-control-label" for="customRadioInline1-1">0</label>
																		</div>
																	</li>
																	<li class="list-inline-item">
																		<div class="custom-control custom-radio custom-control-inline">
																			<input name="participation_at_our_fair" type="radio" id="customRadioInline1-2" class="custom-control-input" value="1">
																			<label class="custom-control-label" for="customRadioInline1-2">1</label>
																		</div>
																	</li>
																	<li class="list-inline-item">
																		<div class="custom-control custom-radio custom-control-inline">
																			<input name="participation_at_our_fair" type="radio" id="customRadioInline1-3" class="custom-control-input" value="2">
																			<label class="custom-control-label" for="customRadioInline1-3">2</label>
																		</div>
																	</li>
																	<li class="list-inline-item">
																		<div class="custom-control custom-radio custom-control-inline">
																			<input name="participation_at_our_fair" type="radio" id="customRadioInline1-4" class="custom-control-input" value="3+">
																			<label class="custom-control-label" for="customRadioInline1-4">3</label>
																		</div>
																	</li>
																	<li class="list-inline-item">
																		<div class="custom-control custom-radio custom-control-inline">
																			<input name="participation_at_our_fair" type="radio" id="customRadioInline1-5" class="custom-control-input" value="5+">
																			<label class="custom-control-label" for="customRadioInline1-5">5+</label>
																		</div>
																	</li>
																	<li class="list-inline-item">
																		<div class="custom-control custom-radio custom-control-inline">
																			<input name="participation_at_our_fair" type="radio" id="customRadioInline1-6" class="custom-control-input" value="10+">
																			<label class="custom-control-label" for="customRadioInline1-6">10+</label>
																		</div>
																	</li>
																	<li class="list-inline-item">
																		<div class="custom-control custom-radio custom-control-inline">
																			<input name="participation_at_our_fair" type="radio" id="customRadioInline1-7" class="custom-control-input" value="20+">
																			<label class="custom-control-label" for="customRadioInline1-7">20+</label>
																		</div>
																	</li>
																</ul>
																<span class="help-block"></span>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label>Do you require a parking pass?</label>
																<select name="require_parking_pass" class="form-control">
																	<option value="">---Select---</option>
																	<option value="1">Yes</option>
																	<option value="0">No</option>
																</select>
																<i>Parking passes will be available for pick-up at the day of the event</i>
																<span class="help-block"></span>
															</div>
														</div>
													</div>
													<h1 class="heading_stl"></h1>
													<div class="row">
														<div class="col-sm-12">
															<!--<div class="form-group agree">
																<input name="judge_any_category" placeholder=" " type="checkbox" value="1"> I feel comfortable judging any category<br>
																<span class="help-block"></span>
															</div>-->
															<div class="form-group agree">
																<label></label>
																<ul class="pl-0">
																	<li class="list-inline-item">
																		<div class="custom-control custom-checkbox mr-sm-2">
																			<input name="judge_any_category" type="checkbox" value="1" class="custom-control-input" id="custom_chk_55">
																			<label class="custom-control-label" for="custom_chk_55">I feel comfortable judging any category</label>
																		</div>
																	</li>
																</ul>
													        </div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label>Category 1</label>
																<select name="judge_category_1" class="form-control">
																	<option value="">---Select Category 1---</option>
																	@php
																	if(count($categories)){
																		foreach($categories as $category){
																			echo '<option value="'.$category->category_code.'">'.$category->category_name.'</option>';
																		}
																	}																		
																	@endphp
																</select>
																<span class="help-block"></span>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label>Category 2</label>
																<select name="judge_category_2" class="form-control">
																	<option value="">---Select Category 2---</option>
																	@php
																	if(count($categories)){
																		foreach($categories as $category){
																			echo '<option value="'.$category->category_code.'">'.$category->category_name.'</option>';
																		}
																	}																		
																	@endphp
																</select>
																<span class="help-block"></span>
															</div>
														</div><div class="col-sm-6">
															<div class="form-group">
																<label>Category 3</label>
																<select name="judge_category_3" class="form-control">
																	<option value="">---Select Category 3---</option>
																	@php
																	if(count($categories)){
																		foreach($categories as $category){
																			echo '<option value="'.$category->category_code.'">'.$category->category_name.'</option>';
																		}
																	}																		
																	@endphp
																</select>
																<span class="help-block"></span>
															</div>
														</div>
													</div>
													<h1 class="heading_stl"></h1>
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<label>What is/was your field of study?</label>
																<input class="form-control" name="study_field" placeholder=" " type="text">
																<span class="help-block"></span>
															</div>
														</div>
														<div class="col-sm-6">
															<!--<div class="form-group">
																<label>How many years of experience do you have in this field?</label><br />																
																<input name="experience_in_study_field" value="0" placeholder=" " type="radio"><1
																<input name="experience_in_study_field" value="1" placeholder=" " type="radio">1
																<input name="experience_in_study_field" value="2" placeholder=" " type="radio">2
																<input name="experience_in_study_field" value="3+" placeholder=" " type="radio">3+
																<input name="experience_in_study_field" value="5+" placeholder=" " type="radio">5+
																<input name="experience_in_study_field" value="10+" placeholder=" " type="radio">10+
																<input name="experience_in_study_field" value="20+" placeholder=" " type="radio">20+
																<br>
																<span class="help-block"></span>                                                        
															</div>-->
															<div class="form-group">
																<label>How many years of experience do you have in this field?</label>
																<ul class="pl-0">
																	<li class="list-inline-item">
																		<div class="custom-control custom-radio custom-control-inline">
																			<input name="experience_in_study_field" type="radio" id="customRadioInline2-1" class="custom-control-input" value="0">
																			<label class="custom-control-label" for="customRadioInline2-1">< 1</label>
																		</div>
																	</li>
																	<li class="list-inline-item">
																		<div class="custom-control custom-radio custom-control-inline">
																			<input name="experience_in_study_field" type="radio" id="customRadioInline2-2" class="custom-control-input" value="1">
																			<label class="custom-control-label" for="customRadioInline2-2">1</label>
																		</div>
																	</li>
																	<li class="list-inline-item">
																		<div class="custom-control custom-radio custom-control-inline">
																			<input name="experience_in_study_field" type="radio" id="customRadioInline2-3" class="custom-control-input" value="2">
																			<label class="custom-control-label" for="customRadioInline2-3">2</label>
																		</div>
																	</li>
																	<li class="list-inline-item">
																		<div class="custom-control custom-radio custom-control-inline">
																			<input name="experience_in_study_field" type="radio" id="customRadioInline2-4" class="custom-control-input" value="3+">
																			<label class="custom-control-label" for="customRadioInline2-4">3</label>
																		</div>
																	</li>
																	<li class="list-inline-item">
																		<div class="custom-control custom-radio custom-control-inline">
																			<input name="experience_in_study_field" type="radio" id="customRadioInline2-5" class="custom-control-input" value="5+">
																			<label class="custom-control-label" for="customRadioInline2-5">5+</label>
																		</div>
																	</li>
																	<li class="list-inline-item">
																		<div class="custom-control custom-radio custom-control-inline">
																			<input name="experience_in_study_field" type="radio" id="customRadioInline2-6" class="custom-control-input" value="10+">
																			<label class="custom-control-label" for="customRadioInline2-6">10+</label>
																		</div>
																	</li>
																	<li class="list-inline-item">
																		<div class="custom-control custom-radio custom-control-inline">
																			<input name="experience_in_study_field" type="radio" id="customRadioInline2-7" class="custom-control-input" value="20+">
																			<label class="custom-control-label" for="customRadioInline2-7">20+</label>
																		</div>
																	</li>
																</ul>
																<span class="help-block"></span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-1"></div>
										</div>
										

										<div class="text-center">
											<button type="submit" class="contact_frm_btn" >Submit</button>
										</div>
									</div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </section>


        </div>
        @stop
@section('css')
<style>
.agree{
    max-width: 700px;
    width: 100%;
    margin: 0 auto;
    text-align: center;
}
</style>
@stop
@section('js')
<script>
    $(document).ready(function () {        
    });
</script>
@stop