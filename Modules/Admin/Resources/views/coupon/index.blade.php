@extends('admin::layouts.main')

@section('page_css')
<style>
    .table>thead:first-child>tr:first-child>th {
        vertical-align: middle;
        text-align: center;
    }
    .table>tbody>tr>td {
        vertical-align: middle;
        text-align: center;
    }
    .dataTables_filter input {
        height: 34px;
        padding: 6px 12px;
        border: 1px solid #c2cad8;
    }
</style>
@endsection
@section('breadcrumb')
<li>
    <span class="active">Coupons</span>
</li>
@stop

@section('content')


<div class="portlet box blue-hoki">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer"></i>
            Coupons
        </div>
        <div class="pull-right"><a href="{{route('admin-addcoupon')}}" class="btn btn-success" style="position: relative; top: 3px;"><i class="fa fa-plus"></i> Add New</a></div>
    </div>
    <div class="portlet-body ">
        <div class="clearfix">
            <div class="table-scrollable" style="border: none;">
                <table class="ui celled table table-bordered" cellspacing="0" width="100%" id="coupons-management">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Coupon Code</th>
                            <th>Discount</th>
                            <th>Accept</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th style="width: 220px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')

<script>
    $(function () {
        $('#coupons-management').DataTable({
            processing: false,
            serverSide: true,
            ajax: '{{ Route("admin-coupons-list-datatable") }}',
            order: [[2, "desc"]],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'coupon_code', name: 'coupon_code'},
                {data: 'discount', name: 'discount'},
                {data: 'accept', name: 'accept', render: function (data, type, row) {
                        if (data === '1') {
                            return '<span class="label label-sm label-success">Once</span>';
                        } else if (data === '2') {
                            return '<span class="label label-sm label-warning">More than one</span>';
                        } else {
                            return '';
                        }
                    }
                },
                {data: 'status', name: 'status', render: function (data, type, row) {
                        if (data === '0') {
                            return '<span class="label label-sm label-warning">Inactive</span>';
                        } else if (data === '1') {
                            return '<span class="label label-sm label-success">Active</span>';
                        } else if (data === '3') {
                            return '<span class="label label-sm label-danger">Delete</span>';
                        } else {
                            return '';
                        }
                    }
                },
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            /*drawCallback: function () {
             $('[data-toggle=confirmation]').confirmation({
             rootSelector: '[data-toggle=confirmation]',
             container: 'body'
             });
             }*/
        });
    });
    function deleteCoupon(obj) {
        $.confirm({
            title: 'Delete Coupon',
            content: 'Are you sure to delete this coupon?',
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
</script>
@stop