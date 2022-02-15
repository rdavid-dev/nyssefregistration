@extends('admin::layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('admin-coupons') }}">Coupons</a></li>
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
                            <label class="control-label col-md-3">Coupon Code:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> {{ (isset($model->coupon_code) && $model->coupon_code != null) ? $model->coupon_code : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Discount:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> {{ (isset($model->discount) && $model->discount != null) ? '$'.$model->discount : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Accept:</label>
                            <div class="col-md-9">
                                <p class="form-control-static">
                                    @if($model->accept === '0')
                                    Once
                                    @else
                                    More than one
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
                <a href="{{ Route('admin-updatecoupon', ['id' => $model->id]) }}" class="btn green">
                    <i class="fa fa-pencil"></i> Edit
                </a>
                <a href="{{ Route('admin-coupons') }}" class="btn default">Back</a>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>
@stop