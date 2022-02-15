@extends('layouts.main') 
@section('content')

<div class="index-body body_content">
    <div class="dash_bx stde_bx bacolor_one">
        <div class="container"> 
            <div class="row">
                <div class="col-md-3">
                    @include('partials.leftpanel')					
                </div>
                <div class="col-md-9">
                    <h1 class="sample_heading"><i class="icofont-list"></i> Student Details</h1>

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
                                        <label>Phone</label>
                                        <p class="word_break">{{$model->phone}}</p>
                                    </div>
                                </div>
                            </div>

                            <h1 class="heading_stl">Andromeda Registration</h1>
                            <div class="row mb-3">
                            @if(!empty($division2))
                                <div class="col-sm-4">
                                    
                                    <a href="{{route('online-registration-details', ['id' => base64_encode($division2->id)])}}" target="_blank" class="btn btn-outline btn-circle btn-sm purple" data-toggle="tooltip" title="View Details"><i class="fa fa-eye"></i> View Details</a>
                                   
                                </div>
                            @else
                                <div class="col-sm-6">
                                    
                                    Not Registered Yet
                                   
                                </div>
                            @endif
                            </div>

                            <h1 class="heading_stl">Broadcom Registration</h1>
                            <div class="row mb-3">
                            @if(!empty($division3))
                                <div class="col-sm-4">
                                    
                                    <a href="{{route('online-registration-details', ['id' => base64_encode($division3->id)])}}" target="_blank" class="btn btn-outline btn-circle btn-sm purple" data-toggle="tooltip" title="View Details"><i class="fa fa-eye"></i> View Details</a>
                                   
                                </div>
                            @else
                                <div class="col-sm-6">
                                    
                                Not Registered Yet
                                   
                                </div>
                            @endif
                            </div>
                            <h1 class="heading_stl">NYSSEF ISEF Registration</h1>
                            <div class="row mb-3">
                            @if(!empty($division1))
								<div class="col-sm-4">
									
									<a href="{{route('online-registration-details', ['id' => base64_encode($division1->id)])}}" target="_blank" class="btn btn-outline btn-circle btn-sm purple" data-toggle="tooltip" title="View Details"><i class="fa fa-eye"></i> View Details</a>
								   
								</div>
							@else
								<div class="col-sm-6">
									
								Not Registered Yet
								   
								</div>
							@endif
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