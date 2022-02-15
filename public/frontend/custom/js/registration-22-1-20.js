$(document).ready(function () {

    $(document).on('submit', '#broadcom_registration_form', function (event) {
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
                        $('#broadcom_registration_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                        $('#broadcom_registration_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                    });
                }
                ajaxindicatorstop();
            },
            error: function (resp) {
                $.each(resp.responseJSON.errors, function (key, val) {
                    $('#broadcom_registration_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                    $('#broadcom_registration_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                });
                ajaxindicatorstop();
            }
        });
    });

    $(document).on('submit', '#teacher_event_registration_form', function (event) {
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
                        $('#teacher_event_registration_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                        $('#teacher_event_registration_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                    });
                    if (key == 'isef_divisions') {
                        $('#teacher_event_registration_form').find('[name^="isef_divisions"]').closest('.form-group').find('.help-block').html(val[0]);
                        $('#teacher_event_registration_form').find('[name^="isef_divisions"]').closest('.form-group').addClass('has-error');
                    }
                    /*if(key == 'andromeda_broadcom_judging'){
                     $('#teacher_event_registration_form').find('[name^="andromeda_broadcom_judging"]').closest('.form-group').find('.help-block').html(val[0]);
                     $('#teacher_event_registration_form').find('[name^="andromeda_broadcom_judging"]').closest('.form-group').addClass('has-error');
                     }*/
                }
                ajaxindicatorstop();
            },
            error: function (resp) {
                $.each(resp.responseJSON.errors, function (key, val) {
                    $('#teacher_event_registration_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                    $('#teacher_event_registration_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                    if (key == 'isef_divisions') {
                        $('#teacher_event_registration_form').find('[name^="isef_divisions"]').closest('.form-group').find('.help-block').html(val[0]);
                        $('#teacher_event_registration_form').find('[name^="isef_divisions"]').closest('.form-group').addClass('has-error');
                    }
                    /*if(key == 'andromeda_broadcom_judging'){
                     $('#teacher_event_registration_form').find('[name^="andromeda_broadcom_judging"]').closest('.form-group').find('.help-block').html(val[0]);
                     $('#teacher_event_registration_form').find('[name^="andromeda_broadcom_judging"]').closest('.form-group').addClass('has-error');
                     }*/
                });
                ajaxindicatorstop();
            }
        });
    });

    $(document).on('submit', '#upload_isrf_form', function (event) {
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
                // ajaxindicatorstop();
                // return false;
                if (resp.status == "success")
                {
                    notie.alert({
                        type: 'success',
                        text: '<i class="fa fa-check"></i> ' + resp.msg,
                        time: 3
                    });
                    location.reload();
                } else {
                    $.each(resp.errors, function (key, val) {
                        var strArray = key.split(".");
                        /*for(var i = 0; i < strArray.length; i++){
                         document.write("<p>" + strArray[i] + "</p>");
                         }*/
                        if (strArray.length > 2) {
                            keyname = strArray[0] + '[' + strArray[1] + ']';
                        } else {
                            keyname = key.replace('.', '[');
                            keyname = keyname + ']';
                        }

                        if ($('[name="' + key + '"').length != 0) {
                            $('#upload_isrf_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                            $('#upload_isrf_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                        } else {
                            $('#upload_isrf_form').find('[name^="' + keyname + '"]').closest('.form-group').find('.help-block').html(val[0]);
                            $('#upload_isrf_form').find('[name^="' + keyname + '"]').closest('.form-group').addClass('has-error');
                        }
                    });
                }
                ajaxindicatorstop();
            },
            error: function (resp) {
                $.each(resp.responseJSON.errors, function (key, val) {
                    var strArray = key.split(".");
                    if (strArray.length > 2) {
                        keyname = strArray[0] + '[' + strArray[1] + ']';
                    } else {
                        keyname = key.replace('.', '[');
                        keyname = keyname + ']';
                    }
                    $('#upload_isrf_form').find('[name^="' + keyname + '"]').closest('.form-group').find('.help-block').html(val[0]);
                    $('#upload_isrf_form').find('[name^="' + keyname + '"]').closest('.form-group').addClass('has-error');
                });
                ajaxindicatorstop();
            }
        });
    });

});

