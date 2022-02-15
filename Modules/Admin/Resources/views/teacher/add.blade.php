@extends('admin::layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('admin-teachers') }}">Teachers</a></li>
<li class="active">Add</li>
@stop

@section('css')
<link rel="stylesheet" href="{{ URL::asset('public/frontend/css/bootstrap-datepicker.css')}}" />
@endsection

@section('content')
<div class="users-update">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-edit font-green-haze" aria-hidden="true"></i>
                <span class="caption-subject font-green-haze bold uppercase">Add Teacher</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal form-row-seperated" action="{{ Route('admin-addteacher') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                <input type="hidden" name="event_id" value="{{(!empty($event))?$event->id:''}}">
                    <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Event Name :</label>
                        <div class="col-md-5">
                            <p>{{(!empty($event))?$event->event_title:""}}</p>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('school_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Type <span class="required">*</span></label>
                        <div class="col-md-5">
                            <select class="form-control" name="school_name">
                                <option value="" selected disabled>-------Select School-------</option>
                                @if(!empty($school))
                                @foreach($school as $key=>$value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                                @endif
                            </select>
                            @if ($errors->has('school_name'))
                            <div class="help-block">{{ $errors->first('school_name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">First Name <span class="required">*</span></label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="first_name" value="{{ (old('first_name') != "") ? old('first_name') : '' }}" placeholder="First Name">
                                   @if ($errors->has('first_name'))
                                   <div class="help-block">{{ $errors->first('first_name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Last Name <span class="required">*</span></label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="last_name" value="{{ (old('last_name') != "") ? old('last_name') : '' }}" placeholder="Last Name">
                                   @if ($errors->has('last_name'))
                                   <div class="help-block">{{ $errors->first('last_name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Email <span class="required">*</span></label>
                        <div class="col-md-5">
                            <input type="email" class="form-control" name="email" value="{{ (old('email') != "") ? old('email') : '' }}" placeholder="Email">
                                   @if ($errors->has('email'))
                                   <div class="help-block">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Phone</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="phone" value="{{ (old('phone') != "") ? old('phone') : '' }}" placeholder="Phone" >                            
                                   @if ($errors->has('phone'))
                                   <div class="help-block">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('participation_at_our_fair') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Teachers participate at our fair(yours)? <span class="required">*</span></label>
                        <div class="col-md-5">
                            <div class="radio-list">
                                <label class="radio-inline">
                                    <input type="radio" name="participation_at_our_fair" value="0" {{ (old('participation_at_our_fair') != "" && old('participation_at_our_fair')=='0') ? 'checked' : '' }}> 0
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="participation_at_our_fair" value="1" {{ (old('participation_at_our_fair') != "" && old('participation_at_our_fair')=='1') ? 'checked' : '' }}> 1
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="participation_at_our_fair" value="2" {{ (old('participation_at_our_fair') != "" && old('participation_at_our_fair')=='2') ? 'checked' : '' }}> 2
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="participation_at_our_fair" value="3+" {{ (old('participation_at_our_fair') != "" && old('participation_at_our_fair')=='3+') ? 'checked' : '' }}> 3+
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="participation_at_our_fair" value="5+" {{ (old('participation_at_our_fair') != "" && old('participation_at_our_fair')=='5+') ? 'checked' : '' }}> 5+
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="participation_at_our_fair" value="10+" {{ (old('participation_at_our_fair') != "" && old('participation_at_our_fair')=='10+') ? 'checked' : '' }}> 10+
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="participation_at_our_fair" value="20+" {{ (old('participation_at_our_fair') != "" && old('participation_at_our_fair')=='20+') ? 'checked' : '' }}> 20+
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
                                    <input type="radio" name="status" value="1" {{ (old('status') != "" && old('status')=='1') ? 'checked' : '' }}> Active
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="2" {{ (old('status') != "" && old('status')=='2') ? 'checked' : '' }}> Suspended
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
                            <a href="{{ Route('admin-teachers') }}" class="btn default">Back</a>
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
@endsection