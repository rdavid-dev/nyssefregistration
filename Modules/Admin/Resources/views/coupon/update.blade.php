@extends('admin::layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('admin-coupons') }}">Coupons</a></li>
<li class="active">Update</li>
@stop

@section('content')
<div class="categories-update">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-edit font-green-haze" aria-hidden="true"></i>
                <span class="caption-subject font-green-haze bold uppercase">Updating details</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form id="add-coupon-form" class="form-horizontal form-row-seperated" action="{{ Route('admin-updatecoupon', ['id' => $model->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Coupon Code <span class="required">*</span></label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="coupon_code" value="{{ ($model->coupon_code!==NULL) ? $model->coupon_code : '' }}" placeholder="Coupon Code">
                            <div class="help-block"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Discount <span class="required">*</span></label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="discount" value="{{ ($model->discount!==NULL) ? $model->discount : '' }}" placeholder="Discount">
                            <div class="help-block"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Accept <span class="required">*</span></label>
                        <div class="col-md-5">
                            <div class="radio-list">
                                <label class="radio-inline">
                                    <input type="radio" name="accept" value="2" {{($model->accept=='2')?'checked':''}}> More than one
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="accept" value="1" {{($model->accept=='1')?'checked':''}}> Once
                                </label>
                                <div class="help-block err-status"></div>
                            </div>
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
                            <a href="{{ Route('admin-viewcoupon', ['id' => $model->id]) }}" class="btn default">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop