@extends('application.master')
@section('content')
@php use App\Models\StudentPassword;
use App\Models\LeadStatus;
use App\Models\User;
use App\Models\StudentNotes;
@endphp
<div class="page-header">
    <div class="page-title">
        <h3>All Students</h3>
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        {{-- <a href="{{route('student.create')}}"><button class="btn btn-success"><i class="fa-solid fa-square-plus"></i> Add Student</button></a> --}}
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
                            <th>Lead Status</th>
                            <th>Created by</th>
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
                            <th>Notes</th>
                            <th>Status</th>
                            <th>
                                <span class="text text-success">Eligible</span> / 
                                <span class="text text-danger">Not-Eligible</span>
                            </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        @php 
                        $StudentPassword = StudentPassword::where('user_id', $student->user_id)->first();
                        $username = User::where('id', $student->user_id)->first();
                        $lead = LeadStatus::where('id', $student->lead_status)->first();
                        @endphp
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$student->unique_id}}</td>
                            <td><a style="color:blue" href="{{route('student.getDetail', $student->id)}}"> {{$student->first_name}} {{$student->last_name}}</a></td>
                            @if ($student->application_team_name)
                            <td>{{$student->application_team_name}}</td>
                            @else
                            <td>N/A</td>
                            @endif
                            <td>{{$lead->name}}</td>
                            <td>{{$student->created_by_name}}</td>
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
                               <button class="btn btn-info btn-sm badge badge-sm" data-toggle="modal"data-target="#viewNotes{{ $student->id }}">view notes</button>
                            </td>
                            <td>
                                @if($student->status == 1)
                                    <a class="badge bg-success updateStudentStatus btn-rounded" style="color: #fff;" href="javascript:" id="student-{{$student->id}}" student_id="{{$student->id}}">Active</a>
                                @else
                                <a class="badge bg-danger updateStudentStatus btn-rounded" style="color: #fff;" href="javascript:" id="student-{{$student->id}}" student_id="{{$student->id}}">Deactive</a>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm badge badge-sm" data-toggle="modal"data-target="#eligibleNotes{{ $student->id }}" title="eligible"><i class="fa-solid fa-square-plus"></i></button>
                                <button class="btn btn-danger btn-sm badge badge-sm" data-toggle="modal"data-target="#not-eligibleNotes{{ $student->id }}" title="not-eligible"><i class="fa-solid fa-square-plus"></i></button>
                            </td>
                            <td class="text-centers">
                                {{-- <a href=""><i class="far fa-eye"></i></a> --}}
                                <!--<a class="text-primary" href="javascript:" onclick="getDetail({{$student->id}})" ><i class="fa-solid fa-eye"></i></a>-->
                                
                                {{--<a class="text-primary" href="javascript:" onclick="getDocument({{$student->id}})" ><i class="fa-solid fa-file"></i></a>--}}

                                {{-- <a href="{{route('student.create')}}"><i class="fa-solid fa-square-plus"></i></a> --}}
{{--                                <a href=""><i class="fa-solid fa-square-plus"></i></a>--}}
                                {{-- <a href="{{route('student.edit', $student->id)}}"><i class="far fa-edit"></i></a>
                                <a class="text text-danger btn-sm deleteRecord" style="color: white" href="javascript:void(0);" rel="{{ $student->id }}" rel1="delete_student" onclick="deleterecord('{{$student->id}}','student/destroy');">
                                    <i class="far fa-trash-alt"></i>
                                </a> --}}
                                {{-- <button type="button"
                                class="btn btn-sm badge badge-sm btn-info"
                                data-toggle="modal"
                                data-target="#appTeamModel{{ $student->id }}"
                                data-toggle="tooltip" data-placement="top"
                                title="lable assign to Application Team">
                                <i class="fa fa-tasks" aria-hidden="true"></i>
                            </button>
                            <button type="button"
                                class="btn btn-ico btn-sm badge badge-sm btn-info"
                                data-toggle="modal"
                                data-target="#changePasswordModel{{ $student->id }}"
                                data-toggle="tooltip" data-placement="top"
                                title="Change Password">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </button> --}}
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
                            <th>Lead Status</th>
                            <th>Created by</th>
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
                            <th>Notes</th>
                            <th>Status</th>
                            <th>
                                <span class="text text-success">Eligible</span> / 
                                <span class="text text-danger">Not-Eligible</span>
                            </th
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

@foreach ($students as $student)
<!-- Application Team  Modal -->
<div class="modal fade" id="appTeamModel{{ $student->id }}" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Lable Assign to Application Team</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('student.team.assign', $student->id)}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Application Team :</label>
                            <select name="team_assign" class="form-control">
                                <option value="">Select Team</option>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}:{{$user->name}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        @error('team_assign')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button class="btn btn-success">Assign</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal closed -->
@endforeach

@foreach ($students as $student)
<!-- Change Password  Modal -->
<div class="modal fade" id="changePasswordModel{{ $student->id }}" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('student.password', $student->id)}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Email :</label>
                            <input type="email" class="form-control" name="email" readonly value="{{$student->email}}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">New Password :</label>
                            <input type="password" class="form-control" name="newPassword">
                    </div>
                    @error('newPassword')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Confirm Password :</label>
                            <input type="password" class="form-control" name="confirmPassword">
                    </div>
                    @error('confirmPassword')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button class="btn btn-success">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Change Password  Modal -->
@endforeach


<!--::::::::::::::::::::::::::::Student eligible Notes::::::::::::::::::::::::-->
@foreach($students as $student)
<div class="modal fade" id="eligibleNotes{{ $student->id }}" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3"> For Eligible Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                   <form action="{{route('application.student.addNotes')}}" method="POST">
                    @csrf
                    @method("POST")
                    <input type="hidden" name="id" value="{{ $student->id }}">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Add Notes :</label>
                          <textarea name="notes" id="" cols="30" rows="10" class="form-control">{{old('notes')}}</textarea>
                          @error('notes')
                              <span class="text text-danger">{{$message}}</span>
                          @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" data-dismiss="#">Save</button>
            </div>
                   </form>
        </div>
    </div>
</div>
@endforeach
<!--::::::::::::::::::::::::::::Student eligible Notes::::::::::::::::::::::::-->

<!--::::::::::::::::::::::::::::Student not-eligible Notes::::::::::::::::::::::::-->
@foreach($students as $student)
<div class="modal fade" id="not-eligibleNotes{{ $student->id }}" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3"> For Not Eligible Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                   <form action="{{route('application.studentNot.addNotes')}}" method="POST">
                    @csrf
                    @method("POST")
                    <input type="hidden" name="id" value="{{ $student->id }}">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Add Notes :</label>
                          <textarea name="notes" id="" cols="30" rows="10" class="form-control">{{old('notes')}}</textarea>
                          @error('notes')
                              <span class="text text-danger">{{$message}}</span>
                          @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" data-dismiss="#">Save</button>
            </div>
                   </form>
        </div>
    </div>
</div>
@endforeach
<!--::::::::::::::::::::::::::::Student not-eligible Notes::::::::::::::::::::::::-->

<!--::::::::::::::::::::::::::::View Student Notes::::::::::::::::::::::::-->
@foreach($students as $student)
<div class="modal fade" id="viewNotes{{ $student->id }}" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3"> Notes of {{$student->first_name}} {{$student->last_name}} </h5>
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
                                <th>Notes</th>
                                <th>Created by</th>
                                <th>Created Date</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        @foreach ($notes as $note)
                        <tbody>
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$note->notes}}</td>
                                <td>{{$note->created_by_name}}</td>
                                <td>{{date('M Y', strtotime($note->created_at))}}</td>
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

@if (Session::get('add'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ Session::get('add') }}',
            showConfirmButton: false,
            timer: 5000
        });
    </script>
@endif
@if (Session::get('empty'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '{{Session::get('empty')}}',
        });
    </script>
@endif

@endsection 