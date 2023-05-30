@php
    use Illuminate\Support\Facades\File;
@endphp
<div class="modal-header modal-colored-header bg-info text-white">
    <h5 class="text-white">Recruiter Documents</h5>
</div>
<div class="modal-body custom-modal-body">

    <div class="row mt-2">
        <div class="col-md-4 justify-content-center">
            <h5>Company Logo</h5>
        </div>
        @if (File::exists('uploads/recruiter/logo/'.$recruiter->company_logo) & !is_null($recruiter->company_logo))
            <div class="col-md-4 justify-content-center">
                <img src="{{asset('uploads/recruiter/logo/'.$recruiter->company_logo)}} "
                     style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle" alt="LOGO">
            </div>
            <div class="col-md-4 justify-content-center">
                <a href="{{route('recruiter.downloadFile', [$recruiter->company_logo, 'logo'] )}}"
                   class="btn btn-primary">Download</a>
            </div>
        @else
            <div class="col-md-8">
                <h5> Document not uploaded</h5>
            </div>
        @endif

    </div>


        <div class="row mt-2">
            <div class="col-md-4">
                <h5>Business Certificate</h5>
            </div>
            @if (File::exists('uploads/recruiter/certificate/'.$recruiter->business_certificate) & !is_null($recruiter->business_certificate))
            <div class="col-md-4">
                <img src="{{asset('uploads/recruiter/certificate/'.$recruiter->business_certificate)}} "
                     style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                     alt="CERTIFICATE">
            </div>
            <div class="col-md-4">
                <a href="{{route('recruiter.downloadFile', [$recruiter->business_certificate, 'certificate'] )}}"
                   class="btn btn-primary">Download</a>
            </div>
            @else
                <div class="col-md-8">
                    <h5> Document not uploaded</h5>
                </div>
            @endif
        </div>

</div>


