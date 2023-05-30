@extends('recruiter.master')
@section('content')
    @php
        use App\Models\College;
        use App\Models\Course;
        use App\Models\Country;
        use App\Models\Student;
    @endphp
    <div class="page-header">
        <div class="page-title">
            <h3>Intake Filter</h3>
        </div>
    </div>
    @php
        $colleges = College::all();
        $courses = Course::all();
        $countries = Country::all();
    @endphp
    <div class="row">
        <div class="col-md-4">
            <div class="mt-3">
                <div class="card">
                    <div class="card-body shadow">
                        <form action="{{ route('rec.intake.filter') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="info">
                                <div class="row">
                                    <div class="col-md-12 mx-auto">
                                        <div class="work-section">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="intake">Course Name</label>
                                                        <select name="course" class="form-control"
                                                            style="height: calc(1.4em + 1.4rem + 0px)">
                                                            <option>Select Course</option>
                                                            @foreach ($courses as $course)
                                                                <option value="{{ $course->college_id }}">
                                                                    {{ $course->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name">College Name</label>
                                                        <select name="college" class="form-control"
                                                            style="height: calc(1.4em + 1.4rem + 0px)">
                                                            <option>Select College</option>
                                                            @foreach ($colleges as $college)
                                                                <option value="{{ $college->id }}">{{ $college->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name">Country Name</label>
                                                        <select name="country" class="form-control"
                                                            style="height: calc(1.4em + 1.4rem + 0px)">
                                                            <option>Select Country</option>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->id }}">{{ $country->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name">Intake</label>
                                                        <select name="intake_month" class="form-control"
                                                            style="height: calc(1.4em + 1.4rem + 0px)">
                                                            <option>Select Month</option>
                                                            <option value="01">January</option>
                                                            <option value="02">February</option>
                                                            <option value="03">March</option>
                                                            <option value="04">April</option>
                                                            <option value="05">May</option>
                                                            <option value="06">June</option>
                                                            <option value="07">July</option>
                                                            <option value="08">August</option>
                                                            <option value="09">September</option>
                                                            <option value="10">October</option>
                                                            <option value="11">November</option>
                                                            <option value="12">December</option>
                                                        </select>

                                                        {{-- <select name="intake_year" class="form-control" style="height: calc(1.4em + 1.4rem + 0px)">
                                                        <option>Select Year</option>
                                                        <?php for ($i = date('Y'); $i >= 1900; $i--): ?>
                                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                        <?php endfor; ?>
                                                    </select> --}}

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <button type="submit"
                                                            class="btn btn-primary btn-block">Filter</button>
                                                    </div>
                                                </div>
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
        <div class="col-md-8">
            <div class="row layout-top-spacing mt-3" id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="table-responsive mb-4 mt-4">

                            @foreach ($filters as $filter)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img src="{{ asset($filter->image) }}" class="img-fluid"
                                                            alt="no-image">
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h4>{{ $filter->name }}</h4>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <h5>{{ $filter->clgName }}</h5>
                                                            </div>
                                                            <div class="col-md-4">
                                                                @isset($filter->country)
                                                                    @if ($filter->country != '')
                                                                        <h6 class="text text-primary">
                                                                            <b>{{ $filter->country }}</b>
                                                                        </h6>
                                                                    @else
                                                                        N/A
                                                                    @endif
                                                                @endisset
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                {{ $filter->description }}
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-4">
                                                                <h4>{{ $filter->tuition_fee }}</h4>
                                                                <p>Tuition Fee</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <h4> {{ $filter->application_fee }}</h4>
                                                                <p>Application Fee</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <button class="btn btn-danger" data-toggle="modal"
                                                                    data-target="#apply{{ $filter->id }}"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Apply">Apply Now</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($filters as $filter)
        <div class="modal fade" id="apply{{ $filter->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3">Check Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('rec.cors_colg.apply') }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="college" value="{{ $filter->college_id }}">
                            <input type="hidden" name="course" value="{{ $filter->courseID }}">
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Select a Student to apply :</label>
                                @php
                                    $students = Student::all();
                                @endphp
                                <select name="student" class="form-control">
                                    <option value="">Select Student</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->first_name }}
                                            {{ $student->middle_name }} {{ $student->last_name }}</option>
                                    @endforeach
                                </select>
                                @error('student')
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
        function deleterecord(id, deletefunction) {
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
                    window.location.href = SITEURL + "/college/" + deleteFunction + "/" + id;
                }
            })

        }
    </script>

    @if ($errors->any())
        <ul>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'student field are required',
                });
            </script>
        </ul>
    @endif
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
