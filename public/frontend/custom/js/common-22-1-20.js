/* global notie, full_path, grecaptcha */
function ajaxindicatorstart() {
    if (jQuery('body').find('#resultLoading').attr('id') != 'resultLoading') {
        jQuery('body').append('<div id="resultLoading" style="display:none"><div><i style="font-size: 46px;color: #4179eb;" class="fa fa-spinner fa-spin fa-2x fa-fw" aria-hidden="true"></i></div><div class="bg"></div></div>');
    }
    jQuery('#resultLoading').css({
        'width': '100%',
        'height': '100%',
        'position': 'fixed',
        'z-index': '10000000',
        'top': '0',
        'left': '0',
        'right': '0',
        'bottom': '0',
        'margin': 'auto'
    });
    jQuery('#resultLoading .bg').css({
        'background': '#ffffff',
        'opacity': '0.8',
        'width': '100%',
        'height': '100%',
        'position': 'absolute',
        'top': '0'
    });
    jQuery('#resultLoading>div:first').css({
        'width': '250px',
        'height': '75px',
        'text-align': 'center',
        'position': 'fixed',
        'top': '0',
        'left': '0',
        'right': '0',
        'bottom': '0',
        'margin': 'auto',
        'font-size': '16px',
        'z-index': '10',
        'color': '#ffffff'
    });
    jQuery('#resultLoading .bg').height('100%');
    jQuery('#resultLoading').fadeIn(300);
    jQuery('body').css('cursor', 'wait');
}

function ajaxindicatorstop() {
    jQuery('#resultLoading .bg').height('100%');
    jQuery('#resultLoading').fadeOut(300);
    jQuery('body').css('cursor', 'default');
}

$(document).ready(function () {
    $(document).on('submit', '#teacher_registration_form', function (event) {
        event.preventDefault();
        ajaxindicatorstart();
        $('.help-block').html('').closest('.form-group').removeClass('has-error');
        var url = $(this).attr('action');
        var csrf_token = $('input[name=_token]').val();
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
                if (resp.status == "success")
                {
                    notie.alert({
                        type: 'success',
                        text: '<i class="fa fa-check"></i> ' + resp.msg,
                        time: 3
                    });
                    window.location.href = resp.link;
                } else {
                    console.log(resp);
                    $.each(resp.errors, function (key, val) {
                        $('#teacher_registration_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                        $('#teacher_registration_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                    });
                    window.scroll(0, 100)
                }
                ajaxindicatorstop();
            }
        });
    });

    $(document).on('submit', '#teacher_login_form', function (event) {
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
                window.location.href = resp.link;
                ajaxindicatorstop();
            },
            error: function (resp) {
                $.each(resp.responseJSON.errors, function (key, val) {
                    $('#teacher_login_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                    $('#teacher_login_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                });
                ajaxindicatorstop();
            }
        });
    });

    $(document).on('click', '#btn_verify_teacher_code', function (event) {
        event.preventDefault();
        ajaxindicatorstart();
        $('.help-block').html('').closest('.form-group').removeClass('has-error');
        var url = full_path + 'verify-teacher-given-code';
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var teacher_generated_code = $('input[name="teacher_generated_code"]').val();
        $.ajax({
            url: url,
            headers: {'X-CSRF-TOKEN': csrf_token},
            type: 'POST',
            dataType: 'json',
            //processData: false,
            //contentType: false,
            data: {event_id: current_event, teacher_generated_code: teacher_generated_code},
            success: function (resp) {
                if (resp.status && resp.status === 200) {
                    if (resp.teacher_id != '') {
                        $('input[name="teacher_id"]').val(resp.teacher_id);
                        $('#btn_verify_teacher_code').html('<i class="icofont-check"></i> Verify');
                        $('#student_registration_form_content').show();
                    }
                } else {
                    $.each(resp.errors, function (key, val) {
                        $('#student_registration_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val);
                        $('#student_registration_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                    });
                    $('#btn_verify_teacher_code').html('<i class="icofont-close"></i> Verify');
                }
                //window.location.href = resp.link;
                ajaxindicatorstop();
            },
            error: function (resp) {
                console.log('error');
                $.each(resp.responseJSON.errors, function (key, val) {
                    $('#student_registration_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                    $('#student_registration_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                });
                ajaxindicatorstop();
            }
        });
        return false;
    });

    $(document).on('submit', '#student_registration_form', function (event) {
        event.preventDefault();
        ajaxindicatorstart();
        $('.help-block').html('').closest('.form-group').removeClass('has-error');
        var url = $(this).attr('action');
        var csrf_token = $('input[name=_token]').val();
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
                if (resp.status == "success")
                {
                    notie.alert({
                        type: 'success',
                        text: '<i class="fa fa-check"></i> ' + resp.msg,
                        time: 3
                    });
                    window.location.href = resp.link;
                } else {
                    console.log(resp);
                    $.each(resp.errors, function (key, val) {
                        $('#student_registration_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                        $('#student_registration_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                    });
                }
                ajaxindicatorstop();
            },
            error: function (resp) {
                $.each(resp.responseJSON.errors, function (key, val) {
                    $('#student_registration_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                    $('#student_registration_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                });
                ajaxindicatorstop();
            }
        });
    });

    $(document).on('submit', '#student_login_form', function (event) {
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
                window.location.href = resp.link;
                ajaxindicatorstop();
            },
            error: function (resp) {
                $.each(resp.responseJSON.errors, function (key, val) {
                    $('#student_login_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                    $('#student_login_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                });
                ajaxindicatorstop();
            }
        });
    });
	
	$(document).on('submit', '#judge_registration_form', function (event) {
        event.preventDefault();
        ajaxindicatorstart();
        $('.help-block').html('').closest('.form-group').removeClass('has-error');
        var url = $(this).attr('action');
        var csrf_token = $('input[name=_token]').val();
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
                if (resp.status == "success")
                {
                    notie.alert({
                        type: 'success',
                        text: '<i class="fa fa-check"></i> ' + resp.msg,
                        time: 3
                    });
                    window.location.href = full_path;
                } else {
                    console.log(resp);
                    $.each(resp.errors, function (key, val) {
                        $('#judge_registration_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                        $('#judge_registration_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                    });
                }
                ajaxindicatorstop();
            },
            error: function (resp) {
                $.each(resp.responseJSON.errors, function (key, val) {
                    $('#judge_registration_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                    $('#judge_registration_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                });
                ajaxindicatorstop();
            }
        });
    });
	
	$(document).on('submit', '#volunteer_registration_form', function (event) {
        event.preventDefault();
        ajaxindicatorstart();
        $('.help-block').html('').closest('.form-group').removeClass('has-error');
				
        var url = $(this).attr('action');
        var csrf_token = $('input[name=_token]').val();
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
                if (resp.status == "success")
                {
                    notie.alert({
                        type: 'success',
                        text: '<i class="fa fa-check"></i> ' + resp.msg,
                        time: 3
                    });
                    window.location.href = full_path;
                } else {
                    console.log(resp);
                    $.each(resp.errors, function (key, val) {
                        $('#volunteer_registration_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                        $('#volunteer_registration_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
						if(key == 'positions'){
							$('#volunteer_registration_form').find('[name^="positions"]').closest('.form-group').find('.help-block').html(val[0]);
							$('#volunteer_registration_form').find('[name^="positions"]').closest('.form-group').addClass('has-error');
						}
                    });
                }
                ajaxindicatorstop();
            },
            error: function (resp) {
                $.each(resp.responseJSON.errors, function (key, val) {
                    $('#volunteer_registration_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                    $('#volunteer_registration_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
					if(key == 'positions'){
						$('#volunteer_registration_form').find('[name^="positions"]').closest('.form-group').find('.help-block').html(val[0]);
						$('#volunteer_registration_form').find('[name^="positions"]').closest('.form-group').addClass('has-error');
					}
                });
                ajaxindicatorstop();
            }
        });
    });
	
	$(document).on('submit', '#contact_us_form', function (event) {
        event.preventDefault();
        ajaxindicatorstart();
        $('.help-block').html('').closest('.form-group').removeClass('has-error');
        var url = $(this).attr('action');
        var csrf_token = $('input[name=_token]').val();
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
                if (resp.status == "success")
                {
                    notie.alert({
                        type: 'success',
                        text: '<i class="fa fa-check"></i> ' + resp.msg,
                        time: 3
                    });
                    window.location.href = resp.link;
                } else {
                    console.log(resp);
                    $.each(resp.errors, function (key, val) {
                        $('#contact_us_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val);
                        $('#contact_us_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                    });
                }
                ajaxindicatorstop();
            },
            error: function (resp) {
                $.each(resp.responseJSON.errors, function (key, val) {
                    $('#contact_us_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                    $('#contact_us_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                });
                ajaxindicatorstop();
            }
        });
    });
	
	$(document).on('submit', '#forgot_password_form', function (event) {
        event.preventDefault();
        ajaxindicatorstart();
        $('.help-block').html('').closest('.form-group').removeClass('has-error');
        var url = $(this).attr('action');
        var csrf_token = $('input[name=_token]').val();
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
                if (resp.status == "success")
                {
                    notie.alert({
                        type: 'success',
                        text: '<i class="fa fa-check"></i> ' + resp.msg,
                        time: 3
                    });
                    //window.location.href = resp.link;
					$('#forgot_password_form')[0].reset();
                } else {
                    $.each(resp.errors, function (key, val) {
                        $('#forgot_password_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                        $('#forgot_password_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                    });
                }
                ajaxindicatorstop();
            },
            error: function (resp) {
                $.each(resp.responseJSON.errors, function (key, val) {
                    $('#forgot_password_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                    $('#forgot_password_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                });
                ajaxindicatorstop();
            }
        });
    });
	
	$(document).on('submit', '#reset_password_form', function (event) {
        event.preventDefault();
        ajaxindicatorstart();
        $('.help-block').html('').closest('.form-group').removeClass('has-error');
        var url = $(this).attr('action');
        var csrf_token = $('input[name=_token]').val();
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
                if (resp.status == "success")
                {
                    notie.alert({
                        type: 'success',
                        text: '<i class="fa fa-check"></i> ' + resp.msg,
                        time: 3
                    });
                    //window.location.href = resp.link;
					$('#reset_password_form')[0].reset();
                } else {
                    $.each(resp.errors, function (key, val) {
                        $('#reset_password_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                        $('#reset_password_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                    });
                }
                ajaxindicatorstop();
            },
            error: function (resp) {
                $.each(resp.responseJSON.errors, function (key, val) {
                    $('#reset_password_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                    $('#reset_password_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                });
                ajaxindicatorstop();
            }
        });
    });

});

function get_school_name()
{
    ajaxindicatorstart();
    $.ajax({
        url: full_path + "get-school",
        type: 'get',
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (resp) {
            console.log(resp);
            if (resp.status == "success")
            {
                $("#school_name").html(resp.content);
            }
            ajaxindicatorstop();
        }
    });
}

function get_school_type()
{
    ajaxindicatorstart();
    $.ajax({
        url: full_path + "get-school-type",
        type: 'get',
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (resp) {
            console.log(resp);
            if (resp.status == "success")
            {
                $("#school_type").html(resp.content);
            }
            ajaxindicatorstop();
        }
    });
}

function get_all_state()
{
    ajaxindicatorstart();
    $.ajax({
        url: full_path + "get-all-state",
        type: 'get',
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (resp) {
            console.log(resp);
            if (resp.status == "success")
            {
                $("#all_state").html(resp.content);
            }
            ajaxindicatorstop();
        }
    });
}

function school_name_change(value)
{
    // alert(value);
    if (value == "not")
    {
        $("#school_form").show();
    } else {
        $("#school_form").hide();
    }
}