@extends('layouts.admin')
@section('content')
@php
    use App\Models\College;
    use App\Models\Course;
@endphp
<div class="page-header">
    <div class="page-title">
        <h3>All Course</h3>
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a href="{{route('course.create')}}"><button class="btn btn-success"><i class="fa-solid fa-square-plus"></i> Add Course</button></a>
        <a href="{{route('course.uploadexcel')}}"><button class="btn btn-success"><i class="fa-solid fa-square-plus"></i> Upload Excel</button></a>
        <a target="_blank" href="{{asset('uploads/excel_template/course.csv')}}"><button class="btn btn-success"><i class="fa fa-download"></i>Download Excel</button> </a>
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
                            <th>Course Name</th>
                            <th>College Name</th>
                            <th>Duration</th>
                            <th>Intake</th>
                            <th>Tuition Fee</th>
                            <th>Application Fee</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td><a style="color:blue" href="{{route('course.getDetail', $course->id)}}">{{$course->name}}</a></td>
                                @php
                                    $college =  Course::
                                    join('colleges', 'courses.college_id', '=', 'colleges.id')
                                    ->where('colleges.id', $course->college_id)
                                    ->select('colleges.name AS clgName')
                                    ->first();
                                @endphp
                            <td>@if(!empty($college->clgName))
                                    {{$college->clgName}}</td>
                                    @else
                                        N/A
                                @endif</td>
                            <td>{{$course->duration}}</td>
                            <td>{{$course->intake}}</td>
                            <td>{{$course->tuition_fee}}</td>
                            <td>{{$course->application_fee}}</td>
                            <td>
                                @if($course->status == 1)
                                    <a class="badge bg-success updateCourseStatus btn-rounded" style="color: #fff;" href="javascript:" id="course-{{$course->id}}" course_id="{{$course->id}}">Active</a>
                                @else
                                <a class="badge bg-danger updateCourseStatus btn-rounded" style="color: #fff;" href="javascript:" id="course-{{$course->id}}" course_id="{{$course->id}}">Deactive</a>
                                @endif
                            </td>
                            <td class="text-centers">
                                {{-- <a href=""><i class="far fa-eye"></i></a> --}}
                                <a href="{{route('course.edit', $course->id)}}"><i class="far fa-edit"></i></a>
                                <a class="text text-danger btn-sm deleteRecord" style="color: white" href="javascript:void(0);" rel="{{ $course->id }}" rel1="delete_course" onclick="deleterecord('{{$course->id}}','course/destroy');">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            {{-- <th>College Name</th> --}}
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
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
<script>
        @if($message = Session::get('success_message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ $message }}");
  @endif
</script>
    @if ($errors->any())
    <ul>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'some field are required',
            });
        </script>
    </ul>
    @endif
@endsection 