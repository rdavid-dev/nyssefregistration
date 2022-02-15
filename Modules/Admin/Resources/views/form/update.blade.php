@extends('admin::layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('admin-form') }}">2020 Forms</a></li>
<li class="active">Update</li>
@stop
@section('content')
<div class="users-update">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-edit font-green-haze" aria-hidden="true"></i>
                <span class="caption-subject font-green-haze bold uppercase">Update 2020 Form</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal form-row-seperated" action="{{ Route('admin-updateform',['id' => $model->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="form-group {{ $errors->has('form_name') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Form Name <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="form_name" value="{{ (old('form_name') != '') ? old('form_name') : $model->form_name }}" placeholder="Form Name">
                                   @if ($errors->has('form_name'))
                                   <div class="help-block">{{ $errors->first('form_name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('form_upload') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Form File Upload <span class="required">*</span></label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" name="form_upload" placeholder="Form Upload">
                                   @if ($errors->has('form_upload'))
                                   <div class="help-block">{{ $errors->first('form_upload') }}</div>
                            @endif
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-success" href="{{URL::asset('public/uploads/frontend/isef_forms/' . $model->form_filename)}}" Download>Download</a>
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