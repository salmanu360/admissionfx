@extends('layouts.admin')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h3>Add Course</h3>
        </div>
        <div class="dropdown filter custom-dropdown-icon">
            <a href="{{route('course.index')}}"><button class="btn btn-success"><i class="fa-solid fa-eye"></i> View Course</button></a>
        </div>
    </div>


    <div class="row layout-top-spacing" id="cancel-row">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                    @include('admin.partials._message')
                    <br>
                    <form action="{{ route('course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="info">
                            <div class="row">
                                <div class="col-md-12 mx-auto">
                                    <div class="work-section">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="college_id">College Name</label>
                                                    <select name="college_id" id="college_id" class="form-control" style="height: calc(1.4em + 1.4rem + 0px)">
                                                        <option value="">Select College</option>
                                                        @foreach($colleges as $college)
                                                            <option @if($college->id == $course->college_id) selected @endif value="{{$college->id}}">{{$college->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Course Name</label>
                                                    <input type="text" name="name" class="form-control" id="name"
                                                           placeholder="Course Name"
                                                           style="height: calc(1.4em + 1.4rem + 0px)"
                                                           value="{{ $course->name }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="intake">Intake</label>
                                                    <input type="date" name="intake" class="form-control" id="intake"
                                                           style="height: calc(1.4em + 1.4rem + 0px)"
                                                           value="{{ $course->intake }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Country Name</label>
                                                    <select name="country" id="country" class="form-control"
                                                            style="height: calc(1.4em + 1.4rem + 0px)">
                                                        <option value="">Select Country</option>
                                                        @foreach ($countries as $country)
                                                            <option @if($country->id == $course->country_id) selected
                                                                    @endif value="{{ $country->id }}">{{ $country->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="state_id">State</label>
                                                    <input type="hidden" id="state_old_id" value="{{$course->state_id}}">
                                                    <select class="form-control  state_id" name="state_id"
                                                            id="state_id" style="height: calc(1.4em + 1.4rem + 0px)">
                                                        <option value="" selected disabled hidden>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="program">Program</label>
                                                    <select name="program" id="program" class="form-control"
                                                            style="height: calc(1.4em + 1.4rem + 0px)">
                                                        <option value="">Select Program</option>
                                                        @foreach ($programs as $program)
                                                            <option @if($program->id == $course->program_id) selected
                                                                    @endif value="{{ $program->id }}">{{ $program->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="category">Category</label>
                                                    <select name="category" id="category" class="form-control"
                                                            style="height: calc(1.4em + 1.4rem + 0px)">
                                                        <option value="">Select Category</option>
                                                        @foreach ($categories as $category)
                                                            <option @if($category->id == $course->category_id) selected
                                                                    @endif value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="description">Program Description</label>
                                                    <textarea name="description" class="form-control" id="description"
                                                              rows="5"
                                                              placeholder="Program Description">{{ $course->description }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="duration">Duration</label>
                                                    <input type="text" name="duration" class="form-control" id="duration"  style="height: calc(1.4em + 1.4rem + 0px)" value="{{ $course->duration }}">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="tuition_fee">Tuition Fee</label>
                                                    <input type="number" name="tuition_fee" class="form-control" id="tuition_fee"  style="height: calc(1.4em + 1.4rem + 0px)" value="{{$course->tuition_fee}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="application_fee">Application  Fee</label>
                                                    <input type="number" name="application_fee" class="form-control" id="application_fee"  style="height: calc(1.4em + 1.4rem + 0px)" value="{{ $course->application_fee }}">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="tags">Tags</label>
                                                    <textarea name="tags" class="form-control" id="tags" rows="5"  placeholder="Program Tags">{{$course->tags}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="requirement">Entry Requirement</label>
                                                    <textarea name="requirement" class="form-control" id="requirement" rows="5"  placeholder="Entry Requirement">{{$course->requirement}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox new-checkbox-text checkbox-primary">
                                                            <input type="checkbox" class="new-control-input" name="status" @if($course->status == 1) checked @endif>
                                                            <span class="new-control-indicator"></span><span class="new-chk-content">Active</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Update Course</button>
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
    <script>
        $(document).ready(function () {
                var SITEURL = '{{ URL::to('') }}';
                let old_state_id = $('#state_old_id').val();
                $.ajax({
                    url: SITEURL + "/admin/getState/" + old_state_id,
                    method: 'GET',
                    success(response) {
                        if (!$.isEmptyObject(response)) {
                            $('.state_id').append('<option selected  value="' + response.id + '">' + response.name + '</option>');
                        }
                    }
                });
        });


        $(document).on('change', '#country', function () {
            var SITEURL = '{{ URL::to('') }}';
            let country = $(this).find(':selected').val();
            country = parseInt(country);
            $('.state_id').html('<option selected value="">Select State</option>');
            $.ajax({
                url: SITEURL + "/admin/getStates/" + country,
                method: 'GET',
                success(response) {

                    if (!$.isEmptyObject(response)) {
                        $.each(response, function (i, value) {
                            $('.state_id').append('<option  value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                }
            });
        });

    </script>
    <script src="{{asset('modern-light-menu/plugins/flatpickr/flatpickr.js')}}"></script>
    <script src="{{asset('modern-light-menu/plugins/flatpickr/custom-flatpickr.js')}}"></script>
@endsection