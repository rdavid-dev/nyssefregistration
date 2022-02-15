@extends('layouts.main') 
@section('content')
@php 
use App\EventUploadedForm;
@endphp
<div class="index-body body_content">
    <!--div class="dash_top_banner d-flex align-items-center justify-content-center">
            <div class="overlay"></div>
            <h1>Sample heading</h1>
    </div>-->

    <div class="dash_bx bacolor_one">
        <div class="container"> 
            <div class="row">
                <div class="col-md-3">
                    @include('partials.leftpanel')					
                </div>
                <div class="col-md-9">
                    <h1 class="sample_heading"><i class="icofont-list"></i> NYSSEF ISEF FORM UPLOAD</h1>

                    <div class="right_bx mt-3">

                        <form class="" id="upload_isrf_form" method="post"  enctype="multipart/form-data" action="{{ Route('isef-form-upload') }}">
                            <!--<h1 class="heading_stl">Dashboard</h1>-->
                            @csrf

                            <input type="hidden" name="division_id" value="1" />	

                            <!--  --------------- - Static Form Start Here   - -------------------->
                            <div class="row mb-5">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Upload proof of participation at your New York State regional competition or letter of waiver
                                            from the regional competition HERE*</label>
                                    </div>
                                    @php
                                    $filemodel = App\EventParticipants::where('id',$event_participant->id)->whereNotNull('participation_proof_filename')->count();													
                                    @endphp

                                    @if($filemodel>0)
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label><i class="icofont-check"></i> Already Uploaded</label>											
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group file_upload">
                                                <input placeholder="Signed Application Form" type="text" class="form-control" readonly="">
                                                <label class="input-group-btn d-flex align-items-stretch align-items-center">
                                                    <span class="btn btn-primary up-btn align-self-center">
                                                        <i class="icofont-upload-alt"></i> Upload Application Form<input type="file" name="participation_proof_filename" style="display: none;">
                                                    </span>
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <h1 class="heading_stl">Upload project abstract on the ISEF 2020 form.</h1>
                            <div class="row mb-5">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Download <span class="font-bold" style="font-style: italic;font-size: 16px;text-decoration: underline;">Upload project abstract on the ISEF 2020 form</span> HERE*:</label>
                                        <a href="https://sspcdn.blob.core.windows.net/files/Documents/SEP/ISEF/Resources/Abstracts/Categories.pdf" target="_blank" class="btn btn-sm attachment-form col-3"><i class="icofont-download"></i> Download Form</a>
                                    </div>
                                </div>
                                @php
                                $filemodel = App\EventParticipants::where('id',$event_participant->id)->whereNotNull('isef_abstract_filename')->count();													
                                @endphp

                                @if($filemodel>0)
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label><i class="icofont-check"></i> Already Uploaded</label>											
                                    </div>
                                </div>
                                @else
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Upload the Completed and Signed <span class="font-bold" style="font-style: italic;font-size: 16px;text-decoration: underline;">Upload project abstract on the ISEF 2020 form</span> HERE*:</label>
                                        <div class="input-group file_upload">
                                            <input placeholder="Signed Application Form" type="text" class="form-control" readonly="">
                                            <label class="input-group-btn d-flex align-items-stretch align-items-center">
                                                <span class="btn btn-primary up-btn align-self-center">
                                                    <i class="icofont-upload-alt"></i> Upload Application Form<input type="file" name="isef_abstract_filename" style="display: none;">
                                                </span>
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                @endif
                            </div>



                            <h1 class="heading_stl">Upload 1 page print out of required forms stated as needed after completing the ISEF 2020
                                rules wizard include student names on this form (and project title).</h1>
                            <div class="row mb-5">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Get Details <span class="font-bold" style="font-style: italic;font-size: 16px;text-decoration: underline;">Upload 1 page print out of required forms stated as needed after completing the ISEF 2020
                                                rules wizard; include student names on this form (and project title)</span> HERE*:</label>
                                        <a href="https://ruleswizard.societyforscience.org/" target="_blank" class="btn btn-sm attachment-form col-3">Details Form <i class="icofont-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                @php
                                $filemodel = App\EventParticipants::where('id',$event_participant->id)->whereNotNull('isef_rules_wizard_filename')->count();													
                                @endphp

                                @if($filemodel>0)
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label><i class="icofont-check"></i> Already Uploaded</label>											
                                    </div>
                                </div>
                                @else
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Upload the Completed and Signed form HERE*:</label>
                                        <div class="input-group file_upload">
                                            <input placeholder="Signed Application Form" type="text" class="form-control" readonly="">
                                            <label class="input-group-btn d-flex align-items-stretch align-items-center">
                                                <span class="btn btn-primary up-btn align-self-center">
                                                    <i class="icofont-upload-alt"></i> Upload Application Form<input type="file" name="isef_rules_wizard_filename" style="display: none;">
                                                </span>
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                @endif
                            </div>



                            <h1 class="heading_stl">Upload Research Plan including student name (s), project title and category on the first page of
                                the plan.</h1>
                            <div class="row mb-5">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Get Details HERE*:</label>
                                        <a href="#" data-toggle="modal" data-target="#ResearchPlanModal" class="btn btn-sm attachment-form col-3">Details Form <i class="icofont-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                @php
                                $filemodel = App\EventParticipants::where('id',$event_participant->id)->whereNotNull('research_plan_filename')->count();													
                                @endphp

                                @if($filemodel>0)
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label><i class="icofont-check"></i> Already Uploaded</label>											
                                    </div>
                                </div>
                                @else
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Upload the Completed and Signed form HERE*:</label>
                                        <div class="input-group file_upload">
                                            <input placeholder="Signed Application Form" type="text" class="form-control" readonly="">
                                            <label class="input-group-btn d-flex align-items-stretch align-items-center">
                                                <span class="btn btn-primary up-btn align-self-center">
                                                    <i class="icofont-upload-alt"></i> Upload Application Form<input type="file" name="research_plan_filename" style="display: none;">
                                                </span>
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                @endif
                            </div>


                            <h1 class="heading_stl">Upload a color PDF of project research paper (MAX. 5MB). A research paper should minimally
                                contain an introduction, methodology, results/discussion, conclusion and references.</h1>
                            <div class="row mb-5">
                                @php
                                $filemodel = App\EventParticipants::where('id',$event_participant->id)->whereNotNull('research_paper_filename')->count();													
                                @endphp

                                @if($filemodel>0)
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label><i class="icofont-check"></i> Already Uploaded</label>											
                                    </div>
                                </div>
                                @else
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Upload the Completed and Signed form HERE*:</label>
                                        <div class="input-group file_upload">
                                            <input placeholder="Signed Application Form" type="text" class="form-control" readonly="">
                                            <label class="input-group-btn d-flex align-items-stretch align-items-center">
                                                <span class="btn btn-primary up-btn align-self-center">
                                                    <i class="icofont-upload-alt"></i> Upload Application Form<input type="file" name="research_paper_filename" style="display: none;">
                                                </span>
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <!--  --------------- - Static Form End Here   - -------------------->

                            @if(isset($all_forms) && count($all_forms) > 0)
                            @foreach($all_forms as $form)								
                            <h1 class="heading_stl">{{ $form->form_name }}</h1>
                            <div class="row mb-5">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Download <span class="font-bold" style="font-style: italic;font-size: 16px;text-decoration: underline;">{{ $form->form_name }}</span> HERE*:</label>
                                        <a href="{{URL::asset('public/uploads/frontend/isef_forms/' . $form->form_filename)}}" target="_blank" class="btn btn-sm attachment-form col-3"><i class="icofont-download"></i> Download Form</a>
                                    </div>
                                </div>
                                @php
                                $filemodel = EventUploadedForm::where('event_participation_id',$event_participant->id)->where('form_id', $form->id)->first();													
                                @endphp

                                @if(count($filemodel)>0)
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label><i class="icofont-check"></i> Already Uploaded</label>											
                                    </div>
                                </div>
                                @else
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Upload the Completed and Signed <span class="font-bold" style="font-style: italic;font-size: 16px;text-decoration: underline;">{{ $form->form_name }}</span> HERE*:</label>
                                        <div class="input-group file_upload">
                                            <input placeholder="Signed Application Form" type="text" class="form-control" readonly="">
                                            <label class="input-group-btn d-flex align-items-stretch align-items-center">
                                                <span class="btn btn-primary up-btn align-self-center">
                                                    <i class="icofont-upload-alt"></i> Upload Application Form<input type="file" name="signed_application_form[{{ $form->id }}][]" style="display: none;" multiple="">
                                                </span>
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                @endif


                            </div>
                            @endforeach
                            @endif

                            <div class="row mb-3">	
                                <div class="col-sm-12">
                                    <div class="text-center">
                                        <button type="submit" name="form_upload_submit_btn" class="btn nw_cst_btn">SUBMIT</button>
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
<!-- Research Plan Modal -->
<div class="modal" id="ResearchPlanModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h2 class="modal-title">Upload Research Plan Details</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <p> Upload Research Plan including student name (s), project title and category on the first page of
                    the plan. Research Plan (Form 1A, extension, MUST FOLLOW the ISEF Research Plan format
                    VERBATIM). Please complete all instructions on the top of the ISEF research plan
                    instructions (ISEF form 1A) page then Item #3 including a., b., c. and d headers. Additionally,
                    as applicable, bottom of Research Plan #1-4 must be completed verbatim including
                    applicable sections headers a, b, c,… etc. write in non-applicable as deemed necessary.
                    ii. Note Well:an addendum includes any changes to the original research plandue to changes
                    in the research process. If no changes exist, state NO ADDENDUMS EXIST in BOLD at the
                    END of the research plan in 18-point font. A modified research plan (an addendum) should
                    write all changes in BOLDand italicized font in present or past tense.Your goal should be to
                    clearly show changes made between the original Research Plan and the revised research
                    plan (which is now considered your project summary). Note Well: Some studies, such as an
                    engineering design or mathematics projects, will be less detailed in the initial project plan
                    and will change through the course of research. If such changes occur, a project summary
                    that explains what was done is required and can be appended to the original plan.Research
                    Plan (please review website
                    <a href="https://sspcdn.blob.core.windows.net/files/Documents/SEP/ISEF/2020/Forms/All.pdf">https://sspcdn.blob.core.windows.net/files/Documents/SEP/ISEF/2020/Forms/All.pdf</a> for proper
                    format of research plan). If you conducted a human research study, you need to include the
                    informed consent process in the delineated research plan – following form 1A.FORM 7
                    REMINDER: If you are completing a continuation, the old abstract (prior year’s abstract)
                    must appear on the Intel ISEF abstract form (even if you did not compete in LISEF or ISEF the
                    prior year) and a copy of the prior year’s research plan. You must coherently explain the
                    differences in the goals and methodology from the prior year. BE VERY DETAILED, you must
                    be prudent to separate 2 or 3 years of data from the current year.
                </p>
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
</script>
@stop