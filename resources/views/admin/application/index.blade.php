@extends('layouts.admin')
@section('content')
@php
use App\Models\Student;
use App\Models\College;
use App\Models\Course;
@endphp
<div class="page-header">
    <div class="page-title">
        <h3>Student All Application List</h3>
    </div>
    <div class="dropdown filter custom-dropdown-icon">
            <button type="button"
                                    class="btn btn-success"
                                    data-toggle="modal"
                                    data-target="#apply"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Apply"><i class="fa-solid fa-square-plus"></i>
                                    Add New
                                </button>
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
                            <th>Action</th>
                            <th>App ID</th>
                            {{-- <th>Student ID</th> --}}
                            <th>Student Name</th>
                            <th>Student Email</th>
                            <th>Student Phone</th>
                            <th>College</th>
                            <th>Course</th>
                            <th>Application Fee</th>
                            <th>Visa Fee</th>
                            <th>App Fee Status</th>
                            <th>Visa Fee Status</th>
                            {{-- <th>Payment Date</th> --}}
                            <th>Pay Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applies as $apply)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>
                                <button class="btn btn-info badge" data-toggle="modal"data-target="#addFeeModel{{$apply->stdAppId}}">Add Fee</button>
                                {{-- <button type="button"
                                    class="btn btn-primary badge"
                                    data-toggle="modal"
                                    data-target="#edit{{$apply->id}}"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Edit"><i class="fa-solid fa-square-plus"></i>
                                    Edit
                                </button> --}}
                            </td>
                            <td>{{$apply->id}}</td>
                            {{-- <td>{{$apply->stdid}}</td> --}}
                            <td>{{$apply->stdName}}</td>
                            <td>{{$apply->stdEmail}}</td>
                            <td>{{$apply->stdPhone}}</td>
                            <td>{{$apply->clgName}}</td>
                            <td>{{$apply->crName}}</td>
                            <td>
                                @if ($apply->application_fee != null)
                                    <span>{{$apply->application_fee}}</span>
                                    @else
                                    <span>not set</span>
                                @endif
                            </td>
                            <td>
                                @if ($apply->visa_fee != null)
                                    <span>{{$apply->visa_fee}}</span>
                                    @else
                                    <span>not set</span>
                                @endif
                            </td>
                            <td>
                                @if ($apply->application_fee_status == 0)
                                    <span class="badge badge-danger">unpaid</span>
                                    @else
                                    <span class="badge badge-success">paid</span>
                                @endif
                            </td>
                            <td>
                                @if ($apply->visa_fee_status == 0)
                                    <span class="badge badge-danger">unpaid</span>
                                    @else
                                    <span class="badge badge-success">paid</span>
                                @endif
                            </td>
                            {{-- <td>{{$apply->payment_date}}</td> --}}
                            <td>
                                @if ($apply->pay_status == 0)
                                    <span class="badge badge-danger">unpaid</span>
                                    @else
                                    <span class="badge badge-success">paid</span>
                                @endif
                            </td>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Action</th>
                            <th>App ID</th>
                            {{-- <th>Student ID</th> --}}
                            <th>Student Name</th>
                            <th>Student Email</th>
                            <th>Student Phone</th>
                            <th>College</th>
                            <th>Course</th>
                            <th>Application Fee</th>
                            <th>Visa Fee</th>
                            <th>App Fee Status</th>
                            <th>Visa Fee Status</th>
                            {{-- <th>Payment Date</th> --}}
                            <th>Pay Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    </div>
    @foreach ($applies as $apply)
    <div class="modal fade" id="addFeeModel{{$apply->stdAppId}}" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3"> Add Fee for applied student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                   <form action="{{route('student.applicationCreate')}}" method="POST">
                    @csrf
                    @method("POST")
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Application Fee :</label>
                           <input type="text" name="appFee" class="form-control" value="{{old('appFee', $apply->application_fee)}}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Visa Fee :</label>
                           <input type="text" name="visaFee" class="form-control" value="{{old('visaFee', $apply->visa_fee)}}">
                    </div>
                    {{-- <div class="form-group">
                        @if ($errors->any())
                            <label for="recipient-name" class="form-control-label text text-danger">Payment Date* :</label>
                        @else
                        <label for="recipient-name" class="form-control-label">Payment Date :</label>
                            @endif
                           <input type="date" name="paymentDate" class="form-control" value="{{old('paymentDate', $apply->payment_date)}}">
                    </div> --}}
                    <input type="hidden" value="{{$apply->stdid}}" name="studentId">
                    <input type="hidden" value="{{$apply->clgid}}" name="collegeId">
                    <input type="hidden" value="{{$apply->crid}}" name="courseId">
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

<!-- ::::::::::::::::::::::::::Add New::::::::::::::::::::::::::::: -->
    <div class="modal fade" id="apply" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Student Application</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('student.applyApp')}}" method="POST">
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
                            <label for="recipient-name" class="form-control-label">Select a College to apply :</label>
                            @php
                                $colleges = College::all();
                            @endphp
                                <select name="college" id="college" class="form-control" onchange="loadCourses()">
                                    <option value="">Select College</option>
                                    @foreach ($colleges as $college)
                                        <option value="{{$college->id}}">{{$college->name}}</option>
                                    @endforeach
                                </select>
                            @error('college')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Select a Course to apply :</label>
                            <select name="course" id="course" class="form-control">
                                <option value="">Select Course</option>
                            </select>
                            @error('course')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Application Fee :</label>
                               <input type="text" name="appFee" class="form-control" value="{{old('appFee')}}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Visa Fee :</label>
                               <input type="text" name="visaFee" class="form-control" value="{{old('visaFee')}}">
                        </div>
                        {{-- <div class="form-group">
                            @if ($errors->any())
                                <label for="recipient-name" class="form-control-label text text-danger">Payment Date* :</label>
                            @else
                            <label for="recipient-name" class="form-control-label">Payment Date :</label>
                                @endif
                               <input type="date" name="paymentDate" class="form-control">
                        </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-success">Apply</button>
                </div>
                </form>

            </div>
        </div>
    </div>
<!-- ::::::::::::::::::::::::::Add New::::::::::::::::::::::::::::: -->

<!-- ::::::::::::::::::::::::::Edit New::::::::::::::::::::::::::::: -->
    @foreach ($applies as $apply)
    <div class="modal fade" id="edit{{$apply->id}}" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Student Application</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('student.applyApp')}}" method="POST">
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
                                        <option value="{{$student->id}}" {{$student->STDID == $apply->stdId ? 'selected' : ""}}>{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</option>
                                    @endforeach
                                </select>
                            @error('student')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Select a College to apply :</label>
                            @php
                                $colleges = College::all();
                            @endphp
                                <select name="college" id="editcollege" class="form-control" onchange="loadEditCourses()">
                                    <option value="">Select College</option>
                                    @foreach ($colleges as $college)
                                        <option value="{{$college->id}}" {{$college->id == $apply->clgid ? 'selected' : ""}}>{{$college->name}}</option>
                                    @endforeach
                                </select>
                            @error('college')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Select a Course to apply :</label>
                            <select name="course" id="editcourse" class="form-control">
                                <option value="">Select Course</option>
                            </select>
                            @error('course')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Application Fee :</label>
                               <input type="text" name="appFee" class="form-control" value="{{old('appFee', $apply->application_fee)}}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Visa Fee :</label>
                               <input type="text" name="visaFee" class="form-control" value="{{old('visaFee', $apply->visa_fee)}}">
                        </div>
                        <div class="form-group">
                            @if ($errors->any())
                                <label for="recipient-name" class="form-control-label text text-danger">Payment Date* :</label>
                            @else
                            <label for="recipient-name" class="form-control-label">Payment Date :</label>
                                @endif
                               <input type="date" name="paymentDate" class="form-control" value="{{$apply->payment_date}}">
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
<!-- ::::::::::::::::::::::::::Edit New::::::::::::::::::::::::::::: -->
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    function loadCourses() {
        var college_id = $('#college').val();
        if (college_id) {
            $.ajax({
                type: 'GET',
                url: '{{ route("getcourses", "") }}' + '/' + college_id,
                success: function(courses) {
                    $('#course').empty();
                    $('#course').append('<option value="">Select Course</option>');
                    $.each(courses, function(key, value) {
                        $('#course').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        } else {
            $('#course').empty();
            $('#course').append('<option value="">Select Course</option>');
        }
    }
    </script>

<script>
    function loadEditCourses() {
        var college_id = $('#editcollege').val();
        if (college_id) {
            $.ajax({
                type: 'GET',
                url: '{{ route("getcourses", "") }}' + '/' + college_id,
                success: function(courses) {
                    $('#editcourse').empty();
                    $('#editcourse').append('<option value="">Select Course</option>');
                    $.each(courses, function(key, value) {
                        $('#editcourse').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        } else {
            $('#editcourse').empty();
            $('#editcourse').append('<option value="">Select Course</option>');
        }
    }
    </script>
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
        window.location.href = SITEURL + "/course/" + deleteFunction + "/" + id;
    }
    })
 
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
@if (Session::get('error'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: '{{ Session::get('error') }}',
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
            title: 'Payment Date are required',
        });
    </script>
</ul>
@endif
@endsection 