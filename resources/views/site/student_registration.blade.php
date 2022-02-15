@extends('layouts.main') 
@section('content')
<div class="index-body body_content">

            <section class="form_box">
                <div class="container">
                    <div class="form-bx-inner">
                        <div class="top_heading">
                            <img class="mr-4 img-fluid" src="{{URL::asset('public/frontend/images/site-logo.jpg')}}" data-holder-rendered="true" alt="">
                            <h1 class="heading text-center">STUDENT REGISTRATION<br>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form class="" method="post" id="student_registration_form" action="{{Route('student-registration')}}">
									@csrf
                                    <div class="row mb-4 mt-2">
                                        <div class="col-sm-12">
                                            <!-- <div class="chk_goup_bx"> -->
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <label>Enter Teacher's Given Code : </label>
															
															<div class="input-group mb-3">  
																<input type="text" class="form-control" placeholder="" name="teacher_generated_code" placeholder="" type="text">
																<div class="input-group-append">
																<button id="btn_verify_teacher_code" class="btn contact_frm_btn nw_on btn-outline-secondary" type="button">Verify</button>
																</div>																
															</div>
															<span class="help-block"></span>
                                                        </div>
                                                    </div>
													<div class="col-sm-2">
                                                    </div>
                                                </div>
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                    
									<div id="student_registration_form_content" style="display:none;">
										<div class="row mb-4 mt-2">
											<div class="col-sm-1"></div>
											<div class="col-sm-10">
												<div class="chk_goup_bx">
													<div class="row">
														<input type="hidden" name="event_id" value="<?= ($running_event_id) ? $running_event_id : ''; ?>" />
														<input type="hidden" name="teacher_id" value="" />
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
														<div class="col-sm-12">
															<div class="form-group agree">
																<label></label>
																<ul class="pl-0">
																	<li class="list-inline-item">
																		<div class="custom-control custom-checkbox custom-control-inline">
																			<input name="agree" type="checkbox" id="customCheckboInline1-1" class="custom-control-input" value="1">
																			<label class="custom-control-label" for="customCheckboInline1-1">I have read the How to Register & Participate steps. It is highly recommended that you read these steps as they contain important information and rules regarding participation at our science fair. Failure to follow these rules can result in project <span class="font-bold">disqualification.</span></label>
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