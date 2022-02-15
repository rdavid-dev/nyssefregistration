$(document).ready(function () {

    $('#add-category-form').submit(function (event) {
        event.preventDefault();
        ajaxindicatorstart();
        $('.help-block').html('');
        var url = $(this).attr('action');
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

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
                if (resp.type == 'success') {
                    Lobibox.notify('success', {
                        continueDelayOnInactiveTab: false,
                        position: 'bottom right',
                        delayIndicator: false,
                        msg: resp.msg
                    });
                    setTimeout(function () {
                        window.location.href = resp.link;
                    }, 2000);

                } else {
                    $(this).addClass('was-validated');
                    $.each(resp.error, function (key, val) {
                        $(".err-" + key).html(val);
                    });
                }
                ajaxindicatorstop();
            }
        });
    });
    $('#edit-order-form').submit(function (event) {
        event.preventDefault();
        ajaxindicatorstart();
        $('.help-block').html('');
        var url = $(this).attr('action');
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
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
                if (resp.type == 1) {
                    Lobibox.notify('success', {
                        continueDelayOnInactiveTab: false,
                        position: 'bottom right',
                        delayIndicator: false,
                        msg: resp.msg
                    });
                    setTimeout(function () {
                        window.location.href = resp.link;
                    }, 2000);

                } else if (resp.type == 2) {
                    Lobibox.notify('error', {
                        continueDelayOnInactiveTab: false,
                        position: 'bottom right',
                        delayIndicator: false,
                        msg: resp.msg
                    });
                } else {
                    $(this).addClass('was-validated');
                    $.each(resp.error, function (key, val) {
                        $(".err_" + key).html(val);
                    });
                }
                ajaxindicatorstop();
            }
        });
    });
    $('#edit-wallet-form').submit(function (event) {
        event.preventDefault();
        ajaxindicatorstart();
        $('.help-block').html('');
        var url = $(this).attr('action');
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
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
                if (resp.type == 1) {
                    Lobibox.notify('success', {
                        continueDelayOnInactiveTab: false,
                        position: 'bottom right',
                        delayIndicator: false,
                        msg: resp.msg
                    });
                    setTimeout(function () {
                        window.location.href = resp.link;
                    }, 2000);

                } else if (resp.type == 2) {
                    Lobibox.notify('error', {
                        continueDelayOnInactiveTab: false,
                        position: 'bottom right',
                        delayIndicator: false,
                        msg: resp.msg
                    });
                } else {
                    $(this).addClass('was-validated');
                    $.each(resp.error, function (key, val) {
                        $(".err_" + key).html(val);
                    });
                }
                ajaxindicatorstop();
            }
        });
    });
    $('#add-coupon-form').submit(function (event) {
        event.preventDefault();
        ajaxindicatorstart();
        $('.help-block').html('');
        var url = $(this).attr('action');
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
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
                if (resp.type == 'success') {
                    Lobibox.notify('success', {
                        continueDelayOnInactiveTab: false,
                        position: 'bottom right',
                        delayIndicator: false,
                        msg: resp.msg
                    });
                    setTimeout(function () {
                        window.location.href = resp.link;
                    }, 2000);

                } else {
                    $.each(resp.error, function (key, val) {
                        $('#add-coupon-form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val);
                    });
                }
                ajaxindicatorstop();
            }
        })
    });
    $('#edit-subscriber-form').submit(function (event) {
        event.preventDefault();
        ajaxindicatorstart();
        $('.help-block').html('');
        var url = $(this).attr('action');
        var csrf_token = $('input[name="csrf-token"]').val();
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
                if (resp.status === 200) {
                    Lobibox.notify('success', {
                        continueDelayOnInactiveTab: false,
                        position: 'bottom right',
                        delayIndicator: false,
                        msg: resp.msg
                    });
                    setTimeout(function () {
                        window.location.href = resp.link;
                    }, 2000);

                } else {
                    $.each(resp.errors, function (key, val) {
                        $('#edit-subscriber-form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val);
                    });
                }
                ajaxindicatorstop();
            }
        })
    });

    $('#add-blogcategory-form').submit(function (event) {
        event.preventDefault();
        ajaxindicatorstart();
        $('.help-block').html('');
        var url = $(this).attr('action');
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

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
                if (resp.type == 'success') {
                    Lobibox.notify('success', {
                        continueDelayOnInactiveTab: false,
                        position: 'bottom right',
                        delayIndicator: false,
                        msg: resp.msg
                    });
                    setTimeout(function () {
                        window.location.href = resp.link;
                    }, 2000);

                } else {
                    $(this).addClass('was-validated');
                    $.each(resp.error, function (key, val) {
                        $(".err-" + key).html(val);
                    });
                }
                ajaxindicatorstop();
            }
        });
    });

    $('#add-blog-form').submit(function (event) {
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
                Lobibox.notify('success', {
                    continueDelayOnInactiveTab: false,
                    position: 'bottom right',
                    delayIndicator: false,
                    msg: resp.msg
                });

                setTimeout(function () {
                    window.location.href = resp.link;
                }, 2000);
                ajaxindicatorstop();
            },
            error: function (resp) {
                $.each(resp.responseJSON.errors, function (key, val) {
                    $("#add-blog-form").find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                    $("#add-blog-form").find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                });
                ajaxindicatorstop();
            }
        });
    });
    $('#add-shop-form').submit(function (event) {
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
                Lobibox.notify('success', {
                    continueDelayOnInactiveTab: false,
                    position: 'bottom right',
                    delayIndicator: false,
                    msg: resp.msg
                });

                setTimeout(function () {
                    window.location.href = resp.link;
                }, 2000);
                ajaxindicatorstop();
            },
            error: function (resp) {
                $.each(resp.responseJSON.errors, function (key, val) {
                    $("#add-shop-form").find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val[0]);
                    $("#add-shop-form").find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                });
                ajaxindicatorstop();
            }
        });
    });

    $('#shop-management').DataTable({
        processing: false,
        serverSide: true,
        ajax: full_path + 'admin-shop',
        order: [[4, "desc"]],
        columns: [
            {data: 'id', name: 'id'},
            {data: 'shop_image', name: 'shop_image'},
            {data: 'first_name', name: 'first_name'},
            {data: 'shop_name', name: 'shop_name'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
    $('#order-management').DataTable({
        processing: false,
        serverSide: true,
        ajax: full_path + 'order',
        order: [[7, "desc"]],
        columns: [
            {data: 'id', name: 'id'},
            {data: 'first_name', name: 'first_name'},
            {data: 'title', name: 'title'},
            {data: 'item_price', name: 'item_price'},
            {data: 'quantity', name: 'quantity'},
            {data: 'status', name: 'status'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
    $('#wallet-management').DataTable({
        processing: false,
        serverSide: true,
        ajax: full_path + 'wallet',
        order: [[1, "desc"]],
        columns: [
            {data: 'id', name: 'id'},
            {data: 'user_id', name: 'user_id'},
            {data: 'amount', name: 'amount'},
            {data: 'created_at', name: 'created_at'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
    $('#cancelorderrequest-management').DataTable({
        processing: false,
        serverSide: true,
        ajax: full_path + 'cancel-order-request',
        order: [[7, "desc"]],
        columns: [
            {data: 'id', name: 'id'},
            {data: 'first_name', name: 'first_name'},
            {data: 'order_id', name: 'order_id'},
            {data: 'item_price', name: 'item_price'},
            {data: 'quantity', name: 'quantity'},
            {data: 'status', name: 'status'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
    $('#blogcategories-management').DataTable({
        processing: false,
        serverSide: true,
        ajax: full_path + 'admin-blogcategories-list-datatable',
        order: [[3, "desc"]],
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'status', name: 'status', render: function (data, type, row) {
                    if (data == '0') {
                        return '<span class="label label-sm label-warning">Inactive</span>';
                    } else if (data == '1') {
                        return '<span class="label label-sm label-success">Active</span>';
                    } else if (data == '3') {
                        return '<span class="label label-sm label-danger">Delete</span>';
                    } else {
                        return '';
                    }
                }
            },
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
    $('#blogs-management').DataTable({
        processing: false,
        serverSide: true,
        ajax: full_path + 'adminblog',
        order: [[4, "desc"]],
        columns: [
            {data: 'id', name: 'id'},
            {data: 'image', name: 'image'},
            {data: 'title', name: 'title'},
            {data: 'status', name: 'status', render: function (data, type, row) {
                    if (data == '0') {
                        return '<span class="label label-sm label-warning">Inactive</span>';
                    } else if (data == '1') {
                        return '<span class="label label-sm label-success">Active</span>';
                    } else if (data == '3') {
                        return '<span class="label label-sm label-danger">Delete</span>';
                    } else {
                        return '';
                    }
                }
            },
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
    $('#subscribers-management').DataTable({
        processing: false,
        serverSide: true,
        ajax: full_path + 'subscriber',
        order: [[4, "desc"]],
        columns: [
            {data: 'id', name: 'id'},
            {data: 'email', name: 'email'},
            {data: 'status', name: 'status', render: function (data, type, row) {
                    if (data == '0') {
                        return '<span class="label label-sm label-warning">Inactive</span>';
                    } else if (data == '1') {
                        return '<span class="label label-sm label-success">Active</span>';
                    } else if (data == '3') {
                        return '<span class="label label-sm label-danger">Delete</span>';
                    } else {
                        return '';
                    }
                }
            },
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

    $(document).on('change', '.toggle-switch', function (e) {
        ajaxindicatorstart();
        var id = $(this).data('id');
        var status = $(this).prop('checked');
        $.ajax({
            url: full_path + 'admin-showcategoryfront',
            type: 'GET',
            dataType: 'json',
            data: {status: status, id: id},
            success: function (resp) {
                if (resp.status === 200) {
                    $(this).prop('checked', status);
                    Lobibox.notify('success', {
                        continueDelayOnInactiveTab: false,
                        position: 'bottom right',
                        delayIndicator: false,
                        msg: resp.msg
                    });
                } else {
                    $(e.target).prop('checked', false);
                    Lobibox.notify('error', {
                        continueDelayOnInactiveTab: false,
                        position: 'bottom right',
                        delayIndicator: false,
                        msg: resp.msg
                    });
                }
                ajaxindicatorstop();
            }
        });
    });

    $(document).on('change', '#category', function () {
        var product_id = $(this).data('product_id');
        $.get(full_path + 'admin-subcategory-list', {category_id: $(this).val(), product_id: product_id}, function (resp) {
            $('.sub_category_render').html(resp.html);
        }, 'json');
    });

    $('#shop-update-form').submit(function (event) {
        event.preventDefault();
        ajaxindicatorstart();
        $('.help-block').html('');
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
                if (resp.type == 'success') {
                    Lobibox.notify('success', {
                        continueDelayOnInactiveTab: false,
                        position: 'bottom right',
                        delayIndicator: false,
                        msg: resp.msg
                    });
                    setTimeout(function () {
                        window.location = resp.link;
                    }, 3000);
                } else if (resp.type == 'failure') {
                    $.each(resp.error, function (key, val) {
                        $('#shop-update-form').find('[name="' + key + '"]').closest('.form-group').find('.help-block').html(val);
                    });
                } else {

                }
                ajaxindicatorstop();
            }
        });
    });
});

function deleteBlogCategory(obj) {
    $.confirm({
        title: 'Delete Blog Category',
        content: 'Are you sure to delete this blog category?',
        type: 'red',
        typeAnimated: true,
        buttons: {
            confirm: {
                text: '<i class="fa fa-check" aria-hidden="true"></i> Confirm',
                btnClass: 'btn-red',
                action: function () {
                    window.location.href = $(obj).attr('data-href');
                }
            },
            cancel: function () {}
        }
    });
}

function deleteSubscriber(obj) {
    $.confirm({
        title: 'Delete Subscriber',
        content: 'Are you sure to delete this Subscriber?',
        type: 'red',
        typeAnimated: true,
        buttons: {
            confirm: {
                text: '<i class="fa fa-check" aria-hidden="true"></i> Confirm',
                btnClass: 'btn-red',
                action: function () {
                    window.location.href = $(obj).attr('data-href');
                }
            },
            cancel: function () {}
        }
    });
}
function deleteCategory(obj) {
    $.confirm({
        title: 'Delete Category',
        content: 'Are you sure to delete this category?',
        type: 'red',
        typeAnimated: true,
        buttons: {
            confirm: {
                text: '<i class="fa fa-check" aria-hidden="true"></i> Confirm',
                btnClass: 'btn-red',
                action: function () {
                    window.location.href = $(obj).attr('data-href');
                }
            },
            cancel: function () {}
        }
    });
}

