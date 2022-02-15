/* global notie, full_path, grecaptcha */
$(document).ready(function () {
    $('#students-management').DataTable({
        processing: false,
        serverSide: true,
        ajax: full_path + 'students-list-datatable',
        order: [[4, "asc"]],
        columns: [
            {data: 'DT_Row_Index', name: 'DT_Row_Index', searchable: false},
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
			{data: 'action', name: 'action', orderable: false, searchable: false}
        ],
    });
    var id = $('#online-registration-management').data('id');
    $('#online-registration-management').DataTable({
        processing: false,
        serverSide: true,
        ajax: full_path + 'get-online-registration-list/' + id,
        order: [[7, "desc"]],
        columns: [
            {data: 'DT_Row_Index', name: 'DT_Row_Index', searchable: false},
            {data: 'first_name', name: 'first_name'},
            {data: 'email', name: 'email'},
            {data: 'school_name', name: 'school_name'},
            {data: 'project_type', name: 'project_type'},
            {data: 'project_category', name: 'project_category'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
    $(document).on('submit', '#change-password-form', function (event) {
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
                if (resp.status == "success")
                {
                    notie.alert({
                        type: 'success',
                        text: '<i class="fa fa-check"></i> ' + resp.msg,
                        time: 3
                    });
                    location.reload();
                    // window.location.href = resp.link;
                } else {
                    $.each(resp.errors, function (key, val) {
                        $('#change-password-form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                        $('#change-password-form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                    });
                }
                ajaxindicatorstop();
            }
        })
    });
});

$(document).on('submit', '#manage_account_form', function (event) {
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
            if (resp.status == "success")
            {
                notie.alert({
                    type: 'success',
                    text: '<i class="fa fa-check"></i> ' + resp.msg,
                    time: 3
                });
                location.reload();
                // window.location.href = resp.link;
            } else {
                $.each(resp.errors, function (key, val) {
                    $('#manage_account_form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                    $('#manage_account_form').find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                });
            }
            ajaxindicatorstop();
        }
    });
});