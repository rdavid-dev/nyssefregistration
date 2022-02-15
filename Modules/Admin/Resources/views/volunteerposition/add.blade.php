@extends('admin::layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('admin-volunteer-positions') }}">Volunteer Position</a></li>
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
                <span class="caption-subject font-green-haze bold uppercase">Add Volunteer Position</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal form-row-seperated" action="{{ Route('admin-addvolunteerposition') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="form-group {{ $errors->has('position_name') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Position Name <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="position_name" value="{{ (old('position_name') != "") ? old('position_name') : '' }}" placeholder="PositionName">
                                   @if ($errors->has('position_name'))
                                   <div class="help-block">{{ $errors->first('position_name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Description</label>
                        <div class="col-md-8">
                        <textarea class="form-control" name="description" placeholder="Description">{{ (old('description') != "") ? old('description') : "" }}</textarea>                            
                                   @if ($errors->has('description'))
                                   <div class="help-block">{{ $errors->first('description') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('position_spot') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Position Spot <span class="required">*</span></label>
                        <div class="col-md-8">
                            <select class="form-control" name="position_spot">
                            <option selected disabled>-------Select spot-------</option>
                            @for($i=0;$i<= 20;$i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                            </select>
                            @if ($errors->has('position_spot'))
                            <div class="help-block">{{ $errors->first('position_spot') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('position_date') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Position Date</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control datepicker" name="position_date" value="{{ (old('position_date') != '') ? old('position_date') : '' }}" placeholder="Position date" autocomplete="off">
                                   @if ($errors->has('position_date'))
                                   <div class="help-block">{{ $errors->first('position_date') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('position_start_time') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Position Start Time</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control timepicker" name="position_start_time" value="{{ (old('position_start_time') != '') ? old('position_start_time') : '' }}" placeholder="Position Start Time" autocomplete="off">
                                   @if ($errors->has('position_start_time'))
                                   <div class="help-block">{{ $errors->first('position_start_time') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('position_end_time') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Position End Time</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control timepicker" name="position_end_time" value="{{ (old('position_end_time') != '') ? old('position_end_time') : '' }}" placeholder="Position End Time" autocomplete="off">
                                   @if ($errors->has('position_end_time'))
                                   <div class="help-block">{{ $errors->first('position_end_time') }}</div>
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
                            <a href="{{ Route('admin-volunteer-positions') }}" class="btn default">Back</a>
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