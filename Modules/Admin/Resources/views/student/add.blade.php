@extends('admin::layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('admin-students') }}">Students</a></li>
<li class="active">Add</li>
@stop



@section('content')
<div class="users-update">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-edit font-green-haze" aria-hidden="true"></i>
                <span class="caption-subject font-green-haze bold uppercase">Add Students</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal form-row-seperated" id="student_registration_form" action="{{ Route('admin-addstudent') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                <input type="hidden" name="teacher_id" id="teacher_id">
                <input type="hidden" name="event_id" id="event_id">
                    <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Teacher Generated Code :</label>
                        <div class="col-md-5">
                            <input Type="text" name="code" id="code" class="form-control" autocomplete="off">
                            <span class="help-block"></span>
                        </div>
                        <div class="col-md-2">
                        <a href="javascript:void(0)" onclick="verify_code()" class="btn green">Verify</a>
                        </div>
                    </div>
                    <div id="student_form" style="display:none;">
                    <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Teacher Name:</label>
                        <div class="col-md-5">
                            <p id="teacher_name"></p>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">First Name <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="first_name" value="{{ (old('first_name') != "") ? old('first_name') : '' }}" placeholder="First Name">
                           
                                   <div class="help-block"></div>
                           
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Last Name <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="last_name" value="{{ (old('last_name') != "") ? old('last_name') : '' }}" placeholder="Last Name">
                           
                                   <div class="help-block"></div>
                          
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Email <span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" name="email" value="{{ (old('email') != "") ? old('email') : '' }}" placeholder="Email">
                           
                                   <div class="help-block"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Phone<span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="phone" value="{{ (old('phone') != "") ? old('phone') : '' }}" placeholder="Phone" >                            
                            
                                   <div class="help-block"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Status <span class="required">*</span></label>
                        <div class="col-md-5">
                            <div class="radio-list">
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="1" {{ (old('status') != "" && old('status')=='1') ? 'checked' : '' }}> Active
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="0" {{ (old('status') != "" && old('status')=='0') ? 'checked' : '' }}> InActive
                                </label>
                               
                                <div class="help-block"></div>
                              
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="form-actions" style="display:none;">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <button type="submit" id="student_form_submit" class="btn green">Submit</button>
                            <a href="{{ Route('admin-students') }}" class="btn default">Back</a>
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
<script>
function verify_code()
{
    ajaxindicatorstart();
    var code=$("#code").val();
    // alert(code);
    $('.help-block').html('').closest('.form-group').removeClass('has-error');
    var csrf_token = $('input[name=_token]').val();
    var formData = new FormData();
    formData.append('code', code);
    $.ajax({
        url: "{{route('check-teacher-code-verify')}}",
        headers: {'X-CSRF-TOKEN': csrf_token},
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        data: formData,
        success: function (resp) {
            console.log(resp);
            if(resp.status=="success")
            {
                $("#student_form").show();
                $(".form-actions").show();
                $("#teacher_name").html(resp.user.first_name+" "+resp.user.last_name);
                $("#teacher_id").val(resp.user.id);
                $("#event_id").val(resp.user.event_id);
            }else if(resp.status=="error"){
                $("#student_form").hide();
                $(".form-actions").hide();
                $('#student_registration_form').find('[name="code"]').closest('.form-group').find('.help-block').html(resp.msg);
                $('#student_registration_form').find('[name="code"]').closest('.form-group').addClass('has-error');
            }
            else{
                // console.log(resp.errors.code[0]);
                $("#student_form").hide();
                $(".form-actions").hide();
                $('#student_registration_form').find('[name="code"]').closest('.form-group').find('.help-block').html(resp.errors.code[0]);
                $('#student_registration_form').find('[name="code"]').closest('.form-group').addClass('has-error');
                
                window.scroll(0,0)
            }
                ajaxindicatorstop();
        }
    });
}

$(document).on('submit', '#student_registration_form', function (event) {
    event.preventDefault();
    ajaxindicatorstart();
    $('.help-block').html('').closest('.form-group').removeClass('has-error');
    var url = $(this).attr('action');
    var csrf_token = $('input[name="csrf-token"]').attr('content');
    var data = new FormData($(this)[0]);
    $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': csrf_token},
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        data: data,
        success: function (resp) {
            console.log(resp);
            if(resp.status=="success")
            {
                window.location.href = resp.link;
                ajaxindicatorstop();
            }else{
                $.each(resp.errors, function (key, val) {
                    $('#student_registration_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                    $('#student_registration_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                });
                ajaxindicatorstop();
            }
            // $('#signinModal').modal('hide');
            // window.location.href = resp.link;
        }
    })
});
</script>
@endsection