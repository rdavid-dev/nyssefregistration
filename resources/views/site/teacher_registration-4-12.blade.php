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
                            <h1 class="heading text-center">TEACHER REGISTRATION<br>
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
                                <form class="" method="post" id="teacher_registration_form" action="{{Route('teacher-registration')}}">
									@csrf
									<input type="hidden" name="current_event_id" value="<?= ($running_event_id) ? $running_event_id : ''; ?>" />
                                    <div class="row mb-4 mt-2">
                                        <div class="col-sm-12">
                                            <!-- <div class="chk_goup_bx"> -->
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>SELECT SCHOOL : </label>
                                                            <select class="form-control" name="school_name" id="school_name" onchange="school_name_change(this.value)">
                                                            <option value="" selected disabled>----Select School Name----</option>
                                                            </select>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                    <div class="row mb-4 mt-2" id="school_form" style="display:none;">
                                        <div class="col-sm-12">
                                            <div class="chk_goup_bx">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>School Type: </label>
                                                            <select class="form-control" name="school_type" id="school_type">
                                                            <option></option>
                                                            </select>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <label>School Name: </label>
                                                            <input class="form-control" name="name" placeholder="" type="text">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>School Address</label>
                                                            <input class="form-control" placeholder="" name="address" type="text">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>City :</label>
                                                            <input class="form-control" name="city" placeholder="" type="text">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>State :</label>
                                                            <select class="form-control" name="state" id="all_state">
                                                            </select>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Zip Code</label>
                                                            <input class="form-control" name="zipcode" placeholder="" type="text">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>District </label>
                                                            <input class="form-control" name="district" placeholder=" " type="text">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Country </label>
                                                            <input class="form-control" name="country" placeholder=" " type="text">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Phone </label>
                                                            <input class="form-control" name="phone" placeholder=" " type="text">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Does this school hold its own science fair? </label><br>
                                                            <input name="own_science_fair" value="1" placeholder=" " type="radio">Yes
                                                            <input name="own_science_fair" value="0" placeholder=" " type="radio">No
                                                            <br><span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>How many years did this school participate at our fair?  </label><br>
                                                            <input name="school_participation_at_our_fair" value="0" placeholder=" " type="radio">0
                                                            <input name="school_participation_at_our_fair" value="1" placeholder=" " type="radio">1
                                                            <input name="school_participation_at_our_fair" value="2" placeholder=" " type="radio">2
                                                            <input name="school_participation_at_our_fair" value="3+" placeholder=" " type="radio">3+
                                                            <input name="school_participation_at_our_fair" value="5+" placeholder=" " type="radio">5+
                                                            <input name="school_participation_at_our_fair" value="10+" placeholder=" " type="radio">10+
                                                            <input name="school_participation_at_our_fair" value="20+" placeholder=" " type="radio">20+
                                                            <br><span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4 mt-2">
										<div class="col-sm-1"></div>
                                        <div class="col-sm-10">
                                            <div class="chk_goup_bx">
                                                <div class="row">
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
                                                            <input class="form-control" name="phone_number" placeholder=" " type="text">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>How many years did you participate at our fair?  </label><br>
                                                            <input name="participation_at_our_fair" value="0" placeholder=" " type="radio">0
                                                            <input name="participation_at_our_fair" value="1" placeholder=" " type="radio">1
                                                            <input name="participation_at_our_fair" value="2" placeholder=" " type="radio">2
                                                            <input name="participation_at_our_fair" value="3+" placeholder=" " type="radio">3+
                                                            <input name="participation_at_our_fair" value="5+" placeholder=" " type="radio">5+
                                                            <input name="participation_at_our_fair" value="10+" placeholder=" " type="radio">10+
                                                            <input name="participation_at_our_fair" value="20+" placeholder=" " type="radio">20+
                                                            <br><span class="help-block"></span>
                                                        </div>
                                                    </div>
													<div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Generate Your Code</label>
                                                            <input class="form-control" name="teacher_generated_code" placeholder=" " type="text">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group agree">
                                                            <input name="agree" placeholder=" " type="checkbox"> I have read the How to Register & Participate steps.
It is highly recommended that you read How to Register & Participate page, it contains important information and rules regarding participation at our science fair, rules that can result in project disqualification if not followed.<br>
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
        get_school_name();
        get_school_type();
        get_all_state();
    });
</script>
@stop