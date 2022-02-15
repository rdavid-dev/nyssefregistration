@extends('admin::layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('admin-judgeregistration') }}">Judge</a></li>
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
                            <label class="control-label col-md-6">Highest Degree Completed:</label>
                            <div class="col-md-6">
                            <p class="form-control-static">
                                @foreach($degree as $key=>$value)
                                @if($value->degree_code==$details->degree)
                                {{$value->degree}}
                                @endif
                                @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">Dietary Restrictions:</label>
                            <div class="col-md-6">
                                <p class="form-control-static"> {{ (isset($details->dietary_restrictions) && $details->dietary_restrictions != null) ? $details->dietary_restrictions : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">Is Retired?:</label>
                            <div class="col-md-6">
                            <p class="form-control-static">
                                    @if($details->is_retired == '0')
                                    No
                                    @elseif($details->is_retired == '1')
                                    Yes
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">Organization You Are Representing:</label>
                            <div class="col-md-6">
                                <p class="form-control-static"> {{ (isset($details->organization) && $details->organization != null) ? $details->organization : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">participate As A Judge At Our Fair:</label>
                            <div class="col-md-6">
                                <p class="form-control-static"> {{ (isset($model->participation_at_our_fair) && $model->participation_at_our_fair != null) ? $model->participation_at_our_fair : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">Parking Pass:</label>
                            <div class="col-md-6">
                            <p class="form-control-static">
                                    @if($details->require_parking_pass == '0')
                                    No
                                    @elseif($details->require_parking_pass == '1')
                                    Yes
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">Category 1:</label>
                            <div class="col-md-6">
                            <p class="form-control-static">
                                @foreach($category as $k=>$val)
                                @if($val->category_code==$details->judge_category_1)
                                {{$val->category_name}}
                                @endif
                                @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">Category 2:</label>
                            <div class="col-md-6">
                            <p class="form-control-static">
                                @foreach($category as $k=>$val)
                                @if($val->category_code==$details->judge_category_2)
                                {{$val->category_name}}
                                @endif
                                @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">Category 3:</label>
                            <div class="col-md-6">
                            <p class="form-control-static">
                                @foreach($category as $k=>$val)
                                @if($val->category_code==$details->judge_category_3)
                                {{$val->category_name}}
                                @endif
                                @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">Your Field Of Study:</label>
                            <div class="col-md-6">
                                <p class="form-control-static"> {{ (isset($details->study_field) && $details->study_field != null) ? $details->study_field : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">Years Of Experience Do You Have In This Field:</label>
                            <div class="col-md-6">
                                <p class="form-control-static"> {{ (isset($details->experience_in_study_field) && $details->experience_in_study_field != null) ? $details->experience_in_study_field : "Not Given" }} </p>
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
            </div>
            <div class="form-actions text-right">
                
                <a href="{{ Route('admin-judgeregistration') }}" class="btn default">Back</a>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>
@stop