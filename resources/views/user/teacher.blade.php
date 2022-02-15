@extends('layouts.main') 
@section('content')
<div class="index-body body_content">
            <!-- *****************Banner-start****************** -->

            <!-- ************************Banner-end**************** -->

            <section class="form_box">
                <div class="container">
                    <div class="form-bx-inner">
                        <div class="top_heading">
                            <img class="mr-4 img-fluid" src="{{URL::asset('public/frontend/images/pdf_logo_2.png')}}" data-holder-rendered="true" alt="">
                            <h1 class="heading text-center">TEACHER REGISTRATION FORM<br>
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
                                                            <label>SCHOOL NAME: </label>
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
                                                    <div class="col-sm-4">
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
                                                            <span class="help-block"></span>
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
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4 mt-2">
                                        <div class="col-sm-12">
                                            <div class="chk_goup_bx">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>First Name: </label>
                                                            <input class="form-control" name="first_name" placeholder="" type="text">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Last Name: </label>
                                                            <input class="form-control" name="last_name" placeholder="" type="text">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Contact Email :</label>
                                                            <input class="form-control" name="email" placeholder="" type="text">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Confirm Contact Email :</label>
                                                            <input class="form-control" name="confirm_email" placeholder="" type="text">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Phone Number</label>
                                                            <input class="form-control" name="phone_number" placeholder=" " type="text">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>How many years did this school participate at our fair?  </label><br>
                                                            <input name="school_participation_at_our_fair2" value="0" placeholder=" " type="radio">0
                                                            <input name="school_participation_at_our_fair2" value="1" placeholder=" " type="radio">1
                                                            <input name="school_participation_at_our_fair2" value="2" placeholder=" " type="radio">2
                                                            <input name="school_participation_at_our_fair2" value="3+" placeholder=" " type="radio">3+
                                                            <input name="school_participation_at_our_fair2" value="5+" placeholder=" " type="radio">5+
                                                            <input name="school_participation_at_our_fair2" value="10+" placeholder=" " type="radio">10+
                                                            <input name="school_participation_at_our_fair2" value="20+" placeholder=" " type="radio">20+<br>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Access Password</label>
                                                            <input class="form-control" name="password" placeholder=" " type="password">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Confirm Password</label>
                                                            <input class="form-control" name="confirm_password" placeholder=" " type="password">
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
                                    </div>
                                    <!-- <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col"># of Students</th>
                                                <th scope="col">COST PER STUDENT</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input class="form-control" placeholder="" type="text">
                                                </td>
                                                <td>ISEF - $170</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input class="form-control" placeholder="" type="text">
                                                </td>
                                                <td>Andromeda - $65</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input class="form-control" placeholder="" type="text">
                                                </td>
                                                <td>Broadcom - $50</td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>

                                                </td>
                                                <td><span class="font-bold">SUBTOTAL</span></td>
                                                <td></td>
                                            </tr>

                                            <tr>
                                                <td class="border-top_none">

                                                </td>
                                                <td>BOCES Coordination Fee (17%)*</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                 <td class="border-top_none">

                                                </td>
                                                <td><span class="font-bold">TOTAL</span></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>*There is a 17% administrative fee added to the subtotal for this BOCES service. Your district will receive
                                        BOCES aid at your district aid ratio for the total amount.</p>

                                    <h1 class="sami_heading text_underline">BOCES Contract Procedures:</h1>
                                    <h1 class="sami_heading">Western Suffolk, Eastern Suffolk and Nassau BOCES</h1>
                                    <ul>
                                        <li>1. Complete form and mail or fax to the BOCES office below.</li>
                                        <li>2. Contact your School District Business Office / Superintendent’s Office, and request a contract letter be
                                            sent to your applicable BOCES for <span class="font-bold">A402.014.</span> The letter should include the total amount, including the
                                            NYSSEF fee AND the BOCES administrative fee.
                                        </li>
                                    </ul>
                                    <div class="top_heading">
                                        <h1 class="sami_heading text-center">
                                            Peggy Unger<br>
                                            Western Suffolk BOCES/SCOPE<br>
                                            Exploratory Enrichment Programs Coordinator<br>
                                            810 Meadow Road, Smithtown, NY 11787<br>
                                            Fax: 631-623-4912

                                        </h1>
                                    </div>
                                    <ul>
                                        <li>3. Include a copy of this completed form with your registration / payment forms to NYSSEF.</li>
                                    </ul> 
                                    <div class="top_heading">
                                    <h1 class="sami_heading text-center">
                                        Robert Hildebrand, Treasurer<br>
                                        NYSSEF, Inc.<br>
                                        c/o P.O. BOX 668<br>
                                        Glen Cove, NY 11542<br>
                                    </h1>
                                        </div> -->

                                    <div class="text-center">
                                        <button type="submit" class="contact_frm_btn" >Submit</a>
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