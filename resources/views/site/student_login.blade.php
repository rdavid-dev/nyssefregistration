@extends('layouts.main') 
@section('content')
<div class="index-body body_content">

            <section class="form_box">
                <div class="container">
                    <div class="form-bx-inner">
                        <div class="top_heading">
                            <img class="mr-4 img-fluid" src="{{URL::asset('public/frontend/images/site-logo.jpg')}}" data-holder-rendered="true" alt="">
                            <h1 class="heading text-center">STUDENT LOGIN</h1>
                            <p class="font-bold text-danger">Announcement: Due to the current pandemic, all of our events are now virtual.</p>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form class="" method="post" id="student_login_form" action="{{Route('student-login')}}">
									@csrf
									<input type="hidden" name="current_event_id" value="<?= ($running_event_id) ? $running_event_id : ''; ?>" />
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
													<label>Password</label>
													<input type="password" class="form-control" name="password">
													<span class="help-block"></span>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<label>Select Teacher</label>
													<select class="form-control" name="teacher">
													<option value="">--------Select Teacher--------</option>
													@foreach($all_teachers as $key=>$value)
													<option value="{{$value->id}}">{{$value->first_name}} {{$value->last_name}}</option>
													@endforeach
													</select>
													<span class="help-block"></span>
												</div>
											</div>	
											<div class="col-sm-12">
												<a class="nav-link signbtn" href="{{Route('forgot-password')}}">Forgot Password?</a>
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