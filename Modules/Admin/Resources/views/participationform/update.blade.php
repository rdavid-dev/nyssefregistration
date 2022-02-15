@extends('admin::layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('admin-registration-setting') }}">Participation Form</a></li>
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
                <span class="caption-subject font-green-haze bold uppercase">Update Participation Form</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal form-row-seperated" action="{{ Route('admin-updateparticipation',['id' => $model->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Name <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" value="{{ (old('name') != '') ? old('name') : $model->form_name }}" placeholder="Name">
                                   @if ($errors->has('name'))
                                   <div class="help-block">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Description </label>
                        <div class="col-md-8">
                        <textarea class="form-control" name="description" placeholder="Description">{{ (old('description') != "") ? old('description') : $model->form_description }}</textarea>
                                   @if ($errors->has('description'))
                                   <div class="help-block">{{ $errors->first('description') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('form_file') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Upload File <span class="required">*</span></label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" name="form_file" value="{{ (old('form_file') != "") ? old('form_file') : '' }}" placeholder="Upload File">
                                   @if ($errors->has('form_file'))
                                   <div class="help-block">{{ $errors->first('form_file') }}</div>
                            @endif
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-success" href="{{URL::asset('public/uploads/frontend/participation_file/' . $model->form_filename)}}" Download>Download</a>
                           
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
                            <a href="{{ Route('admin-participationform') }}" class="btn default">Back</a>
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