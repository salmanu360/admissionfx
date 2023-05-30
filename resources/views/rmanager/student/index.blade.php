@extends('layouts.admin')
@section('content')
@php use App\Models\StudentPassword;
use App\Models\User;
use App\Models\StudentNotes;
@endphp
<div class="page-header">
    <div class="page-title">
        <h3>All Students</h3>
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        {{-- <a href="{{route('students.uploadexcel')}}"><button class="btn btn-success"><i class="fa-solid fa-square-plus"></i> Upload Excel</button></a>
        <a target="_blank" href="{{asset('uploads/excel_template/student.csv')}}"><button class="btn btn-success"><i class="fa fa-download"></i>Download Excel</button> </a> --}}
    </div>
</div>
<div class="row layout-top-spacing" id="cancel-row">
                
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
                
                <table class="multi-table table table-striped table-bordered table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Unique ID</th>
                            <th>Full Name</th>
                            <th>Application Team</th>
                            <th>Intake</th>
                            <th>Gender</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Education</th>
                            <th>Passport</th>
                            <th>Passport Expiry</th>
                            <th>Country</th>
                            
                            <th>Username</th>
                            <th>Password</th>
                            <th>Status</th>
                            <th>Eligible/Not-Eligible</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        @php 
                        $StudentPassword = StudentPassword::where('user_id', $student->user_id)->first();
                        $username = User::where('id', $student->user_id)->first();
                        @endphp
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$student->unique_id}}</td>
                            <td><a style="color:blue" href="{{route('students.getDetail', $student->id)}}"> {{$student->middle_name}} {{$student->last_name}}</a></td>
                            @if ($student->application_team_name)
                            <td>{{$student->application_team_name}}</td>
                            @else
                            <td>---</td>
                            @endif
                            <td>
                                @if ($student->intake == null)
                                N/A
                                    @else
                                {{date('M Y', strtotime($student->intake))}}
                                @endif
                            </td>
                            <td>{{$student->gender}}</td>
                            <td>{{$student->contact_no}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->high_level_edu}}</td>
                            <td>{{$student->passport_number}}</td>
                            <td>{{$student->passport_expiry_date}}</td>
                            <td>{{$student->country}}</td>
                            <td>
                                @if(!empty($username->email))
                                {{$username->email}}
                                @else
                                {{'N/A'}}
                                @endif
                            </td>
                            <td>
                                @if(!empty($StudentPassword->student_password))
                                {{$StudentPassword->student_password}}
                                @else
                                {{'N/A'}}
                                @endif
                            </td>
                            <td>
                                @if($student->status == 1)
                                    <a class="badge bg-success updateStudentStatus btn-rounded" style="color: #fff;" href="javascript:" id="student-{{$student->id}}" student_id="{{$student->id}}">Active</a>
                                @else
                                <a class="badge bg-danger updateStudentStatus btn-rounded" style="color: #fff;" href="javascript:" id="student-{{$student->id}}" student_id="{{$student->id}}">Deactive</a>
                                @endif
                            </td>
                            <td>
                               <button class="btn btn-info btn-sm badge badge-sm" data-toggle="modal"data-target="#viewNotes{{ $student->id }}">view</button>
                            </td>
                            <td class="text-centers">
                                <a href="{{route('students.edit', $student->id)}}"><i class="far fa-edit"></i></a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Unique ID</th>
                            <th>Full Name</th>
                            <th>Application Team</th>
                            <th>Intake</th>
                            <th>Gender</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Education</th>
                            <th>Passport</th>
                            <th>Passport Expiry</th>
                            <th>Country</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Status</th>
                            <th>Eligible/Not-Eligible</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
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

<!--::::::::::::::::::::::::::::View Student Notes::::::::::::::::::::::::-->
@foreach($students as $student)
<div class="modal fade" id="viewNotes{{ $student->id }}" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">{{$student->first_name}} {{$student->last_name}} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                    <table class="table table-bordered table-hover">
                        @php
                             $notes = StudentNotes::where('student_id', $student->id)->get();
                        @endphp
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Comments</th>
                                <th>Created by</th>
                                {{-- <th>Created Date</th> --}}
                                <th>status</th>
                            </tr>
                        </thead>
                        @foreach ($notes as $note)
                        <tbody>
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$note->notes}}</td>
                                <td>{{$note->created_by_name}}</td>
                                {{-- <td>{{date('M Y', strtotime($note->created_at))}}</td> --}}
                                <td>
                                    @if ($note->status == 1)
                                    <span class="text text-success">Eligible</span>
                                    @else
                                    <span class="text text-danger">Not Eligible</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!--::::::::::::::::::::::::::::View Student Notes::::::::::::::::::::::::-->

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
        window.location.href = SITEURL + "/" + deleteFunction + "/" + id;
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
            url: SITEURL + "/student/getDetail/" + id,
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
            url: SITEURL + "/student/getDocument/" + id,
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
@if (Session::get('assign'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ Session::get('assign') }}',
            showConfirmButton: false,
            timer: 5000
        });
    </script>
@endif
@if (Session::get('change'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ Session::get('change') }}',
            showConfirmButton: false,
            timer: 5000
        });
    </script>
@endif
@if ($errors->any())
<ul>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Fields are required',
        });
    </script>
</ul>
@endif

@endsection 