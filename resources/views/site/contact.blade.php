@extends('layouts.main') 
@section('content')
<div class="index-body body_content">

	<section class="form_box">
		<div class="container">
			<div class="form-bx-inner">
				<div class="top_heading">
					<img class="mr-4 img-fluid" src="{{URL::asset('public/frontend/images/site-logo.jpg')}}" data-holder-rendered="true" alt="">
					<h1 class="heading text-center">GET IN TOUCH<br>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form class="" method="post" id="contact_us_form" action="{{Route('contact-us')}}">
							@csrf
							<input type="hidden" name="current_event_id" value="<?= ($running_event_id) ? $running_event_id : ''; ?>" />
							<div class="row mb-4 mt-2">
								<div class="col-sm-3"></div>
								<div class="col-sm-6">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Name*</label>
											<input type="text" class="form-control" name="name" placeholder="Your Name" />
											<span class="help-block"></span>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label>Email Address*</label>
											<input type="email" class="form-control" name="email" placeholder="Your Email Address" />
											<span class="help-block"></span>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label>Phone Number</label>
											<input type="text" class="form-control" name="phone_no" placeholder="Your Phone No." />
											<span class="help-block"></span>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label>Message*</label>
											<textarea class="form-control" rows="4" name="message" placeholder="Your Message"></textarea>
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