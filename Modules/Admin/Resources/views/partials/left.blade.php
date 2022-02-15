<ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
    <li class="nav-item {{ (Request::route()->getName() === 'admin-dashboard') ? 'active' : '' }}">
        <a href="{{ Route('admin-dashboard') }}" class="nav-link nav-toggle">
            <i class="icon-home"></i>
            <span class="title">Dashboard</span>
            <span class="selected"></span>
            <span class="arrow open"></span>
        </a>
    </li>
    <li class="nav-item {{ (Request::route()->getName() === 'admin-myprofile') ? 'active' : '' }}">
        <a href="{{ Route('admin-myprofile') }}" class="nav-link nav-toggle">
            <i class="icon-wrench"></i>
            <span class="title">Account Settings</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin-contact', 'admin-viewcontact'])) ? 'active' : '' }}">
        <a href="{{ Route('admin-contact') }}" class="nav-link nav-toggle">
            <i class="fa fa-phone"></i>
            <span class="title">Contact Us</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin-division','admin-adddivision', 'admin-viewdivision', 'admin-updatedivision'])) ? 'active' : '' }}">
        <a href="{{ Route('admin-division') }}" class="nav-link nav-toggle">
            <i class="fa fa-tasks"></i>
            <span class="title">Division</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item {{(in_array(Route::currentRouteName(), ['admin-divisionRegistration','admin-viewteacherregistration','admin-AndromedaRegistration','admin-BroadcomRegistration','admin-NYSSEFRegistration','admin-teacherRegistration','admin-viewdivisionregistration'])) ? 'active' : '' }}">
        <a href="javascript:void(0);" class="nav-link nav-toggle">
            <i class="fa fa-book"></i>
            <span class="title">Division Registration</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item {{ (Request::route()->getName() === 'admin-AndromedaRegistration') ? 'active' : '' }}">
                <a href="{{ Route('admin-AndromedaRegistration',['id' => '2']) }}" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title">Andromeda Registration</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item {{ (Request::route()->getName() === 'admin-BroadcomRegistration') ? 'active' : '' }}">
                <a href="{{ Route('admin-BroadcomRegistration',['id' => '3']) }}" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title">Broadcom Registration</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item {{ (Request::route()->getName() === 'admin-NYSSEFRegistration') ? 'active' : '' }}">
                <a href="{{ Route('admin-NYSSEFRegistration',['id' => '1']) }}" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title">NYSSEF ISEF Registration</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item {{ (Request::route()->getName() === 'admin-teacherRegistration') ? 'active' : '' }}">
                <a href="{{ Route('admin-teacherRegistration') }}" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title">Teacher Registration</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin-division-category','admin-adddivisioncatyegory', 'admin-updatedivisioncategory'])) ? 'active' : '' }}">
        <a href="{{ Route('admin-division-category') }}" class="nav-link nav-toggle">
            <i class="fa fa-tasks"></i>
            <span class="title">Division Category</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin-emails', 'admin-viewemail', 'admin-updateemail'])) ? 'active' : '' }}">
		<a href="{{ Route('admin-emails') }}" class="nav-link nav-toggle">
			<i class="icon-envelope"></i>
			<span class="title">Emails</span>
			<span class="selected"></span>
			<span class="arrow"></span>
		</a>
	</li>
    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin-events','admin-listschedule','admin-addevent','admin-updateevent','admin-addschedule','admin-updateschedule'])) ? 'active' : '' }}">
        <a href="{{ Route('admin-events') }}" class="nav-link nav-toggle">
            <i class="fa fa-calendar"></i>
            <span class="title">Events</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item {{ (Request::route()->getName() === 'admin-settings') ? 'active' : '' }}">
        <a href="{{ Route('admin-settings') }}" class="nav-link nav-toggle">
            <i class="fa fa-cog"></i>
            <span class="title">Global Settings</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item {{ (Request::route()->getName() === 'admin-participationform') ? 'active' : '' }}">
        <a href="{{ Route('admin-participationform') }}" class="nav-link nav-toggle">
            <i class="fa fa-file-pdf-o"></i>
            <span class="title">Participation Forms</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin-judgeregistration','admin-viewjudgeregistration'])) ? 'active' : '' }}">
        <a href="{{ Route('admin-judgeregistration') }}" class="nav-link nav-toggle">
            <i class="fa fa-users"></i>
            <span class="title">Judge</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin-registration-setting','admin-updateregistersetting','admin-addregistersetting'])) ? 'active' : '' }}">
        <a href="{{ Route('admin-registration-setting') }}" class="nav-link nav-toggle">
            <i class="fa fa-cog"></i>
            <span class="title">Registration Settings</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin-school','admin-addschool','admin-updateschool'])) ? 'active' : '' }}">
        <a href="{{ Route('admin-school') }}" class="nav-link nav-toggle">
            <i class="fa fa-university"></i>
            <span class="title">Schools</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin-students','admin-addstudent', 'admin-viewstudent', 'admin-updatestudents'])) ? 'active' : '' }}">
        <a href="{{ Route('admin-students') }}" class="nav-link nav-toggle">
            <i class="fa fa-users"></i>
            <span class="title">Students</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin-teachers','admin-addteacher', 'admin-viewteacher', 'admin-updateteacher'])) ? 'active' : '' }}">
        <a href="{{ Route('admin-teachers') }}" class="nav-link nav-toggle">
            <i class="fa fa-users"></i>
            <span class="title">Teachers</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin-volunteerregistration','admin-viewvolunteerregistration'])) ? 'active' : '' }}">
        <a href="{{ Route('admin-volunteerregistration') }}" class="nav-link nav-toggle">
            <i class="fa fa-users"></i>
            <span class="title">Volunteer</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin-volunteer-positions','admin-addvolunteerposition','admin-updatevolunteerposition'])) ? 'active' : '' }}">
        <a href="{{ Route('admin-volunteer-positions') }}" class="nav-link nav-toggle">
            <i class="fa fa-calendar"></i>
            <span class="title">Volunteer Positions</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin-form','admin-addform','admin-updateform'])) ? 'active' : '' }}">
        <a href="{{ Route('admin-form') }}" class="nav-link nav-toggle">
            <i class="fa fa-file-pdf-o"></i>
            <span class="title">2020 Forms</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    
    <!--<li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin-plans','admin-addplan', 'admin-viewplan', 'admin-updateplan'])) ? 'active' : '' }}">
        <a href="{{ Route('admin-plans') }}" class="nav-link nav-toggle">
            <i class="fa fa-tasks"></i>
            <span class="title">Plans</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>

    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin-cms', 'admin-viewcms', 'admin-updatecms'])) ? 'active' : '' }}">
        <a href="{{ Route('admin-cms') }}" class="nav-link nav-toggle">
            <i class="fa fa-picture-o"></i>
            <span class="title">CMS</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin-contact', 'admin-viewcontact'])) ? 'active' : '' }}">
        <a href="{{ Route('admin-contact') }}" class="nav-link nav-toggle">
            <i class="fa fa-phone"></i>
            <span class="title">Contact Us</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>

    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin-faqs', 'admin-createfaq', 'admin-viewfaq', 'admin-updatefaq'])) ? 'active' : '' }}">
        <a href="{{ Route('admin-faqs') }}" class="nav-link nav-toggle">
            <i class="fa fa-question"></i>
            <span class="title">Faqs</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin-emails', 'admin-viewemail', 'admin-updateemail'])) ? 'active' : '' }}">
		<a href="{{ Route('admin-emails') }}" class="nav-link nav-toggle">
			<i class="icon-envelope"></i>
			<span class="title">Emails</span>
			<span class="selected"></span>
			<span class="arrow"></span>
		</a>
	</li>

    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin-seo', 'admin-viewseo', 'admin-updateseo'])) ? 'active' : '' }}">
        <a href="{{ Route('admin-seo') }}" class="nav-link nav-toggle">
            <i class="icon-list"></i>
            <span class="title">SEO</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item {{ (in_array(Route::currentRouteName(), ['admin-staticpages', 'admin-viewstaticpage', 'admin-updatestaticpage'])) ? 'active' : '' }}">
        <a href="{{ Route('admin-staticpages') }}" class="nav-link nav-toggle">
            <i class="icon-layers"></i>
            <span class="title">Static Pages</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>-->

</ul>