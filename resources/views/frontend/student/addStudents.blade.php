@include('frontend.include.header')

<head>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
<link href="{{asset('modern-light-menu/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('modern-light-menu/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
</head>

    <!-- views -->
<section class="banner-menu mob-inner-height">
<div class="bg-video-wrap">
  <img src="{{asset('university/images/students-banner.jpg')}}" alt="banner-img" class="desktop-view-only w-100">
  <img src="{{asset('university/images/mob-students-banner.jpg')}}" alt="banner-img" class="mob-view-only w-100">
  <div class="container banner-caption mob-inner-caption">
    <div class="banner-text mb-3">
      <h1 class="cooper">Discover the Easiest</h1>
      <h2>Way to Study Abroad With Us</h2>
      <p>Guidance from research to admission to visa to your dream institution, we guide you at every step.</p>
    </div>
    <a href="signup.html" class="banner-btn">Start With Us</a>
  </div>
</div>
</section>

<div class="row" style="justify-content: center; background:white;">
    <div class="col-md-10">
        <div class="page-header">
            <div class="page-title">
                <h3>Student Form</h3>
            </div>
        </div>
    
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                @include('admin.partials._message')
                <form action="{{ route('frontend.student.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content widget-content-area">
                                    <div id="circle-basic" class="">
                                        {{--/////////////////////////////////////////////////////////////////////////////////////////// --}}
                                        <h3>General Information</h3>
                                        <section style="padding: 1.5% !important;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="first_name">First Name</label>
                                                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}"  >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="middle_name">Middle Name</label>
                                                        <input type="text" name="middle_name"
                                                               class="form-control"
                                                               id="middle_name" 
                                                               value="{{ old('middle_name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="last_name">Last Name</label>
                                                        <input type="text" name="last_name"
                                                               class="form-control"
                                                               id="last_name" 
                                                               value="{{ old('last_name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="birth_date">Birth Date</label>
                                                        <input type="date" name="birth_date"
                                                               class="form-control"
                                                               id="birth_date" 
                                                               value="{{ old('birth_date') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="first_language">First Language</label>
                                                        <input type="text" name="first_language"
                                                               class="form-control"
                                                               id="first_language"
                                                               
                                                               value="{{ old('first_language') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="country_citizenship">Country of Citizenship</label>
                                                        <select name="country_citizenship" class="form-control" id="">
                                                            @foreach ($countries as $country)
                                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="passport_number">Passport Number</label>
                                                        <input type="text" name="passport_number"
                                                               class="form-control"
                                                               id="passport_number"
                                                               
                                                               value="{{ old('passport_number') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="passport_expiry_date">Passport Expiry Date</label>
                                                        <input type="date" name="passport_expiry_date"
                                                               class="form-control"
                                                               id="passport_expiry_date"
                                                               
                                                               value="{{ old('passport_expiry_date') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="birth_date">Add Intake</label>
                                                        <input type="date" name="intake"
                                                               class="form-control"
                                                               id="birth_date" 
                                                               value="{{ old('intake') }}">
                                                    </div>
                                                </div>
    
    
                                                <div class="col-md-6">
                                                    <p>Marital Status</p>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="single" value="single" name="marital_status"
                                                                               class="custom-control-input">
                                                                        <label class="custom-control-label" for="single">Single</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="married" value="married" name="marital_status"
                                                                           class="custom-control-input">
                                                                    <label class="custom-control-label" for="married">Married</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="separated" value="separated" name="marital_status"
                                                                           class="custom-control-input">
                                                                    <label class="custom-control-label" for="separated">Separated</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="col-md-6">
                                                    <P>Gender</P>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="male"
                                                                               name="gender" value="male"
                                                                               class="custom-control-input">
                                                                        <label class="custom-control-label" for="male">Male</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="female" value="female" name="gender"
                                                                           class="custom-control-input">
                                                                    <label class="custom-control-label" for="female">Female</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        {{--/////////////////////////////////////////////////////////////////////////////////////////// --}}
                                        <h3>Address Detail</h3>
                                        <section style="padding: 1.5% !important;">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" name="address"
                                                               class="form-control"
                                                               id="address" 
                                                               value="{{ old('address') }}">
                                                    </div>
                                                </div>
    
    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="city">City</label>
                                                        <select name="city" class="form-control" id="">
                                                            @foreach ($cities as $city)
                                                                <option value="{{$city->name}}">{{$city->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="state">State</label>
                                                        <select name="state" class="form-control" id="">
                                                            @foreach ($states as $state)
                                                                <option value="{{$state->name}}">{{$state->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="country">Country</label>
                                                        <select name="country" class="form-control" id="">
                                                            @foreach ($countries as $country)
                                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="postal_zip">Postal/Zip Code</label>
                                                        <input type="text" name="postal_zip"
                                                               class="form-control"
                                                               id="postal_zip" 
                                                               value="{{ old('postal_zip') }}">
                                                    </div>
                                                </div>
    
    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" name="email"
                                                               class="form-control"
                                                               id="email" 
                                                               value="{{ old('email') }}">
                                                    </div>
                                                </div>
    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="contact_no">Phone Number</label>
                                                        <input type="number" name="contact_no"
                                                               class="form-control"
                                                               id="contact_no" 
                                                               value="{{ old('contact_no') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h4>Emergency Contact Details</h4>
                                                </div>
                                                <div class="col-md-6">
    
                                                </div>
                                                <div class="col-md-6">
    
                                                    <div class="form-group">
                                                        <label for="emergency_contact_name">Emergency Contact Full Name</label>
                                                        <input type="text" name="emergency_contact_name"
                                                               class="form-control"
                                                               id="emergency_contact_name" 
                                                               value="{{ old('emergency_contact_name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="emergency_contact_relation">Emergency Contact Relationship</label>
                                                        <input type="text" name="emergency_contact_relation"
                                                               class="form-control"
                                                               id="emergency_contact_relation" 
                                                               value="{{ old('emergency_contact_relation') }}">
                                                    </div>
                                                </div>
    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="emergency_contact_email">Emergency Email Id</label>
                                                        <input type="email" name="emergency_contact_email"
                                                               class="form-control"
                                                               id="emergency_contact_email" 
                                                               value="{{ old('emergency_contact_email') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="emergency_contact_phone">Emergency Phone Number</label>
                                                        <input type="number" name="emergency_contact_phone"
                                                               class="form-control"
                                                               id="emergency_contact_phone" 
                                                               value="{{ old('emergency_contact_phone') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        {{--/////////////////////////////////////////////////////////////////////////////////////////// --}}
                                        <h3>Education History</h3>
                                        <section style="padding: 1.5% !important;">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="country_edu">Country Of Education</label>
                                                        <select name="country_edu" class="form-control" id="">
                                                            @foreach ($countries as $country)
                                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="high_level_edu">Highest Level Education</label>
                                                        <select name="high_level_edu" class="form-control" id="">
                                                            @foreach ($levels as $level)
                                                                <option value="{{$level->name}}">{{$level->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="grading_scheme">Grading Scheme</label>
                                                        <select name="grading_scheme" class="form-control" id="">
                                                            @foreach ($gradings as $grading)
                                                                <option value="{{$grading->name}}">{{$grading->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        {{--/////////////////////////////////////////////////////////////////////////////////////////// --}}
                                        <h3>Schools Attended</h3>
                                        <section style="padding: 1.5% !important;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="country_institute">Country Of Institute</label>
                                                        <select name="country_institute" class="form-control" id="">
                                                            @foreach ($countries as $country)
                                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="institute_name">Name Of Institute</label>
                                                        <input type="text" name="institute_name"
                                                               class="form-control"
                                                               id="institute_name"
                                                               
                                                               value="{{ old('institute_name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="level_education">Level Of Education</label>
                                                        <select name="level_education" class="form-control" id="">
                                                            @foreach ($levels as $level)
                                                                <option value="{{$level->name}}">{{$level->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="lan_institute">Primary Language of Instruction</label>
                                                        <input type="text" name="lan_institute"
                                                               class="form-control"
                                                               id="lan_institute" 
                                                               value="{{ old('lan_institute') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="institute_from">Attended Institution Form</label>
                                                        <input type="date" name="institute_from"
                                                               class="form-control"
                                                               id="institute_from"
                                                               
                                                               value="{{ old('institute_from') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="institute_to">Attended Institution To</label>
                                                        <input type="date" name="institute_to"
                                                               class="form-control"
                                                               id="institute_to"
                                                               
                                                               value="{{ old('institute_to') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree_name">Degree Name</label>
                                                        <input type="text" name="degree_name"
                                                               class="form-control"
                                                               id="degree_name"
                                                               
                                                               value="{{ old('degree_name') }}">
                                                    </div>
                                                </div>
    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="graduation_date">Graduation Date</label>
                                                        <input type="date" name="graduation_date"
                                                               class="form-control"
                                                               id="graduation_date"
                                                               
                                                               value="{{ old('graduation_date') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                        <p>I have graduated from this institute</p>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" value="sure" id="yes"
                                                                               name="institute_confirmation"
                                                                               class="custom-control-input">
                                                                        <label class="custom-control-label" for="yes">Yes</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="no" value="not sure" name="institute_confirmation"
                                                                           class="custom-control-input">
                                                                    <label class="custom-control-label" for="no">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="col-md-6">
                                                        <p>I have the physical certificate for this Degree</p>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="applicable" value="applicable" name="physical_certificate"
                                                                               class="custom-control-input">
                                                                        <label class="custom-control-label" for="applicable">Yes</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="notapplicable" value="notapplicable" name="physical_certificate"
                                                                           class="custom-control-input">
                                                                    <label class="custom-control-label" for="notapplicable">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            </div>
                                        </section>
                                        {{--/////////////////////////////////////////////////////////////////////////////////////////// --}}
                                        <h3>Background Information</h3>
                                        <section style="padding: 1.5% !important;">
                                            <div class="row">
                                                <p>Have you been refused a visa from any country</p>
                                                <div class="col-md-12">
    
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="refused" value="refused"
                                                                               name="visa_country_refusal"
                                                                               class="custom-control-input">
                                                                        <label class="custom-control-label" for="refused">Yes</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="notrefused" value="notrefused" name="visa_country_refusal"
                                                                           class="custom-control-input">
                                                                    <label class="custom-control-label" for="notrefused">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                </div>
    
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">If you answered "Yes" to any of the questions above,
                                                            Please provide detail below: </label>
                                                        <input type="text" name="visa_country_refusal_detail"
                                                               class="form-control"
                                                               id="visa_country_refusal_detail"
                                                               
                                                               value="{{ old('visa_country_refusal_detail') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        {{--/////////////////////////////////////////////////////////////////////////////////////////// --}}
                                        <h3>Upload Documents</h3>
                                        <section style="padding: 1.5% !important;">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                        <input type="file" name="passport"
                                                               class="custom-file-input"id="passport"
                                                               >
                                                            <label class="custom-file-label" for="passport">Passport</label>
    
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                        <input type="file" name="ielts"
                                                               class="custom-file-input" id="ielts"
                                                               >
                                                            <label class="custom-file-label" for="">IELTS/PTE/TOEFL</label>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                        <input type="file" name="grade_10"
                                                               class="custom-file-input" id="grade_10"
                                                               >
                                                            <label class="custom-file-label" for="grade_10">Grade 10th</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                        <input type="file" name="grade_12"
                                                               class="custom-file-input" id="grade_12"
                                                               >
                                                            <label class="custom-file-label" for="grade_12">Grade 12th</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                        <input type="file" name="bachelor_mark_sheet"
                                                               class="custom-file-input" id="bachelor_mark_sheet"
                                                               >
                                                            <label class="custom-file-label" for="bachelor_mark_sheet">Bachelor Mark sheets</label>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                        <input type="file" name="bachelor_certificate"
                                                               class="custom-file-input" id="bachelor_certificate"
                                                               >
                                                            <label class="custom-file-label" for="bachelor_certificate">Bachelors Degree/Provisional Certificate/Bonifide
                                                                Certificate</label>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                        <input type="file" name="master_mark_sheet"
                                                               class="custom-file-input" id="master_mark_sheet"
                                                               >
                                                            <label class="custom-file-label" for="master_mark_sheet">Masters Mark sheets</label>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                        <input type="file" name="master_certificate"
                                                               class="custom-file-input" id="master_certificate"
                                                               >
                                                            <label class="custom-file-label" for="master_certificate">Masters Degree/Provisional Certificate/Bonifide
                                                                Certificate</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                        <input type="file" name="lors"
                                                               class="custom-file-input" id="lors"
                                                               >
                                                            <label class="custom-file-label" for="lors">LOR's</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                        <input type="file" name="resume"
                                                               class="custom-file-input" id="resume"
                                                               >
                                                            <label class="custom-file-label" for="resume">Resume</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                        <input type="file" multiple name="work_experience[]"
                                                               class="custom-file-input" id="work_experience"
                                                               >
                                                            <label class="custom-file-label" for="work_experience">Work Experience</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                        <input type="file" name="moi"
                                                               class="custom-file-input"  id="moi"
                                                               >
                                                            <label class="custom-file-label" for="moi">MOI</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                        <input type="file" name="personal_statement"
                                                               class="custom-file-input"
                                                               id="personal_statement"
                                                               >
                                                            <label class="custom-file-label" for="personal_statement">SOP/Personal Statement</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                        <input type="file" name="diploma_mark_sheet"
                                                               class="custom-file-input"
                                                               id="diploma_mark_sheet"
                                                               >
                                                            <label class="custom-file-label" for="diploma_mark_sheet">Diploma Mark sheets</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                        <input type="file" name="diploma_certificate"
                                                               class="custom-file-input"
                                                               id="diploma_certificate"
                                                               >
                                                            <label class="custom-file-label" for="diploma_certificate">Diploma Certificate</label>
                                                        </div>
                                                    </div>
                                                </div>
    
    
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="custom-file mb-4">
                                                        <input type="file" multiple name="other_certificate[]"
                                                               class="custom-file-input"
                                                               id="other_certificate"
                                                               >
                                                            <label class="custom-file-label" for="other_certificate">Other Certificate</label>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="col-md-6"></div>
                                                <div class="col-md-6">
                                                    <div class="text-end pb-3">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        {{--/////////////////////////////////////////////////////////////////////////////////////////// --}}
                                    </div>
                                </div>
    
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (Session::get('success'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ Session::get('success') }}',
            showConfirmButton: false,
            timer: 5000
        });
    </script>
@endif

@include('frontend.include.footer')