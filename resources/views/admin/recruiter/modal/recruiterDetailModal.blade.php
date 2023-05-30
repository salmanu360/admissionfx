@php
        @endphp
<div class="modal-header modal-colored-header bg-info text-white">
    <h5 class="text-white">Recruiter Detail</h5>
</div>
<div class="modal-body custom-modal-body">
    <div class="row mt-2">
        <div class="col-md-6">
            <h5>Basic Information</h5>
            <li>Company Name:&nbsp; {{$recruiter->company_name}} </li>
            <li>Email:&nbsp; {{$recruiter->email}}</li>
            <li>Website:&nbsp; {{$recruiter->website}}</li>
            <li>Facebook Page Name:&nbsp; {{$recruiter->facebook}}</li>
            <li>Instagram Handle:&nbsp; {{$recruiter->instagram}}</li>
            <li>Twitter Handle:&nbsp; {{$recruiter->twitter}}</li>
            <li>LinkedIn URL: &nbsp;{{$recruiter->linkedIn}}</li>
            <li>Main Source of Students: &nbsp;{{$recruiter->student_source}}</li>
            <li>Owner's First Name: &nbsp;{{$recruiter->first_name}}</li>
            <li>Owner's Last Name:&nbsp; {{$recruiter->last_name}}</li>
            <li>Street Address:&nbsp; {{$recruiter->address}}</li>
            <li>City:&nbsp; {{$recruiter->city}}</li>
            <li>State/Province:&nbsp; {{$recruiter->state}}</li>
            <li>Country:&nbsp; {{$recruiter->country}}</li>
            <li>Postal Code:&nbsp; {{$recruiter->postal_zip}}</li>
            <li>Phone:&nbsp; {{$recruiter->phone}}</li>
            <li>Cellphone:&nbsp; {{$recruiter->mobile}}</li>
            <li>Skype ID:&nbsp; {{$recruiter->skype}}</li>
            <li>Whatsapp ID:&nbsp; {{$recruiter->whatsapp}}</li>
            <li>Referred By:&nbsp; {{$recruiter->referred}} </li>
        </div>

        <div class="col-md-6">
            <h5>Recruiting Details</h5>

            <li>Recruiting students From:&nbsp; {{$recruiter->recruiting_from_date}}</li>
            <li>Services:&nbsp; {{$recruiter->services}}</li>
            <li>Schools
                Represented:&nbsp; {{json_decode($recruiter->students_from) }} </li>
            <li>Representing institutions:&nbsp; {{$recruiter->institute}}</li>
            <li>Education associations:&nbsp; {{$recruiter->associations}}</li>
            <li>Recruit from: &nbsp;{{$recruiter->lan_institute}}</li>
            <li>Abroad per year: &nbsp;{{$recruiter->students_per_year}}</li>
            <li>Marketing: &nbsp;

                @php
                    $recruiterMarketings = \App\Models\RecruiterMarketing::where('recruiter_id', $recruiter->id)->get();
                @endphp
                @foreach ($recruiterMarketings as $marketing)
                    <ul>
                        <li>{{$marketing->name}}</li>
                    </ul>
                @endforeach

            </li>

            <li>Service Fee: &nbsp;{{$recruiter->service_fee}}</li>
            <li>Students you will refer:&nbsp; {{$recruiter->refer_student_bureau}}</li>
            <li>Additional Comments:&nbsp; {{$recruiter->comments}}</li>
            <li>Reference Name:&nbsp; {{$recruiter->reference_name}}</li>
            <li>Reference Institution Name:&nbsp; {{$recruiter->reference_institution}}</li>
            <li>Reference Institution Email:&nbsp; {{$recruiter->reference_institution_email}}</li>
            <li>Reference Institution Phone:&nbsp; {{$recruiter->reference_institution_contact}}</li>
            <li>Reference Institution Website:&nbsp; {{$recruiter->reference_institution_website}}</li>
            <li>Recruiter Status:&nbsp; {{isset($recruiter->status) == 1 ? 'Active' : 'Deactive'}}</li>
        </div>

    </div>
</div>
