@extends('admin::layouts.main')

@section('breadcrumb')

@php 
use App\EventUploadedForm;
@endphp

@if($model->division_id=='1')
<li> <a href="{{ Route('admin-NYSSEFRegistration',['id' => $model->division_id]) }}">{{$division->name}} registration</a></li>
@elseif($model->division_id=='2')
<li> <a href="{{ Route('admin-AndromedaRegistration',['id' => $model->division_id]) }}">{{$division->name}} registration</a></li>
@else
<li> <a href="{{ Route('admin-BroadcomRegistration',['id' => $model->division_id]) }}">{{$division->name}} registration</a></li>
@endif
<li class="active">View</li>
@stop

@section('content')
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-eye font-green-haze"></i>
            <span class="caption-subject font-green-haze bold uppercase">Viewing details of {{$division->name}} Registration</span>
        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form class="form-horizontal custom-form-control">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">First Name:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->first_name) && $model->first_name != null) ? $model->first_name : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Last Name:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->last_name) && $model->last_name != null) ? $model->last_name : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Email:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->email) && $model->email != null) ? $model->email : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Grade:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->grade) && $model->grade != null) ? $model->grade : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Teacher Liaison:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->teacher_liaison) && $model->teacher_liaison != null) ? $model->teacher_liaison : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Teacher Email:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->teacher_email) && $model->teacher_email != null) ? $model->teacher_email : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Form Submission Date:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->form_submitted_date) && $model->form_submitted_date != null) ? date("d-M-Y",strtotime($model->form_submitted_date)) : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3"><h3>School Information:</h3></label>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">School Name:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->school_name) && $model->school_name != null) ? $model->school_name : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Address:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->school_address) && $model->school_address != null) ? $model->school_address : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">City:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->school_city) && $model->school_city != null) ? $model->school_city : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Zipcode:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->school_zipcode) && $model->school_zipcode != null) ? $model->school_zipcode : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Phone No:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->school_phone) && $model->school_phone != null) ? $model->school_phone : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3"><h3>Student Information:</h3></label>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Address:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->address_line1) && $model->address_line1 != null) ? $model->address_line1 : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">City:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->city) && $model->city != null) ? $model->city : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Zipcode:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->zipcode) && $model->zipcode != null) ? $model->zipcode : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Phone No:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->phone) && $model->phone != null) ? $model->phone : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Gender:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->gender) && $model->gender != null) ? $model->gender : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Meal type:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->meal_type) && $model->meal_type != null) ? $model->meal_type : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">T-Shirt Size:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->tshirt_size) && $model->tshirt_size != null) ? $model->tshirt_size : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Race:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->race) && $model->race != null) ? $model->race : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3"><h3>Project Information:</h3></label>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Project Title:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->project_title) && $model->project_title != null) ? $model->project_title : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Project Category:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->project_category) && $model->project_category != null) ? $model->project_category : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label class="control-label col-md-4">Project Type:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->project_type) && $model->project_type != null) ? $model->project_type : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Partner 1 Name:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->partner1_name) && $model->partner1_name != null) ? $model->partner1_name : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Partner 1 Schoool Name:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->partner1_school_name) && $model->partner1_school_name != null) ? $model->partner1_school_name : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Partner 2 Name:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->partner2_name) && $model->partner2_name != null) ? $model->partner2_name : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Partner 2 Schoool Name:</label>
                            <div class="col-md-7">
                                <p class="form-control-static"> {{ (isset($model->partner2_school_name) && $model->partner2_school_name != null) ? $model->partner2_school_name : "Not Given" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-5">Completed and Signed Application Form :</label>
                        <div class="col-md-7">
                            <a class="btn btn-success" href="{{URL::asset('public/uploads/frontend/registration_form/' . $model->signed_application_form)}}">Download</a> 
                        </div>
                    </div>
                </div>
            </div>
            @if($model->division_id == '1')
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label"><h3>Completed and Signed NYSSEF ISEF Forms:</h3></label>						
                    </div>
                </div>
            </div>
            <!--  --------------- - Static Form Start Here   - -------------------->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label">Upload proof of participation at your New York State regional competition or letter of waiver
                                from the regional competition:</label>
                        </div>
                        <div class="col-md-6">
                            @if(!empty($model->participation_proof_filename))
                            <a href="{{URL::asset('public/uploads/frontend/user_isef_forms/' . $model->participation_proof_filename)}}" target="_blank" class="btn btn-success"> Download Form</a>
                            @else
                            Not Uploaded Yet

                            @endif

                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label">Upload project abstract on the ISEF 2020 form:</label>
                        </div>
                        <div class="col-md-6">
                            @if(!empty($model->isef_abstract_filename))
                            <a href="{{URL::asset('public/uploads/frontend/user_isef_forms/' . $model->isef_abstract_filename)}}" target="_blank" class="btn btn-success"> Download Form</a>
                            @else
                            Not Uploaded Yet

                            @endif

                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label">Upload 1 page print out of required forms stated as needed after completing the ISEF 2020
                                rules wizard include student names on this form (and project title):</label>
                        </div>
                        <div class="col-md-6">
                            @if(!empty($model->isef_rules_wizard_filename))
                            <a href="{{URL::asset('public/uploads/frontend/user_isef_forms/' . $model->isef_rules_wizard_filename)}}" target="_blank" class="btn btn-success"> Download Form</a>
                            @else
                            Not Uploaded Yet

                            @endif

                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label">Upload Research Plan including student name (s), project title and category on the first page of
                                the plan form:</label>
                        </div>
                        <div class="col-md-6">
                            @if(!empty($model->research_plan_filename))
                            <a href="{{URL::asset('public/uploads/frontend/user_isef_forms/' . $model->research_plan_filename)}}" target="_blank" class="btn btn-success"> Download Form</a>
                            @else
                            Not Uploaded Yet

                            @endif

                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label">Upload a color PDF of project research paper (MAX. 5MB). A research paper should minimally
                                contain an introduction, methodology, results/discussion, conclusion and references form:</label>
                        </div>
                        <div class="col-md-6">
                            @if(!empty($model->research_paper_filename))
                            <a href="{{URL::asset('public/uploads/frontend/user_isef_forms/' . $model->research_paper_filename)}}" target="_blank" class="btn btn-success"> Download Form</a>
                            @else
                            Not Uploaded Yet

                            @endif

                        </div>
                    </div>
                </div>
            </div>


            <!--  --------------- - Static Form End Here   - -------------------->

            @if(isset($all_forms) && count($all_forms) > 0)
            @foreach($all_forms as $form)
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label">{{ $form->form_name }}:</label>
                        </div>
                        <div class="col-md-6">
                            @php
                            $filemodel = EventUploadedForm::where('event_participation_id',$model->id)->where('form_id', $form->id)->first();													
                            @endphp

                            @if(count($filemodel)>0)
                            <a href="{{URL::asset('public/uploads/frontend/user_isef_forms/' . $filemodel->uploaded_filename)}}" target="_blank" class="btn btn-success"> Download Form</a>
                            @else
                            Not Uploaded Yet

                            @endif

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            @endif
            <div class="form-actions text-right">
                @if($model->division_id=='1')
                <a href="{{ Route('admin-NYSSEFRegistration',['id' => $model->division_id]) }}" class="btn default">Back</a>
                @elseif($model->division_id=='2')
                <a href="{{ Route('admin-AndromedaRegistration',['id' => $model->division_id]) }}" class="btn default">Back</a>
                @else
                <a href="{{ Route('admin-BroadcomRegistration',['id' => $model->division_id]) }}" class="btn default">Back</a>
                @endif
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>
@stop