@extends('layouts.admin')
@section('content')

<!-- Header -->
@include('admin.partials.header')
<!-- /Header -->

<!-- Sidebar -->
@include('admin.partials.sidebar')
<!--<link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">-->
<link href="{{asset('front/css/style.css')}}" rel="stylesheet">
<!--<link href="{{asset('css/style.css')}}" rel="stylesheet">-->
<!--<link href="{{asset('front/css/responsive.css')}}" rel="stylesheet">-->

<div class="page-wrapper" style="min-height: 303px;
    left: 0;
    margin-left: 230px;
    padding-top: 60px;
    position: relative;
    transition: all 0.2s ease-in-out;
">
			
    <!-- Page Content -->
    <div class="content container-fluid" style="padding-right: 254px;
    width: 100%;">
        
        <div class="row">
            <div class="col-md-12">

				<div class="col-md-12">
					<h5>Visa Plan Details</h5>
				</div>

				<div class="row review-box">
					<div class="col-md-3">
						<p><b>Visa Type</b></p>
						
						<p>{{$checkout->package->p_name}}</p>
					</div>
					<div class="col-md-3">
						<p><b>Stay Period</b></p>
						<p>{{$checkout->package->no_of_days}}</p>
					</div>
					<div class="col-md-3">
						<p><b>Entry Type</b></p>
						<p>{{$checkout->package->entry_type}}</p>
					</div>
					<div class="col-md-3">
						<p><b>Validity</b></p>
						<p>{{$checkout->package->validity}}</p>
					</div>
					<div class="col-md-3">
						<p><b>Process</b></p>
						<p>{{$checkout->package->plan_type}}</p>
					</div>
					<div class="col-md-3">
						<p><b>Processing Time</b></p>
						<p>{{$checkout->package->processing_time}}</p>
					</div>
				</div>
            
				
				<div class="col-md-12">
					<h5>Basic Details</h5>
				</div>

				<div class="row review-box">
					<div class="col-md-3">
						<p><b>Date of Travel</b></p>
						<p>{{$checkout->date_travel}}</p>
					</div>
					<div class="col-md-3">
						<p><b>Primary Traveler</b></p>
						<p>{{$checkout->primary_traveler}}</p>
					</div>
					<div class="col-md-3">
						<p><b>Mobile Number</b></p>
						<p>{{$checkout->mobile_number}}</p>
					</div>
					<div class="col-md-3">
						<p><b>Email ID</b></p>
						<p>{{$checkout->email}}</p>
					</div>
					<div class="col-md-3">
						<p><b>I Reside In</b></p>
						<p>{{$checkout->state}}</p>
					</div>
				</div>

				<div class="col-md-12">
					<h5>Traveler Details</h5>
				</div>
                @foreach($travelers as $traveler)
				<div class="row review-box">
				    @if($traveler->is_primary == 1)
				    <span class="badge bg-warning text-dark">Primary</span>
				    @endif
				    
					<div class="col-md-3 mt-3">
						<p><b>Traveler Name</b></p>
						<p>{{$traveler->first_name}} {{$traveler->last_name}}</p>
					</div>
					<div class="col-md-3 mt-3">
						<p><b>Date of Birth</b></p>
						<p>{{$traveler->dob}}</p>
					</div>
					<div class="col-md-3 mt-3">
						<p><b>Mobile</b></p>
						<p>{{$traveler->mobile_num}}</p>
					</div>
					<div class="col-md-3 mt-3">
						<p><b>Email</b></p>
						<p>{{$traveler->email}}</p>
					</div>
					<div class="col-md-3">
						<p><b>Passport No.</b></p>
						<p>{{$traveler->passport_num}}</p>
					</div>
					<div class="col-md-3">
						<p><b>Passport Expiry</b></p>
						<p>{{$traveler->passport_expiry}}</p>
					</div>
					<div class="col-md-3">
						<p><b>Occupation</b></p>
						<p>{{$traveler->occupation}}</p>
					</div>
					<div class="col-md-3">
						<p><b>Designation</b></p>
						<p>{{$traveler->designation}}</p>
					</div>
				</div>
				@endforeach

				<div class="col-md-12">
					<h5>Payment Details</h5>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="col-md-12 p-3">
							<div class="row review-box">
								<div class="col-md-12">
									<p><b>Total Pax : <span>1</span></b></p>
								</div>
								<div class="row">
								    <?php $price =  intval(preg_replace('/[^\d.]/', '', $checkout->price)); ?>
									<div class="col-md-4"><p>Adult</p></div>
									<div class="col-md-4"><p>{{$traveler_count}} Pax * {{$price}} INR</p></div>
									<div class="col-md-4"><p><b>{{$price * $traveler_count}} INR</b></p></div>
								</div>	
								<!--<div class="row">-->
								<!--	<div class="col-md-4"><p>Child</p></div>-->
								<!--	<div class="col-md-4"><p>1 Pax * 3,400 INR</p></div>-->
								<!--	<div class="col-md-4"><p><b>3,400 INR</b></p></div>-->
								<!--</div>	-->
							</div>
							<div class="row review-box">
								<div class="col-md-12">
									<p><b>Taxes</b></p>
								</div>
								<div class="row">
									<div class="col-md-6">
										<p>SGST</p>
									</div>
									<div class="col-md-6">
										<p><b>0 INR</b></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<p>CGST</p>
									</div>
									<div class="col-md-6">
										<p><b>0 INR</b></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<p>IGST</p>
									</div>
									<div class="col-md-6">
										<p><b>671.18 INR</b></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="col-md-12 p-3">
							<div class="row review-box">
								<div class="col-md-12">
									<p><b>Payment Summary</b></p>
								</div>
								<div class="row">
									<div class="col-md-6">
										<p>Visa Cost</p>
									</div>
									<div class="col-md-6">
										<p><b>{{$price}} INR</b></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<p>Total Taxes</p>
									</div>
									<div class="col-md-6">
										<p><b>0 INR</b></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<p>Total Discount</p>
									</div>
									<div class="col-md-6">
										<p><b>0 INR</b></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<p><b>Total Amount</b></p>
									</div>
									<div class="col-md-6">
										<p><b>{{$price * $traveler_count}} INR</b></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					
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