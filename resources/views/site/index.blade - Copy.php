
@extends('layouts.main') 
@section('content')
<div class="index-body body_content">

    <div class="top_section">



        <div class="container">  
            <div class="alert_bx alert-success">
                <div class="row">
                    <div class="col-md-12">
                        <div class="media align-self-center">
                            <img class="mr-3" src="{{URL::asset('public/frontend/images/promotion.png')}}" data-holder-rendered="true" alt="">
                            <div class="media-body">
                                <h1>New Requirements</h1>
                                <p>All participating students, in all divisions, are now required to submit their ISEF forms for pre-approval before experimentation can begin.
                                    See step 3 on our How to Register & Participate page for details.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="top_shedule bacolor_one">
            <div class="container"> 
                <h1 class="big_hd text-center">{{($event!="")?$event->event_title:""}}</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="left_bx">
                            <h1 class="sml_hd mb-1">{{($event!="")?$event->address_line1:""}}</h1>
                            <div class="media align-self-center">
                                <i class="icofont-location-pin"></i>
                                <div class="media-body">
                                    <p>{{($event!="")?$event->address_line2:""}}<br>
                                        {{($event!="")?$event->city:""}}, {{($event!="")?$event->state:""}} {{($event!="")?$event->zipcode:""}}</p> 
                                </div>
                            </div>
                            <a href="#" class="custom-btn modal_btn_nw facebook">
                                <span class="main_span"><span class="img-span"><i class="icofont-facebook"></i></span><span class="text">Find us on Facebook</span></span>
                            </a>
                            <p class="notice">{{($event!="")?$event->parking_notes:""}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="right_bx">
                            @if($event!="")
                            @if($event->is_map_show=="1")
                            <iframe src="https://maps.google.com/maps?q={{$event->latitude}}, {{$event->longitude}}&z=15&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        @if(!empty($schedule))
        <div class="top_shedule bacolor_two">
            <div class="container"> 
                <h1 class="big_hd text-left">Schedule of Events</h1>
                <div class="row">
                    <div class="col-md-12">
                        @foreach($schedule as $key=>$value)
                        <div class="shidule_smi_bx">
                            <h1 class="sml_hd"><i class="icofont-ui-calendar"></i>{{date("l, F jS, Y", strtotime($value->scheduled_date))}}</h1>

                            <div class="smi_bx_md ml-3">
                                @php
                                $all_schedule=unserialize($value->schedules);
                                @endphp
                                @foreach($all_schedule['start_time'] as $key=>$data)
                                <div class="card_bx">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <h1>{{$data}} - {{$all_schedule['end_time'][$key]}}</h1>
                                        </div>
                                        <div class="col-sm-10">
                                            <h2>{{$all_schedule['description'][$key]}}</h2>
                                        </div>
                                    </div>
                                    <a href='{{($event!="")?$event->facebook_link:"#"}}' class="custom-btn modal_btn_nw facebook">
                                        <span class="main_span"><span class="img-span"><i class="icofont-facebook"></i></span><span class="text">Find us on Facebook</span></span>
                                    </a>
                                    <p class="notice">{{($event!="")?$event->parking_notes:""}}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                        <div class="shidule_smi_bx">
                            <h1 class="sml_hd"><i class="icofont-ui-calendar"></i> Judge Schedule of Events</h1>
                            <div class="smi_bx_md ml-3">
                                <div class="card_bx">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h2>@php 
                                                if($event!="")
                                                {
                                                echo $event->event_judge_schedule;
                                                }
                                                @endphp</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($participation!="")
                        <div class="shidule_smi_bx">
                            <h1 class="sml_hd"><i class="icofont-ui-note"></i> NYSSEF Participation Forms:</h1>
                            <div class="smi_bx_md ml-3">
                                <div class="card_bx">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <ul class="btn_ul row">
                                                @foreach($participation as $k=>$v)
                                                <li class="col-sm-3"> <a href="{{URL::asset('public/uploads/admin/participation_file/' . $v->form_filename)}}" class="btn"><i class="icofont-download"></i> {{$v->form_name}}</a> <span>{{$v->form_description}}</span></li>
                                                @endforeach
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif                    
                        <div class="btn_wrp">
                            <div class="row justify-content-center">
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <a href="{{ Route('teacher-registration') }}" class="btn">Teachers Registration</a>
                                        </div>
                                        
                                        <div class="col-sm-4">
                                            <a href="{{ Route('student-registration') }}" class="btn">Students Registration</a>
                                        </div>
                                        <div class="col-sm-4">
                                            <a href="#" class="btn">Judges & Volunteers Registration</a>                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div>
                    </div>


                </div>
            </div>
            @endif
            <div class="top_shedule bacolor_one table_bx">
                <div class="container"> 
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="green_color">Registration Deadlines</th>
                                            <th scope="col" class="text-center">Opens on</th>
                                            <th scope="col" class="text-center">Closes on</th>
                                            <th scope="col" class="text-center">Final Revisions Close*</th>
                                            <th scope="col" class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($register_setting!="")
                                        @foreach($register_setting as $k=>$setting)
                                        <tr>
                                            <td class="text_sni_bld">{{$setting->title}}</td>
                                            <td class="text-center">{{date("M d, Y (l)", strtotime($setting->started_at))}}</td>
                                            <td class="text-center">{{date("M d, Y (l)", strtotime($setting->closed_at))}}</td>
                                            <td class="text-center">{{($setting->final_revision_closed_at!="")?date("M d, Y (l)", strtotime($setting->final_revision_closed_at)):"n/a"}}</td>
                                            @if($setting->registration_status=="0")
                                            <td class="text-center" style="color:orange">Opening Soon</td>
                                            @elseif($setting->registration_status=="1")
                                            <td class="text-center" style="color:green">Open</td>
                                            @else
                                            <td class="text-center" style="color:red">Closed</td>
                                            @endif
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <p class="notice">*final revision indicates the last date when you can re-upload your forms/paperwork when requested by our staff.</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="top_shedule bacolor_two">
                <div class="container"> 
                    <h1 class="big_hd text-left">Divisions and Categories</h1>
                    <div class="row">
                        <div class="col-md-12">

                            @php
                            if($event!="")
                            {
                            echo $event->division_categories;
                            }
                            @endphp
                        </div>
                    </div>
                    <div>
                    </div>


                </div>
            </div>

            @stop