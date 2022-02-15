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
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form class="" method="post" id="teacher_registration_form" action="{{Route('teacher-registration')}}">
									@csrf
									<input type="hidden" name="current_event_id" value="<?= ($running_event_id) ? $running_event_id : ''; ?>" />
                                    <div class="row mb-4 mt-2" id="school_form">
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
                                                            <label>Principal Name :</label>
                                                            <input class="form-control" name="principal-name" placeholder="" type="text">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Principal Email :</label>
                                                            <input class="form-control" name="principal-email" placeholder="" type="email">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Method of Payment :</label>
                                                            <select class="form-control" name="state">
                                                                <option value="check" selected>Check</option>
                                                                <option value="check">Bank</option>
                                                            </select>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                          <label class="font-weight-bold">Day 1 Volunteering</label><br>
                                                          <input value="Set up day of the fair(5:30AM) at the venue" name="day-one-volunteering" type="checkbox">&nbsp;&nbsp;Set up day of the fair(5:30AM) at the venue <br>
                                                          <input value="Judges Registration" name="day-one-volunteering" type="checkbox">&nbsp;&nbsp;Judges Registration <br>
                                                          <input value="School Registration" name="day-one-volunteering" type="checkbox">&nbsp;&nbsp;School Registration <br>
                                                          <input value="Main Lobby Monitor" name="day-one-volunteering" type="checkbox">&nbsp;&nbsp;Main Lobby Monitor <br>
                                                          <input value="Upstairs Lobby Monitor" name="day-one-volunteering" type="checkbox">&nbsp;&nbsp;Upstairs Lobby Monitor <br>
                                                          <input value="Room Monitor" name="day-one-volunteering" type="checkbox">&nbsp;&nbsp;Room Monitor <br>
                                                          <input value="Lunch Ticket Monitor" name="day-one-volunteering" type="checkbox">&nbsp;&nbsp;Lunch Ticket Monitor <br>
                                                          <input value="Day 1 Forms Checker" name="day-one-volunteering" type="checkbox">&nbsp;&nbsp;Day 1 Forms Checker <br>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                          <label class="font-weight-bold">Day 2 Volunteering</label><br>
                                                          <input value="Set up day of the fair(5:30AM) at the venue" name="day-one-volunteering" type="checkbox">&nbsp;&nbsp;Set up day of the fair(5:30AM) at the venue <br>
                                                          <input value="Judges Registration" name="day-one-volunteering" type="checkbox">&nbsp;&nbsp;Judges Registration <br>
                                                          <input value="School Registration" name="day-one-volunteering" type="checkbox">&nbsp;&nbsp;School Registration <br>
                                                          <input value="Main Lobby Monitor" name="day-one-volunteering" type="checkbox">&nbsp;&nbsp;Main Lobby Monitor <br>
                                                          <input value="Upstairs Lobby Monitor" name="day-one-volunteering" type="checkbox">&nbsp;&nbsp;Upstairs Lobby Monitor <br>
                                                          <input value="Room Monitor" name="day-one-volunteering" type="checkbox">&nbsp;&nbsp;Room Monitor <br>
                                                          <input value="Lunch Ticket Monitor" name="day-one-volunteering" type="checkbox">&nbsp;&nbsp;Lunch Ticket Monitor <br>
                                                          <input value="Day 2 Forms Checker" name="day-one-volunteering" type="checkbox">&nbsp;&nbsp;Day 2 Forms Checker <br>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="font-weight-bold">We Provide a Continental Breakfast and Buffet Salad/Sandwitch Lunch. If you need a Kosher Bagor Vegetarian Lunch, Please Specify Which </label>
                                                            <select class="form-control" name="state">
                                                                <option value="check" selected>Regular</option>
                                                                <option value="check">Non-regular</option>
                                                            </select>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <input value="Yes" name="ethics" type="checkbox">&nbsp;&nbsp;I agree to the LISEF Ethics Statement<br>
                                                            <a href="#">Click here to view ethics statement</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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