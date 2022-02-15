@extends('admin::layouts.main')

@section('breadcrumb')
<li class="active">Dashboard</li>
@stop

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2">
            <div class="display">
                <div class="number">
                    <h3 class="font-blue-sharp">
                        <span data-counter="counterup" data-value="{{$total_teachers}}">0</span>
                    </h3>
                    <small>TOTAL TEACHERS</small>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
            <div class="progress-info">
                <div class="status">
                    <div class="status-title"> teachers </div>
                    <a href="{{Route('admin-teachers')}}" class="status-number"> VIEW </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2">
            <div class="display">
                <div class="number">
                    <h3 class="font-blue-sharp">
                        <span data-counter="counterup" data-value="{{$total_students}}">0</span>
                    </h3>
                    <small>TOTAL STUDENTS</small>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
            <div class="progress-info">
                <div class="status">
                    <div class="status-title"> students </div>
                    <a href="{{Route('admin-students')}}" class="status-number"> VIEW </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2">
            <div class="display">
                <div class="number">
                    <h3 class="font-blue-sharp">
                        <span data-counter="counterup" data-value="{{$total_judges}}">0</span>
                    </h3>
                    <small>TOTAL JUDGES</small>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
            <div class="progress-info">
                <div class="status">
                    <div class="status-title"> judges </div>
                    <a href="{{Route('admin-judgeregistration')}}" class="status-number"> VIEW </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2">
            <div class="display">
                <div class="number">
                    <h3 class="font-blue-sharp">
                        <span data-counter="counterup" data-value="{{$total_volunteers}}">0</span>
                    </h3>
                    <small>TOTAL VOLUNTEERS</small>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
            <div class="progress-info">
                <div class="status">
                    <div class="status-title"> volunteers </div>
                    <a href="{{Route('admin-volunteerregistration')}}" class="status-number"> VIEW </a>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2">
            <div class="display">
                <div class="number">
                    <h3 class="font-blue-sharp">
                        <span data-counter="counterup" data-value="">0</span>
                    </h3>
                    <small>TOTAL PLANS</small>
                </div>
                <div class="icon">
                    <i class="fa fa-tasks"></i>
                </div>
            </div>
            <div class="progress-info">
                <div class="status">
                    <div class="status-title"> plans </div>
                    <a href="" class="status-number"> VIEW </a>
                </div>
            </div>
        </div>
    </div>-->
</div>
@stop