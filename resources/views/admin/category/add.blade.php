@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-title">
        {{-- <h3>Add Offer</h3> --}}
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a href="{{route('category.index')}}"><button class="btn btn-success"><i class="fa-solid fa-eye"></i> View Category</button></a>
    </div>
</div>


<div class="row layout-top-spacing" id="cancel-row">
                
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                @include('admin.partials._message')
                <br>
                <form action="{{ route('storeCategory') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="info">
                        <div class="row">
                            <div class="col-md-11 mx-auto">
                                <h3>Add Categories</h3>
                                <hr>
                                <div class="work-section">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="degree2">Category Name</label>
                                                <input type="text" name="name" class="form-control mb-4" id="degree2" value="{{ old('name') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree3">Under Category</label>
                                                        <select class="select form-control" name="parent_id">
                                                            <option selected disabled>Select Category</option>
                                                            <option value="0">Main Category</option>
                                                          
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Upload Image</label>
                                                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" accept="image/*" onchange="readURL(this);">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Description</label>
                                                <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="n-chk">
                                                    <label class="new-control new-checkbox new-checkbox-text checkbox-primary">
                                                      <input type="checkbox" class="new-control-input" name="status">
                                                      <span class="new-control-indicator"></span><span class="new-chk-content">Active</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                      

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Add Category</button>
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