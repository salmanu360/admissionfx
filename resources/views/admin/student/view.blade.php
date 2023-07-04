@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('modern-light-menu/plugins/jquery-step/jquery.steps.css') }}">
@endsection
@section('content')
    @php
        use Carbon\Carbon;
        use App\Models\User;
        use App\Models\LeadStatus;
        use App\Models\LeadHistory;
        $leadHistories = LeadHistory::where('student_id', $student->id)->get();
        $lead = LeadStatus::where('id', $student->lead_status)->first();
    @endphp
<div class="page-header">
    <div class="page-title">
        {{-- <h3>All College</h3> --}}
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a href="{{route('student.edit', $student->id)}}"><button class="btn btn-success"><i class="fa-solid fa-pencil"></i> Edit</button></a>
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
                            <h5 class="card-title mt-2">{{$student->unique_id}}</h5>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Name</strong>
                            <h5 class="card-title mt-2">{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</h5>
                        </div>
                        <div class="col-md-4">
                            <strong class="card-category">Email</strong>
                            <h5 class="card-title mt-2">{{$student->email}}</h5>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Phone</strong>
                            <h5 class="card-title mt-2">{{$student->contact_no}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">

                    <div class="mt-container mx-auto">
                        <div class="timeline-line">

                            @foreach($leadHistories as $history)
                                @php
                                    $leadUser = User::select('name')->where('id',$history->created_by)->first();
                                    $leadStatus = LeadStatus::select('name')->where('id',$history->name)->first();
                                    if ($leadStatus->name == 'New'){
                                        $class = 'primary';
                                    }else if ($leadStatus->name == 'Draft'){
                                        $class = 'warning';
                                    } elseif ($leadStatus->name == 'Process'){
                                        $class = 'info';
                                    }else if ($leadStatus->name == 'Completed'){
                                        $class = 'success';
                                    }
                                @endphp
                                <div class="item-timeline">
                                    <p class="t-time" style="min-width: 100px !important;">
                                        {{$leadStatus->name}}
                                    </p>
                                    <div class="t-dot t-dot-{{$class}}">
                                    </div>
                                    <div class="t-text">
                                        <p>{{$leadUser->name}}</p>
                                        <p class="t-meta-time">{{Carbon::parse($history->date_created)->diffForHumans()}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-xl-12 col-lg-6 col-md-6  mb-4">
            <div class="card b-l-card-1 h-100"
                 style="-webkit-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); -moz-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); ">
                <div class="card-body">
                    <h5 class="card-title mt-2" style="color:#e31e24">Basic Information</h5>
                    <div class="row">
                        <div class="col-md-3">
                            <strong class="card-category">Gender:</strong>
                            <h6>{{$student->gender}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Marital Status:</strong> 
                            <h6>{{$student->marital_status}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Date of Birth:</strong> 
                            <h6>{{$student->birth_date}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Language :</strong> 
                            <h6>{{$student->first_language}}</h6>
                        </div>

                        <div class="col-md-3">
                            <strong class="card-category">State:</strong> 
                            <h6>{{$student->state}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">City:</strong> 
                            <h6>{{$student->city}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Country:</strong> 
                            <h6>{{$student->country}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Postal Code:</strong>
                            <h6>{{$student->postal_zip}}</h6>
                        </div>
                        
                        <div class="col-md-3">
                            <strong class="card-category">Address:</strong> 
                            <h6>{{$student->address}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Country Citizenship:</strong> 
                            <h6>{{$student->country_citizenship}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Passport:</strong> 
                            <h6>{{$student->passport_number}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Passport Expiry:</strong> 
                            <h6>{{$student->passport_expiry_date}}</h6>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-lg-6 col-md-6  mb-4">
            <div class="card b-l-card-1 h-100" style="-webkit-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); -moz-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); ">
                <div class="card-body">
               
                    <h5 style="color:#e31e24">Educational Information</h5>
                    <div class="row">
                        <table class="table table-hovered table-bordered">
                            <tr>
                                <th>Country Education</th>
                                <th>Highest Degree</th>
                                <th>Grading Scheme</th>
                            </tr>
                            @foreach($StudentEductionHistoryview as $educationhistory)
                            <tr>
                                <td>{{$educationhistory->country_education}}</td>
                                <td>{{$educationhistory->highest_level_edu}}</td>
                                <td>{{$educationhistory->grading_scheme}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="row">
                        <!--<div class="col-md-3">
                            <strong class="card-category">Country Education:</strong>
                            <h6>{{$student->country_edu}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Highest Degree:</strong> 
                            <h6>{{$student->high_level_edu}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Grading Scheme:</strong> 
                            <h6>{{$student->grading_scheme}}</h6>
                        </div>-->
                        <div class="col-md-3">
                            <strong class="card-category">Country Institute:</strong> 
                            <h6>{{$student->country_institute}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Institute Name:</strong> 
                            <h6>{{$student->institute_name}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Education Level:</strong> 
                            <h6>{{$student->level_education}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Institute Language:</strong> 
                            <h6>{{$student->lan_institute}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Program From:</strong> 
                            <h6>{{$student->institute_from}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Program To:</strong> 
                            <h6>{{$student->institute_to}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Degree Name:</strong> 
                            <h6>{{$student->degree_name}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Graduation Date:</strong> 
                            <h6>{{$student->graduation_date}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Confirmation:</strong> 
                            <h6>{{$student->institute_confirmation}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Certificate:</strong> 
                            <h6>{{$student->physical_certificate}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Visa Refusal:</strong> 
                            <h6>{{$student->visa_country_refusal_detail}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Student Status:</strong> 
                            <h6>{{ isset($student->status) == 1 ? 'Active' : 'Deactive' }}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Confirmation:</strong> 
                            <h6>{{$student->emergency_contact_phone}}</h6>
                        </div>

                       
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-lg-6 col-md-6  mb-4">
            <div class="card b-l-card-1 h-100" style="-webkit-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); -moz-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); ">
                <div class="card-body">
               
                    <h5 class="card-title mt-2" style="color:#e31e24">Guardian Information</h5>
                    <div class="row">
                        <div class="col-md-3">
                            <strong class="card-category">Guardian Name:</strong>
                            <h6>{{$student->emergency_contact_name}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Relation:</strong> 
                            <h6>{{$student->emergency_contact_relation}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Guardian Email:</strong> 
                            <h6>{{$student->emergency_contact_email}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Guardian Phone:</strong> 
                            <h6>{{$student->emergency_contact_phone}}</h6>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

         <div class="col-xl-12 col-lg-6 col-md-6  mb-4">
            <div class="card b-l-card-1 h-100" style="-webkit-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); -moz-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); ">
                <div class="card-body">
               
                    <h5 style="color:#e31e24">Documents Information</h5>
                    <div class="row">
                       
                        <div class="col-md-3">
                            <strong class="card-category">Passport:</strong> <br>
                            @php
                                $files = explode(',', $student->passport)
                            @endphp
                            @foreach ($files as $file)
                            @if (File::exists('uploads/student/passport/' . $file) & !is_null($file))
                                {{-- <img src="{{asset('uploads/student/passport/' . $file)}}" width="100" alt=""> --}}
                                {{-- <iframe src="{{asset('uploads/student/passport/' . $file)}}" frameborder="0"></iframe> --}}
                                <a href="{{asset('uploads/student/passport/' . $file)}}" target="_blank"><button class="btn btn-info"><i class="fa fa-eye"></i> View</button></a>
                                <a href="{{asset('uploads/student/passport/' . $file)}}" target="_blank" download><button class="btn btn-primary"><i class="fas fa-download"></i> Download</button></a>
                            @endif
                            @endforeach
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">IELTS/PTE/TOEFL:</strong> <br>
                            @php
                            $files = explode(',', $student->ielts)
                        @endphp
                        @foreach ($files as $file)
                            @if (File::exists('uploads/student/ielts/' . $file) & !is_null($file))
                                {{-- <img src="{{asset('uploads/student/ielts/' . $file)}}" width="100" alt="">
                                <iframe src="{{asset('uploads/student/ielts/' . $file)}}" frameborder="0"></iframe> --}}
                                <a href="{{asset('uploads/student/ielts/' . $file)}}" target="_blank"><button class="btn btn-info"><i class="fa fa-eye"></i> View</button></a>
                                <a href="{{asset('uploads/student/ielts/' . $file)}}" target="_blank" download><button class="btn btn-primary"><i class="fas fa-download"></i> Download</button></a>
                            @endif <br>
                            @endforeach
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Grade 10th:</strong>  <br>
                            @php
                            $files = explode(',', $student->grade_10)
                        @endphp
                        @foreach ($files as $file)
                            @if (File::exists('uploads/student/grade_10/' . $file) & !is_null($file))
                                {{-- <img src="{{asset('uploads/student/grade_10/' . $file)}}" width="100" alt="">
                                <iframe src="{{asset('uploads/student/grade_10/' . $file)}}" frameborder="0"></iframe> --}}
                                <a href="{{asset('uploads/student/grade_10/' . $file)}}" target="_blank"><button class="btn btn-info"><i class="fa fa-eye"></i> View</button></a>
                                <a href="{{asset('uploads/student/grade_10/' . $file)}}" target="_blank" download><button class="btn btn-primary"><i class="fas fa-download"></i> Download</button></a>
                                @endif <br>
                            @endforeach
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Grade 12th:</strong>  <br>
                            @php
                            $files = explode(',', $student->grade_12)
                        @endphp
                        @foreach ($files as $file)
                            @if (File::exists('uploads/student/grade_12/' . $file) & !is_null($file))
                                {{-- <img src="{{asset('uploads/student/grade_12/' . $file)}}" width="100" alt="">
                                <iframe src="{{asset('uploads/student/grade_12/' . $file)}}" frameborder="0"></iframe> --}}
                                <a href="{{asset('uploads/student/grade_12/' . $file)}}" target="_blank"><button class="btn btn-info"><i class="fa fa-eye"></i> View</button></a>
                                <a href="{{asset('uploads/student/grade_12/' . $file)}}" target="_blank" download><button class="btn btn-primary"><i class="fas fa-download"></i> Download</button></a>
                            @endif <br>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                       
                        <div class="col-md-3">
                            <strong class="card-category">Bachelor Mark Sheet:</strong> <br>
                            @php
                            $files = explode(',', $student->bachelor_mark_sheet)
                        @endphp
                        @foreach ($files as $file)
                            @if (File::exists('uploads/student/bachelor_mark_sheet/' . $file) & !is_null($file))
                                {{-- <img src="{{asset('uploads/student/bachelor_mark_sheet/' . $file)}}" width="100" alt="">
                                <iframe src="{{asset('uploads/student/bachelor_mark_sheet/' . $file)}}" frameborder="0"></iframe> --}}
                                <a href="{{asset('uploads/student/bachelor_mark_sheet/' . $file)}}" target="_blank"><button class="btn btn-info"><i class="fa fa-eye"></i> View</button></a>
                                <a href="{{asset('uploads/student/bachelor_mark_sheet/' . $file)}}" target="_blank" download><button class="btn btn-primary"><i class="fas fa-download"></i> Download</button></a>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Bachelor Certificate:</strong> <br>
                            @php
                            $files = explode(',', $student->bachelor_certificate)
                        @endphp
                        @foreach ($files as $file)
                            @if (File::exists('uploads/student/bachelor_certificate/' . $file) & !is_null($file))
                                {{-- <img src="{{asset('uploads/student/bachelor_certificate/' . $file)}}" width="100" alt="">
                                <iframe src="{{asset('uploads/student/bachelor_certificate/' . $file)}}" frameborder="0"></iframe> --}}
                                <a href="{{asset('uploads/student/bachelor_certificate/' . $file)}}" target="_blank"><button class="btn btn-info"><i class="fa fa-eye"></i> View</button></a>
                                <a href="{{asset('uploads/student/bachelor_certificate/' . $file)}}" target="_blank" download><button class="btn btn-primary"><i class="fas fa-download"></i> Download</button></a>
                            @endif <br>
                            @endforeach
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Master Mark Sheet:</strong>  <br>
                            @php
                            $files = explode(',', $student->master_mark_sheet)
                        @endphp
                        @foreach ($files as $file)
                            @if (File::exists('uploads/student/master_mark_sheet/' . $file) & !is_null($file))
                                {{-- <img src="{{asset('uploads/student/master_mark_sheet/' . $file)}}" width="100" alt="">
                                <iframe src="{{asset('uploads/student/master_mark_sheet/' . $file)}}" frameborder="0"></iframe> --}}
                                <a href="{{asset('uploads/student/master_mark_sheet/' . $file)}}" target="_blank"><button class="btn btn-info"><i class="fa fa-eye"></i> View</button></a>
                                <a href="{{asset('uploads/student/master_mark_sheet/' . $file)}}" target="_blank" download><button class="btn btn-primary"><i class="fas fa-download"></i> Download</button></a>
                            @endif <br>
                            @endforeach
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Master Certificate:</strong>  <br>
                            @php
                            $files = explode(',', $student->master_certificate)
                        @endphp
                        @foreach ($files as $file)
                            @if (File::exists('uploads/student/master_certificate/' . $file) & !is_null($file))
                                {{-- <img src="{{asset('uploads/student/master_certificate/' . $file)}}" width="100" alt="">
                                <iframe src="{{asset('uploads/student/master_certificate/' . $file)}}" frameborder="0"></iframe> --}}
                                <a href="{{asset('uploads/student/master_certificate/' . $file)}}" target="_blank"><button class="btn btn-info"><i class="fa fa-eye"></i> View</button></a>
                                <a href="{{asset('uploads/student/master_certificate/' . $file)}}" target="_blank" download><button class="btn btn-primary"><i class="fas fa-download"></i> Download</button></a>
                            @endif <br>
                            @endforeach
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">LORS:</strong>  <br>
                            @php
                            $files = explode(',', $student->lors)
                        @endphp
                        @foreach ($files as $file)
                            @if (File::exists('uploads/student/lors/' . $file) & !is_null($file))
                                {{-- <img src="{{asset('uploads/student/lors/' . $file)}}" width="100" alt="">
                                <iframe src="{{asset('uploads/student/lors/' . $file)}}" frameborder="0"></iframe> --}}
                                <a href="{{asset('uploads/student/lors/' . $file)}}" target="_blank"><button class="btn btn-info"><i class="fa fa-eye"></i> View</button></a>
                                <a href="{{asset('uploads/student/lors/' . $file)}}" target="_blank" download><button class="btn btn-primary"><i class="fas fa-download"></i> Download</button></a>
                            @endif <br>
                            @endforeach
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Resume:</strong>  <br>
                            @php
                            $files = explode(',', $student->resume)
                        @endphp
                        @foreach ($files as $file)
                            @if (File::exists('uploads/student/resume/' . $file) & !is_null($file))
                                {{-- <img src="{{asset('uploads/student/resume/' . $file)}}" width="100" alt="">
                                <iframe src="{{asset('uploads/student/resume/' . $file)}}" frameborder="0"></iframe> --}}
                                <a href="{{asset('uploads/student/resume/' . $file)}}" target="_blank"><button class="btn btn-info"><i class="fa fa-eye"></i> View</button></a>
                                <a href="{{asset('uploads/student/resume/' . $file)}}" target="_blank" download><button class="btn btn-primary"><i class="fas fa-download"></i> Download</button></a>
                            @endif <br>
                            @endforeach
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Work Experience:</strong>  <br>
                            @php
                            $files = explode(',', $student->work_experience)
                        @endphp
                        @foreach ($files as $file)
                            @if (File::exists('uploads/student/work_experience/' . $file) & !is_null($file))
                                {{-- <img src="{{asset('uploads/student/work_experience/' . $file)}}" width="100" alt="">
                                <iframe src="{{asset('uploads/student/work_experience/' . $file)}}" frameborder="0"></iframe> --}}
                                <a href="{{asset('uploads/student/work_experience/' . $file)}}" target="_blank"><button class="btn btn-info"><i class="fa fa-eye"></i> View</button></a>
                                <a href="{{asset('uploads/student/work_experience/' . $file)}}" target="_blank" download><button class="btn btn-primary"><i class="fas fa-download"></i> Download</button></a>
                            @endif <br>
                            @endforeach
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">MOI:</strong>  <br>
                            @php
                            $files = explode(',', $student->moi)
                        @endphp
                        @foreach ($files as $file)
                            @if (File::exists('uploads/student/moi/' . $file) & !is_null($file))
                                {{-- <img src="{{asset('uploads/student/moi/' . $file)}}" width="100" alt="">
                                <iframe src="{{asset('uploads/student/moi/' . $file)}}" frameborder="0"></iframe> --}}
                                <a href="{{asset('uploads/student/moi/' . $file)}}" target="_blank"><button class="btn btn-info"><i class="fa fa-eye"></i> View</button></a>
                                <a href="{{asset('uploads/student/moi/' . $file)}}" target="_blank" download><button class="btn btn-primary"><i class="fas fa-download"></i> Download</button></a>
                            @endif <br>
                            @endforeach
                        </div>
                        
                        <div class="col-md-3">
                            <strong class="card-category">SOP/Personal Statement:</strong>  <br>
                            @php
                            $files = explode(',', $student->personal_statement)
                        @endphp
                        @foreach ($files as $file)
                            @if (File::exists('uploads/student/personal_statement/' . $file) & !is_null($file))
                                {{-- <img src="{{asset('uploads/student/personal_statement/' . $file)}}" width="100" alt="">
                                <iframe src="{{asset('uploads/student/personal_statement/' . $file)}}" frameborder="0"></iframe> --}}
                                <a href="{{asset('uploads/student/personal_statement/' . $file)}}" target="_blank"><button class="btn btn-info"><i class="fa fa-eye"></i> View</button></a>
                                <a href="{{asset('uploads/student/personal_statement/' . $file)}}" target="_blank" download><button class="btn btn-primary"><i class="fas fa-download"></i> Download</button></a>
                            @endif <br>
                            @endforeach
                        </div>
                        
                        <div class="col-md-3">
                            <strong class="card-category">Diploma MarkSheet:</strong>  <br>
                            @php
                            $files = explode(',', $student->diploma_mark_sheet)
                        @endphp
                        @foreach ($files as $file)
                            @if (File::exists('uploads/student/diploma_mark_sheet/' . $file) & !is_null($file))
                                {{-- <img src="{{asset('uploads/student/diploma_mark_sheet/' . $file)}}" width="100" alt="">
                                <iframe src="{{asset('uploads/student/diploma_mark_sheet/' . $file)}}" frameborder="0"></iframe> --}}
                                <a href="{{asset('uploads/student/diploma_mark_sheet/' . $file)}}" target="_blank"><button class="btn btn-info"><i class="fa fa-eye"></i> View</button></a>
                                <a href="{{asset('uploads/student/diploma_mark_sheet/' . $file)}}" target="_blank" download><button class="btn btn-primary"><i class="fas fa-download"></i> Download</button></a>
                            @endif <br>
                            @endforeach
                        </div>
                        
                        <div class="col-md-3">
                            <strong class="card-category">Diploma Certificate:</strong>  <br>
                            @php
                            $files = explode(',', $student->diploma_certificate)
                        @endphp
                        @foreach ($files as $file)
                            @if (File::exists('uploads/student/diploma_certificate/' . $file) & !is_null($file))
                                {{-- <img src="{{asset('uploads/student/diploma_certificate/' . $file)}}" width="100" alt="">
                                <iframe src="{{asset('uploads/student/diploma_certificate/' . $file)}}" frameborder="0"></iframe> --}}
                                <a href="{{asset('uploads/student/diploma_certificate/' . $file)}}" target="_blank"><button class="btn btn-info"><i class="fa fa-eye"></i> View</button></a>
                                <a href="{{asset('uploads/student/diploma_certificate/' . $file)}}" target="_blank" download><button class="btn btn-primary"><i class="fas fa-download"></i> Download</button></a>
                                @endif <br>
                            @endforeach
                        </div>
                        
                        <div class="col-md-3">
                            <strong class="card-category">Other Certificate:</strong>  <br>
                            @php
                            $files = explode(',', $student->other_certificate)
                        @endphp
                        @foreach ($files as $file)
                            @if (File::exists('uploads/student/other_certificate/' . $file) & !is_null($file))
                                {{-- <img src="{{asset('uploads/student/other_certificate/' . $file)}}" width="100" alt="">
                                <iframe src="{{asset('uploads/student/other_certificate/' . $file)}}" frameborder="0"></iframe> --}}
                                <a href="{{asset('uploads/student/other_certificate/' . $file)}}" target="_blank"><button class="btn btn-info"><i class="fa fa-eye"></i> View</button></a>
                                <a href="{{asset('uploads/student/other_certificate/' . $file)}}" target="_blank" download><button class="btn btn-primary"><i class="fas fa-download"></i> Download</button></a>
                                @endif <br>
                            @endforeach
                        </div>
    
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
