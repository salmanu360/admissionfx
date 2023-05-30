@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-title">
         <h3>State</h3>
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a href="{{route('states.index')}}"><button class="btn btn-success"><i class="fa-solid fa-eye"></i> View States</button></a>
    </div>
</div>


<div class="row layout-top-spacing" id="cancel-row">
                
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                @include('admin.partials._message')
                <br>
                <form action="{{route('states.update', $state->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="info">
                        <div class="row">
                            <div class="col-md-11 mx-auto">
                                <h3>Add Country</h3>
                                <hr>
                                <div class="work-section">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="degree2">State Name</label>
                                                <input type="text" name="name" class="form-control mb-4" id="degree2" value="{{$state->name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="degree2">Country Name</label>
                                                <select  name="country_id" class="form-select form-control digits" id="exampleFormControlSelect9">
                                                    <option value="">Select Country</option>
                                                    @foreach($Country as $country)
                                                        <option @if($country->id == $state->country_id ) selected @endif value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="n-chk">
                                                    <label class="new-control new-checkbox new-checkbox-text checkbox-primary">
                                                      <input type="checkbox" class="new-control-input" name="status" @if($state->status == 1) checked @endif>
                                                      <span class="new-control-indicator"></span><span class="new-chk-content">Active</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                      

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Update State</button>
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