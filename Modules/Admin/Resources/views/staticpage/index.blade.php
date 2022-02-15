@extends('admin::layouts.main')

@section('breadcrumb')
<li class="active">Static Pages</li>
@stop

@section('content')
<h3 class="page-title">Static Pages
    <small>Manage all the static page of the site from here</small>
</h3>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-layers font-green-haze" aria-hidden="true"></i>
                    <span class="caption-subject font-green-haze bold uppercase">Static Pages</span>
                </div>
                <div class="pull-right">
                    <a class="btn btn-info" href="javascript:;" onclick="$('#search_filter').toggle();"><i class="fa fa-search" aria-hidden="true"></i> Filter</a>&nbsp;
                    <a class="btn btn-info" href="{{ Route('admin-staticpages') }}"><i class="glyphicon glyphicon-repeat"></i></i> Reset</a>
                </div>
            </div>
            <div class="portlet-body form" id="search_filter" style="display: {{ ($search_filter == 1) ? 'block;' : 'none;' }}">
                <!-- BEGIN FORM-->
                <form class="form-horizontal" action="" method="GET">
                    <input type="hidden" name="search_filter" value="1"/>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Page Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="page_name" placeholder="Page Name" value="{{ (isset($page_name) && $page_name != '') ? $page_name : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn green">Search</button>               
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th class="bold"> # </th>
                                <th class="bold"> Page Name </th>
                                <th class="bold"> Content </th>
                                <th class="bold"> Last Updated </th>
                                <th class="bold"> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($model as $key => $val)
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> {{ (isset($val->page_name) && $val->page_name != '') ? $val->page_name : "Not Given" }} </td>
                                <td> {!! (strlen($val->content) > 200) ? substr($val->content, 0, 200) . '...' : $val->content !!} </td>
                                <td> {{ (isset($val->updated_at) && $val->updated_at != '') ? date('jS M Y, g:i A', strtotime($val->updated_at)) : "Not Updated" }} </td>
                                <td>
                                    <a href="{{ Route('admin-viewstaticpage', ['id' => $val->id]) }}" class="btn btn-outline btn-circle btn-sm blue">
                                        <i class="fa fa-eye"></i> View
                                    </a>
                                    <a href="{{ Route('admin-updatestaticpage', ['id' => $val->id]) }}" class="btn btn-outline btn-circle btn-sm purple">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align: center;">No Record Found!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $model->appends(request()->all())->render() }}
            </div>
        </div>
    </div>
</div>
@stop