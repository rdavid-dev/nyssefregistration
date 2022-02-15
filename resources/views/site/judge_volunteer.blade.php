@extends('layouts.main') 
@section('content')
<div class="index-body body_content">
    <section class="reg_top_bx">
		<div class="inner_top_bx py-5 bacolor_one">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        @if($register_setting!="")
                        @foreach($register_setting as $key=>$value)
                        <div class="in_bx bottom">
                            <div class="heading_bx">
                                <h1>{{$key+1}}) <a href="{{($value->show_registration_link=='1')?$value->registration_link:'jacascript:void(0)'}}">{{ ($value->id == '5') ? 'ISEF Division' : '' }} {{$value->title}}</a></h1>
                                @if($value->registration_status=="1")
                                <span class="date_time"><span class="satatus"><i class="fa fa-check-circle" aria-hidden="true"></i>Open</span> closing on {{date("l, F jS, Y", strtotime($value->closed_at))}}</span>
                                @elseif($value->registration_status=="0")
                                <span class="date_time"><span class="satatus orange_color"><i class="icofont-sand-clock"></i>Opening Soon</span> on {{date("l, F jS, Y", strtotime($value->started_at))}}</span>
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