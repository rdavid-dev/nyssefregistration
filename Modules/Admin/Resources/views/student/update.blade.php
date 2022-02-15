@extends('admin::layouts.main')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('public/frontend/css/bootstrap-datepicker.css')}}" />
@endsection

@section('breadcrumb')
<li> <a href="{{ Route('admin-students') }}">Students</a></li>
<li> <a href="{{ Route('admin-viewstudent', ['id' => $model->id]) }}">{{ $model->first_name }} {{ $model->last_name }}</a></li>
<li class="active">Update</li>
@stop

@section('content')
<div class="users-update">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-edit font-green-haze" aria-hidden="true"></i>
                <span class="caption-subject font-green-haze bold uppercase">Updating details of {{ $model->first_name }} {{ $model->last_name }}</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal form-row-seperated" action="{{ Route('admin-updatestudents', ['id' => $model->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">First Name <span class="required">*</span></label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="first_name" value="{{ (old('first_name') != "") ? old('first_name') : $model->first_name }}" placeholder="First Name">
                                   @if ($errors->has('first_name'))
                                   <div class="help-block">{{ $errors->first('first_name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Last Name <span class="required">*</span></label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="last_name" value="{{ (old('last_name') != "") ? old('last_name') : $model->last_name }}" placeholder="Last Name">
                                   @if ($errors->has('last_name'))
                                   <div class="help-block">{{ $errors->first('last_name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Phone<span class="required">*</span></label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="phone" value="{{ ($model->phone!= '') ? $model->phone:'' }}" placeholder="Phone">
                            @if ($errors->has('phone'))
                            <div class="help-block">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Gender <span class="required">*</span></label>
                        <div class="col-md-5">
                            <div class="radio-list">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" value="M" {{ ($model->gender == 'M') ? 'checked' : '' }}> Male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" value="F" {{ ($model->gender == 'F') ? 'checked' : '' }}> Female
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" value="O" {{ ($model->gender == 'O') ? 'checked' : '' }}> Others
                                </label>
                                @if ($errors->has('gender'))
                                <div class="help-block">{{ $errors->first('gender') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Address<span class="required">*</span></label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="address" value="{{ ($model->address_line1!= '') ? $model->address_line1:'' }}" placeholder="Address">
                            @if ($errors->has('address'))
                            <div class="help-block">{{ $errors->first('address') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">City<span class="required">*</span></label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="city" value="{{ ($model->city!= '') ? $model->city:'' }}" placeholder="City">
                            @if ($errors->has('city'))
                            <div class="help-block">{{ $errors->first('city') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">State<span class="required">*</span></label>
                        <div class="col-md-5">
                            <select name="state" class="form-control">
                                <option value="" selected disabled>------Select State------</option>
                                @foreach($state as $key=>$value)
                                <option value="{{$value->code}}" {{($value->code==$model->state)?"selected":""}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('state'))
                            <div class="help-block">{{ $errors->first('state') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('zipcode') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Zip Code<span class="required">*</span></label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="zipcode" value="{{ ($model->zipcode!= '') ? $model->zipcode:'' }}" placeholder="Zip COde">
                            @if ($errors->has('zipcode'))
                            <div class="help-block">{{ $errors->first('zipcode') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('county') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">County<span class="required">*</span></label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="county" value="{{ ($model->county!= '') ? $model->county:'' }}" placeholder="County">
                            @if ($errors->has('county'))
                            <div class="help-block">{{ $errors->first('county') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('participation_at_our_fair') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Students participate at our fair(Years)?<span class="required">*</span></label>
                        <div class="col-md-5">
                        <div class="radio-list">
                                <label class="radio-inline">
                                    <input type="radio" name="participation_at_our_fair" value="0" {{ ($model->participation_at_our_fair == '0') ? 'checked' : '' }}> 0
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="participation_at_our_fair" value="1" {{ ($model->participation_at_our_fair == '1') ? 'checked' : '' }}> 1
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="participation_at_our_fair" value="2" {{ ($model->participation_at_our_fair == '2') ? 'checked' : '' }}> 2
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="participation_at_our_fair" value="3+" {{ ($model->participation_at_our_fair == '3+') ? 'checked' : '' }}> 3+
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="participation_at_our_fair" value="5+" {{ ($model->participation_at_our_fair == '5+') ? 'checked' : '' }}> 5+
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="participation_at_our_fair" value="10+" {{ ($model->participation_at_our_fair == '10+') ? 'checked' : '' }}> 10+
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="participation_at_our_fair" value="20+" {{ ($model->participation_at_our_fair == '20+') ? 'checked' : '' }}> 20+
                                </label>
                                @if ($errors->has('participation_at_our_fair'))
                                <div class="help-block">{{ $errors->first('participation_at_our_fair') }}</div>
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
                                    <input type="radio" name="status" value="2" {{ ($model->status == '2') ? 'checked' : '' }}> Suspended
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
                            <a href="{{ Route('admin-viewstudent', ['id' => $model->id]) }}" class="btn default">Back</a>
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