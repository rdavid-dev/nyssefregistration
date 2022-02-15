@extends('admin::layouts.main')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('public/frontend/css/bootstrap-datepicker.css')}}" />
@endsection

@section('breadcrumb')
<li> <a href="{{ Route('admin-users') }}">Users</a></li>
<li> <a href="{{ Route('admin-viewuser', ['id' => $model->id]) }}">{{ $model->first_name }} {{ $model->last_name }}</a></li>
<li class="active">Update</li>
@stop

@section('content')
<div class="users-update">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-edit font-green-haze" aria-hidden="true"></i>
                <span class="caption-subject font-green-haze bold uppercase">Updating details of {{ $model->first_name }} {{ $model->last_name }}</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal form-row-seperated" action="{{ Route('admin-updateuser', ['id' => $model->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">First Name <span class="required">*</span></label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="first_name" value="{{ (old('first_name') != "") ? old('first_name') : $model->first_name }}" placeholder="First Name">
                                   @if ($errors->has('first_name'))
                                   <div class="help-block">{{ $errors->first('first_name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Last Name <span class="required">*</span></label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="last_name" value="{{ (old('last_name') != "") ? old('last_name') : $model->last_name }}" placeholder="Last Name">
                                   @if ($errors->has('last_name'))
                                   <div class="help-block">{{ $errors->first('last_name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Email <span class="required">*</span></label>
                        <div class="col-md-5">
                            <input type="email" class="form-control" name="email" value="{{ (old('email') != "") ? old('email') : $model->email }}" placeholder="Email">
                                   @if ($errors->has('email'))
                                   <div class="help-block">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Phone</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="phone" value="{{ ($model->phone!= '') ? $model->phone:'' }}" placeholder="Phone">
                            @if ($errors->has('phone'))
                            <div class="help-block">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('dob') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">DOB</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control datepicker" name="dob" value="{{date('m/d/Y',strtotime($model->dob))}}" placeholder="DOB">
                            @if ($errors->has('dob'))
                            <div class="help-block">{{ $errors->first('dob') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Status <span class="required">*</span></label>
                        <div class="col-md-5">
                            <div class="radio-list">
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="1" {{ ($model->status == '1') ? 'checked' : '' }}> Active
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="2" {{ ($model->status == '2') ? 'checked' : '' }}> Suspended
                                </label>
                                @if ($errors->has('status'))
                                <div class="help-block">{{ $errors->first('status') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <button type="submit" class="btn green">Update</button>
                            <a href="{{ Route('admin-viewuser', ['id' => $model->id]) }}" class="btn default">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
@section('js')
<script type="text/javascript" src="{{ URL::asset('public/frontend/js/bootstrap-datepicker.js') }}"></script>
<script>
    $(".datepicker").datepicker({
        format: 'mm/dd/yyyy',
        autoclose: true,
        todayHighlight: true,
        endDate: '-0m'
    });
</script>
@stop