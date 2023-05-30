@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-title">
        {{-- <h3>Add Offer</h3> --}}
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a href="{{route('insurance.index')}}"><button class="btn btn-success"><i class="fa-solid fa-eye"></i> View All Insurance</button></a>
    </div>
</div>


<div class="row layout-top-spacing" id="cancel-row">
                
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                @include('admin.partials._message')
                <br>
                <form action="{{ route('storeInsurance') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="info">
                        <div class="row">
                            <div class="col-md-11 mx-auto">
                                <h3>Add Insurance</h3>
                                <hr>
                                <div class="work-section">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="degree2">Insurance Name</label>
                                                <input type="text" name="plan_name" class="form-control mb-4" id="degree2" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree2">Coverage</label>
                                                        <input type="number" class="form-control" name="coverage">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Destinations</label>
                                                       <select name="destination" id="" class="form-control">
                                                            <option value="">Select</option>
                                                            @foreach($countries as $country)
                                                            <option value="{{$country->name}}">{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree3">Age Range 1</label>
                                                        <input type="text" class="form-control" value="0.25 - 40" name="age_range1" readOnly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree4">Price 1</label>
                                                        <input type="number" class="form-control" name="price1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree3">Age Range 2</label>
                                                        <input type="text" class="form-control" value="0.41 - 60" name="age_range2" readOnly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree4">Price 2</label>
                                                        <input type="number" class="form-control" name="price2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree4">Age Range 3</label>
                                                        <input type="text" value="0.61 - 70" class="form-control" name="age_range3" readOnly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree4">Price 3</label>
                                                        <div class="form-group mb-0">
                                                            <input type="number" class="form-control" name="price3">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                       

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Add Insurance</button>
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