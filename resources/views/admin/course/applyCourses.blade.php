@extends('layouts.admin')
@section('content')
@php
use App\Models\StudentApply;
@endphp
<div class="page-header">
    <div class="page-title">
        <h3>All Course</h3>
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <!--<a href="{{route('course.create')}}"><button class="btn btn-success"><i class="fa-solid fa-square-plus"></i> Add Course</button></a>-->
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
                            <th>Student</th>
                            <th>Recruiter</th>
                            <th>Created by</th>
                            <th>Course</th>
                            <th>College</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $applies = StudentApply::join('students', 'students.id', 'student_applies.student_id')
                            ->leftjoin('users', 'users.id', 'student_applies.recruiter_id')
                            ->join('colleges', 'colleges.id', 'student_applies.college_id')
                            ->join('courses', 'courses.id', 'student_applies.course_id')
                            ->select('student_applies.created_by AS NAME' , 'student_applies.created_at AS date','colleges.name AS clgName', 'courses.name AS crName', 'users.name AS userName', DB::raw('CONCAT(students.first_name, " ", students.middle_name, " ", students.last_name) AS stdName'))
                            ->get();
                        @endphp
                        @foreach($applies as $apply)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$apply->stdName}}</td>
                            <td>
                                @if ($apply->userName == null)
                                    N/A
                                @else
                                    {{$apply->userName}}
                                @endif
                            </td>
                            <td>
                                @if ($apply->NAME != null)
                                    {{auth()->user()->name}}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{$apply->crName}}</td>
                            <td>{{$apply->clgName}}</td>
                            <td>{{date('M Y', strtotime($apply->date))}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Recruiter</th>
                            <th>Created by</th>
                            <th>Course</th>
                            <th>College</th>
                            <th>Created Date</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    </div>
@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- <script>
    $(".deleteRecord").click(function () {

        var SITEURL = '{{ URL::to('') }}';

        var id = $(this).attr('rel');

        var deleteFunction = $(this).attr('rel1');

        Swal.fire({
            title: "Are You Sure? ",
        text: "You will not be able to recover this record again",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, Delete it!"
    },
        function () {
            window.location.href = SITEURL + "/admin/country/" + deleteFunction + "/" + id;
        });

    });
</script> --}}

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
    
</script>
@endsection 