@extends('application.master')



@section('css')
@endsection
@php
use App\Models\LeadStatus;
@endphp
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h3>Hi, Application Team</h3>
        </div>
    </div>


                    <div class="row layout-top-spacing">
                        
                        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-card-four mb-3">
                                <div class="widget-content">
                                    <div class="row m-0">
                                        
                                        <div class="table-responsive mb-4 mt-4">
                                            <table class="multi-table table table-striped table-bordered table-hover non-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Unique ID</th>
                            <th>Student Name</th>
                            <th>Passport NO</th>
                            <th>Collage</th>
                            <th>Course</th>
                            <th>Intake </th>
                            <th>Comment</th>
                            <th>Lead Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$student->unique_id}}</td>
                                <td>{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</td>
                                <td>{{$student->passport_number}}</td>
                                <td>{{$student->institute_name}}</td>
                                <td>{{$student->degree_name}}</td>
                                <td>{{$student->intake}}</td>
                                <td>
                                    @if ($student->application_team_comment)
                                        {{$student->application_team_comment}}
                                        @else
                                        N/A
                                    @endif
                                </td>
                                    @php
                                    $lead = LeadStatus::where('id', $student->lead_status)->first(); 
                                @endphp
                            <td>{{$lead->name}}</td>
                               

                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Unique ID</th>
                            <th>Student Name</th>
                            <th>Passport NO</th>
                            <th>Collage</th>
                            <th>Course</th>
                            <th>Intake </th>
                            <th>Commet</th>
                            <th>Lead Status</th>
                        </tr>
                        </tfoot>
                    </table>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="attachments">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="attachments-section-title mb-4">Attachments</h6>
                                            </div>
                                            <!--<div class="col-md-6" style="text-align: right;">
                                                <a href="{{route('students.downloadFilesAll', $student->id)}}"><button class="btn btn-primary">Download All</button></a>
                                            </div>-->
                                        </div>

                                        <div class="row">
        
                                            @if (File::exists('uploads/student/passport/' . $student->passport) & !is_null($student->passport))
                                            <div class="row mt-2">
                                                <div class="col-md-2">
                                                    <p>Passport</p>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $student->passport }}
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="{{ route('students.downloadFiles', [$student->passport, 'passport']) }}"
                                                        class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        @endif
                        
                                        @if (File::exists('uploads/student/ielts/' . $student->ielts) & !is_null($student->ielts))
                                            <div class="row mt-2">
                                                <div class="col-md-2">
                                                    <p>IELTS</p>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $student->ielts }}
                        
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="{{ route('students.downloadFiles', [$student->ielts, 'ielts']) }}"
                                                        class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        @endif
                        
                                        @if (File::exists('uploads/student/grade_10/' . $student->grade_10) & !is_null($student->grade_10))
                                            <div class="row mt-2">
                                                <div class="col-md-2">
                                                    <p>Grade 10 certificate</p>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $student->grade_10 }}
                        
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="{{ route('students.downloadFiles', [$student->grade_10, 'grade_10']) }}"
                                                        class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        @endif
                        
                                        @if (File::exists('uploads/student/grade_12/' . $student->grade_12) & !is_null($student->grade_12))
                                            <div class="row mt-2">
                                                <div class="col-md-2">
                                                    <p>Grade 12 Certificate</p>
                                                </div>
                                                <div class="col-md-8">
                                                    <img src="{{ asset('uploads/student/grade_12/' . $student->grade_12) }} "
                                                        style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                                        alt="Grade 12 Certificate">
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="{{ route('students.downloadFiles', [$student->grade_12, 'grade_12']) }}"
                                                        class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        @endif
                        
                                        @if (File::exists('uploads/student/bachelor_mark_sheet/' . $student->bachelor_mark_sheet) &
                                                !is_null($student->bachelor_mark_sheet))
                                            <div class="row mt-2">
                                                <div class="col-md-2">
                                                    <p>Bachelor marks sheet</p>
                                                </div>
                                                <div class="col-md-8">
                                                    <img src="{{ asset('uploads/student/bachelor_mark_sheet/' . $student->bachelor_mark_sheet) }} "
                                                        style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                                        alt="Bachelor marksheet">
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="{{ route('students.downloadFiles', [$student->bachelor_mark_sheet, 'bachelor_mark_sheet']) }}"
                                                        class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        @endif
                                        @if (File::exists('uploads/student/bachelor_certificate/' . $student->bachelor_certificate) &
                                                !is_null($student->bachelor_certificate))
                                            <div class="row mt-2">
                                                <div class="col-md-2">
                                                    <p>Bachelor certificate</p>
                                                </div>
                                                <div class="col-md-8">
                                                    <img src="{{ asset('uploads/student/bachelor_certificate/' . $student->bachelor_certificate) }} "
                                                        style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                                        alt="Bachelor certificate">
                                                </div>
                                                <div class="col-md-8">
                                                    <a href="{{ route('students.downloadFiles', [$student->bachelor_certificate, 'bachelor_certificate']) }}"
                                                        class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        @endif
                                        @if (File::exists('uploads/student/master_mark_sheet/' . $student->master_mark_sheet) &
                                                !is_null($student->master_mark_sheet))
                                            <div class="row mt-2">
                                                <div class="col-md-2">
                                                    <p>Master marks sheet</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <img src="{{ asset('uploads/student/master_mark_sheet/' . $student->master_mark_sheet) }} "
                                                        style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                                        alt="Master marksheet">
                                                </div>
                                                <div class="col-md-8">
                                                    <a href="{{ route('students.downloadFiles', [$student->master_mark_sheet, 'master_mark_sheet']) }}"
                                                        class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        @endif
                                        @if (File::exists('uploads/student/master_certificate/' . $student->master_certificate) &
                                                !is_null($student->master_certificate))
                                            <div class="row mt-2">
                                                <div class="col-md-2">
                                                    <p>Master certificate</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <img src="{{ asset('uploads/student/master_certificate/' . $student->master_certificate) }} "
                                                        style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                                        alt="Master certificate">
                                                </div>
                                                <div class="col-md-8">
                                                    <a href="{{ route('students.downloadFiles', [$student->master_certificate, 'master_certificate']) }}"
                                                        class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        @endif
                                        @if (File::exists('uploads/student/lors/' . $student->lors) & !is_null($student->lors))
                                            <div class="row mt-2">
                                                <div class="col-md-2">
                                                    <p>LORS</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <img src="{{ asset('uploads/student/lors/' . $student->lors) }} "
                                                        style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                                        alt="lors">
                                                </div>
                                                <div class="col-md-8">
                                                    <a href="{{ route('students.downloadFiles', [$student->lors, 'lors']) }}"
                                                        class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        @endif
                                        @if (File::exists('uploads/student/resume/' . $student->resume) & !is_null($student->resume))
                                            <div class="row mt-2">
                                                <div class="col-md-2">
                                                    <p class="mt-5">Resume</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <img src="{{ asset('uploads/student/resume/' . $student->resume) }} "
                                                        style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                                        alt="resume">
                                                </div>
                                                <div class="col-md-8">
                                                    <a href="{{ route('students.downloadFiles', [$student->resume, 'resume']) }}"
                                                        class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        @endif
                                        @if (File::exists('uploads/student/work_experience/' . $student->work_experience) & !is_null($student->work_experience))
                                            <div class="row mt-2">
                                                <div class="col-md-2">
                                                    <p>Work experience</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <img src="{{ asset('uploads/student/work_experience/' . $student->work_experience) }} "
                                                        style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                                        alt="work experience">
                                                </div>
                                                <div class="col-md-8">
                                                    <a href="{{ route('students.downloadFiles', [$student->work_experience, 'work_experience']) }}"
                                                        class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        @endif
                        
                        
                        
                                        @if (File::exists('uploads/student/moi/' . $student->moi) & !is_null($student->moi))
                                            <div class="row mt-2">
                                                <div class="col-md-2">
                                                    <p>MOI</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <img src="{{ asset('uploads/student/moi/' . $student->moi) }} "
                                                        style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                                        alt="moi">
                                                </div>
                                                <div class="col-md-8">
                                                    <a href="{{ route('students.downloadFiles', [$student->moi, 'moi']) }}"
                                                        class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        @endif
                        
                        
                        
                                        @if (File::exists('uploads/student/personal_statement/' . $student->personal_statement) &
                                                !is_null($student->personal_statement))
                                            <div class="row mt-2">
                                                <div class="col-md-2">
                                                    <p>Personal statement</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <img src="{{ asset('uploads/student/personal_statement/' . $student->personal_statement) }} "
                                                        style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                                        alt="personal statement">
                                                </div>
                                                <div class="col-md-8">
                                                    <a href="{{ route('students.downloadFiles', [$student->personal_statement, 'personal_statement']) }}"
                                                        class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        @endif
                        
                                        @if (File::exists('uploads/student/diploma_mark_sheet/' . $student->diploma_mark_sheet) &
                                                !is_null($student->diploma_mark_sheet))
                                            <div class="row mt-2">
                                                <div class="col-md-2">
                                                    <p>Diploma marksheet</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <img src="{{ asset('uploads/student/diploma_mark_sheet/' . $student->diploma_mark_sheet) }} "
                                                        style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                                        alt="diploma marksheet">
                                                </div>
                                                <div class="col-md-8">
                                                    <a href="{{ route('students.downloadFiles', [$student->diploma_mark_sheet, 'diploma_mark_sheet']) }}"
                                                        class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        @endif
                                        @if (File::exists('uploads/student/diploma_certificate/' . $student->diploma_certificate) &
                                                !is_null($student->diploma_certificate))
                                            <div class="row mt-2">
                                                <div class="col-md-2">
                                                    <p>Diploma certificate</p>
                                                </div>
                                                <div class="col-md-8">
                                                    <img src="{{ asset('uploads/student/diploma_certificate/' . $student->diploma_certificate) }} "
                                                        style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                                        alt="diploma certificate">
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="{{ route('students.downloadFiles', [$student->diploma_certificate, 'diploma_certificate']) }}"
                                                        class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        @endif
                        
                        
                                        @if (File::exists('uploads/student/other_certificate/' . $student->other_certificate) &
                                                !is_null($student->other_certificate))
                                            <div class="row mt-2">
                                                <div class="col-md-8">
                                                    <p>Other certificate</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <img src="{{ asset('uploads/student/other_certificate/' . $student->other_certificate) }} "
                                                        style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                                                        alt="Other certificate">
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="{{ route('students.downloadFiles', [$student->other_certificate, 'other_certificate']) }}"
                                                        class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        @endif
                        
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- sidebar -->

                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-card-four">
                                <form action="{{route('application.document')}}" method="post">
                                    @csrf
                                    @method('POST')
                                    <input class="form-control" type="hidden" name="studentId" value="{{$student->id}}">
                                    <div class="widget-content">
                                        <div class="row m-0">
                                            <div class="col-md-12">
                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlSelect1">Actions</label>
                                                    <select name="leadStatus" class="form-select form-control" id="exampleFormControlSelect1">
                                                        @foreach ($leadStatus as $status)
                                                            <option value="{{$status->id}}" <?php if($studentone->lead_status == $status->id){echo "selected";}?>>{{$status->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('leadStatus')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlSelect1">Pendencies</label>
                                                    <select name="document" class="form-select form-control" id="exampleFormControlSelect1">
                                                        <option value="passport">Passport</option>
                                                        <option value="ielts">IELTS</option>
                                                        <option value="grade_10">Grade 10</option>
                                                        <option value="grade_12">Grade 12</option>
                                                        <option value="bachelor_mark_sheet">Bachelor Mark Sheet</option>
                                                        <option value="bachelor_certificate">Bachelor Certificate</option>
                                                        <option value="master_mark_sheet">Maste Mark Sheet</option>
                                                        <option value="master_certificate">Master Certificate</option>
                                                        <option value="lors">Lors</option>
                                                        <option value="resume">Resume</option>
                                                        <option value="work_experience">Work Experience</option>
                                                        <option value="moi">MOI</option>
                                                        <option value="personal_statement">Personal Statement</option>
                                                        <option value="diploma_mark_sheet">Diploma Mark Sheet</option>
                                                        <option value="diploma_certificate">Diploma Certificate</option>
                                                        <option value="other_certificate">Other Certificate</option>
                                                    </select>
                                                    @error('document')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlTextarea1">Comment</label>
                                                    <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                            <div class="col-md-6" style="text-align: right;">
                                                <button class="btn btn-primary">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>

    <div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl customWidth" role="document">
            <div class="modal-content studentModalBody">
                ....
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleterecord(id,deletefunction){
            var SITEURL = '{{ URL::to('') }}';

            var id = id;


            var deleteFunction = deletefunction;


            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = SITEURL + "/admin/" + deleteFunction + "/" + id;
                }
            })

        }

        getDetail = function (id)
        {
            var SITEURL = '{{ URL::to('') }}';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            $.ajax({
                url: SITEURL + "/admin/student/getDetail/" + id,
                type: 'GET',
                success: function (response)
                {
                    $('#studentModal').modal('toggle');
                    $('#studentModal').modal('show');
                    $(".studentModalBody").empty();
                    $(".studentModalBody").html(response);
                }
            });
        }

        getDocument = function (id)
        {
            var SITEURL = '{{ URL::to('') }}';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            $.ajax({
                url: SITEURL + "/admin/student/getDocument/" + id,
                type: 'GET',
                success: function (response)
                {
                    $('#studentModal').modal('toggle');
                    $('#studentModal').modal('show');
                    $(".studentModalBody").empty();
                    $(".studentModalBody").html(response);
                }
            });
        }
    </script>
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
@endsection