@extends('layouts.admin')
@section('content')
@php
use App\Models\Student;
use App\Models\College;
use App\Models\Course;
@endphp
<div class="page-header">
    <div class="page-title">
        <h3>All College</h3>
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a href="{{route('college.create')}}"><button class="btn btn-success"><i class="fa-solid fa-square-plus"></i> Add College</button></a>
         <a href="{{route('college.uploadexcel')}}"><button class="btn btn-success"><i class="fa-solid fa-square-plus"></i> Upload Excel</button></a>
        <a target="_blank" href="{{asset('uploads/excel_template/college.csv')}}"><button class="btn btn-success"><i class="fa fa-download"></i>Download Excel</button> </a>
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
                            <th>College</th>
                            <th>Slug</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Campus</th>
                            <th>Intake</th>
                            <th>Level Of education</th>
                            <th>Application Fee</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($colleges as $college)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td><strong><a style="color:blue" href="{{route('college.getDetail', $college->id)}}">{{$college->name}}</a></strong></td>
                            <td>{{$college->slug}}</td>
                            <td>{{optional($college->country)->name}}</td>
                             <td>{{optional($college->state)->name}}</td>
                            <td>{{optional($college->city)->name}}</td>
                            <td>{{$college->campus}}</td>
                           <td>{{date('M Y', strtotime($college->intake))}}</td>
                            {{-- <td>{{ $college->intake }}</td> --}}
                            <td>{{$college->level_of_edu}}</td>
                            <td>{{$college->application_fee}}</td>
                            <td><img src="{{asset($college->image)}}" width="70" alt=""></td>
                            <td>
                                @if($college->status == 1)
                                    <a class="badge bg-success updateCollegeStatus btn-rounded" style="color: #fff;" href="javascript:" id="country-{{$college->id}}" college_id="{{$college->id}}">Active</a>
                                @else
                                <a class="badge bg-danger updateCollegeStatus btn-rounded" style="color: #fff;" href="javascript:" id="country-{{$college->id}}" college_id="{{$college->id}}">Deactive</a>
                                @endif
                            </td>
                            <td class="text-centers">
                                {{-- <a href=""><i class="far fa-eye"></i></a> --}}
                                <a href="{{route('college.create')}}"><i class="fa-solid fa-square-plus"></i></a>
                                <a href="{{route('editCollege', $college->id)}}"><i class="far fa-edit"></i></a>
                                <a class="text text-danger btn-sm deleteRecord" style="color: white" href="javascript:void(0);" rel="{{ $college->id }}" rel1="delete_college" onclick="deleterecord('{{$college->id}}','college/delete_college');">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <button type="button"
                                class="btn btn-ico btn-sm badge badge-sm btn-info"
                                data-toggle="modal"
                                data-target="#apply{{ $college->id }}"
                                data-toggle="tooltip" data-placement="top"
                                title="Apply">
                                Apply
                            </button>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>College</th>
                            <th>Slug</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Campus</th>
                            <th>Intake</th>
                            <th>Level Of education</th>
                            <th>Application Fee</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    </div>
    
     @foreach ($colleges as $college)
    <div class="modal fade" id="apply{{ $college->id }}" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Check Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('course.applyCourse', $college->id)}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Select a Student to apply :</label>
                            @php
                                $students = Student::all();
                            @endphp
                                <select name="student" class="form-control">
                                    <option value="">Select Student</option>
                                    @foreach ($students as $student)
                                        <option value="{{$student->id}}">{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</option>
                                    @endforeach
                                </select>
                            @error('student')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Select a Course to apply :</label>
                            @php
                                $courses = Course::where('college_id', $college->id)->get();
                            @endphp
                                <select name="course" id="course" class="form-control">
                                    <option value="">Select Course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                    @endforeach
                                </select>
                            @error('course')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-success">Apply</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    @endforeach
    
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
        @if($message = Session::get('success_message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ $message }}");
  @endif
    
</script>
@endsection 