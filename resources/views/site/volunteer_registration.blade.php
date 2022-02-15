@extends('layouts.main') 
@section('content')
<div class="index-body body_content">

            <section class="form_box">
                <div class="container">
                    <div class="form-bx-inner">
                        <div class="top_heading">
                            <img class="mr-4 img-fluid" src="{{URL::asset('public/frontend/images/site-logo.jpg')}}" data-holder-rendered="true" alt="">
                            <h1 class="heading text-center">VOLUNTEER REGISTRATION<br>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form class="" method="post" id="volunteer_registration_form" action="{{Route('volunteer-registration')}}">
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
														<div class="col-sm-6">
															<!--<div class="form-group">
																<label>How many years did you participate as a volunteer at our fair?</label><br />																
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
																<label>How many years did you participate as a volunteer at our fair?*</label>
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
													</div>
													<h1 class="heading_stl mb-1 mt-2">Volunteer Positions Information</h1>
													<div class="mb-3">
														<div class="form-group">
														@if(!empty($model))
														@foreach($model as $key=>$value)
															<div class="date_bx" style="border-bottom:none;">
																<h1><i class="icofont-ui-calendar"></i>{{date("l, F jS, Y", strtotime($value->position_date))}}</h1>
																<div class="media">
																	<div class="custom-control custom-checkbox mr-sm-3">
																		<input type="checkbox" name="positions[]" class="custom-control-input" id="custom_chk_<?php echo $value->id; ?>" value="<?php echo $value->id; ?>">
																		<label class="custom-control-label" for="custom_chk_<?php echo $value->id; ?>">{{$value->position_spots}} spot</label>
																	</div>
																	<div class="media-body">
																		<h2>{{date("h:sa", strtotime($value->position_start_time))}} - {{date("h:sa", strtotime($value->position_end_time))}} | <span>{{$value->position_name}}</span></h2>
																		<p>{{$value->position_description}}</p>
																	</div>
																</div>
															</div>
														@endforeach
														@endif
															<span class="help-block"></span>
														</div>                                
													</div>
													
													<h1 class="heading_stl"></h1>
													<div class="row">	
														<div class="col-sm-6">
															<div class="form-group">
																<label>How did you hear about us?</label>
																<input class="form-control" name="hear_about_us" placeholder=" " type="text">
																<span class="help-block"></span>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label>We are always in need of more judges and volunteers. Do you have recommendations on recruiting strategies for our event? </label>
																<textarea class="form-control" name="recommendations" placeholder=" "></textarea>
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