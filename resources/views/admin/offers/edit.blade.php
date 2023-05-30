@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-title">
        {{-- <h3>Update Offer</h3> --}}
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a href="{{route('package.index')}}"><button class="btn btn-success"><i class="fa-solid fa-eye"></i> View Offer</button></a>
    </div>
</div>


<div class="row layout-top-spacing" id="cancel-row">
                
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                @include('admin.partials._message')

                <form action="{{ route('editOffers') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="info">
                        <div class="row">
                            <div class="col-md-11 mx-auto">
                                <h3>Update Offer</h3>
                                <hr>
                                <div class="work-section">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="degree2">Offer Name</label>
                                                <input type="text" name="offer" class="form-control mb-4" id="degree2" value="{{ $Offers->offer }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree3">Apply Coupon</label>
                                                        <input type="text" name="apply_coupon" class="form-control mb-4" id="degree3" value="{{ $Offers->apply_coupon }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree4">Max Discount</label>
                                                        <input type="number" name="max_discount" class="form-control mb-4" id="degree4" value="{{ $Offers->max_discount }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree4">Min. Booking Amount</label>
                                                        <input type="number" name="min_booking" class="form-control mb-4" id="degree4" value="{{ $Offers->min_booking_amount }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree4">Offer Till</label>
                                                        <div class="form-group mb-0">
                                                            <input type="date" name="offer_till" class="form-control" value="{{ $Offers->offer_till }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Upload Image</label>
                                                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                                <img style="width:50px;" src="{{asset('uploads/images/'.$Offers->image)}}" id="one">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Description</label>
                                                <textarea name="description" class="form-control" id="" cols="30" rows="5">{{ $Offers->description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label">About Offer</label>
                                                <textarea name="about_offer" class="form-control" id="" cols="30" rows="5">{{ $Offers->about_offer }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Avail Offer</label>
                                                <textarea name="avail_offer" class="form-control" id="" cols="30" rows="5">{{ $Offers->avail_offer }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Update Offer</button>
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