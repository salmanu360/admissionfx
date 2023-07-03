@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-title">
         <h3>Course Program</h3>
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a href="{{route('program.index')}}"><button class="btn btn-success"><i class="fa-solid fa-eye"></i> View Course Program</button></a>
    </div>
</div>


<div class="row layout-top-spacing" id="cancel-row">
                
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                @include('admin.partials._message')
                <br>
                <form action="{{route('program.update', $program->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="info">
                        <div class="row">
                            <div class="col-md-11 mx-auto">
                                <h3>Update Program</h3>
                                <hr>
                                <div class="work-section">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="degree2">Program Name</label>
                                                <input type="text" name="name" class="form-control mb-4" id="degree2" value="{{$program->name}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Description</label>
                                                <textarea name="description" class="form-control" id="" cols="30" rows="5">{{$program->description}}</textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="n-chk">
                                                    <label class="new-control new-checkbox new-checkbox-text checkbox-primary">
                                                      <input type="checkbox" class="new-control-input" name="status" @if($program->status == 1) checked @endif>
                                                      <span class="new-control-indicator"></span><span class="new-chk-content">Active</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                      

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Update Course Program</button>
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