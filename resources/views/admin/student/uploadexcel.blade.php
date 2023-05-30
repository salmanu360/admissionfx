@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-title">
         <h3>Add Course</h3>
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a href="{{route('student.index')}}"><button class="btn btn-success"><i class="fa-solid fa-eye"></i> View Student</button></a>
    </div>
</div>


<div class="row layout-top-spacing" id="cancel-row">
                
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                @include('admin.partials._message')
                <br>
                <form action="{{ route('student.uploadexcelcsv') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="info">
                        <div class="row">
                            <div class="col-md-11 mx-auto">
                                <div class="work-section">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="college_id">Upload CSV</label>
                                                <input type="file" name="excel_student" required class="form-control mb-4" value="">
                                                <span class="text text-info">only CSV file upload</span>
                                            </div>
                                        </div>


                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Submit</button>
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
@endsection

@section('js')
<script src="{{asset('modern-light-menu/plugins/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('modern-light-menu/plugins/flatpickr/custom-flatpickr.js')}}"></script>
@endsection