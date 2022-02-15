@extends('admin::layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('admin-volunteerregistration') }}">Volunteer</a></li>
<li class="active">View</li>
@stop

@section('content')
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-eye font-green-haze"></i>
            <span class="caption-subject font-green-haze bold uppercase">Viewing details of {{ $model->first_name }} {{$model->last_name}}</span>
        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form class="form-horizontal">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">Name:</label>
                            <div class="col-md-6">
                                <p class="form-control-static"> {{ (isset($model->first_name) && $model->first_name != null) ? $model->first_name." ".$model->last_name : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">Email:</label>
                            <div class="col-md-6">
                                <p class="form-control-static"> {{ (isset($model->email) && $model->email != null) ? $model->email : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">Phone:</label>
                            <div class="col-md-6">
                                <p class="form-control-static"> {{ (isset($model->phone) && $model->phone != null) ? $model->phone : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">Gender:</label>
                            <div class="col-md-6">
                            <p class="form-control-static">
                                    @if($model->gender == 'M')
                                    Male
                                    @elseif($model->gender == 'F')
                                    Female
                                    @else
                                    Other
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">Participate As A Volunteer At Our Fair:</label>
                            <div class="col-md-6">
                                <p class="form-control-static"> {{ (isset($model->participation_at_our_fair) && $model->participation_at_our_fair != null) ? $model->participation_at_our_fair : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6"> Hear About Us?:</label>
                            <div class="col-md-6">
                                <p class="form-control-static"> {{ (isset($details->hear_about_us) && $details->hear_about_us != null) ? $details->hear_about_us : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">Recommendations On Recruiting Strategies For Our Event:</label>
                            <div class="col-md-6">
                                <p class="form-control-static"> {{ (isset($details->recommendations) && $details->recommendations != null) ? $details->recommendations : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">Status:</label>
                            <div class="col-md-6">
                                <p class="form-control-static">
                                    @if($model->status == '0')
                                    Inactive
                                    @elseif($model->status == '1')
                                    Active
                                    @else
                                    Suspended
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <h4><b>Volunteer Positions Information</b></h4>
                @php
                $data=array();
                if($details->positions!="")
                {
                    $data=unserialize($details->positions);
                }
                @endphp
                @if(!empty($position))
                @foreach($position as $value)
                <div class="date_bx">
                    <h1><i class="icofont-ui-calendar"></i>{{date("l, F jS, Y", strtotime($value->position_date))}}</h1>
                    <div class="media">
                        <div class="custom-control custom-checkbox mr-sm-3">
                            <input type="checkbox" disabled name="positions[]" class="custom-control-input" id="custom_chk_<?php echo $value->id; ?>" {{(in_array($value->id, $data)?"checked":"")}} value="<?php echo $value->id; ?>">
                            <label class="custom-control-label" for="custom_chk_<?php echo $value->id; ?>">{{$value->position_spots}} spot</label>
                        </div>
                        <div class="media-body">
                            <h2>{{date("h:sa", strtotime($value->position_start_time))}} - {{date("h:sa", strtotime($value->position_end_time))}} | <span>{{$value->position_name}}</span></h2>
                            <p>{{$value->position_description}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                
            </div>
            <div class="form-actions text-right">
                
                <a href="{{ Route('admin-volunteerregistration') }}" class="btn default">Back</a>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>
@stop