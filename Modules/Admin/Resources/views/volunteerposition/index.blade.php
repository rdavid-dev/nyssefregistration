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
    <span class="active">Volunteer Position</span>
</li>
@stop

@section('content')


<div class="portlet box blue-hoki">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer"></i>
            Volunteer Position
        </div>
        <div class="pull-right"><a href="{{route('admin-addvolunteerposition')}}" class="btn btn-success" style="position: relative; top: 3px;"><i class="fa fa-plus"></i> Add New</a></div>
    </div>
    <div class="portlet-body ">
        <div class="clearfix">
            <div class="table-scrollable" style="border: none;">
                <table class="ui celled table table-bordered" cellspacing="0" width="100%" id="volunteer-management">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th style="width: 400px;">Description</th>
                            <th>Spots</th>
                            <th>Position Date</th>
                            <th>Status</th>
                            <th style="width: 80px;">Actions</th>
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
        $('#volunteer-management').DataTable({
            processing: false,
            serverSide: true,
            ajax: '{{ Route("admin-volunteer-list-datatable") }}',
            order: [[0, "asc"]],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'position_name', name: 'position_name'},   
                {data: 'position_description', name: 'position_description'}, 
                {data: 'position_spots', name: 'position_spots'}, 
                {data: 'position_date', name: 'position_date'},
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
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
    function deleteposition(obj) {
        $.confirm({
            title: 'Delete Volunteer Position',
            content: 'Are you sure to delete this Volunteer Position?',
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
<script>
    /*function deleteUser(obj) {
     var id = $(obj).attr("data-id");
     var url = full_path + 'admin-deleteplan?id=' + id;
     $("#deleteplanButton").attr("href", url);
     $("#deleteplanModal").modal('show');
     }
     $(document).ready(function () {
     $('[data-toggle="tooltip"]').tooltip();
     });*/
</script>
@stop