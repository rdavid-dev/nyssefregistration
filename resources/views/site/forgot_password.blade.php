@extends('layouts.main') 
@section('content')
<div class="index-body body_content">
            <!-- *****************Banner-start****************** -->

            <!-- ************************Banner-end**************** -->

            <section class="form_box">
                <div class="container">
                    <div class="form-bx-inner">
                        <div class="top_heading">
                            <img class="mr-4 img-fluid" src="{{URL::asset('public/frontend/images/site-logo.jpg')}}" data-holder-rendered="true" alt="">
                            <h1 class="heading text-center">FORGOT PASSWORD<br>
                                <!-- NEW YORK STATE SCIENCE AND ENGINEERING FAIR<br>
                                IN CONJUCTION WITH<br>
                                WESTERN SUFFOLK BOCES</h1> -->
                            <!-- <h1 class="sami_heading text-center">
                                April 1
                                st, 2019 – NYSSEF ISEF Division Fair
                                April 15th, 2019 – Andromeda and Broadcom Division Fairs
                            </h1> -->
							<h1 class="sami_heading text-center">Enter your email address,user type and school name, we will send you a link to reset your password.</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form class="" method="post" id="forgot_password_form" action="{{Route('forgot-password')}}">
									@csrf
									<input type="hidden" name="event_id" value="<?= ($running_event_id) ? $running_event_id : ''; ?>" />
									<div class="row mb-4 mt-2">
										<div class="col-sm-3"></div>
										<div class="col-sm-6">
											<div class="col-sm-12">
												<div class="form-group">
													<label>Email Address</label>
													<input type="email" class="form-control" name="email">
													<span class="help-block"></span>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<label>Select User Type</label>
													<select class="form-control" name="user_type" onchange="change_user_type(this.value)">
													<option value="">--------Select User Type--------</option>
													<option value="2">Teacher</option>
													<option value="3">Student</option>
													</select>
													<span class="help-block"></span>
												</div>
											</div>	
											<div class="col-sm-12" id="school_section">
												<div class="form-group">
													<label>Select School</label>
													<select class="form-control" name="school">
													<option value="">--------Select School--------</option>
													@foreach($school as $key=>$value)
													<option value="{{$value->id}}">{{$value->name}}</option>
													@endforeach
													</select>
													<span class="help-block"></span>
												</div>
											</div>											
										</div>
										<div class="col-sm-3"></div>
									</div>
									
									<div class="row mb-4 mt-2">
										<div class="col-sm-12">
											<div class="text-center">
												<button type="submit" class="contact_frm_btn">Submit</button>
											</div>
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