@extends('layouts.main') 
@section('content')
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
				<div class="col-md-6">
					<h1 class="sample_heading"><i class="icofont-list"></i> Change Password</h1>
					
					<div class="right_bx mt-3">
                    <form class="" id="change-password-form" action="{{route('change-password')}}">
                        @csrf
						 <!--<h1 class="heading_stl">Dashboard</h1>-->
							<div class="row mb-3">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Old Password*</label>
										<input class="form-control" name="old_password" placeholder="Old Passward*" type="password">
                                        <span class="help-block"></span>
									</div>
								</div>
                                <div class="col-sm-12">
									<div class="form-group">
										<label>New Password*</label>
										<input class="form-control" name="new_password" placeholder="New Passward*" type="password">
                                        <span class="help-block"></span>
									</div>
								</div>
                                <div class="col-sm-12">
									<div class="form-group">
										<label>Confirm New Password*</label>
										<input class="form-control" name="confirm_new_password" placeholder="Confirm New Passward*" type="password">
                                        <span class="help-block"></span>
									</div>
								</div>
                                <div class="col-sm-12">
									<div class="text-center">
										<button class="btn nw_cst_btn">SUBMIT</button>
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