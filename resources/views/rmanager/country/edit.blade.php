@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-title">
         <h3>Country</h3>
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a href="{{route('countries.index')}}"><button class="btn btn-success"><i class="fa-solid fa-eye"></i> View Country</button></a>
    </div>
</div>


<div class="row layout-top-spacing" id="cancel-row">
                
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                @include('admin.partials._message')
                <br>
                <form action="{{route('countries.updateCountry', $myCountry->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="info">
                        <div class="row">
                            <div class="col-md-11 mx-auto">
                                <h3>Edit Country</h3>
                                <hr>
                                <div class="work-section">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="degree2">Country Name</label>
                                                <input type="text" name="name" class="form-control mb-4" id="degree2" value="{{$myCountry->name}}">
                                            </div>
                                        </div>
                                       
                                    
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="n-chk">
                                                    <label class="new-control new-checkbox new-checkbox-text checkbox-primary">
                                                      <input type="checkbox" class="new-control-input" name="status" @if($myCountry->status == 1) checked @endif>
                                                      <span class="new-control-indicator"></span><span class="new-chk-content">Active</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                      

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Update Country</button>
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