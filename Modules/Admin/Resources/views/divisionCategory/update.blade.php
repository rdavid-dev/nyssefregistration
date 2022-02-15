@extends('admin::layouts.main')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('public/frontend/css/bootstrap-datepicker.css')}}" />
@endsection

@section('breadcrumb')
<li> <a href="{{ Route('admin-division-category') }}">Division Categories</a></li>
<!-- <li> <a href="{{ Route('admin-viewdivision', ['id' => $model->id]) }}">{{ $model->name }}</a></li> -->
<li class="active">Update</li>
@stop

@section('content')
<div class="users-update">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-edit font-green-haze" aria-hidden="true"></i>
                <span class="caption-subject font-green-haze bold uppercase">Updating details of {{ $model->category_name }}</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal form-row-seperated" action="{{ Route('admin-updatedivisioncategory', ['id' => $model->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="form-group {{ $errors->has('division_name') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Division Name <span class="required">*</span></label>
                        <div class="col-md-8">
                            <select class="form-control" name="division_name">
                                <option value="" selected disabled>------Select Division Name------</option>
                                @if(!empty($division))
                                @foreach($division as $key =>$value)
                                <option value="{{$value->id}}" {{($model->division_id==$value->id)?"selected":""}}>{{$value->name}}</option>
                                @endforeach
                                @endif
                            </select>
                            @if ($errors->has('division_name'))
                            <div class="help-block">{{ $errors->first('division_name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Code <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="code" value="{{ (old('code') != "") ? old('code') : $model->category_code }}" placeholder="Code">
                                   @if ($errors->has('code'))
                                   <div class="help-block">{{ $errors->first('code') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Name <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" value="{{ (old('name') != "") ? old('name') : $model->category_name }}" placeholder="Name">
                                   @if ($errors->has('name'))
                                   <div class="help-block">{{ $errors->first('name') }}</div>
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
                            <a href="{{ Route('admin-division-category') }}" class="btn default">Back</a>
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