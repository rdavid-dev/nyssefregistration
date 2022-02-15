@extends('admin::layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('admin-staticpages') }}">Static Pages</a></li>
<li> <a href="{{ Route('admin-viewstaticpage', ['id' => $model->id]) }}">{{ $model->page_name }}</a></li>
<li class="active">Update</li>
@stop

@section('content')
<div class="staticpage-update">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-edit font-green-haze" aria-hidden="true"></i>
                <span class="caption-subject font-green-haze bold uppercase">Updating details of {{ $model->page_name }}</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal form-row-seperated" action="{{ Route('admin-updatestaticpage', ['id' => $model->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Slug</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="slug" value="{{ (old('slug') != "") ? old('slug') : $model->slug }}" placeholder="Slug" disabled>
                            @if ($errors->has('slug'))
                            <div class="help-block">{{ $errors->first('slug') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('page_name') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Page Name <span class="required">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="page_name" value="{{ (old('page_name') != "") ? old('page_name') : $model->page_name }}" placeholder="Page Name">
                            @if ($errors->has('page_name'))
                            <div class="help-block">{{ $errors->first('page_name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Content <span class="required">*</span></label>
                        <div class="col-md-9">
                            <textarea class="form-control ckeditor" name="content" placeholder="Content">{{ (old('content') != "") ? old('content') : $model->content }}</textarea>
                            @if ($errors->has('content'))
                            <div class="help-block">{{ $errors->first('content') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <button type="submit" class="btn green">Update</button>
                            <a href="{{ Route('admin-viewstaticpage', ['id' => $model->id]) }}" class="btn default">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop