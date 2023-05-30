@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('modern-light-menu/plugins/jquery-step/jquery.steps.css')}}">
@endsection
@section('content')
    
<div class="page-header">
    <div class="page-title">
        {{-- <h3>All College</h3> --}}
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a href="{{route('recruiter.edit', $recruiter->id)}}"><button class="btn btn-success"><i class="fa-solid fa-pencil"></i> Edit</button></a>
    </div>
</div>
    
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing p-0">
    <div class="row">
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">
                    <div class="row">
                        <div class="col-md-2">
                            <strong class="card-category">Unique ID</strong>
                            <h5 class="card-title mt-2">{{$recruiter->unique_id}}</h5>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Name</strong>
                            <h5 class="card-title mt-2">{{$recruiter->first_name}} {{$recruiter->middle_name}} {{$recruiter->last_name}}</h5>
                        </div>
                        <div class="col-md-4">
                            <strong class="card-category">Email</strong>
                            <h5 class="card-title mt-2">{{$recruiter->email}}</h5>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Phone</strong>
                            <h5 class="card-title mt-2">{{$recruiter->contact_no}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!--<div class="col-xl-12 col-lg-6 col-md-6  mb-4">-->
        <!--    <div class="card b-l-card-1 h-100" style="-webkit-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); -moz-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); ">-->
        <!--        <div class="card-body">-->
        <!--            <h5 class="card-title mt-2" style="color:#e31e24">Basic Information</h5>-->
        <!--            <div class="row">-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Gender:</strong>-->
        <!--                    <h6>{{$recruiter->gender}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Marital Status:</strong> -->
        <!--                    <h6>{{$recruiter->marital_status}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Date of Birth:</strong> -->
        <!--                    <h6>{{$recruiter->birth_date}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Language :</strong> -->
        <!--                    <h6>{{$recruiter->first_language}}</h6>-->
        <!--                </div>-->

        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">State:</strong> -->
        <!--                    <h6>{{$recruiter->state}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">City:</strong> -->
        <!--                    <h6>{{$recruiter->city}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Country:</strong> -->
        <!--                    <h6>{{$recruiter->country}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Postal Code:</strong>-->
        <!--                    <h6>{{$recruiter->postal_zip}}</h6>-->
        <!--                </div>-->
                        
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Address:</strong> -->
        <!--                    <h6>{{$recruiter->address}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Country Citizenship:</strong> -->
        <!--                    <h6>{{$recruiter->country_citizenship}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Passport:</strong> -->
        <!--                    <h6>{{$recruiter->passport_number}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Passport Expiry:</strong> -->
        <!--                    <h6>{{$recruiter->passport_expiry_date}}</h6>-->
        <!--                </div>-->
                        
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->

        <!--<div class="col-xl-12 col-lg-6 col-md-6  mb-4">-->
        <!--    <div class="card b-l-card-1 h-100" style="-webkit-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); -moz-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); ">-->
        <!--        <div class="card-body">-->
               
        <!--            <h5 style="color:#e31e24">Educational Information</h5>-->
        <!--            <div class="row">-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Country Education:</strong>-->
        <!--                    <h6>{{$recruiter->country_edu}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Highest Degree:</strong> -->
        <!--                    <h6>{{$recruiter->high_level_edu}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Grading Scheme:</strong> -->
        <!--                    <h6>{{$recruiter->grading_scheme}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Country Institute:</strong> -->
        <!--                    <h6>{{$recruiter->country_institute}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Institute Name:</strong> -->
        <!--                    <h6>{{$recruiter->institute_name}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Education Level:</strong> -->
        <!--                    <h6>{{$recruiter->level_education}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Institute Language:</strong> -->
        <!--                    <h6>{{$recruiter->lan_institute}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Program From:</strong> -->
        <!--                    <h6>{{$recruiter->institute_from}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Program To:</strong> -->
        <!--                    <h6>{{$recruiter->institute_to}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Degree Name:</strong> -->
        <!--                    <h6>{{$recruiter->degree_name}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Graduation Date:</strong> -->
        <!--                    <h6>{{$recruiter->graduation_date}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Confirmation:</strong> -->
        <!--                    <h6>{{$recruiter->institute_confirmation}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Certificate:</strong> -->
        <!--                    <h6>{{$recruiter->physical_certificate}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Visa Refusal:</strong> -->
        <!--                    <h6>{{$recruiter->visa_country_refusal_detail}}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Student Status:</strong> -->
        <!--                    <h6>{{ isset($recruiter->status) == 1 ? 'Active' : 'Deactive' }}</h6>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Confirmation:</strong> -->
        <!--                    <h6>{{$recruiter->emergency_contact_phone}}</h6>-->
        <!--                </div>-->

                       
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->

        
        <!--<div class="col-xl-12 col-lg-6 col-md-6  mb-4">-->
        <!--    <div class="card b-l-card-1 h-100" style="-webkit-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); -moz-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); ">-->
        <!--        <div class="card-body">-->
               
        <!--            <h5 style="color:#e31e24">Documents Information</h5>-->
        <!--            <div class="row">-->
                       
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Passport:</strong> <br>-->
        <!--                    @if (File::exists('uploads/student/passport/' . $recruiter->passport) & !is_null($recruiter->passport))-->
        <!--                        <img src="{{asset('uploads/student/passport/' . $recruiter->passport)}}" width="100" alt="">-->
        <!--                    @endif-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">IELTS/PTE/TOEFL:</strong> <br>-->
        <!--                    @if (File::exists('uploads/student/ielts/' . $recruiter->ielts) & !is_null($recruiter->ielts))-->
        <!--                        <img src="{{asset('uploads/student/ielts/' . $recruiter->ielts)}}" width="100" alt="">-->
        <!--                    @endif <br>-->
                            
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Grade 10th:</strong>  <br>-->
        <!--                    @if (File::exists('uploads/student/grade_10/' . $recruiter->grade_10) & !is_null($recruiter->grade_10))-->
        <!--                        <img src="{{asset('uploads/student/grade_10/' . $recruiter->grade_10)}}" width="100" alt="">-->
        <!--                    @endif <br>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Grade 12th:</strong>  <br>-->
        <!--                    @if (File::exists('uploads/student/grade_12/' . $recruiter->grade_12) & !is_null($recruiter->grade_12))-->
        <!--                        <img src="{{asset('uploads/student/grade_12/' . $recruiter->grade_12)}}" width="100" alt="">-->
        <!--                    @endif <br>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="row">-->
                       
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Bachelor Mark Sheet:</strong> <br>-->
        <!--                    @if (File::exists('uploads/student/passport/' . $recruiter->passport) & !is_null($recruiter->passport))-->
        <!--                        <img src="{{asset('uploads/student/passport/' . $recruiter->passport)}}" width="100" alt="">-->
        <!--                    @endif-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Bachelor Certificate:</strong> <br>-->
        <!--                    @if (File::exists('uploads/student/bachelor_certificate/' . $recruiter->bachelor_certificate) & !is_null($recruiter->bachelor_certificate))-->
        <!--                        <img src="{{asset('uploads/student/bachelor_certificate/' . $recruiter->bachelor_certificate)}}" width="100" alt="">-->
        <!--                    @endif <br>-->
                            
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Master Mark Sheet:</strong>  <br>-->
        <!--                    @if (File::exists('uploads/student/master_mark_sheet/' . $recruiter->master_mark_sheet) & !is_null($recruiter->master_mark_sheet))-->
        <!--                        <img src="{{asset('uploads/student/master_mark_sheet/' . $recruiter->master_mark_sheet)}}" width="100" alt="">-->
        <!--                    @endif <br>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">LORS:</strong>  <br>-->
        <!--                    @if (File::exists('uploads/student/master_certificate/' . $recruiter->master_certificate) & !is_null($recruiter->master_certificate))-->
        <!--                        <img src="{{asset('uploads/student/master_certificate/' . $recruiter->master_certificate)}}" width="100" alt="">-->
        <!--                    @endif <br>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Resume:</strong>  <br>-->
        <!--                    @if (File::exists('uploads/student/master_certificate/' . $recruiter->master_certificate) & !is_null($recruiter->master_certificate))-->
        <!--                        <img src="{{asset('uploads/student/master_certificate/' . $recruiter->master_certificate)}}" width="100" alt="">-->
        <!--                    @endif <br>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Work Experience:</strong>  <br>-->
        <!--                    @if (File::exists('uploads/student/master_certificate/' . $recruiter->master_certificate) & !is_null($recruiter->master_certificate))-->
        <!--                        <img src="{{asset('uploads/student/master_certificate/' . $recruiter->master_certificate)}}" width="100" alt="">-->
        <!--                    @endif <br>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">MOI:</strong>  <br>-->
        <!--                    @if (File::exists('uploads/student/master_certificate/' . $recruiter->master_certificate) & !is_null($recruiter->master_certificate))-->
        <!--                        <img src="{{asset('uploads/student/master_certificate/' . $recruiter->master_certificate)}}" width="100" alt="">-->
        <!--                    @endif <br>-->
        <!--                </div>-->
        <!--                <div class="col-md-3">-->
        <!--                    <strong class="card-category">Master Certificate:</strong>  <br>-->
        <!--                    @if (File::exists('uploads/student/master_certificate/' . $recruiter->master_certificate) & !is_null($recruiter->master_certificate))-->
        <!--                        <img src="{{asset('uploads/student/master_certificate/' . $recruiter->master_certificate)}}" width="100" alt="">-->
        <!--                    @endif <br>-->
        <!--                </div>-->

        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->

    </div>
</div>
@endsection

