@extends('layouts.admin')
@section('content')

<!-- Header -->
@include('admin.partials.header')
<!-- /Header -->

<!-- Sidebar -->
@include('admin.partials.sidebar')
<div class="page-wrapper" style="min-height: 303px;">
			
    <!-- Page Content -->
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Bookings</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Booking</li>
                    </ul>
                </div>
                <!--<div class="col-auto float-right ml-auto">-->
                <!--    <a href="{{route('offers.addOffers')}}" class="btn add-btn"><i class="fa fa-plus"></i> Add Offers</a>-->
                <!--</div>-->
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="datatable table table-striped custom-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
                                <th>GST</th>
                                <th>Travel Date</th>
                                <th>State</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($packages as $offer)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$offer->primary_traveler}}</td>
                                <td>{{$offer->mobile_number}}</td>
                                <td>{{$offer->email}}</td>
                                <td>{{$offer->gst_number}}</td>
                                <td>{{$offer->date_travel}}</td>
                                <td>{{$offer->state}}</td>
                                
                                
                                <td class="text-right">
                                    <!--<a href="{{route('offers.addOffers')}}"><button class="btn btn-success btn-sm"> <i class="fa fa-plus"></i></button></a>-->
                                    <a href="{{route('package.view.booking', $offer->id)}}"><button class="btn btn-info btn-sm"> <i class="fa fa-eye"></i></button></a>
                                    <a class="btn btn-danger btn-sm deleteRecord" style="color: white" href="javascript:void(0);" rel="{{ $offer->id }}" rel1="delete_offers" onclick="deleterecord('{{$offer->id}}','delete_bookings');">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                          
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
    
   
</div>


@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deleterecord(id,deletefunction){
    var SITEURL = '{{ URL::to('') }}';

    var id = id;
    

    var deleteFunction = deletefunction;


    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
        window.location.href = SITEURL + "/admin/" + deleteFunction + "/" + id;
    }
    })
 
    }
    
</script>
@endsection