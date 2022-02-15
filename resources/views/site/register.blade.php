@extends('layouts.main') 
@section('content')
<div class="index-body body_content">
    <!-- *****************Banner-start****************** -->

    <!-- ************************Banner-end**************** -->

    <section class="reg_top_bx">
        <div class="inner_top_bx pt-4 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="in_bx top bacolor_one">
                            <p style="word-break: break-word;">This page is designed to facilitate the registration process of schools, teachers, and students for the 2021 New York State Science & Engineering Fair. Below you will find detailed descriptions of each phase of the registration process. It is recommended that you read the entire registration procedure in order to avoid any errors. <b>All registration steps must be completed by our posted deadlines.</b></p>

                            <ul>
                                <li><span class="line_start font-bold"><i class="icofont-long-arrow-right"></i> Step 1:</span> Every liaison must register prior to students in order to provide students their respective code.</li>
                                <li><span class="line_start font-bold"><i class="icofont-long-arrow-right"></i> Step 2:</span> Every student must create an account and register their project by February 11, 2021 at 5PM in order to participate. (All Divisions)</li>
                                <li><span class="line_start font-bold"><i class="icofont-long-arrow-right"></i> Step 3:</span> All participating liaisons and schools are required to mail registration fees to NYSSEF Inc. by March 11, 2021. (All Divisions)</li>
                                <li><span class="line_start font-bold"><i class="icofont-long-arrow-right"></i> Step 4:</span> Participating students (individuals or team leaders) are required to upload applicable ISEF forms and presentation video by March 11, 2021. (ISEF ONLY)</li>
                            </ul>
							<ul>
                                <li><span class="line_start font-bold"><i class="icofont-long-arrow-right"></i></span> Please note the following technical support deadlines:</li>
																
                            </ul>
							<ul style="margin-left:50px;">
								<li><span class="line_start font-bold">o</span> All NYSSEF Divisions Registration Technical Support Deadline – February 10, 2021 5pm</li>
								<li><span class="line_start font-bold">o</span> NYSSEF ISEF Form Upload Technical Support Deadline – March  10, 2021 5pm</li>
							</ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="inner_top_bx py-5 bacolor_one">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        @if($register_setting!="")
                        @foreach($register_setting as $key=>$value)
                        <div class="in_bx bottom">
                            <div class="heading_bx">
                                <h1>{{$key+1}}) 
								@if($value->show_registration_link=='1')
									<a href="{{$value->registration_link}}">{{$value->title}}</a>
								@else
									{{$value->title}}
								@endif
								</h1>
                                @if($value->registration_status=="1")
                                <span class="date_time"><span class="satatus"><i class="fa fa-check-circle" aria-hidden="true"></i>Open</span> {{date("l, M j, Y", strtotime($value->started_at))}}</span>
                                @elseif($value->registration_status=="0")
                                <span class="date_time"><span class="satatus orange_color"><i class="icofont-sand-clock"></i>Opening Soon</span> on {{date("l, M j, Y", strtotime($value->started_at))}}</span>
                                @else
                                @endif
                            </div>
                            <div class="text_bx">
                                <p class="top_txt">{{$value->notes}}</p>
                                @php
                                echo $value->description
                                @endphp
                            
                            <!-- <a href="#" class="link_text">list of currently registered schools and teachers</a> -->
                            </div>
                        </div>
						
						
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>


</div>
@stop