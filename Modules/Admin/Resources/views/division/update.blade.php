@extends('admin::layouts.main')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('public/frontend/css/bootstrap-datepicker.css')}}" />
@endsection

@section('breadcrumb')
<li> <a href="{{ Route('admin-division') }}">Divisions</a></li>
<li> <a href="{{ Route('admin-viewdivision', ['id' => $model->id]) }}">{{ $model->name }}</a></li>
<li class="active">Update</li>
@stop

@section('content')
<div class="users-update">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-edit font-green-haze" aria-hidden="true"></i>
                <span class="caption-subject font-green-haze bold uppercase">Updating details of {{ $model->name }}</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal form-row-seperated" action="{{ Route('admin-updatedivision', ['id' => $model->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Name <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" readonly="readonly" value="{{ (old('name') != "") ? old('name') : $model->name }}" placeholder="Name">
                                   @if ($errors->has('name'))
                                   <div class="help-block">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Description</label>
                        <div class="col-md-8">
                        <textarea class="form-control " name="description" placeholder="Description">{{ (old('description') != "") ? old('description') : $model->description }}</textarea>
                            @if ($errors->has('description'))
                            <div class="help-block">{{ $errors->first('description') }}</div>
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
                                    <input type="radio" name="status" value="0" {{ ($model->status == '0') ? 'checked' : '' }}> Inactive
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
                            <a href="{{ Route('admin-viewdivision', ['id' => $model->id]) }}" class="btn default">Back</a>
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