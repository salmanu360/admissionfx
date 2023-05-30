@extends('recruiter.master')
@section('content')
<div class="page-header">
    <div class="page-title">
         <!--<h3> College</h3>-->
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a href="{{route('colg.index')}}"><button class="btn btn-success"><i class="fa-solid fa-eye"></i> View College</button></a>
    </div>
</div>


<div class="row layout-top-spacing" id="cancel-row">

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                @include('admin.partials._message')
                <br>
                <form action="{{ route('colg.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="info">
                        <div class="row">
                            <div class="col-md-11 mx-auto">
                                <h3>Add College</h3>
                                <hr>
                                <div class="work-section">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="degree2">University/College Name</label>
                                                <input type="text" name="name" class="form-control mb-4" id="degree2" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="degree3">Country</label>
                                                        <select name="country_id" id="" class="form-control">
                                                            <option value="">Select</option>
                                                            @foreach($countries as $country)
                                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                       
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="degree3">State</label>
                                                        <select name="state_id" id="" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="1">Standard</option>
                                                            <option value="2">Express</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="degree3">City</label>
                                                        <select name="city_id" id="" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="2">Standard</option>
                                                            <option value="3">Express</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree4">Campus(es)</label>
                                                        <input class="form-control" type="text" name="campus">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree4">Intakes</label>
                                                        <input class="form-control" type="date" name="intake">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree4">Level Of Education</label>
                                                        <input class="form-control" type="text" name="level_of_edu">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree4">Application Fee</label>
                                                        <input class="form-control" type="text" name="application_fee">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="degree2">Image</label>
                                                <input type="file" name="photo" required class="form-control mb-4" id="degree2" value="">
                                            </div>
                                        </div>
                                    
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Description</label>
                                                <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                   
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox new-checkbox-text checkbox-primary">
                                                          <input type="checkbox" class="new-control-input" name="is_featured">
                                                          <span class="new-control-indicator"></span><span class="new-chk-content">Mark as featured Property</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox new-checkbox-text checkbox-primary">
                                                          <input type="checkbox" class="new-control-input" name="status">
                                                          <span class="new-control-indicator"></span><span class="new-chk-content">Active</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top:20px">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Add College</button>
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