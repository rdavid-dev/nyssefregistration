@extends('admin::layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('admin-producttype') }}">Product Type</a></li>
<li> <a href="{{ Route('admin-viewproducttype', ['id' => $model->id]) }}">{{ $model->name }}</a></li>
<li class="active">Update</li>
@stop

@section('content')
<div class="categories-update">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-edit font-green-haze" aria-hidden="true"></i>
                <span class="caption-subject font-green-haze bold uppercase">Updating details of {{ $model->name }}</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form id="add-category-form" class="form-horizontal form-row-seperated" action="{{ Route('admin-updateproducttype', ['id' => $model->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Name <span class="required">*</span></label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="name" value="{{ $model->name }}" placeholder="Name">
                            <div class="help-block err-name"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Slug <span class="required">*</span></label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="slug" value="{{ $model->slug }}" placeholder="Slug">
                            <div class="help-block err-slug"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Image <span class="required">*</span></label>
                        <div class="col-md-5">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <div class="help-block err-image"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Status <span class="required">*</span></label>
                        <div class="col-md-5">
                            <div class="radio-list">
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="1" {{($model->status=='1')?'checked':''}}> Active
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="0" {{($model->status=='0')?'checked':''}}> Inactive
                                </label>
                                <div class="help-block err-status"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <button type="submit" class="btn green">Update</button>
                            <a href="{{ Route('admin-viewproducttype', ['id' => $model->id]) }}" class="btn default">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop