@extends('layouts.main') 
@section('content')
@php 
use App\EventUploadedForm;
@endphp	
<div class="index-body body_content">
    <div class="dash_bx stde_bx bacolor_one">
        <div class="container"> 
            <div class="row">
                <div class="col-md-3">
                    @include('partials.leftpanel')					
                </div>
                <div class="col-md-9">
                    <h1 class="sample_heading"><i class="icofont-list"></i> {{isset($model->divison->name)?ucfirst($model->divison->name):''}} Registration Details</h1>

                    <div class="right_bx mt-3">

                        <form class="">
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <p class="word_break">{{$model->first_name}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <p class="word_break">{{$model->last_name}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <p class="word_break">{{$model->email}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Grade</label>
                                        <p class="word_break">{{$model->grade}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Teacher Liaison</label>
                                        <p class="word_break">{{$model->teacher_liaison}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Teacher Email</label>
                                        <p class="word_break">{{$model->teacher_email}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Form Submission Date</label>
                                        <p class="word_break">{{\Carbon\Carbon::parse($model->form_submitted_date)->format('d M Y')}}</p>
                                    </div>
                                </div>

                            </div>

                            <h1 class="heading_stl">School Information</h1>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>School Name</label>
                                        <p class="word_break">{{$model->school_name}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <p class="word_break">{{$model->school_address}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <p class="word_break">{{$model->school_city}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Zipcode</label>
                                        <p class="word_break">{{$model->school_zipcode}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <p class="word_break">{{$model->school_phone}}</p>
                                    </div>
                                </div>
                            </div>

                            <h1 class="heading_stl">Student Information</h1>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <p class="word_break">{{$model->address_line1}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <p class="word_break">{{$model->city}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Zipcode</label>
                                        <p class="word_break">{{$model->zipcode}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <p class="word_break">{{$model->phone}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <p class="word_break">{{$model->gender}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Meal type</label>
                                        <p class="word_break">{{$model->meal_type}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>T-Shirt Size</label>
                                        <p class="word_break">{{$model->tshirt_size}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Race (Optional)</label>
                                        <p class="word_break">{{$model->race}}</p>

                                    </div>
                                </div>
                            </div>

                            <h1 class="heading_stl">Project Information</h1>
                            <div class="row mb-3">	

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Project Title</label>
                                        <p class="word_break">{{$model->project_title}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Project Category</label>
                                        <p class="word_break">{{$model->project_category}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Project Type</label>
                                        <p class="word_break">{{$model->project_type}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">	
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Partner 1 Name</label>
                                        <p class="word_break">{{$model->partner1_name}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Partner 1 School Name</label>
                                        <p class="word_break">{{$model->partner1_school_name}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Partner 2 Name</label>
                                        <p class="word_break">{{$model->partner2_name}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Partner 2 School Name</label>
                                        <p class="word_break">{{$model->partner2_school_name}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6 offset-sm-3">
                                    <div class="form-group">
                                        <label>Download the Completed and Signed Application Form</label>
                                        <a href="{{URL::asset('public/uploads/frontend/registration_form/' . $model->signed_application_form)}}" class="btn btn-sm attachment-form"><i class="icofont-download"></i> Attachment</a> <span></span>
                                    </div>
                                </div>
                            </div>	
                            <div class="row mb-5"></div>
                            @if($model->division_id == '1')

                            <!--  --------------- - Static Form Start Here   - -------------------->

                            <h1 class="heading_stl">Upload proof of participation at your New York State regional competition or letter of waiver
                                from the regional competition</h1>
                            <div class="row mb-5">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Upload proof of participation at your New York State regional competition or letter of waiver
                                            from the regional competition HERE*:</label>
                                        @if(!empty($model->participation_proof_filename))
                                        <a href="{{URL::asset('public/uploads/frontend/user_isef_forms/' . $model->participation_proof_filename)}}" target="_blank" class="btn btn-sm attachment-form col-3"><i class="icofont-download"></i> Download Form</a>
                                        @else
                                        Not Uploaded Yet

                                        @endif
                                    </div>
                                </div>											
                            </div>



                            <h1 class="heading_stl">Upload project abstract on the ISEF 2020 form</h1>
                            <div class="row mb-5">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Upload project abstract on the ISEF 2020 form HERE*:</label>
                                        @if(!empty($model->isef_abstract_filename))
                                        <a href="{{URL::asset('public/uploads/frontend/user_isef_forms/' . $model->isef_abstract_filename)}}" target="_blank" class="btn btn-sm attachment-form col-3"><i class="icofont-download"></i> Download Form</a>
                                        @else
                                        Not Uploaded Yet

                                        @endif
                                    </div>
                                </div>											
                            </div>


                            <h1 class="heading_stl">Upload 1 page print out of required forms stated as needed after completing the ISEF 2020
                                rules wizard include student names on this form (and project title)</h1>
                            <div class="row mb-5">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Upload 1 page print out of required forms stated as needed after completing the ISEF 2020
                                            rules wizard include student names on this form (and project title) HERE*:</label>
                                        @if(!empty($model->isef_rules_wizard_filename))
                                        <a href="{{URL::asset('public/uploads/frontend/user_isef_forms/' . $model->isef_rules_wizard_filename)}}" target="_blank" class="btn btn-sm attachment-form col-3"><i class="icofont-download"></i> Download Form</a>
                                        @else
                                        Not Uploaded Yet

                                        @endif
                                    </div>
                                </div>											
                            </div>


                            <h1 class="heading_stl">Upload Research Plan including student name (s), project title and category on the first page of
                                the plan</h1>
                            <div class="row mb-5">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Upload Research Plan including student name (s), project title and category on the first page of
                                            the plan HERE*:</label>
                                        @if(!empty($model->research_plan_filename))
                                        <a href="{{URL::asset('public/uploads/frontend/user_isef_forms/' . $model->research_plan_filename)}}" target="_blank" class="btn btn-sm attachment-form col-3"><i class="icofont-download"></i> Download Form</a>
                                        @else
                                        Not Uploaded Yet

                                        @endif
                                    </div>
                                </div>											
                            </div>


                            <h1 class="heading_stl">Upload a color PDF of project research paper (MAX. 5MB). A research paper should minimally
                                contain an introduction, methodology, results/discussion, conclusion and references</h1>
                            <div class="row mb-5">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Upload a color PDF of project research paper (MAX. 5MB). A research paper should minimally
                                            contain an introduction, methodology, results/discussion, conclusion and references HERE*:</label>
                                        @if(!empty($model->research_paper_filename))
                                        <a href="{{URL::asset('public/uploads/frontend/user_isef_forms/' . $model->research_paper_filename)}}" target="_blank" class="btn btn-sm attachment-form col-3"><i class="icofont-download"></i> Download Form</a>
                                        @else
                                        Not Uploaded Yet

                                        @endif
                                    </div>
                                </div>											
                            </div>

                            <!--  --------------- - Static Form End Here   - -------------------->


                            @if(isset($all_forms) && count($all_forms) > 0)
                            @foreach($all_forms as $form)								
                            <h1 class="heading_stl">{{ $form->form_name }}</h1>
                            <div class="row mb-5">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Download Student's Completed and Signed Form HERE*:</label>
                                        @php
                                        $filemodel = EventUploadedForm::where('event_participation_id',$model->id)->where('form_id', $form->id)->first();													
                                        @endphp

                                        @if(count($filemodel)>0)
                                        <a href="{{URL::asset('public/uploads/frontend/user_isef_forms/' . $filemodel->uploaded_filename)}}" target="_blank" class="btn btn-sm attachment-form col-3"><i class="icofont-download"></i> Download Form</a>
                                        @else
                                        Not Uploaded Yet

                                        @endif
                                    </div>
                                </div>											
                            </div>
                            @endforeach
                            @endif
                            @endif

                            <div class="row">	
                                <div class="col-sm-12 pt-2">
                                    <div class="text-center">
                                        <a href="{{ Route('get-online-registration-list',['id'=>base64_encode($model->division_id)]) }}" class="btn nw_cst_btn">Back</a>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
@stop

@section('js')

<script>
    $(function () {

        // We can attach the `fileselect` event to all file inputs on the page
        $(document).on('change', ':file', function () {
            var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });

        // We can watch for our custom `fileselect` event like this
        $(document).ready(function () {
            $(':file').on('fileselect', function (event, numFiles, label) {

                var input = $(this).parents('.input-group').find(':text'),
                        log = numFiles > 1 ? numFiles + ' files selected' : label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log)
                        alert(log);
                }

            });
        });

    });
    $(document).ready(function () {
        $('.attachment-form').click(function (e) {
            e.preventDefault();
            var link = document.createElement("a");
            link.href = $(this).attr('href');
            link.click();
        });
    });
</script>
@stop