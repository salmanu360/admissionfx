@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('modern-light-menu/plugins/jquery-step/jquery.steps.css')}}">
@endsection
@section('content')
    
<div class="page-header">
    <div class="page-title">
        {{-- <h3>All College</h3> --}}
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a href="{{route('recruiter.edit', $recruiter->id)}}"><button class="btn btn-success"><i class="fa-solid fa-pencil"></i> Edit</button></a>
    </div>
</div>
    
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing p-0">
    <div class="row">
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">
                    <div class="row">
                        <div class="col-md-2">
                            <strong class="card-category">Unique ID</strong>
                            <h5 class="card-title mt-2">{{$recruiter->unique_id}}</h5>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Name</strong>
                            <h5 class="card-title mt-2">{{$recruiter->first_name}} {{$recruiter->middle_name}} {{$recruiter->last_name}}</h5>
                        </div>
                        <div class="col-md-4">
                            <strong class="card-category">Email</strong>
                            <h5 class="card-title mt-2">{{$recruiter->email}}</h5>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Phone</strong>
                            <h5 class="card-title mt-2">{{$recruiter->phone}}, {{$recruiter->mobile}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="col-xl-12 col-lg-6 col-md-6  mb-4">
            <div class="card b-l-card-1 h-100" style="-webkit-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); -moz-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); ">
                <div class="card-body">
                    <h5 class="card-title mt-2" style="color:#e31e24">Basic Information</h5>
                    <div class="row">
                        <div class="col-md-3">
                            <strong class="card-category">Company:</strong>
                            <h6>{{$recruiter->company_name}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Website:</strong> 
                            <h6>{{$recruiter->website}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Facebook Page Name:</strong> 
                            <h6>{{$recruiter->facebook}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Instagram Handle :</strong> 
                            <h6>{{$recruiter->instagram}}</h6>
                        </div>

                        <div class="col-md-3">
                            <strong class="card-category">Twitter Handle:</strong> 
                            <h6>{{$recruiter->twitter}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">LinkedIn URL:</strong> 
                            <h6>{{$recruiter->linkedIn}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Skype ID:</strong> 
                            <h6>{{$recruiter->skype}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Whatsapp ID:</strong>
                            <h6>{{$recruiter->whatsapp}}</h6>
                        </div>
                        
                        
                        <div class="col-md-3">
                            <strong class="card-category">State/Province:</strong> 
                            <h6>{{$recruiter->state}}</h6>
                        </div>
                         <div class="col-md-3">
                            <strong class="card-category">City:</strong> 
                            <h6>{{$recruiter->city}}</h6>
                        </div>
                         <div class="col-md-3">
                            <strong class="card-category">Country:</strong> 
                            <h6>{{$recruiter->country}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Country:</strong> 
                            <h6>{{$recruiter->country}}</h6>
                        </div>
                        
                        <div class="col-md-3">
                            <strong class="card-category">Address:</strong> 
                            <h6>{{$recruiter->address}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Postal Code:</strong> 
                            <h6>{{$recruiter->postal_zip}}</h6>
                        </div>
                        
                        <div class="col-md-3">
                            <strong class="card-category">Referred By:</strong> 
                            <h6>{{$recruiter->referred}}</h6>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-lg-6 col-md-6  mb-4">
            <div class="card b-l-card-1 h-100" style="-webkit-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); -moz-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); ">
                <div class="card-body">
               
                    <h5 style="color:#e31e24">Recruiting Details</h5>
                    <div class="row">
                        <div class="col-md-3">
                            <strong class="card-category">Recruiting students From:</strong>
                            <h6>{{$recruiter->recruiting_from_date}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Services:</strong> 
                            <h6>{{$recruiter->services}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Schools Represented:</strong> 
                            <h6>{{json_decode($recruiter->students_from) }}</h6>
                        </div>
                         <div class="col-md-3">
                            <strong class="card-category">Representing institutions:</strong> 
                            <h6>{{$recruiter->institute}}</h6>
                        </div>
                         <div class="col-md-3">
                            <strong class="card-category">Education associations:</strong> 
                            <h6>{{$recruiter->associations}}</h6>
                        </div>
                         <div class="col-md-3">
                            <strong class="card-category">Recruit from:</strong> 
                            <h6>{{$recruiter->lan_institute}}</h6>
                        </div>
                         <div class="col-md-3">
                            <strong class="card-category">Abroad per year:</strong> 
                            <h6>{{$recruiter->students_per_year}}</h6>
                        </div>
                        
                        <div class="col-md-3">
                            <strong class="card-category">Marketing:</strong> 
                            @php
                                $recruiterMarketings = \App\Models\RecruiterMarketing::where('recruiter_id', $recruiter->id)->get();
                            @endphp
                            @foreach ($recruiterMarketings as $marketing)
                            <h6>{{$marketing->name}}</h6>
                            @endforeach
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Service Fee:</strong> 
                            <h6>{{$recruiter->service_fee}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Students you will refer:</strong> 
                            <h6>{{$recruiter->refer_student_bureau}}</h6>
                        </div>
                        <div class="col-md-6">
                            <strong class="card-category">Additional Comments:</strong> 
                            <h6>{{$recruiter->comments}}</h6>
                        </div>
                        
                    </div>
                    <h5 style="color:#e31e24">Reference Details</h5>
                    <div class="row">
                        
                        <div class="col-md-3">
                            <strong class="card-category">Reference Name:</strong> 
                            <h6>{{$recruiter->reference_name}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Reference Institution Name:</strong> 
                            <h6>{{$recruiter->reference_institution}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Reference Institution Email:</strong> 
                            <h6>{{$recruiter->reference_institution_email}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Reference Institution Phone:</strong> 
                            <h6>{{$recruiter->reference_institution_contact}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Reference Institution Website:</strong> 
                            <h6>{{$recruiter->reference_institution_website}}</h6>
                        </div>
                        <div class="col-md-3">
                            <strong class="card-category">Reference Status:</strong> 
                            <h6>{{isset($recruiter->status) == 1 ? 'Active' : 'Deactive'}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-xl-12 col-lg-6 col-md-6  mb-4">
            <div class="card b-l-card-1 h-100" style="-webkit-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); -moz-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); ">
                <div class="card-body">
               
                    <div class="row">
                       
                        <div class="col-md-3">
                            <strong class="card-category">Company Logo:</strong> <br>
                            @if (File::exists('uploads/recruiter/logo/'.$recruiter->company_logo) & !is_null($recruiter->company_logo))
                                <img src="{{asset('uploads/recruiter/logo/'.$recruiter->company_logo)}}" width="100" alt="">
                                <br>
                                <a href="{{route('recruiter.downloadFile', [$recruiter->company_logo, 'logo'] )}}" download>Download</a>
                                <br>
                                <a target="_blank" href="{{asset('uploads/recruiter/logo/'.$recruiter->company_logo)}}">View</a>
                            @else
                            <h5> Logo not uploaded</h5>
                            @endif
                        </div>
                        
                        <div class="col-md-3">
                            <strong class="card-category">Business Certificate:</strong> <br>
                            @if (File::exists('uploads/recruiter/certificate/'.$recruiter->business_certificate) & !is_null($recruiter->business_certificate))
                                <img src="{{route('recruiter.downloadFile', [$recruiter->business_certificate, 'certificate'] )}}" width="100" alt="">
                                <br>
                                <a href="{{route('recruiter.downloadFile', [$recruiter->business_certificate, 'certificate'] )}}" download>Download</a> 
                                <br>
                                <a target="_blank" href="{{asset('uploads/recruiter/certificate/'.$recruiter->business_certificate)}}">View</a>
                            @else
                            <h5> Business Certificate not uploaded</h5>
                            @endif 
                            
                        </div>
                      

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

