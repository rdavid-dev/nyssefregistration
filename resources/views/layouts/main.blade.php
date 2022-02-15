<!DOCTYPE html>
<html lang="en" xml:lang="en">
    <head  lang="en">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        {!! MetaTag::tag('title','AUM Consulting') !!}
        {!! MetaTag::tag('keyword') !!}
        {!! MetaTag::tag('description') !!}
        <title> {{ env('PROJECT_NAME', 'ScienceFair') }} </title>
        @php
        $routeArray = app('request')->route()->getAction();
        $controllerAction = class_basename($routeArray['controller']);
        list($controller, $action) = explode('@', $controllerAction);
        @endphp
        <link rel="stylesheet" href="{{URL::asset('public/frontend/css/bootstrap.min.css')}}" />
        <!--<link rel="stylesheet" href="{{URL::asset('public/frontend/css/jquery-ui.css')}}" />-->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
        <link rel="stylesheet" href="{{URL::asset('public/frontend/fonts/font-styles.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('public/frontend/css/font-awesome.min.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('public/frontend/css/icofont.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('public/frontend/css/bootstrap-datepicker.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('public/frontend/css/new_style.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('public/frontend/css/main.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('public/frontend/css/responsive.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('public/frontend/css/jquery.dataTables.min.css')}}" />
        <script src="{{URL::asset('public/frontend/js/jquery.min.js')}}"></script>
        @yield('css')
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/custom/notie/dist/notie.css') }}">
        <script type="text/javascript">
            var full_path = '<?= url('/') . '/'; ?>';
            var logged_in = '<?= (Auth()->guard('frontend')->guest()) ? true : false; ?>';
			var current_event = '<?= ($running_event_id) ? $running_event_id : ''; ?>';
        </script>
    </head>
    <body>
    @include('partials.header')

    @yield('content')

    @include('partials.footer')
    
    <!--<script type="text/javascript" src="{{URL::asset('public/frontend/js/jquery-ui.js')}}"></script>-->
    <script type="text/javascript" src="{{URL::asset('public/frontend/js/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('public/frontend/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('public/frontend/js/wow.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('public/frontend/js/custom.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('public/frontend/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/frontend/custom/notie/dist/notie.min.js') }}"></script>
	<script type="text/javascript" src="{{URL::asset('public/frontend/custom/js/common.js')}}"></script>    
	@if(in_array($controller,['UserController','DashboardController','RegistrationController']))
    {!!script_version('/frontend/custom/js/user.js') !!}
	{!!script_version('/frontend/custom/js/registration.js') !!}
    @endif
	
    @yield('js')
    
              
    </body>
</html>