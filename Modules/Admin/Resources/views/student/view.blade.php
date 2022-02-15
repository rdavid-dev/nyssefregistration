@extends('admin::layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('admin-students') }}">Students</a></li>
<li class="active">View</li>
@stop

@section('content')
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-eye font-green-haze"></i>
            <span class="caption-subject font-green-haze bold uppercase">Viewing details of {{ $model->first_name }} {{ $model->last_name }}</span>
        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form class="form-horizontal">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">Teacher Name:</label>
                            <div class="col-md-6">
                                <p class="form-control-static"> {{ (isset($teacher->first_name) && $teacher->first_name != null) ? $teacher->first_name." ".$teacher->last_name : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">First Name:</label>
                            <div class="col-md-6">
                                <p class="form-control-static"> {{ (isset($model->first_name) && $model->first_name != null) ? $model->first_name : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">Last Name:</label>
                            <div class="col-md-6">
                                <p class="form-control-static"> {{ (isset($model->last_name) && $model->last_name != null) ? $model->last_name : "Not Given" }} </p>
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
                                    @elseif($model->gender == 'O')
                                    Other
                                    @else
                                    Not Given
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">Address:</label>
                            <div class="col-md-6">
                                <p class="form-control-static"> {{ (isset($model->address_line1) && $model->address_line1 != null) ? $model->address_line1 : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">City:</label>
                            <div class="col-md-6">
                                <p class="form-control-static"> {{ (isset($model->city) && $model->city != null) ? $model->city : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">State:</label>
                            <div class="col-md-6">
                                <p class="form-control-static">{{(isset($state) && $state!="")?$state->name:"Not Given"}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">Zip Code:</label>
                            <div class="col-md-6">
                                <p class="form-control-static"> {{ (isset($model->zipcode) && $model->zipcode != null) ? $model->zipcode : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6">County:</label>
                            <div class="col-md-6">
                                <p class="form-control-static"> {{ (isset($model->county) && $model->county != null) ? $model->county : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-6"> participate at our fair:</label>
                            <div class="col-md-6">
                                <p class="form-control-static"> {{ (isset($model->participation_at_our_fair) && $model->participation_at_our_fair != null) ? $model->participation_at_our_fair." Years" : "Not Given" }} </p>
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
                <a href="{{ Route('admin-updatestudents', ['id' => $model->id]) }}" class="btn green">
                    <i class="fa fa-pencil"></i> Edit
                </a>
                <a href="{{ Route('admin-students') }}" class="btn default">Back</a>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>
@stop