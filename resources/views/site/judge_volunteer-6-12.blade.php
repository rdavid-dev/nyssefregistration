@extends('layouts.main') 
@section('content')
<div class="index-body body_content">
    <!-- *****************Banner-start****************** -->

    <!-- ************************Banner-end**************** -->

    <section class="reg_top_bx">

        <div class="inner_top_bx py-5 bacolor_one">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="in_bx bottom">
                            <div class="heading_bx">
                                <h1>1) <a href="{{Route('judge-registration')}}">Judge Registration</a></h1>
                                <span class="date_time"><span class="satatus"><i class="fa fa-check-circle" aria-hidden="true"></i>Open</span> closing on Friday, Feb 28, 2020</span>
                            </div>
                            <div class="text_bx">
                                <p class="top_txt"></p>
                                Many judges are required to make our science fair a success and great experience for the students. There is no special training or requirements to be a judge. If you have at least two years or more of completed college coursework in your field, you are qualified. Bring a friend!
We ask all our judges to register themselves before our deadline. Having accurate information helps us prepare for the judging day to ensure that all projects are covered. If you are not available to participate, please let us know as soon as possible so that we may adjust our judging distribution.
<!--Project judging day will take place on Tuesday, March 31st with judge check-in starting promptly at 12:00pm. Poster judging without students will take place from 12:00pm to 3:00pm, it is important that you arrive on time so that you are able to view each poster before students return. From 3:00pm to 5:00pm students return to their posters for an interview session by the judges. From 5:00pm to 9:00pm judges will deliberate and submit final scores.-->
Project judging day will take place on Monday, March 30th with judge check-in starting promptly at 8:00 AM. Poster judging withstudents will take place from 9:00 AM to 4:00 PM.                            
                            <!-- <a href="#" class="link_text">list of currently registered schools and teachers</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="in_bx bottom">
                            <div class="heading_bx">
                                <h1>1) <a href="{{Route('volunteer-registration')}}">Volunteer Registration</a></h1>
                                <span class="date_time"><span class="satatus"><i class="fa fa-check-circle" aria-hidden="true"></i>Open</span> closing on Thursday, Apr 2, 2020</span>
                            </div>
                            <div class="text_bx">
                                <p class="top_txt"></p>
                                While we need many judges to make our science fair a success, several volunteers are required in key positions to assist our participants. We need volunteers to help set up at the day of the event, student check-in, pass out paperwork to judges, collect scoring sheet and more. Bring a friend!
We ask all our volunteers to register themselves before our deadline. Having accurate information helps us prepare for the fair ensuring we have all our bases covered. If you cannot participate at the event, please let us know as soon as possible, so that we may adjust our volunteer numbers.
                            
                            <!-- <a href="#" class="link_text">list of currently registered schools and teachers</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


</div>
@stop