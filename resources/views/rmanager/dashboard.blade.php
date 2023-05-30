@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>Hi, {{Auth::user()->name}}</h3>
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a class="dropdown-toggle btn" href="#" role="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text"><span>Show</span> : Daily Analytics</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="filterDropdown">
            <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics" href="javascript:void(0);">Daily Analytics</a>
            <a class="dropdown-item" data-value="<span>Show</span> : Weekly Analytics" href="javascript:void(0);">Weekly Analytics</a>
            <a class="dropdown-item" data-value="<span>Show</span> : Monthly Analytics" href="javascript:void(0);">Monthly Analytics</a>
            <a class="dropdown-item" data-value="Download All" href="javascript:void(0);">Download All</a>
            <a class="dropdown-item" data-value="Share Statistics" href="javascript:void(0);">Share Statistics</a>
        </div>
    </div>
</div>


<div class="row layout-top-spacing">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value" style="font-size: 16px;">Total Country</h6>
                        <p class=""><a href="{{route('countries.index')}}">View</a></p>
                    </div>
                    <div class="">
                        <div class="w-icon">
                            {{$totalCountry}}
                        </div>
                    </div>
                </div>
                <div class="progress" style="margin-top: 10px !important;">
                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: {{$totalCountry}}%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value" style="font-size: 16px;">Total Course</h6>
                        <p class=""><a href="{{route('courses.index')}}">View</a></p>
                    </div>
                    <div class="">
                        <div class="w-icon">
                            {{$totalCourse}}
                        </div>
                    </div>
                </div>
                <div class="progress" style="margin-top: 10px !important;">
                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: {{$totalCourse}}%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value" style="font-size: 16px;">Total College</h6>
                        <p class=""><a href="{{route('colleges.index')}}">View</a></p>
                    </div>
                    <div class="">
                        <div class="w-icon">
                            {{$totalCollege}}
                        </div>
                    </div>
                </div>
                <div class="progress" style="margin-top: 10px !important;">
                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: {{$totalCollege}}%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value" style="font-size: 16px;">Total Recruiters</h6>
                        <p class=""><a href="{{route('recruiters.index')}}">View</a></p>
                    </div>
                    <div class="">
                        <div class="w-icon">
                            {{$totalRecruiter}}
                        </div>
                    </div>
                </div>
                <div class="progress" style="margin-top: 10px !important;">
                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: {{$totalRecruiter}}%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value" style="font-size: 16px;">Total Student</h6>
                        <p class=""><a href="{{route('students.index')}}">View</a></p>
                    </div>
                    <div class="">
                        <div class="w-icon">
                            {{$totalStudent}}
                        </div>
                    </div>
                </div>
                <div class="progress" style="margin-top: 10px !important;">
                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width:{{$totalStudent}}%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection