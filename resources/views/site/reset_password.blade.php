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
                            <h1 class="heading text-center">RESET PASSWORD<br>
                                <!-- NEW YORK STATE SCIENCE AND ENGINEERING FAIR<br>
                                IN CONJUCTION WITH<br>
                                WESTERN SUFFOLK BOCES</h1> -->
                            <!-- <h1 class="sami_heading text-center">
                                April 1
                                st, 2019 – NYSSEF ISEF Division Fair
                                April 15th, 2019 – Andromeda and Broadcom Division Fairs
                            </h1> -->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form class="" method="post" id="reset_password_form" action="{{Route('reset-password')}}">
									@csrf
									<input type="hidden" name="event_id" value="<?= ($running_event_id) ? $running_event_id : ''; ?>" />
									<div class="row mb-4 mt-2">
										<div class="col-sm-3"></div>
										<div class="col-sm-6">
											<div class="col-sm-12">
												<div class="form-group">
													<label>New Password</label>
													<input type="password" class="form-control" name="password">
													<span class="help-block"></span>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<label>Confirm New Password</label>
													<input type="password" class="form-control" name="retype_password">
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