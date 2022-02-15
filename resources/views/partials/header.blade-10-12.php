
        <div class='thetop'></div>
        <header class="header fixed-top">
            <div class="nav-sec">
                <div class="container">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mobi_menu">
                                <a class="navbar-brand" href="#">Science Fair</a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                                    <span class="navbar-toggler-icon"><i class="icofont-navigation-menu"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="align-items-center ml-auto">
                                <nav class="navbar navbar-expand-lg">
                                    <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
                                        <ul class="navbar-nav align-items-center">
                                            <li class="nav-item">
                                                <a class="nav-link signbtn" href="{{ Route('index') }}">Home</a>
                                            </li>    
                                            <li class="nav-item">
                                                <a class="nav-link signbtn" href="{{ Route('contact-us') }}">Contact Us</a>
                                            </li>
                                            @if(Auth()->guard('frontend')->guest())    
                                            <li class="nav-item">
                                                <a class="nav-link signbtn" href="{{Route('teacher-login')}}">Teacher Login</a>
                                            </li>
											<li class="nav-item">
                                                <a class="nav-link signbtn" href="{{Route('student-login')}}">Student Login</a>
                                            </li>
                                            @else
											<li class="nav-item">
                                                <a class="nav-link signbtn" href="{{Route('dashboard')}}">Dashboard</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link signbtn" href="{{Route('logout')}}">Logout</a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div> 
                                </nav>
                            </div>
                        </div>
                    </div>

                </div>
            </div>    
        </header>