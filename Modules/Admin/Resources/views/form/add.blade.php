@extends('admin::layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('admin-form') }}">2020 Forms</a></li>
<li class="active">Add</li>
@stop
@section('css')
<link rel="stylesheet" href="{{ URL::asset('public/frontend/css/datepicker.css')}}" />
<link rel="stylesheet" href="{{ URL::asset('public/backend/css/mdtimepicker.css')}}" />

@endsection
@section('content')
<div class="users-update">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-edit font-green-haze" aria-hidden="true"></i>
                <span class="caption-subject font-green-haze bold uppercase">Add 2020 Form</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal form-row-seperated" action="{{ Route('admin-addform') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="form-group {{ $errors->has('form_name') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Form Name <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="form_name" value="{{ (old('form_name') != "") ? old('form_name') : '' }}" placeholder="Form Name">
                                   @if ($errors->has('form_name'))
                                   <div class="help-block">{{ $errors->first('form_name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('form_upload') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Form File Upload <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="file" class="form-control" name="form_upload" placeholder="Form Upload">
                                   @if ($errors->has('form_upload'))
                                   <div class="help-block">{{ $errors->first('form_upload') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Status <span class="required">*</span></label>
                        <div class="col-md-5">
                            <div class="radio-list">
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="1" {{ (old('status') != "" && old('status')=='1') ? 'checked' : '' }}> Active
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="0" {{ (old('status') != "" && old('status')=='0') ? 'checked' : '' }}> Inactive
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
                            <button type="submit" class="btn green">Submit</button>
                            <a href="{{ Route('admin-form') }}" class="btn default">Back</a>
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
<script type="text/javascript" src="{{ URL::asset('public/backend/js/mdtimepicker.js') }}"></script>
<script>
    $(".datepicker").datepicker({
        format: 'mm/dd/yyyy',
        autoclose: true,
        todayHighlight: true
    });
    $('.timepicker').mdtimepicker();
</script>
@endsection