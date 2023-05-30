@extends('recruiter.master')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('modern-light-menu/plugins/jquery-step/jquery.steps.css')}}">
@endsection
@section('content')
    

    
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">

                        <div class="skills layout-spacing ">
                            <div class="widget-content widget-content-area">
                                <h3 class="">View Student</h3>
                               <div class="row mt-2">
                                <div class="col-md-6">
                        			<h5>Basic Information</h5>
                        			<li>First Name:&nbsp;  {{$student->first_name}} </li>
                        			<li>Middle Name:&nbsp;   {{$student->middle_name}}</li>
                        			<li>Last Name:&nbsp;   {{$student->last_name}}</li>
                        			<li>Gender:&nbsp; {{$student->gender}}</li>
                        			<li>DOB:&nbsp; {{$student->birth_date}}</li>
                        			<li>Marital:&nbsp; {{$student->marital_status}}</li>
                        			<li>Contact: &nbsp;{{$student->contact_no}}</li>
                        			<li>Email: &nbsp;{{$student->email}}</li>
                        			<li>Passport: &nbsp;{{$student->passport_number}}</li>
                        			<li>Passport Expiry:&nbsp; {{$student->passport_expiry_date}}</li>
                        			<li>city:&nbsp; {{$student->city}}</li>
                        			<li>state:&nbsp; {{$student->state}}</li>
                        			<li>country:&nbsp; {{$student->country}}</li>
                        			<li>postal_zip:&nbsp; {{$student->postal_zip}}</li>
                        			<li>address:&nbsp; {{$student->address}}</li>
                        			<li>Guardian Name:&nbsp; {{$student->emergency_contact_name}}</li>
                        			<li>Relation:&nbsp; {{$student->emergency_contact_relation}}</li>
                        			<li>Guardian Email:&nbsp; {{$student->emergency_contact_email}}</li>
                        			<li>Guardian Phone:&nbsp; {{$student->emergency_contact_phone}}</li>
                        		</div>
                        		
                        			<div class="col-md-6">
                        			    <h5>Educational Information</h5>
                            			<li>Country Education:&nbsp;  {{$student->country_edu}} </li>
                            			<li>Highest  degree:&nbsp;   {{$student->high_level_edu}}</li>
                            			<li>Grading scheme:&nbsp;   {{$student->grading_scheme}}</li>
                            			<li>Country institute:&nbsp; {{$student->country_institute}}</li>
                            			<li>Institute name:&nbsp; {{$student->institute_name}}</li>
                            			<li>Education Level:&nbsp; {{$student->level_education}}</li>
                            			<li>Institute Language: &nbsp;{{$student->lan_institute}}</li>
                            			<li>Program From: &nbsp;{{$student->institute_from}}</li>
                            			<li>Program To: &nbsp;{{$student->institute_to}}</li>
                            			<li>Degree name: &nbsp;{{$student->degree_name}}</li>
                            			<li>Graduation date:&nbsp; {{$student->graduation_date}}</li>
                            			<li>Confirmation:&nbsp; {{$student->institute_confirmation}}</li>
                            			<li>Certificate:&nbsp; {{$student->physical_certificate}}</li>
                            			<li>Visa refusal:&nbsp; {{$student->visa_country_refusal_detail}}</li>
                            			<li>Student Status:&nbsp; {{isset($student->status) == 1 ? 'Active' : 'Deactive'}}</li>
                        		</div>
                        	</div>

                            </div>
                        </div>

                    </div>


@endsection

