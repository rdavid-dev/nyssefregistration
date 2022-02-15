@extends('admin::layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('admin-events') }}">Events</a></li>
<li> <a href="{{ Route('admin-listschedule',['id' => $event->id]) }}">Schedules</a></li>
<li class="active">Update Schedule</li>
@stop
@section('css')
<link rel="stylesheet" href="{{ URL::asset('public/frontend/css/datepicker.css')}}" />
<link rel="stylesheet" href="{{ URL::asset('public/backend/css/mdtimepicker.css')}}" />
@endsection
@section('content')
<div class = "alert alert-danger" id='error' style="display:none;">
    <ul id='errordata'>
    </ul>
</div>
<div class="users-update">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-edit font-green-haze" aria-hidden="true"></i>
                <span class="caption-subject font-green-haze bold uppercase">Add Schedule</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal form-row-seperated" action="{{ Route('admin-updateschedule', ['id' => $event->id]) }}" onsubmit="return validationform();" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{($schedules!='')?$schedules->id:''}}">
                <div class="form-body">
                    <div class="form-group ">
                        <label class="col-md-4 control-label">Event Name<span class="required">*</span></label>
                        <div class="col-md-5">
                            <p>{{$event->event_title}}</p>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('scheduled_date') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Schedule Date<span class="required">*</span></label>
                        <div class="col-md-5">
                            <input type="text" class="form-control datepicker" id="scheduled_date" name="scheduled_date" value="{{($schedules!='')?date('m/d/Y', strtotime($schedules->scheduled_date)):''}}" placeholder="Schedule Date" autocomplete="off">                            
                         @if ($errors->has('scheduled_date'))
                                   <div class="help-block">{{ $errors->first('scheduled_date') }}</div>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div id="answerview">
                    @php
                        if($schedules!='')
                        {
                            $schedule=unserialize($schedules->schedules);
                        }
                    @endphp
                    @if($schedules!='')
                    @foreach($schedule['start_time'] as $key=>$value)
                    <div class="form-group" id="html{{$key+1}}">
                        <div class="col-lg-3">
                            <label class="col-lg-12">Start Time<span class="required">*</span></label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control timepicker" value="{{$value}}" name="start_time[]" placeholder="Start Time" autocomplete="off">                            
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label class="col-lg-12">End Time<span class="required">*</span></label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control timepicker" value="{{$schedule['end_time'][$key]}}" name="end_time[]" placeholder="Start Time" autocomplete="off">                            
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="col-lg-12">description<span class="required">*</span></label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="description[]" value="{{$schedule['description'][$key]}}" placeholder="description" autocomplete="off">                            
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label class="col-lg-12"></label>
                            <div class="col-lg-12" id="add_button{{$key+1}}">
                            @if($key==(count($schedule['start_time'])-1))
                                <a class="btn btn-success" href="javascript:void(0)" onclick="add_more()"><i class="fa fa-plus">Add More</i></a>
                            @else
                            <a class="btn btn-danger" href="javascript:void(0)" onclick="remove({{$key+1}})"><i class="fa fa-minus">Remove</i></a>
                            @endif                           
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="form-group" id="html1">
                        <div class="col-lg-3">
                            <label class="col-lg-12">Start Time<span class="required">*</span></label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control timepicker" name="start_time[]" placeholder="Start Time" autocomplete="off">                            
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label class="col-lg-12">End Time<span class="required">*</span></label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control timepicker" name="end_time[]" placeholder="Start Time" autocomplete="off">                            
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="col-lg-12">description<span class="required">*</span></label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="description[]" placeholder="description" autocomplete="off">                            
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label class="col-lg-12"></label>
                            <div class="col-lg-12" id="add_button1">
                                <a class="btn btn-success" href="javascript:void(0)" onclick="add_more()"><i class="fa fa-plus">Add More</i></a>                  
                            </div>
                        </div>
                    </div>
                    @endif
                    </div>
                    <hr>
                    <div class="form-group {{ $errors->has('event_judge_schedule') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Judge Schedule of Events <span class="required">*</span></label>
                        <div class="col-md-8">
                            <textarea class="form-control ckeditor" id="event_judge_schedule" name="event_judge_schedule" placeholder="event_judge_schedule">{{ (old('event_judge_schedule') != "") ? old('event_judge_schedule') : $schedules->event_judge_schedule }}</textarea>
                            @if ($errors->has('event_judge_schedule'))
                            <div class="help-block">{{ $errors->first('event_judge_schedule') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Status <span class="required">*</span></label>
                        <div class="col-md-5">
                            <div class="radio-list">
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="1" {{ ($schedules->status=="1") ? 'checked' : '' }}> Active
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="0" {{ ($schedules->status=="0") ? 'checked' : '' }}> Inactive
                                </label>
                                @if ($errors->has('status'))
                                <div class="help-block">{{ $errors->first('status') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-5 col-md-6">
                            <button type="submit" class="btn green">Submit</button>
                            <a href="{{ Route('admin-listschedule',['id' => $event->id]) }}" class="btn default">Back</a>
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
<script type="text/javascript" src="{{ URL::asset('public/backend/js/mdtimepicker.js') }}"></script>
<script>
    $(".datepicker").datepicker({
        format: 'mm/dd/yyyy',
        autoclose: true,
        todayHighlight: true
    });
    $('.timepicker').mdtimepicker();
</script>
<script>
@if(!empty($schedule))
var x={{count($schedule['start_time'])}}
@else
var x=1;
@endif
function add_more()
{
    var htmldesign='';
    htmldesign+='<div class="form-group" id="html'+(x+1)+'">';
    htmldesign+='<div class="col-lg-3">';
    htmldesign+='<label class="col-lg-12">Start Time<span class="required">*</span></label>';
    htmldesign+='<div class="col-lg-12">';
    htmldesign+='<input type="text" class="form-control timepicker" name="start_time[]" placeholder="Start Time" autocomplete="off">';                        
    htmldesign+='</div>';
    htmldesign+='</div>';
    htmldesign+='<div class="col-lg-3">';
    htmldesign+='<label class="col-lg-12">End Time<span class="required">*</span></label>';
    htmldesign+='<div class="col-lg-12">';
    htmldesign+='<input type="text" class="form-control timepicker" name="end_time[]" placeholder="End Time" autocomplete="off">';                        
    htmldesign+='</div>';
    htmldesign+='</div>';
    htmldesign+='<div class="col-lg-4">';
    htmldesign+='<label class="col-lg-12">description<span class="required">*</span></label>';
    htmldesign+='<div class="col-lg-12">';
    htmldesign+='<input type="text" class="form-control" name="description[]" placeholder="description" autocomplete="off">';                         
    htmldesign+='</div>';
    htmldesign+='</div>';
    htmldesign+='<div class="col-lg-2">';
    htmldesign+='<label class="col-lg-12"></label>';
    htmldesign+='<div class="col-lg-12" id="add_button'+(x+1)+'">';
    htmldesign+='<a class="btn btn-success" href="javascript:void(0)" onclick="add_more()"><i class="fa fa-plus">Add More</i></a>';                        
    htmldesign+='</div>';
    htmldesign+='</div>';
    htmldesign+='</div>';

    $("#answerview").append(htmldesign);
    $("#add_button"+x).html('<a class="btn btn-danger" href="javascript:void(0)" onclick="remove('+x+')"><i class="fa fa-minus">Remove</i></a>');
    x++;
    $('.timepicker').mdtimepicker();
}
function remove(value)
{
    	
$( "div" ).remove( "#html"+value );
    // x--;
}

function validationform()
{
    var scheduled_date=$("#scheduled_date").val();
    var judge_schedule_event=$("#event_judge_schedule").val();
    var error='';
    if(scheduled_date=="")
    {
        error+='<li>Schedule Date is requried</li>';
    }
    $('input[name="start_time[]"]').each(function(index){
        var start_time=$(this).val();
        if(start_time=="")
        {
            error+='<li>Start time'+(index+1)+' is requried</li>';
        }
    });
    $('input[name="end_time[]"]').each(function(index){
        var end_time=$(this).val();
        if(end_time=="")
        {
            error+='<li>End time'+(index+1)+' is requried</li>';
        }
    });
    $('input[name="description[]"]').each(function(index){
        var description=$(this).val();
        if(description=="")
        {
            error+='<li>description'+(index+1)+' is requried</li>';
        }
    });
    if(judge_schedule_event=="")
    {
        error+='<li>Judge schedule of event is requried</li>';
    }
    var radioValue = $("input[name='status']:checked").val();
    console.log(radioValue);
    if(radioValue==undefined)
    {
        error+='<li>Status is requried</li>';
    }
    if(error!="")
    {
        $("#errordata").html(error);
        $("#error").show();
        window.scrollTo(0, 0);
        return false;
    }
    $("#error").hide();
}
</script>
@endsection