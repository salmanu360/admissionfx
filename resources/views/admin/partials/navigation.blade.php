<div class="topbar-nav header navbar" role="banner">
    <nav id="topbar">
        @if (auth()->user()->role == 'student')
        <ul class="navbar-nav theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="#">
                    <img src="{{ asset('modern-light-menu/assets/img/90x90.jpg') }}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="#" class="nav-link"> University Bureau </a>
            </li>
        </ul>
            @elseif(auth()->user()->role == 'rm')
            <ul class="navbar-nav theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="#">
                        <img src="{{ asset('modern-light-menu/assets/img/90x90.jpg') }}" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="#" class="nav-link"> University Bureau </a>
                </li>
            </ul>
            @elseif (auth()->user()->role == 'recruiter')
            <ul class="navbar-nav theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="#">
                        <img src="{{ asset('modern-light-menu/assets/img/90x90.jpg') }}" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="#" class="nav-link"> University Bureau </a>
                </li>
            </ul>
            @else
            <ul class="navbar-nav theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="{{ route('admin.index') }}">
                        <img src="{{ asset('modern-light-menu/assets/img/90x90.jpg') }}" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="{{ route('admin.index') }}" class="nav-link"> University Bureau </a>
                </li>
            </ul>
        @endif
        <ul class="list-unstyled menu-categories" id="topAccordion">
            @if (auth()->user()->role == 'student')
            <li class="menu single-menu active">
                <a href="#">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>{{ __('Dashboard') }}</span>
                    </div>
                </a>

            </li>
            <li class="menu single-menu">
                <a href="#page">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-file">
                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                            <polyline points="13 2 13 9 20 9"></polyline>
                        </svg>
                        <span>Menu 1</span>
                    </div>
                </a>
            </li>
            <li class="menu single-menu">
                <a href="#page">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-file">
                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                            <polyline points="13 2 13 9 20 9"></polyline>
                        </svg>
                        <span>Menu 2</span>
                    </div>
                </a>
            </li>
            <li class="menu single-menu">
                <a href="#page">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-file">
                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                            <polyline points="13 2 13 9 20 9"></polyline>
                        </svg>
                        <span>Menu 3</span>
                    </div>
                </a>
            </li>
               
            @elseif(auth()->user()->role == 'rm')
            <li class="menu single-menu active">
                <a href="{{route('rmanager.dashboard') }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>{{ __('Dashboard') }}</span>
                    </div>
                </a>

            </li>
            
             <li class="menu single-menu">
                <a href="{{ route('countries.index') }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        <span>Country</span>
                    </div>
                </a>

            </li>
            
             <li class="menu single-menu">
                <a href="{{ route('colleges.index') }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        <span>College</span>
                    </div>
                </a>

            </li>

            <li class="menu single-menu">
                <a href="{{ route('courses.index') }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout">
                            <rect x="3" y="3" width="18" height="18" rx="2"
                                ry="2"></rect>
                            <line x1="3" y1="9" x2="21" y2="9"></line>
                            <line x1="9" y1="21" x2="9" y2="9"></line>
                        </svg>
                        <span>Course</span>
                    </div>
                </a>

            </li>

            
            
            <li class="menu single-menu">
                <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                       <i class="fas fa-book-reader" style="color: #e0e6ed;"></i>
                        <span>Recruiter</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-down">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                    <li>
                        <a href="{{ route('recruiters.index') }}">Recruiter</a>
                    </li>
                    
                </ul>
            </li>
            
            <li class="menu single-menu">
                <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                       <i class="fas fa-book-reader" style="color: #e0e6ed;"></i>
                        <span>Student</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-down">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                    <li>
                        <a href="{{ route('students.index') }}">Student</a>
                    </li>
                </ul>
            </li>
            
            <li class="menu single-menu">
                <a href="{{ route('rmmanager.recruiterrm') }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout">
                            <rect x="3" y="3" width="18" height="18" rx="2"
                                ry="2"></rect>
                            <line x1="3" y1="9" x2="21" y2="9"></line>
                            <line x1="9" y1="21" x2="9" y2="9"></line>
                        </svg>
                        <span>Assign RM</span>
                    </div>
                </a>
                </li>
                
                <li class="menu single-menu">
                    <a href="{{route('rmmanager.report')}}">
                       <div class="">
                           <i class="fa fa-file" aria-hidden="true" style="color: #e0e6ed;"></i>
                           <span>Report</span>
                       </div>
                </a>
                </li>

      
            @elseif(auth()->user()->role == 'recruiter')
            <li class="menu single-menu active">
                <a href="{{route('student.dashboard')}}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>{{ __('Dashboard') }}</span>
                    </div>
                </a>

            </li>

                <li class="menu single-menu">
                    <a href="{{ route('colg.index') }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap">
                                <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                            </svg>
                            <span>College</span>
                        </div>
                    </a>

                </li>

                <li class="menu single-menu">
                    <a href="{{ route('cors.index') }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout">
                                <rect x="3" y="3" width="18" height="18" rx="2"
                                    ry="2"></rect>
                                <line x1="3" y1="9" x2="21" y2="9"></line>
                                <line x1="9" y1="21" x2="9" y2="9"></line>
                            </svg>
                            <span>Course</span>
                        </div>
                    </a>

                </li>
                
                <li class="menu single-menu">
                    <a href="{{ route('rec.recruiterrm') }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout">
                                <rect x="3" y="3" width="18" height="18" rx="2"
                                    ry="2"></rect>
                                <line x1="3" y1="9" x2="21" y2="9"></line>
                                <line x1="9" y1="21" x2="9" y2="9"></line>
                            </svg>
                            <span>Assign RM</span>
                        </div>
                    </a>

                </li>

                <li class="menu single-menu">
                    <a href="{{ route('rec.index') }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                </path>
                                <rect x="8" y="2" width="8" height="4" rx="1"
                                    ry="1"></rect>
                            </svg>
                            <span>Recruiter</span>
                        </div>
                    </a>

                </li>
                
                <li class="menu single-menu">
                    <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                           <i class="fas fa-book-reader" style="color: #e0e6ed;"></i>
                            <span>Student</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                        <li><a href="{{ route('std.index') }}">Student</a></li>
                        <li><a href="{{ route('rec.application') }}">Application</a></li>
                        <!--<li><a href="{{ route('grad.index') }}">Grading Scheme</a></li>
                        <li><a href="{{ route('edu.index') }}">Highest Level Education</a></li>-->
                    </ul>
                </li>
                
                <!-- <li class="menu single-menu">
                    <a href="{{ route('rec.application') }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                </path>
                                <rect x="8" y="2" width="8" height="4" rx="1"
                                    ry="1"></rect>
                            </svg>
                            <span>Application</span>
                        </div>
                    </a>

                </li> -->
                
                <li class="menu single-menu">
                    <a target="_blank" href="{{ route('recruiter.mou') }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                </path>
                                <rect x="8" y="2" width="8" height="4" rx="1"
                                    ry="1"></rect>
                            </svg>
                            <span>MOU</span>
                        </div>
                    </a>

                </li>
                
                <li class="menu single-menu">
                    <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                           <i class="fas fa-book-reader" style="color: #e0e6ed;"></i>
                            <span>Add more services</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                        <li><a target="_blank" href="https://ieltsbureau.com/">IELTS Training</a></li>
                        <li><a target="_blank" href="http://travelcadre.com/">Travel Booking</a></li>
                        <li><a target="_blank" href="http://visaadministration.com/">Search Visa Officers</a></li>
                        <li><a target="_blank" href="http://admissionfx.com/">Digital Marketing Services</a></li>
                        <li><a target="_blank" href="http://travelcadre.com/">Travel</a></li>
                    </ul>
                </li>
            @else

            <li class="menu single-menu active">
                <a href="{{ route('admin.index') }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>{{ __('Dashboard') }}</span>
                    </div>
                </a>

            </li>
            
                <li class="menu single-menu">
                    <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-cpu">
                                <rect x="4" y="4" width="16" height="16" rx="2"
                                    ry="2"></rect>
                                <rect x="9" y="9" width="6" height="6"></rect>
                                <line x1="9" y1="1" x2="9" y2="4"></line>
                                <line x1="15" y1="1" x2="15" y2="4"></line>
                                <line x1="9" y1="20" x2="9" y2="23"></line>
                                <line x1="15" y1="20" x2="15" y2="23"></line>
                                <line x1="20" y1="9" x2="23" y2="9"></line>
                                <line x1="20" y1="14" x2="23" y2="14"></line>
                                <line x1="1" y1="9" x2="4" y2="9"></line>
                                <line x1="1" y1="14" x2="4" y2="14"></line>
                            </svg>
                            <span>Regions</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                        <li>
                            <a href="{{ route('country.index') }}"> Country </a>
                        </li>
                        <li>
                            <a href="{{ route('states.index') }}"> State </a>
                        </li>
                        <li>
                            <a href="{{ route('cities.index') }}"> City </a>
                        </li>
                        <li>
                            <a href="{{ route('category.index') }}">Category</a>
                        </li>

                    </ul>
                </li>

                
                <li class="menu single-menu">
                    <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout">
                                <rect x="3" y="3" width="18" height="18" rx="2"
                                    ry="2"></rect>
                                <line x1="3" y1="9" x2="21" y2="9"></line>
                                <line x1="9" y1="21" x2="9" y2="9"></line>
                            </svg>
                            <span>College</span>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                        <li><a href="{{ route('college.index') }}">College</a></li>
                        <li><a href="{{ route('cors_colg.index') }}">Filter</a></li>
                    </ul>
                </li>
                
                <li class="menu single-menu">
                    <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout">
                                <rect x="3" y="3" width="18" height="18" rx="2"
                                    ry="2"></rect>
                                <line x1="3" y1="9" x2="21" y2="9"></line>
                                <line x1="9" y1="21" x2="9" y2="9"></line>
                            </svg>
                            <span>Course</span>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                        <li><a href="{{ route('course.index') }}">Course</a></li>
                        <li><a href="{{ route('course.apply') }}">Apply Course</a></li>
                        <li><a href="{{ route('intake.index') }}">Filter</a></li>
                    </ul>
                </li>


                
                
                <li class="menu single-menu">
                    <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                           <i class="fas fa-book-reader" style="color: #e0e6ed;"></i>
                            <span>Recruiter</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                        <li>
                            <a href="{{ route('recruiter.index') }}">Recruiter</a>
                        </li>
                        <li>
                            <a href="{{ route('recruiterToRm.index') }}">Assign Recruiters to RM</a>
                        </li>
                        
                    </ul>
                </li>
                
                <li class="menu single-menu">
                    <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                           <i class="fas fa-book-reader" style="color: #e0e6ed;"></i>
                            <span>Student</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                        <li>
                            <a href="{{ route('student.index') }}">Student</a>
                        </li>
                        <li>
                            <a href="{{ route('student.mou') }}">Mou</a>
                        </li>
                         <li><a href="{{ route('student.application') }}">Application</a></li>

                        <li>
                            <a href="{{ route('grading.index') }}">Grading Scheme</a>
                        </li>
                        <li>
                            <a href="{{ route('education.index') }}">Highest Level Education</a>
                        </li>
                    </ul>
                </li>
                
                <li class="menu single-menu">
                    <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                           <i class="fas fa-book-reader" style="color: #e0e6ed;"></i>
                            <span>Users</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                        <li>
                            <a href="{{ route('user.index') }}">Users</a>
                        </li>
                        
                        <li>
                            <a href="{{ route('role.index') }}">Roles</a>
                        </li>
                        <li><a href="{{ route('permission.index') }}">Permissions</a> </li>
                        <li><a href="{{ route('user.application') }}">Application Team</a> </li>
                        <li><a href="{{ route('user.rm') }}">RM</a> </li>
                        <li><a href="{{ route('user.lockrm') }}">Lock/Unlock RM</a></li>
                        <li><a href="{{ route('user.rm-unlock-history') }}">RM UN Lock History</a> </li>
                        <li><a href="{{ route('user.rm-unlock-Requests') }}">RM Requests for unlock</a> </li>
                    </ul>
                </li>
                
                 <li class="menu single-menu">
                    <a href="{{route('leadStatus.index')}}">
                        <div class="">
                            <i class="fa fa-bullhorn" style="color: #e0e6ed;" aria-hidden="true"></i>
                            <span>Lead Status</span>
                        </div>
                    </a>

                </li>
                
                <li class="menu single-menu">
                    <a href="{{route('admin.report')}}">
                       <div class="">
                           <i class="fa fa-file" aria-hidden="true" style="color: #e0e6ed;"></i>
                           <span>Report</span>
                       </div>
                </a>
                </li>
                

                
                
                <li class="menu single-menu">
                    <a href="{{route('chat.index')}}">
                        <div class="">
                            <svg width="24px" height="24px"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-message-square">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                            <span>Chat</span>
                        </div>
                    </a>

                </li>
            @endif


        </ul>
    </nav>
</div>
