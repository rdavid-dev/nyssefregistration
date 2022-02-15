@extends('admin::layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('admin-sliders') }}">Sliders</a></li>
<li class="active">Add</li>
@stop

@section('content')
<div class="sliders-update">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-edit font-green-haze" aria-hidden="true"></i>
                <span class="caption-subject font-green-haze bold uppercase">Add Slider</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form id="add-category-form" class="form-horizontal form-row-seperated" action="{{ Route('admin-addslider') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-4 control-label" style="display:block;">Image <span class="required">*</span></label>
                        <div class="col-md-5">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="{{ (isset($model->image) && $model->image != '') ? URL::asset('public/uploads/frontend/slider/thumb/' . $model->image) : URL::asset('public/backend/assets/pages/img/admin-default.jpg') }}" alt=""> 
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                <div>
                                    <span class="btn default btn-file">
                                        <span class="fileinput-new"> Select Image </span>
                                        <span class="fileinput-exists"> Change </span>
                                        <input type="file" name="image">
                                    </span>
                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                </div>
                            </div>
                            <div class="help-block err-image"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Status <span class="required">*</span></label>
                        <div class="col-md-5">
                            <div class="radio-list">
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="1"> Active
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="0"> Inactive
                                </label>
                                <div class="help-block err-status"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <button type="submit" class="btn green">Submit</button>
                            <a href="{{ Route('admin-sliders') }}" class="btn default">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop