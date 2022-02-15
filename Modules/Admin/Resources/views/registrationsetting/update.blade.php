@extends('admin::layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('admin-registration-setting') }}">Registration Settings</a></li>
<li class="active">Update</li>
@stop
@section('css')
<link rel="stylesheet" href="{{ URL::asset('public/frontend/css/datepicker.css')}}" />
@endsection
@section('content')
<div class="users-update">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-edit font-green-haze" aria-hidden="true"></i>
                <span class="caption-subject font-green-haze bold uppercase">Update Registration Settings</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal form-row-seperated" action="{{ Route('admin-updateregistersetting',['id' => $model->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Title <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="title" value="{{ (old('title') != '') ? old('title') : $model->title }}" placeholder="Title">
                                   @if ($errors->has('title'))
                                   <div class="help-block">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('started_at') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Opens On <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control datepicker" name="started_at" value="{{ (old('started_at') != '') ? old('started_at') : date('m/d/Y', strtotime($model->started_at)) }}" placeholder="Opens On">
                                   @if ($errors->has('started_at'))
                                   <div class="help-block">{{ $errors->first('started_at') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('closed_at') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Closes On</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control datepicker" name="closed_at" value="{{ (($model->closed_at)?date('m/d/Y', strtotime($model->closed_at)):'') }}" placeholder="Closes On">
                                   @if ($errors->has('closed_at'))
                                   <div class="help-block">{{ $errors->first('closed_at') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('final_revision_closed_at') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Final Revisions Close </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control datepicker" name="final_revision_closed_at" value="{{ (($model->final_revision_closed_at)?date('m/d/Y', strtotime($model->final_revision_closed_at)):'') }}" placeholder="Final Revisions Close">
                                   @if ($errors->has('final_revision_closed_at'))
                                   <div class="help-block">{{ $errors->first('final_revision_closed_at') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Description<span class="required">*</span></label>
                        <div class="col-md-8">
                        <textarea class="form-control ckeditor" name="description" placeholder="Description">{{ (old('description') != "") ? old('description') : $model->description }}</textarea>                            
                                   @if ($errors->has('description'))
                                   <div class="help-block">{{ $errors->first('description') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('note') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Notes <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="note" value="{{ (old('note') != "") ? old('note') : $model->notes }}" placeholder="Notes">
                                   @if ($errors->has('note'))
                                   <div class="help-block">{{ $errors->first('note') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('registration_status') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Registration Status <span class="required">*</span></label>
                        <div class="col-md-8">
                            <select class="form-control" name="registration_status">
                                <option value="" selected disabled>Select Status</option>
                                 <option value="0" {{ ($model->registration_status == "0") ? "Selected" : "" }}>Opening Soon</option>
                                 <option value="1" {{ ($model->registration_status == "1") ? "Selected" : "" }}>Open</option>
                                 <option value="2" {{ ($model->registration_status == "2") ? "Selected" : "" }}>Closed</option>
                            </select>
                            @if ($errors->has('registration_status'))
                            <div class="help-block">{{ $errors->first('registration_status') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('under_tab') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Under Tab <span class="required">*</span></label>
                        <div class="col-md-8">
                            <select class="form-control" name="under_tab">
                                <option value="" selected disabled>Select Under Tab</option>
                                 <option value="teacher_student" {{ ($model->under_tab == "teacher_student") ? "Selected" : "" }}>Teacher & Student Registration</option>
                                 <option value="judge_volunteer" {{ ($model->under_tab == "judge_volunteer") ? "Selected" : "" }}>Judge & Volunteer Registration</option>
                            </select>
                            @if ($errors->has('under_tab'))
                            <div class="help-block">{{ $errors->first('under_tab') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('link') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Registration Link <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="link" value="{{ (old('link') != "") ? old('link') : $model->registration_link }}" placeholder="Show Registration Link">
                                   @if ($errors->has('link'))
                                   <div class="help-block">{{ $errors->first('link') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('show_link') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Show Registration Link <span class="required">*</span></label>
                        <div class="col-md-5">
                            <div class="radio-list">
                                <label class="radio-inline">
                                    <input type="radio" name="show_link" value="1" {{ ($model->show_registration_link == '1') ? 'checked' : '' }}> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="show_link" value="0" {{ ($model->show_registration_link == '0') ? 'checked' : '' }}> No
                                </label>
                                @if ($errors->has('show_link'))
                                <div class="help-block">{{ $errors->first('show_link') }}</div>
                                @endif
                            </div>
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
                            <a href="{{ Route('admin-registration-setting') }}" class="btn default">Back</a>
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
        todayHighlight: true
    });
</script>
@endsection