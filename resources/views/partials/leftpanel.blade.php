@php

use App\Division;

$division_list = Division::whereStatus('1')->orderBy('name','ASC')->get();
@endphp
<div class="left_bx">
    <div class="sidebar-profile">
		<p style="color: #fff; font-size: 16px; font-weight: bold; margin-bottom: 10px;">Welcome </p>
        @php
        $user = Auth()->guard('frontend')->user();
        @endphp
        @if (isset($user->profile_picture) && !empty($user->profile_picture))
        <img class="img-fluid" src="{{ URL::asset('public/uploads/frontend/profile_picture/preview/' . $user->profile_picture) }}" data-holder-rendered="true" alt="">
        @else
        <img class="img-fluid" src="{{URL::asset('public/frontend/images/user.jpg')}}" data-holder-rendered="true" alt="">
        @endif
        <div class="dropdown">
            <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Auth::guard('frontend')->user()->first_name}} {{Auth::guard('frontend')->user()->last_name}}
            </button>
            <div class="dropdown-menu">
                <!--<a class="dropdown-item" href="#">Manage Account</a>-->
                <a class="dropdown-item" href="{{Route('logout')}}">Logout</a>
            </div>
        </div>
    </div>


    <h1><i class="icofont-gear"></i> Account Settings</h1>
    <ul>
        <li><a href="{{Route('manage-account')}}">Manage Account</a></li>
        <li><a href="{{ Route('change-password') }}">Change Password</a></li>
		@if(Auth::guard('frontend')->user()->type_id == '2')
		<!--<li><a href="{{ Route('teacher-event-registration') }}">Teacher Registration</a></li>-->
		@endif
        <!--<li><a href="#">Link_3</a></li>
        <li><a href="#">Link_4</a></li>
        <li><a href="#">Link_5</a></li>
        <li><a href="#">Link_6</a></li>
        <li><a href="#">Link_7</a></li>-->
    </ul>

    @if(Auth::guard('frontend')->user()->type_id == '2')
    <h1 class="mt-3"><i class="icofont-list"></i> Online Registration List</h1>
    <ul>
        @forelse($division_list as $division)
        <li><a href="{{ Route('get-online-registration-list',['id'=>base64_encode($division->id)]) }}">{{ucfirst($division->name)}} Registration List</a></li>
        @empty

        @endforelse
    </ul>
    @elseif(Auth::guard('frontend')->user()->type_id == '3')
    <h1 class="mt-3"><i class="icofont-list"></i> Online Registration</h1>
    <ul>
        <li><a href="{{ Route('broadcom-registration') }}">Broadcom Registration</a></li>
        <li><a href="{{ Route('andromeda-registration') }}">Andromeda Registration</a></li>
        <li><a href="{{ Route('isef-registration') }}">NYSSEF ISEF Registration</a></li>
    </ul>
    @endif
</div>