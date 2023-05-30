@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-title">
        {{-- <h3>Add Offer</h3> --}}
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a href="{{route('package.index')}}"><button class="btn btn-success"><i class="fa-solid fa-eye"></i> View Package</button></a>
    </div>
</div>


<div class="row layout-top-spacing" id="cancel-row">
                
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                @include('admin.partials._message')
                <br>
                <form action="{{ route('storePackage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="info">
                        <div class="row">
                            <div class="col-md-11 mx-auto">
                                <h3>Add Package</h3>
                                <hr>
                                <div class="work-section">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="degree2">Package Name</label>
                                                <input type="text" name="p_name" class="form-control mb-4" id="degree2" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree3">Plan Type</label>
                                                        <select name="plan_type" id="" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="standard">Standard</option>
                                                            <option value="express">Express</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree4">Number Of Days</label>
                                                        <input type="text" name="no_of_days" class="form-control mb-4" id="degree4" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree4">Visa Type</label>
                                                        <select name="visa_type" id="" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="e-visa">E-Visa</option>
                                                            <option value="sticker">Sticker</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree4">Processing Time</label>
                                                        <select name="processing_time" id="" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="2 to 6 Business Days">2 to 6 Business Days</option>
                                                            <option value="2 to 7 Business Days">2 to 7 Business Days</option>
                                                            <option value="3 to 5 Business Days">3 to 5 Business Days</option>
                                                            <option value="2 to 3 Business Days">2 to 3 Business Days</option>
                                                            <option value="5 to 6 Business Days">5 to 6 Business Days</option>
                                                            <option value="4 to 6 Business Days">4 to 6 Business Days</option>
                                                            <option value="20 to 25 Business Days">20 to 25 Business Days</option>
                                                            <option value="10 to 14 Business Days">10 to 14 Business Days</option>
                                                            <option value="45 to 70 Business Days">45 to 70 Business Days</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree4">Stay</label>
                                                        <input class="form-control" type="text" name="stay">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree4">Validity</label>
                                                        <input class="form-control" type="text" name="validity">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree4">Country To</label>
                                                        <select name="country_to" id="" class="form-control">
                                                            <option value="">Select</option>
                                                            @foreach($countries as $country)
                                                            <option value="{{$country->slug.','.$country->name}}">{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree">Insurance</label>
                                                        <select name="insurance" id="" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="With Covid Insurance">With Covid Insurance</option>
                                                            <option value="insurance">With Insurance</option>
                                                            <option value="">No Insurance</option>
                                                        </select>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="degree4">Category</label>
                                                        <select name="category_id" id="" class="form-control">
                                                            @php echo $categories_dropdown;  @endphp
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="degree4">Entry Type</label>
                                                        <select name="entry_type" id="" class="form-control">
                                                            <option value="single entry">Single Entry</option>
                                                            <option value="multiple entry">Multiple Entry</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="degree4">Price</label>
                                                        <input type="text" name="price" class="form-control">
                                                    </div>
                                                </div>
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
                                                <button type="submit" class="btn btn-primary">Add Package</button>
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