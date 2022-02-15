@extends('admin::layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('admin-events') }}">Events</a></li>
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
                <span class="caption-subject font-green-haze bold uppercase">Update Event</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal form-row-seperated" action="{{ Route('admin-updateevent', ['id' => $model->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="form-group {{ $errors->has('event_title') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Event Title <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="event_title" value="{{ (old('event_title') != "") ? old('event_title') : $model->event_title }}" placeholder="Event Title">
                                   @if ($errors->has('event_title'))
                                   <div class="help-block">{{ $errors->first('event_title') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('start_date') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Start Date </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control datepicker" name="start_date" value="{{ (($model->event_start_date)?date('m/d/Y', strtotime($model->event_start_date)):'') }}" placeholder="Start Date" autocomplete="off">
                                   @if ($errors->has('start_date'))
                                   <div class="help-block">{{ $errors->first('start_date') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('end_date') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">End Date </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control datepicker" name="end_date" value="{{ (($model->event_end_date)?date('m/d/Y', strtotime($model->event_end_date)):'')}}" placeholder="End Date" autocomplete="off">
                                   @if ($errors->has('end_date'))
                                   <div class="help-block">{{ $errors->first('end_date') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('address_line1') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Address Line1 <span class="required">*</span></label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="address_line1" >{{ (old('address_line1') != "") ? old('address_line1') : $model->address_line1 }}</textarea>
                                   @if ($errors->has('address_line1'))
                                   <div class="help-block">{{ $errors->first('address_line1') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('address_line2') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Address Line2 <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="address_line2" value="{{ (old('address_line2') != "") ? old('address_line2') : $model->address_line2 }}" placeholder="Address Line2">
                                   @if ($errors->has('address_line2'))
                                   <div class="help-block">{{ $errors->first('address_line2') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">City <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="city" value="{{ (old('city') != "") ? old('city') : $model->city }}" placeholder="City">
                                   @if ($errors->has('city'))
                                   <div class="help-block">{{ $errors->first('city') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">State <span class="required">*</span></label>
                        <div class="col-md-8">
                        <select class="form-control" name="state">
                                <option value="" selected disabled>Select State</option>
                                    @foreach($state as $key=>$value)
                                    <option value="{{$value->code}}" {{ ($value->code == $model->state) ? "Selected" : "" }}>{{$value->name}}</option>
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
                            <input type="text" class="form-control" name="zipcode" value="{{ (old('zipcode') != "") ? old('zipcode') : $model->zipcode }}" placeholder="Zip Code">
                                   @if ($errors->has('zipcode'))
                                   <div class="help-block">{{ $errors->first('zipcode') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('latitude') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Latitude <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="latitude" value="{{ (old('latitude') != "") ? old('latitude') : $model->latitude }}" placeholder="Latitude">
                                   @if ($errors->has('latitude'))
                                   <div class="help-block">{{ $errors->first('latitude') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('longitude') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Longitude <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="longitude" value="{{ (old('longitude') != "") ? old('longitude') : $model->longitude }}" placeholder="Longitude">
                                   @if ($errors->has('longitude'))
                                   <div class="help-block">{{ $errors->first('longitude') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('is_map_show') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Is Map Show <span class="required">*</span></label>
                        <div class="col-md-8">
                            <div class="radio-list">
                                <label class="radio-inline">
                                    <input type="radio" name="is_map_show" value="1" {{ ($model->is_map_show == '1') ? 'checked' : '' }}> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_map_show" value="0" {{ ($model->is_map_show == '0') ? 'checked' : '' }}> No
                                </label>
                                @if ($errors->has('is_map_show'))
                                <div class="help-block">{{ $errors->first('is_map_show') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('second_event_title') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Second Event Title <span class="required">*</span></label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="second_event_title" placeholder="Second Event Title">{{ (old('second_event_title') != "") ? old('second_event_title') : $model->second_event_title }}</textarea>
                            @if ($errors->has('second_event_title'))
                            <div class="help-block">{{ $errors->first('second_event_title') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('second_event_address') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Second Event Address <span class="required">*</span></label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="second_event_address" placeholder="Second Event Address">{{ (old('second_event_address') != "") ? old('second_event_address') : $model->second_event_address }}</textarea>
                            @if ($errors->has('second_event_address'))
                            <div class="help-block">{{ $errors->first('second_event_address') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('is_second_event_show') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Is Second Event Show <span class="required">*</span></label>
                        <div class="col-md-8">
                            <div class="radio-list">
                                <label class="radio-inline">
                                    <input type="radio" name="is_second_event_show" value="1" {{ ($model->is_second_event_show == '1') ? 'checked' : '' }}> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_second_event_show" value="0" {{ ($model->is_second_event_show == '0') ? 'checked' : '' }}> No
                                </label>
                                @if ($errors->has('is_second_event_show'))
                                <div class="help-block">{{ $errors->first('is_second_event_show') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('facebook_link') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Facebook Link <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="facebook_link" value="{{ (old('facebook_link') != "") ? old('facebook_link') : $model->facebook_link }}" placeholder="Facebook Link">
                                   @if ($errors->has('facebook_link'))
                                   <div class="help-block">{{ $errors->first('facebook_link') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('parking_notes') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Parking Notes <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="parking_notes" value="{{ (old('parking_notes') != "") ? old('parking_notes') : $model->parking_notes }}" placeholder="Parking Notes">
                                   @if ($errors->has('parking_notes'))
                                   <div class="help-block">{{ $errors->first('parking_notes') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('division_categories') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Division Categories <span class="required">*</span></label>
                        <div class="col-md-8">
                            <textarea class="form-control ckeditor" name="division_categories" placeholder="division_categories">{{ (old('division_categories') != "") ? old('division_categories') : $model->division_categories }}</textarea>
                            @if ($errors->has('division_categories'))
                            <div class="help-block">{{ $errors->first('division_categories') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('event_judge_schedule') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Judge Schedule of Events <span class="required">*</span></label>
                        <div class="col-md-8">
                            <textarea class="form-control ckeditor" id="event_judge_schedule" name="event_judge_schedule" placeholder="event_judge_schedule">{{ (old('event_judge_schedule') != "") ? old('event_judge_schedule') : $model->event_judge_schedule }}</textarea>
                            @if ($errors->has('event_judge_schedule'))
                            <div class="help-block">{{ $errors->first('event_judge_schedule') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('event_guideline_file') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Event Guideline File</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" name="event_guideline_file">
                            @if ($errors->has('event_guideline_file'))
                            <div class="help-block">{{ $errors->first('event_guideline_file') }}</div>
                            @endif
                        </div>
                        <div class="col-md-2">
                            @php
                                if(isset($model->event_guideline_file) && $model->event_guideline_file!="")
                                {
                            @endphp
                                    <a class="btn btn-success" href="{{URL::asset('public/uploads/admin/event_guideline_file/' . $model->event_guideline_file)}}" Download>Download</a>
                            @php
                                }
                            @endphp
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Status <span class="required">*</span></label>
                        <div class="col-md-8">
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
                            <button type="submit" class="btn green">Update</button>
                            <a href="{{ Route('admin-events') }}" class="btn default">Back</a>
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