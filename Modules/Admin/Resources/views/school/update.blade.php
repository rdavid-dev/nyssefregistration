@extends('admin::layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('admin-school') }}">Schools</a></li>
<li> {{($school)?$school->name:""}}</li>
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
                <span class="caption-subject font-green-haze bold uppercase">Update School Details</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal form-row-seperated" action="{{ Route('admin-updateschool',['id' => $school->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">School Type <span class="required">*</span></label>
                        <div class="col-md-8">
                            <select class="form-control" name="type">
                                <option value="" selected disabled>----Select Type----</option>
                                @foreach($types as $key=>$value)
                                <option value="{{$value->id}}" {{($school->type_id==$value->id)?"selected":""}}>{{$value->type}}</option>
                                @endforeach
                            </select>
                                   @if ($errors->has('type'))
                                   <div class="help-block">{{ $errors->first('type') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">School Name <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" value="{{ (old('name') != "") ? old('name') : $school->name }}" placeholder="School Name">
                                   @if ($errors->has('name'))
                                   <div class="help-block">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Address <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="address" value="{{ (old('address') != "") ? old('address') : $school->address_line1 }}" placeholder="Address">
                                   @if ($errors->has('address'))
                                   <div class="help-block">{{ $errors->first('address') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">City <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="city" value="{{ (old('city') != "") ? old('city') : $school->city }}" placeholder="City">
                                   @if ($errors->has('city'))
                                   <div class="help-block">{{ $errors->first('city') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">State<span class="required">*</span></label>
                        <div class="col-md-8">
                            <select class="form-control" name="state">
                                <option value="" selected disabled>----Select State----</option>
                                @foreach($states as $kk=>$val)
                                <option value="{{$val->code}}" {{($school->state==$val->code)?"selected":""}}>{{$val->code}}-{{$val->name}}</option>
                                @endforeach
                            </select>
                                   @if ($errors->has('state'))
                                   <div class="help-block">{{ $errors->first('state') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('zipcode') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Zip Code <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="zipcode" value="{{ (old('zipcode') != "") ? old('zipcode') : $school->zipcode }}" placeholder="Zip Code">
                                   @if ($errors->has('zipcode'))
                                   <div class="help-block">{{ $errors->first('zipcode') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('district') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">District <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="district" value="{{ (old('district') != "") ? old('district') : $school->district }}" placeholder="District">
                                   @if ($errors->has('district'))
                                   <div class="help-block">{{ $errors->first('district') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('county') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">County <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="county" value="{{ (old('county') != "") ? old('county') : $school->county }}" placeholder="County">
                                   @if ($errors->has('county'))
                                   <div class="help-block">{{ $errors->first('county') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Phone <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="phone" value="{{ (old('phone') != "") ? old('phone') : $school->phone }}" placeholder="Phone">
                                   @if ($errors->has('phone'))
                                   <div class="help-block">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('own_science_fair') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Does this school hold its own science fair? <span class="required">*</span></label>
                        <div class="col-md-5">
                            <div class="radio-list">
                                <label class="radio-inline">
                                    <input type="radio" name="own_science_fair" value="1" {{ ($school->own_science_fair == '1') ? 'checked' : '' }}> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="own_science_fair" value="0" {{ ($school->own_science_fair == '0') ? 'checked' : '' }}> No
                                </label>
                                @if ($errors->has('own_science_fair'))
                                <div class="help-block">{{ $errors->first('own_science_fair') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('school_participation_at_our_fair') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">How many years did this school participate at our fair? <span class="required">*</span></label>
                        <div class="col-md-5">
                            <div class="radio-list">
                                <label class="radio-inline">
                                    <input type="radio" name="school_participation_at_our_fair" value="0" {{ ($school->school_participation_at_our_fair == '0') ? 'checked' : '' }}> 0
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="school_participation_at_our_fair" value="1" {{ ($school->school_participation_at_our_fair == '1') ? 'checked' : '' }}> 1
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="school_participation_at_our_fair" value="2" {{ ($school->school_participation_at_our_fair == '2') ? 'checked' : '' }}> 2
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="school_participation_at_our_fair" value="3+" {{ ($school->school_participation_at_our_fair == '3+') ? 'checked' : '' }}> 3+
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="school_participation_at_our_fair" value="5+" {{ ($school->school_participation_at_our_fair == '5+') ? 'checked' : '' }}> 5+
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="school_participation_at_our_fair" value="10+" {{ ($school->school_participation_at_our_fair == '10+') ? 'checked' : '' }}> 10+
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="school_participation_at_our_fair" value="20+" {{ ($school->school_participation_at_our_fair == '20+') ? 'checked' : '' }}> 20+
                                </label>
                                @if ($errors->has('school_participation_at_our_fair'))
                                <div class="help-block">{{ $errors->first('school_participation_at_our_fair') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Status <span class="required">*</span></label>
                        <div class="col-md-5">
                            <div class="radio-list">
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="1" {{ ($school->status == '1') ? 'checked' : '' }}> Active
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="0" {{ ($school->status == '0') ? 'checked' : '' }}> Inactive
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
                            <a href="{{ Route('admin-school') }}" class="btn default">Back</a>
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