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
                            <h1 class="heading text-center">TEACHER LOGIN FORM<br>
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
                                <form class="" method="post" id="teacher_login_form" action="{{Route('teacher-login')}}">
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
                                                            <label>Email Address</label>
                                                            <input type="email" class="form-control" name="email">
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
                                                            <label>Password</label>
                                                            <input type="password" class="form-control" name="password">
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
                                                            <label>School Name</label>
                                                            <select class="form-control" name="school_name">
                                                            <option value="">--------Select School Name--------</option>
                                                            @foreach($school as $key=>$value)
                                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                                            @endforeach
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