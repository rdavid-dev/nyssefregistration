@extends('admin::layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('admin-teacherRegistration') }}">Teacher registration</a></li>
<li class="active">View</li>
@stop

@section('content')
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-eye font-green-haze"></i>
            <span class="caption-subject font-green-haze bold uppercase">Viewing details of Teacher Registration</span>
        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form class="form-horizontal">
            <div class="form-body">
            <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3"><h3>Teacher Information:</h3></label>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">First Name:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->get_teacher_details->first_name) && $model->get_teacher_details->first_name != null) ? $model->get_teacher_details->first_name : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Last Name:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->get_teacher_details->last_name) && $model->get_teacher_details->last_name != null) ? $model->get_teacher_details->last_name : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Email:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->get_teacher_details->email) && $model->get_teacher_details->email != null) ? $model->get_teacher_details->email : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Phone:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->get_teacher_details->phone) && $model->get_teacher_details->phone != null) ? $model->get_teacher_details->phone : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3"><h3>School Information:</h3></label>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">School Name:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->school_name) && $model->school_name != null) ? $model->school_name : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Address:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->school_address) && $model->school_address != null) ? $model->school_address : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">City:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->school_city) && $model->school_city != null) ? $model->school_city : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Zipcode:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->school_zipcode) && $model->school_zipcode != null) ? $model->school_zipcode : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">State:</label>
                            <div class="col-md-7">
                                <p class="form-control-static">{{(isset($state->name) && $state->name!=null)?$state->name:""}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">District:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->school_district) && $model->school_district != null) ? $model->school_district : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">County:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->school_county) && $model->school_county != null) ? $model->school_county : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Phone No:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->school_phone) && $model->school_phone != null) ? $model->school_phone : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Principal Name:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->school_prinicipal_name) && $model->school_prinicipal_name != null) ? $model->school_prinicipal_name : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Principal Email:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->school_principal_email) && $model->school_principal_email != null) ? $model->school_principal_email : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Payment Method:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->payment_method) && $model->payment_method != null) ? $model->payment_method : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">NYSSEF ISEF Division:</label>
                            <div class="col-md-7">
                            @php
                                if($model->isef_divisions!="")
                                {
                                    $isef=unserialize($model->isef_divisions);
                                    foreach($isef as $val)
                                    {
                                        @endphp
                                        <p class="form-control-static">{{$val}}</p><br>
                                        @php
                                    }
                                }
                                
                            @endphp
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Andromeda Judging:</label>
                            <div class="col-md-7">
                            @php
                                if($model->andromeda_judging!="")
                                {
                                    $judge=unserialize($model->andromeda_judging);
                                    foreach($judge as $key=>$value)
                                    {
                                        if(!isset($value['option']))
                                        {
                                            break;
                                        }
                                        @endphp
                                        <p class="form-control-static">{{$key+1}}) Category:{{$value['option']}}<br>
                                        Preference:{{$value['preference']}}</p>
                                        <br>
                                        @php
                                    }
                                }
                                
                            @endphp
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Broadcom Judging:</label>
                            <div class="col-md-7">
                            @php
                                if($model->broadcom_judging!="")
                                {
                                    $judge=unserialize($model->broadcom_judging);
                                    foreach($judge as $key=>$value)
                                    {
                                        if(!isset($value['option']))
                                        {
                                            break;
                                        }
                                        @endphp
                                        <p class="form-control-static">{{$key+1}}) Category:{{$value['option']}}<br>
                                        Preference:{{$value['preference']}}</p><br>
                                        @php
                                    }
                                }
                                
                            @endphp
                            
                            </div>
                        </div>
                    </div>
                </div>
            <div class="form-actions text-right">
                <a href="{{ Route('admin-teacherRegistration') }}" class="btn default">Back</a>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>
@stop