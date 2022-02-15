@extends('layouts.main') 
@section('content')

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
                    <h1 class="sample_heading">{{ucfirst($division->name)}} Registration List</h1>
                    <div class="right_bx mt-3">
                        <div class="clearfix">
                            <div class="table-scrollable" style="border: none;">
                                <table class="ui celled table table-bordered table-responsive" cellspacing="0" width="100%" id="online-registration-management" data-id="{{base64_encode($division->id)}}">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>School Name</th>
                                            <th>Project Type</th>
                                            <th>Project Category</th>
                                            <th>Form Submission Date</th>
                                            <th>Registered On</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
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
</script>
@stop