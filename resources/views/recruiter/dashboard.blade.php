@extends('recruiter.master')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h3>Hi, {{ Auth::user()->name }}</h3>
        </div>
        <div class="dropdown filter custom-dropdown-icon">
            <a class="dropdown-toggle btn" href="#" role="button" id="filterDropdown" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><span class="text"><span>Show</span> : Daily Analytics</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg></a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="filterDropdown">
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics" href="javascript:void(0);">Daily
                    Analytics</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Weekly Analytics" href="javascript:void(0);">Weekly
                    Analytics</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Monthly Analytics"
                    href="javascript:void(0);">Monthly Analytics</a>
                <a class="dropdown-item" data-value="Download All" href="javascript:void(0);">Download All</a>
                <a class="dropdown-item" data-value="Share Statistics" href="javascript:void(0);">Share Statistics</a>
            </div>
        </div>
    </div>
 <section class="study-destinaton-section pt-0 pb-0 mb-5 mt-3" style="box-shadow: 0 0 40px 0 rgba(94, 92, 154, 0.06)">
                        <div class="">
                            <div class="row">
                                <div class="studydes_main" style="">
                                    <div class="studydes-container owl-carousel owl-loaded owl-drag">
                                        
                                        
                                <div class="owl-stage-outer">
                                    <div class="owl-stage" style="transform: translate3d(-1260px, 0px, 0px); transition: all 0.25s ease 0s; width: 2701px;">
                                        
                                        @foreach ($colleges as $college)
                                        <div class="owl-item" style="width: 170.031px; margin-right: 10px;">
                                            
                                            <div class="item">
                                              <a href="{{ route('college.course', $college->id) }}">
                                                  <div class="studydes-card">
                                                      <img src="{{ asset($college->image) }}" alt="">
                                                      <a href="{{ route('college.course', $college->id) }}">
                                                            <h6><b>Study In {{ $college->name }}</b></h6>
                                                        </a>
                                                  </div>
                                              </a>
                                            </div>
                                            
                                        </div>
                                        @endforeach
                                        
                                        </div></div>
                                        <div class="owl-nav disabled">
                                            <button type="button" role="presentation" class="owl-prev">
                                                <span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div></div>
                                </div>
                            </div>
                        </div>
                    </section>
                     <div class="row layout-top-spacing">
                        
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-content m-0">
                                        <div class="w-info">
                                            <h6 class="" style="font-size: 16px;">Applications</h6>
                                            <p class="m-0"><a href="{{route('rec.application')}}">View</a></p>
                                        </div>
                                        <div class="">
                                            <div class="w-icon" style="font-size: 36px; font-weight: 700;">
                                                {{$totalStdApplication}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-content m-0">
                                        <div class="w-info">
                                            <h6 class="" style="font-size: 16px;">Total Colleges</h6>
                                            <p class="m-0"><a href="{{route('colg.index')}}">View</a></p>
                                        </div>
                                        <div class="">
                                            <div class="w-icon" style="font-size: 36px; font-weight: 700;">
                                                {{ $totalCollege }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-content m-0">
                                        <div class="w-info">
                                            <h6 class="" style="font-size: 16px;">Students</h6>
                                            <p class="m-0"><a href="{{route('std.index')}}">View</a></p>
                                        </div>
                                        <div class="">
                                            <div class="w-icon" style="font-size: 36px; font-weight: 700;">
                                                {{ $totalStudent }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
      <!--<div class="row">
        @foreach ($colleges as $college)
        <div class="col-md-3 mt-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                  <a href="{{route('college.course', $college->id)}}"><p class="card-text">{{$college->name}}</p></a>
                </div>
              </div>
        </div>
        @endforeach
    </div>-->


    <!--<div class="row layout-top-spacing">-->
    <!--    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">-->
    <!--        <div class="widget widget-card-four">-->
    <!--            <div class="widget-content">-->
    <!--                <div class="w-content">-->
    <!--                    <div class="w-info">-->
    <!--                        <h6 class="value" style="font-size: 16px;">Total Course</h6>-->
    <!--                        <p class=""><a href="">View</a></p>-->
    <!--                    </div>-->
    <!--                    <div class="">-->
    <!--                        <div class="w-icon">-->
    <!--                            {{ $totalCourse }}-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="progress" style="margin-top: 10px !important;">-->
    <!--                    <div class="progress-bar bg-gradient-secondary" role="progressbar"-->
    <!--                        style="width: {{ $totalCourse }}%" aria-valuenow="57" aria-valuemin="0"-->
    <!--                        aria-valuemax="100"></div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">-->
    <!--        <div class="widget widget-card-four">-->
    <!--            <div class="widget-content">-->
    <!--                <div class="w-content">-->
    <!--                    <div class="w-info">-->
    <!--                        <h6 class="value" style="font-size: 16px;">Total College</h6>-->
    <!--                        <p class=""><a href="">View</a></p>-->
    <!--                    </div>-->
    <!--                    <div class="">-->
    <!--                        <div class="w-icon">-->
    <!--                            {{ $totalCollege }}-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="progress" style="margin-top: 10px !important;">-->
    <!--                    <div class="progress-bar bg-gradient-secondary" role="progressbar"-->
    <!--                        style="width: {{ $totalCollege }}%" aria-valuenow="57" aria-valuemin="0"-->
    <!--                        aria-valuemax="100"></div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">-->
    <!--        <div class="widget widget-card-four">-->
    <!--            <div class="widget-content">-->
    <!--                <div class="w-content">-->
    <!--                    <div class="w-info">-->
    <!--                        <h6 class="value" style="font-size: 16px;">Total Recruiters</h6>-->
    <!--                        <p class=""><a href="">View</a></p>-->
    <!--                    </div>-->
    <!--                    <div class="">-->
    <!--                        <div class="w-icon">-->
    <!--                            {{ $totalRecruiter }}-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="progress" style="margin-top: 10px !important;">-->
    <!--                    <div class="progress-bar bg-gradient-secondary" role="progressbar"-->
    <!--                        style="width: {{ $totalRecruiter }}%" aria-valuenow="57" aria-valuemin="0"-->
    <!--                        aria-valuemax="100"></div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">-->
    <!--        <div class="widget widget-card-four">-->
    <!--            <div class="widget-content">-->
    <!--                <div class="w-content">-->
    <!--                    <div class="w-info">-->
    <!--                        <h6 class="value" style="font-size: 16px;">Total Student</h6>-->
    <!--                        <p class=""><a href="">View</a></p>-->
    <!--                    </div>-->
    <!--                    <div class="">-->
    <!--                        <div class="w-icon">-->
    <!--                            {{ $totalStudent }}-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="progress" style="margin-top: 10px !important;">-->
    <!--                    <div class="progress-bar bg-gradient-secondary" role="progressbar"-->
    <!--                        style="width: {{ $totalStudent }}%" aria-valuenow="57" aria-valuemin="0"-->
    <!--                        aria-valuemax="100"></div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->

    <!--</div>-->
    
    <div class="row layout-top-spacing">
                    
        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="m-0">
                        <div class="">
                            <h6 class="card-title mb-3" style="font-size: 20px; font-weight: 600;">Your Account Managers</h6>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <ul class="list-group list-group-media">
                                    <li class="list-group-item p-3">
                                        <div class="media">
                                            <div class="me-3">
                                                <img alt="avatar" src="{{asset('modern-light-menu/assets/img/ankit_pic.jpg')}}" class="img-fluid rounded-circle" style="width: 70px !important;">
                                            </div>
                                            <div class="media-body-custom">
                                                <h6 class="tx-inverse m-0">Ankit Tiwari (Sr. Admissions Officer)</h6>
                                                <span class="inv-email"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline>
                                                    </svg>  tiwari.ankit@universitybureau.com</span>
                                                <span>
                                                    <i class="fa fa-phone" style="font-size: 14px;"></i>
                                                    <a href="tel:+918929219668">+918929219668</a>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>                                                
                            </div>
                            <div class="col-md-4">
                                <ul class="list-group list-group-media">
                                    <li class="list-group-item p-3">
                                        <div class="media">
                                            <div class="me-3">
                                                <img alt="avatar" src="{{asset('modern-light-menu/assets/img/sukhpreet_singh.jpg')}}" class="img-fluid rounded-circle" style="width: 70px !important;">
                                            </div>
                                            <div class="media-body-custom">
                                                <h6 class="tx-inverse m-0">Sukhpreet Singh (Operation Head)</h6>
                                                <span class="inv-email"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="24" 
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                                                class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                <polyline points="22,6 12,13 2,6"></polyline></svg> singh.sukhpreet@universitybureau.com</span>
                                                <span>
                                                    <i class="fa fa-phone" style="font-size: 14px;"></i>
                                                    <a href="tel:+919350396314">+919350396314</a>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="list-group list-group-media">
                                    <li class="list-group-item p-3">
                                        <div class="media">
                                            <div class="me-3">
                                                <img alt="avatar" src="{{asset('modern-light-menu/assets/img/ankit_pic.jpg')}}" class="img-fluid rounded-circle" style="width: 70px !important;">
                                            </div>
                                            <div class="media-body-custom">
                                                <h6 class="tx-inverse m-0">Tamanna Girdhar (Universitybureau Head)</h6>
                                                <span class="inv-email"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline>
                                                    </svg>  girdhar.tamanna@universitybureau.com</span>
                                                <span>
                                                    <i class="fa fa-phone" style="font-size: 14px;"></i>
                                                    <a href="tel:+919355500042">+919355500042</a>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>                                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    
    </div>
                    
                    <div class="row layout-top-spacing">
                        
                        <!--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">-->
                        <!--    <div class="widget widget-card-four">-->
                        <!--        <div class="widget-content">-->
                        <!--            <div class="m-0">-->
                        <!--                <div class="">-->
                        <!--                    <h6 class="card-title mb-3" style="font-size: 20px; font-weight: 600;">Others Team Members</h6>-->
                        <!--                    <ul class="list-group list-group-media">-->
                        <!--                        <li class="list-group-item ">-->
                        <!--                            <div class="media">-->
                        <!--                                <div class="me-3">-->
                        <!--                                    <img alt="avatar" src="../src/assets/img/profile-1.jpg" class="img-fluid rounded-circle" style="width: 70px !important;">-->
                        <!--                                </div>-->
                        <!--                                <div class="media-body-custom">-->
                        <!--                                    <h6 class="tx-inverse">Luke Ivory</h6>-->
                        <!--                                    <span class="inv-email"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> lauriefox@company.com</span>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </li>-->
                        <!--                        <li class="list-group-item">-->
                        <!--                            <div class="media">-->
                        <!--                                <div class="me-3">-->
                        <!--                                    <img alt="avatar" src="../src/assets/img/profile-2.jpg" class="img-fluid rounded-circle" style="width: 70px !important;">-->
                        <!--                                </div>-->
                        <!--                                <div class="media-body-custom">-->
                        <!--                                    <h6 class="tx-inverse">Sonia Shaw</h6>-->
                        <!--                                    <span class="inv-email"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> lauriefox@company.com</span>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </li>-->
                        <!--                        <li class="list-group-item  ">-->
                        <!--                            <div class="media">-->
                        <!--                                <div class="me-3">-->
                        <!--                                    <img alt="avatar" src="../src/assets/img/profile-3.jpg" class="img-fluid rounded-circle" style="width: 70px !important;">-->
                        <!--                                </div>-->
                        <!--                                <div class="media-body-custom">-->
                        <!--                                    <h6 class="tx-inverse">Dale Butler</h6>-->
                        <!--                                    <span class="inv-email"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> lauriefox@company.com</span>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </li>-->
                        <!--                    </ul>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        
                        <!--<div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">-->
                        <!--    <div class="widget widget-card-four">-->
                        <!--        <div class="widget-content">-->
                        <!--            <div class="">-->
                        <!--                <div class="">-->
                        <!--                    <h6 class="card-title mb-3" style="font-size: 20px; font-weight: 600;">Other Contacts</h6>-->
                        <!--                </div>-->

                        <!--                <div class="col-md-12">-->
                        <!--                    <ul class="list-group">-->
                        <!--                        <li class="list-group-item d-flex justify-content-between align-items-center">-->
                        <!--                            Contact 1-->
                        <!--                            <a class="badge bg-primary rounded-pill" href="tel:+918929219668">+918929219668</a>-->
                        <!--                        </li>-->
                        <!--                        <li class="list-group-item d-flex justify-content-between align-items-center">-->
                        <!--                            Contact 2-->
                        <!--                            <a class="badge bg-primary rounded-pill" href="tel:+919355500042">+919355500042</a>-->
                        <!--                        </li>-->
                        <!--                        <li class="list-group-item d-flex justify-content-between align-items-center">-->
                        <!--                            Contact 3-->
                        <!--                            <a class="badge bg-primary rounded-pill" href="tel:+918373903969">+918373903969</a>-->
                        <!--                        </li>-->
                        <!--                    </ul>-->
                        <!--                </div>-->

                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->

                    </div>

@endsection
