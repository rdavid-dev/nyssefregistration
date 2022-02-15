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
    <span class="active">{{$division->name}} Registration</span>
</li>
@stop

@section('content')


<div class="portlet box blue-hoki">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer"></i>
            {{$division->name}} Registration
        </div>
        <div class="pull-right"><a href="{{route('admin-exportregistration',['id'=>$division_id])}}" class="btn btn-default" style="position: relative; top: 3px;margin-left: 5px;"><i class="fa fa-download"></i> Export to CSV</a></div>
        <!-- <div class="pull-right"><a href="{{route('admin-adddivision')}}" class="btn btn-success" style="position: relative; top: 3px;"><i class="fa fa-plus"></i> Add New</a></div> -->
    </div>
    <div class="portlet-body ">
        <div class="clearfix">
            <div class="table-scrollable" style="border: none;">
                <table class="ui celled table table-bordered" cellspacing="0" width="100%" id="registrations-management">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>School Name</th>
                            <th>Form Submitted Date</th>
                            <th>Status</th>
                            <th style="width: 60px;">Actions</th>
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
        $('#registrations-management').DataTable({
            processing: false,
            serverSide: true,
            ajax: '{{ Route("admin-registration-list-datatable",["id" => $division_id]) }}',
            order: [[3, "asc"]],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'first_name', name: 'first_name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'email', name: 'email'},
                {data: 'school_name', name: 'school_name'},
                {data: 'form_submitted_date', name: 'form_submitted_date'},
                {data: 'status', name: 'status', render: function (data, type, row) {
                        if (data == '0') {
                            return '<span class="label label-sm label-warning">Inactive</span>';
                        } else if (data == '1') {
                            return '<span class="label label-sm label-success">Active</span>';
                        }  else {
                            return '';
                        }
                    }
                },
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
   
</script>
<script>
    /*function deleteUser(obj) {
     var id = $(obj).attr("data-id");
     var url = full_path + 'admin-deleteuser?id=' + id;
     $("#deleteuserButton").attr("href", url);
     $("#deleteuserModal").modal('show');
     }
     $(document).ready(function () {
     $('[data-toggle="tooltip"]').tooltip();
     });*/
</script>
@stop