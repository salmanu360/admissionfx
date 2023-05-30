<!DOCTYPE html>
<html lang="en-US">


<head>
  <meta charset="UTF-8">
  <meta name='verify-v1' content='01887400be7cf71b46fd788648196e67' />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="facebook-domain-verification" content="9dd3x748aniq7wwqp6fzo7j82bqed0" />
  <meta name="p:domain_verify" content="ee54ac2da73c8ad911fcc16616960620" />

  <base />
  <title> Best Overseas Education Consultant for Students in India- Online Study Abroad Recruitment Platform for Institutions, Recruiters - University Bureau </title>
  <meta name="description" content="University Bureau is  the most experienced overseas education advisor in India. Our Study Abroad advisor will help you out by giving you best study abroad counselling to students and also become best online study abroad recruitment platform for recruiters and Institutions">
  <meta name="keywords" content="Online Recruitment Platform">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="{{asset('university/assets/4d8f8a68/themes/red/pace-theme-minimalb045.css')}}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" rel="stylesheet">
  <link href="{{asset('university/css/bootstrap.min16ec.css')}}" rel="stylesheet">
  <link href="{{asset('university/css/styleea00.css')}}" rel="stylesheet">
  <link href="{{asset('university/css/dashboardc344.css')}}" rel="stylesheet">
  <link href="{{asset('university/css/custom1519.css')}}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="{{asset('university/js/bootstrap.bundle.min472e.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="{{asset('university/js/custom8338.js')}}"></script>
  <script src="{{asset('university/assets/4d8f8a68/paceb045.js')}}"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('university/images/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('university/images/favicon-16x16.png')}}">

  <!-- Pixel Code for https://socialproof.universitybureau.com/ -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- END Pixel Code -->

</head>

<body>
    <header class="main-menu">
        <div class="top-header">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-6 text-start desktop-view-only">
                <ul class="contacts-link">
                  <!--<li><a href="tel:"><i class="fa fa-phone-alt call-ani"></i> </a></li>-->
                  <li><a href="tel:+91-9355500042"><i class="fa fa-phone-alt call-ani"></i>+91 93-555-000-42 </a></li>
                  <li><a href="mailto:support@universitybureau.com "><i class="fa fa-envelope call-ani"></i>
                      support@universitybureau.com </a></li>
                </ul>
                <!--<div class="dropdown">-->
                <!--            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"-->
                <!--                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--                Register-->
                <!--            </button>-->
                <!--            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">-->
                <!--                <button class="dropdown-item" type="button"><a class="nav-link"-->
                <!--                        href="{{ route('frontend.student.index') }}">As Student</a></button>-->
                <!--                <button class="dropdown-item" type="button"><a class="nav-link"-->
                <!--                        href="{{ route('frontend.recruiter.index') }}">As Recruiter</a></button>-->
                <!--            </div>-->
                <!--        </div>-->
    
              </div>
              <div class="col-md-6 text-end">
            <ul class="contacts-link">
                @auth
                @if(Auth::user()->role =='recruiter')
                    <li> <a href="{{route('recruiter.dashboard')}}" title="Register">Welcome: {{Auth::user()->name}}</a></li>
               
                @elseif(Auth::user()->role =='rm')
                    <li> <a href="{{route('rmanager.dashboard')}}" title="Register">Welcome: {{Auth::user()->name}}</a></li>
                    
                @elseif(Auth::user()->role =='application')
                    <li> <a href="{{route('application.dashboard')}}" title="Register">Welcome: {{Auth::user()->name}}</a></li> 
                @elseif(Auth::user()->role =='student')
                    <li> <a href="{{route('student.dashboard')}}" title="Register">Welcome: {{Auth::user()->name}}</a></li>     
                @endif
               
                @endauth
                @guest
                 <li><a href="{{route('login')}}" class="top-header-btn"><i class="fas fa-user pe-1"></i> Login</a></li>
                 <li class="ps-1"><a href="{{route('register')}}" class="top-header-btn"><i class="fas fa-user-plus pe-1"></i>Register</a></li>
                @endguest
             

                  <li class="btn-group">
                    <a href="#" class="top-menu-bar" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                      aria-controls="offcanvasRight"><i class="fas fa-bars"></i></a>
                    <div class="offcanvas offcanvas-end home-side-menu-container" tabindex="-1" id="offcanvasRight"
                      aria-labelledby="offcanvasRightLabel">
                      <div class="offcanvas-header home-side-menu-header">
                        <h5 id="offcanvasRightLabel"></h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body home-side-menu-inner">
                        <ul class="dropdown-menu show home-side-menu">
                                                  <!--  <li><a class="dropdown-item" href="#">Affiliated</a></li>
                            <li><a class="dropdown-item" href="#">Publisher</a></li>
                            <li><a class="dropdown-item" href="#">Advertiser</a></li> -->
  
                          <li><a class="dropdown-item" href="story.html">Our Story</a></li>
                          <li><a class="dropdown-item" href="carrer.html">Careers</a></li>
                          <li><a class="dropdown-item" href="contact.html">Contact</a></li>
                          <li><a class="dropdown-item" href="blogs/index.html">Blog</a></li>
                          <li><a class="dropdown-item" href="about-us.html">About Us</a></li>
                          <li>
                            <div class="dropdown study-menu-container">
                              <a class="btn dropdown-toggle dropdown-item" type="button" id="dropdownMenu2" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Study Destination
                              </a>
                              <div class="dropdown-menu study-menu" aria-labelledby="dropdownMenu2">
                                <a class="dropdown-item" href="country/study-in-canada.html">Study In Canada</a>
                                <a class="dropdown-item" href="country/study-in-australia.html">Study In Australia</a>
                                <a class="dropdown-item" href="country/study-in-switzerland.html">Study In Switzerland</a>
                                <a class="dropdown-item" href="country/study-in-united-kingdom.html">Study In United Kingdom</a>
                                <a class="dropdown-item" href="country/study-in-united-state-of-america.html">Study In U.S.A</a>
                                <a class="dropdown-item" href="country/study-in-ireland.html">Study In Ireland</a>
                                <a class="dropdown-item" href="country/study-in-france.html">Study In France</a>
                                <a class="dropdown-item" href="country/study-in-germany.html">Study In Germany</a> 
                                <a class="dropdown-item" href="country/study-in-latvia.html">Study In Latvia</a> 
                                <!--<a class="dropdown-item" href="/country/study-in-italy">Study In Italy</a> -->
                                <a class="dropdown-item" href="country/study-in-europe.html">Study In Europe</a> 
                                <!-- <a class="dropdown-item" href="/country/study-in-australia">Study In Australia</a> -->
                                
                              </div>
                            </div>
                          </li>
  
                          <li>
                            <div class="helpdesk mt-4">
                              <ul class="contacts-link">
                                <li>
                                  <h4>Helpdesk Support</h4>
                                </li>
                                <li><a href="tel:+91-9355500042"><i class="fa fa-phone-alt"></i>+91 93-555-000-42</a></li>
                                <li><a href="mailto:support@universitybureau.com"><i class="fa fa-envelope"></i>
                                    support@universitybureau.com</a></li>
                              </ul>
                              <ul class="social-icons mt-3">
                                <li><a href="https://www.facebook.com/universitybureau"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://twitter.com/universitybure1"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/universitybureau"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li><a href="https://www.instagram.com/universitybureau/"><i class="fab fa-instagram"></i></a></li>
                              </ul>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </li>
            </ul>
          </div>
            </div>
          </div>
        </div>
        <div id="navbar" class="">
          <div class="container">
            <nav class="navbar desktop-menu navbar-expand-lg navbar-light" aria-label="Eleventh navbar example">
              <div class="container-fluid p-0">
                <a class="navbar-brand" href="/"><img src="{{asset('university/images/logo-white.png')}}" alt="Logo" class="white-logo">
                  <img src="{{asset('university/images/logo.png')}}" alt="Logo" class="sticky-logo"></a>
                <a href="#" class="navbar-toggler">
                  <i class="fas fa-search"></i>
                </a>
    
                <div class="mob-view-only mob-mar-t-10">
                  <ul class="navbar-nav ms-auto mb-lg-0 mt-0">
                    <li class="nav-item ">
                      <a class="nav-link " href="{{route('students')}}"><i class="fas fa-user-graduate"></i>Students</a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link " href="{{route('recruiters')}}"><i class="fas fa-user-tie"></i>Recruiters</a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link " href="{{route('institutions')}}"><i class="fas fa-university"></i>Institutions
                      </a>
                    </li>
                  </ul>
                </div>
    
                <div class="collapse navbar-collapse pe-2">
                  <ul class="navbar-nav ms-auto mb-lg-0 mt-0">
    
                    <!--  <li class="nav-item ">
                        <a class="nav-link " href="/search-college"><i class="fas fa-search"></i>Search Colleges</a>
                      </li>
                       -->
                    <li class="nav-item ">
                      <!--<a class="nav-link " href="{{route('students')}}"><i class="fas fa-user-graduate"></i>For Students</a>-->
                      <a class="nav-link" href="{{ route('frontend.student.index') }}"><i class="fas fa-user-graduate"></i>For Student</a>
                    </li>
                    <li class="nav-item ">
                      <!--<a class="nav-link " href="{{route('recruiters')}}"><i class="fas fa-user-tie"></i>For Recruiters</a>-->
                      <a class="nav-link" href="{{ route('frontend.recruiter.index') }}"><i class="fas fa-user-tie"></i>For Recruiter</a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link " style="border: none;" href="{{route('institutions')}}"><i class="fas fa-university"></i>For
                        Institutions </a>
                    </li>
                    <li class="nav-item top-menu-sidemenu-bars-box">
                      <a href="#" class="top-menu-sidemenu-bars" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                      aria-controls="offcanvasRight"><i class="fas fa-bars"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </header>   