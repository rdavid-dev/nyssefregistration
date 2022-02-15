@extends('admin::layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('admin-sliders') }}">Sliders</a></li>
<li class="active">View</li>
@stop

@section('content')
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-eye font-green-haze"></i>
            <span class="caption-subject font-green-haze bold uppercase">View</span>
        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form class="form-horizontal">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Image:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> 
                                    @if (isset($model->image) && !empty($model->image))
                                    <img alt="" class="img-responsive" src="{{ URL::asset('public/uploads/frontend/slider/preview/' . $model->image) }}" />
                                    @else
                                    Not given
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Status:</label>
                            <div class="col-md-9">
                                <p class="form-control-static">
                                    @if($model->status == '0')
                                    Inactive
                                    @elseif($model->status == '1')
                                    Active
                                    @else
                                    Deleted
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions text-right">
                <a href="{{ Route('admin-updateslider', ['id' => $model->id]) }}" class="btn green">
                    <i class="fa fa-pencil"></i> Edit
                </a>
                <a href="{{ Route('admin-sliders') }}" class="btn default">Back</a>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>
@stop