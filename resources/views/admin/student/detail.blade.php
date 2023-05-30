@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('modern-light-menu/plugins/jquery-step/jquery.steps.css') }}">
@endsection
@section('content')
    @php
        use App\Models\LeadStatus;
    $lead = LeadStatus::where('id', $student->lead_status)->first(); @endphp

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">

        <div class="skills layout-spacing ">
            <div class="widget-content widget-content-area">
                <h3 class="">View Student</h3>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <!--<h5>Basic Information</h5>-->
                        <li>First Name:&nbsp; {{ $student->first_name }} </li>
                        <li>Middle Name:&nbsp; {{ $student->middle_name }}</li>
                        <li>Last Name:&nbsp; {{ $student->last_name }}</li>
                        <li>Gender:&nbsp; {{ $student->gender }}</li>
                        <li>Lead Status:&nbsp; {{ $lead->name }}</li>
                        <li>Commen: &nbsp; <td>
                            @if ($student->application_team_comment)
                                {{$student->application_team_comment}}
                                @else
                                N/A
                            @endif
                        </td></li>
                        <li>DOB:&nbsp; {{ $student->birth_date }}</li>
                        <li>Marital:&nbsp; {{ $student->marital_status }}</li>
                        <li>Contact: &nbsp;{{ $student->contact_no }}</li>
                        <li>Email: &nbsp;{{ $student->email }}</li>
                        <li>Passport: &nbsp;{{ $student->passport_number }}</li>
                        <li>Passport Expiry:&nbsp; {{ $student->passport_expiry_date }}</li>
                        <li>city:&nbsp; {{ $student->city }}</li>
                        <li>state:&nbsp; {{ $student->state }}</li>
                        <li>country:&nbsp; {{ $student->country }}</li>
                        <li>postal_zip:&nbsp; {{ $student->postal_zip }}</li>
                        <li>address:&nbsp; {{ $student->address }}</li>
                        <li>Guardian Name:&nbsp; {{ $student->emergency_contact_name }}</li>
                        <li>Relation:&nbsp; {{ $student->emergency_contact_relation }}</li>
                        <li>Guardian Email:&nbsp; {{ $student->emergency_contact_email }}</li>
                        <li>Guardian Phone:&nbsp; {{ $student->emergency_contact_phone }}</li>
                    </div>

                    <div class="col-md-6">
                        <!--<h5>Educational Information</h5>-->
                        <li>Country Education:&nbsp; {{ $student->country_edu }} </li>
                        <li>Highest degree:&nbsp; {{ $student->high_level_edu }}</li>
                        <li>Grading scheme:&nbsp; {{ $student->grading_scheme }}</li>
                        <li>Country institute:&nbsp; {{ $student->country_institute }}</li>
                        <li>Institute name:&nbsp; {{ $student->institute_name }}</li>
                        <li>Education Level:&nbsp; {{ $student->level_education }}</li>
                        <li>Institute Language: &nbsp;{{ $student->lan_institute }}</li>
                        <li>Program From: &nbsp;{{ $student->institute_from }}</li>
                        <li>Program To: &nbsp;{{ $student->institute_to }}</li>
                        <li>Degree name: &nbsp;{{ $student->degree_name }}</li>
                        <li>Graduation date:&nbsp; {{ $student->graduation_date }}</li>
                        <li>Confirmation:&nbsp; {{ $student->institute_confirmation }}</li>
                        <li>Certificate:&nbsp; {{ $student->physical_certificate }}</li>
                        <li>Visa refusal:&nbsp; {{ $student->visa_country_refusal_detail }}</li>
                        <li>Student Status:&nbsp; {{ isset($student->status) == 1 ? 'Active' : 'Deactive' }}</li>
                    </div>
                </div>
                @if (File::exists('uploads/student/passport/' . $student->passport) & !is_null($student->passport))
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Passport</h5>
                        </div>
                        <div class="col-md-4">
                            {{ $student->passport }}
                        </div>
                        <div class="col-md-4">
                            <a href="{{asset('uploads/student/passport/' . $student->passport)}}" target="_blank"><button class="btn btn-info">View</button></a>
                            <a href="{{ route('student.downloadFile', [$student->passport, 'passport']) }}"
                                class="btn btn-primary">Download</a>
                                <iframe src="{{asset('uploads/student/passport/' . $student->passport)}}" frameborder="0"></iframe>
                        </div>
                    </div>
                @endif

                @if (File::exists('uploads/student/ielts/' . $student->ielts) & !is_null($student->ielts))
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>IELTS</h5>
                        </div>
                        <div class="col-md-4">
                            {{ $student->ielts }}

                        </div>
                        <div class="col-md-4 mt-2">
                            <a href="{{asset('uploads/student/ielts/' . $student->ielts)}}" target="_blank"><button class="btn btn-info">View</button></a>
                            <a href="{{ route('student.downloadFile', [$student->ielts, 'ielts']) }}"
                                class="btn btn-primary">Download</a>
                                <iframe src="{{asset('uploads/student/ielts/' . $student->ielts)}}" frameborder="0"></iframe>

                        </div>
                    </div>
                @endif

                @if (File::exists('uploads/student/grade_10/' . $student->grade_10) & !is_null($student->grade_10))
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Grade 10 certificate</h5>
                        </div>
                        <div class="col-md-4">
                            {{ $student->grade_10 }}

                        </div>
                        <div class="col-md-4 mt-2">
                            <a href="{{asset('uploads/student/grade_10/' . $student->grade_10)}}" target="_blank"><button class="btn btn-info">View</button></a>
                            <a href="{{ route('student.downloadFile', [$student->grade_10, 'grade_10']) }}"
                                class="btn btn-primary">Download</a>
                                <iframe src="{{asset('uploads/student/grade_10/' . $student->grade_10)}}" frameborder="0"></iframe>

                        </div>
                    </div>
                @endif

                @if (File::exists('uploads/student/grade_12/' . $student->grade_12) & !is_null($student->grade_12))
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Grade 12 Certificate</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('uploads/student/grade_12/' . $student->grade_12) }} "
                                style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                alt="Grade 12 Certificate">
                        </div>
                        <div class="col-md-4">
                            <a href="{{asset('uploads/student/grade_12/' . $student->grade_12)}}" target="_blank"><button class="btn btn-info">View</button></a>
                            <a href="{{ route('student.downloadFile', [$student->grade_12, 'grade_12']) }}"
                                class="btn btn-primary">Download</a>
                                <iframe src="{{asset('uploads/student/grade_12/' . $student->grade_12)}}" frameborder="0"></iframe>
                        </div>
                    </div>
                @endif

                @if (File::exists('uploads/student/bachelor_mark_sheet/' . $student->bachelor_mark_sheet) &
                        !is_null($student->bachelor_mark_sheet))
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Bachelor marks sheet</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('uploads/student/bachelor_mark_sheet/' . $student->bachelor_mark_sheet) }} "
                                style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                alt="Bachelor marksheet">
                        </div>
                        <div class="col-md-4">
                            <a href="{{asset('uploads/student/bachelor_mark_sheet/' . $student->bachelor_mark_sheet)}}" target="_blank"><button class="btn btn-info">View</button></a>
                            <a href="{{ route('student.downloadFile', [$student->bachelor_mark_sheet, 'bachelor_mark_sheet']) }}"
                                class="btn btn-primary">Download</a>
                                <iframe src="{{asset('uploads/student/bachelor_mark_sheet/' . $student->bachelor_mark_sheet)}}" frameborder="0"></iframe>

                        </div>
                    </div>
                @endif
                @if (File::exists('uploads/student/bachelor_certificate/' . $student->bachelor_certificate) &
                        !is_null($student->bachelor_certificate))
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Bachelor certificate</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('uploads/student/bachelor_certificate/' . $student->bachelor_certificate) }} "
                                style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                alt="Bachelor certificate">
                        </div>
                        <div class="col-md-4">
                            <a href="{{asset('uploads/student/bachelor_certificate/' . $student->bachelor_certificate)}}" target="_blank"><button class="btn btn-info">View</button></a>
                            <a href="{{ route('student.downloadFile', [$student->bachelor_certificate, 'bachelor_certificate']) }}"
                                class="btn btn-primary">Download</a>
                                <iframe src="{{asset('uploads/student/bachelor_certificate/' . $student->bachelor_certificate)}}" frameborder="0"></iframe>
                        </div>
                    </div>
                @endif
                @if (File::exists('uploads/student/master_mark_sheet/' . $student->master_mark_sheet) &
                        !is_null($student->master_mark_sheet))
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Master marks sheet</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('uploads/student/master_mark_sheet/' . $student->master_mark_sheet) }} "
                                style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                alt="Master marksheet">
                        </div>
                        <div class="col-md-4">
                            <a href="{{asset('uploads/student/master_mark_sheet/' . $student->master_mark_sheet)}}" target="_blank"><button class="btn btn-info">View</button></a>
                            <a href="{{ route('student.downloadFile', [$student->master_mark_sheet, 'master_mark_sheet']) }}"
                                class="btn btn-primary">Download</a>
                                <iframe src="{{asset('uploads/student/master_mark_sheet/' . $student->master_mark_sheet)}}" frameborder="0"></iframe>
                        </div>
                    </div>
                @endif
                @if (File::exists('uploads/student/master_certificate/' . $student->master_certificate) &
                        !is_null($student->master_certificate))
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Master certificate</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('uploads/student/master_certificate/' . $student->master_certificate) }} "
                                style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                alt="Master certificate">
                        </div>
                        <div class="col-md-4">
                            <a href="{{asset('uploads/student/master_certificate/' . $student->master_certificate)}}" target="_blank"><button class="btn btn-info">View</button></a>
                            <a href="{{ route('student.downloadFile', [$student->master_certificate, 'master_certificate']) }}"
                                class="btn btn-primary">Download</a>
                                <iframe src="{{asset('uploads/student/master_certificate/' . $student->master_certificate)}}" frameborder="0"></iframe>
                        </div>
                    </div>
                @endif
                @if (File::exists('uploads/student/lors/' . $student->lors) & !is_null($student->lors))
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>LORS</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('uploads/student/lors/' . $student->lors) }} "
                                style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                alt="lors">
                        </div>
                        <div class="col-md-4">
                            <a href="{{asset('uploads/student/lors/' . $student->lors)}}" target="_blank"><button class="btn btn-info">View</button></a>
                            <a href="{{ route('student.downloadFile', [$student->lors, 'lors']) }}"
                                class="btn btn-primary">Download</a>
                                <iframe src="{{asset('uploads/student/lors/' . $student->lors)}}" frameborder="0"></iframe>

                        </div>
                    </div>
                @endif
                @if (File::exists('uploads/student/resume/' . $student->resume) & !is_null($student->resume))
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5 class="mt-5">Resume</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('uploads/student/resume/' . $student->resume) }} "
                                style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                alt="resume">
                        </div>
                        <div class="col-md-4">
                            <a href="{{asset('uploads/student/resume/' . $student->resume)}}" target="_blank"><button class="btn btn-info">View</button></a>
                            <a href="{{ route('student.downloadFile', [$student->resume, 'resume']) }}"
                                class="btn btn-primary">Download</a>
                                <iframe src="{{asset('uploads/student/resume/' . $student->resume)}}" frameborder="0"></iframe>
                        </div>
                    </div>
                @endif

                @php
                $files = explode(',', $student->work_experience)
            @endphp
            @foreach ($files as $file)
                @if (File::exists('uploads/student/work_experience/' . $file) & !is_null($file))
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Work experience</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('uploads/student/work_experience/' . $file) }} "
                                style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                alt="work experience">
                        </div>
                        <div class="col-md-4">
                            <a href="{{asset('uploads/student/work_experience/' . $file)}}" target="_blank"><button class="btn btn-info">View</button></a>
                            <a href="{{ route('student.downloadFile', [$file, 'work_experience']) }}"
                                class="btn btn-primary">Download</a>
                                <iframe src="{{asset('uploads/student/work_experience/' . $file)}}" frameborder="0"></iframe>
                        </div>
                    </div>
                @endif
                @endforeach


                @if (File::exists('uploads/student/moi/' . $student->moi) & !is_null($student->moi))
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>MOI</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('uploads/student/moi/' . $student->moi) }} "
                                style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                alt="moi">
                        </div>
                        <div class="col-md-4">
                            <a href="{{asset('uploads/student/moi/' . $student->moi)}}" target="_blank"><button class="btn btn-info">View</button></a>
                            <a href="{{ route('student.downloadFile', [$student->moi, 'moi']) }}"
                                class="btn btn-primary">Download</a>
                                <iframe src="{{asset('uploads/student/moi/' . $student->moi)}}" frameborder="0"></iframe>

                        </div>
                    </div>
                @endif



                @if (File::exists('uploads/student/personal_statement/' . $student->personal_statement) &
                        !is_null($student->personal_statement))
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Personal statement</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('uploads/student/personal_statement/' . $student->personal_statement) }} "
                                style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                alt="personal statement">
                        </div>
                        <div class="col-md-4">
                            <a href="{{asset('uploads/student/personal_statement/' . $student->personal_statement)}}" target="_blank"><button class="btn btn-info">View</button></a>
                            <a href="{{ route('student.downloadFile', [$student->personal_statement, 'personal_statement']) }}"
                                class="btn btn-primary">Download</a>
                                <iframe src="{{asset('uploads/student/personal_statement/' . $student->personal_statement)}}" frameborder="0"></iframe>

                        </div>
                    </div>
                @endif

                @if (File::exists('uploads/student/diploma_mark_sheet/' . $student->diploma_mark_sheet) &
                        !is_null($student->diploma_mark_sheet))
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Diploma marksheet</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('uploads/student/diploma_mark_sheet/' . $student->diploma_mark_sheet) }} "
                                style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                alt="diploma marksheet">
                        </div>
                        <div class="col-md-4">
                            <a href="{{asset('uploads/student/diploma_mark_sheet/' . $student->diploma_mark_sheet)}}" target="_blank"><button class="btn btn-info">View</button></a>
                            <a href="{{ route('student.downloadFile', [$student->diploma_mark_sheet, 'diploma_mark_sheet']) }}"
                                class="btn btn-primary">Download</a>
                                <iframe src="{{asset('uploads/student/diploma_mark_sheet/' . $student->diploma_mark_sheet)}}" frameborder="0"></iframe>

                        </div>
                    </div>
                @endif
                @if (File::exists('uploads/student/diploma_certificate/' . $student->diploma_certificate) &
                        !is_null($student->diploma_certificate))
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Diploma certificate</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('uploads/student/diploma_certificate/' . $student->diploma_certificate) }} "
                                style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                alt="diploma certificate">
                        </div>
                        <div class="col-md-4">
                            <a href="{{asset('uploads/student/diploma_certificate/' . $student->diploma_certificate)}}" target="_blank"><button class="btn btn-info">View</button></a>
                            <a href="{{ route('student.downloadFile', [$student->diploma_certificate, 'diploma_certificate']) }}"
                                class="btn btn-primary">Download</a>
                                <iframe src="{{asset('uploads/student/diploma_certificate/' . $student->diploma_certificate)}}" frameborder="0"></iframe>
                        </div>
                    </div>
                @endif

                @php
                $files = explode(',', $student->other_certificate)
            @endphp
            @foreach ($files as $file)
                @if (File::exists('uploads/student/other_certificate/' . $file) &
                        !is_null($file))
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <h5>Other certificate</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('uploads/student/other_certificate/' . $file) }} "
                                style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                alt="Other certificate">
                        </div>
                        <div class="col-md-4">
                            <a href="{{asset('uploads/student/other_certificate/' . $file)}}" target="_blank"><button class="btn btn-info">View</button></a>
                            <a href="{{ route('student.downloadFile', [$file, 'other_certificate']) }}"
                                class="btn btn-primary">Download</a>
                                <iframe src="{{asset('uploads/student/other_certificate/' . $file)}}" frameborder="0"></iframe>
                            </div>
                        </div>
                        @endif
                        @endforeach

            </div>
        </div>

    </div>
@endsection
