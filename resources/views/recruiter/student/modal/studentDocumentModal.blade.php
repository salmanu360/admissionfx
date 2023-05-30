@php
    use Illuminate\Support\Facades\File;
@endphp
<div class="modal-header modal-colored-header bg-info text-white">
    <h5 class="text-white">Student Documents</h5>
</div>
<div class="modal-body custom-modal-body">

    @if (File::exists('uploads/student/passport/'.$student->passport) & !is_null($student->passport))
        <div class="row mt-2">
            <div class="col-md-4">
                <h5>Passport</h5>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/student/passport/' . $student->passport)}} "
                     style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle" alt="Passport">
            </div>
            <div class="col-md-4">
                <a href="{{route('std.downloadFile', [$student->passport, 'passport'] )}}" class="btn btn-primary">Download</a>
            </div>
        </div>
    @endif

    @if (File::exists('uploads/student/ielts/'.$student->ielts) & !is_null($student->ielts))
        <div class="row mt-2">
            <div class="col-md-4">
                <h5>IELTS</h5>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/student/ielts/' . $student->ielts)}} "
                     style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle" alt="IELTS">
            </div>
            <div class="col-md-4">
                <a href="{{route('std.downloadFile', [$student->ielts, 'ielts'] )}}" class="btn btn-primary">Download</a>
            </div>
        </div>
    @endif

    @if (File::exists('uploads/student/grade_10/'.$student->grade_10) & !is_null($student->grade_10))
        <div class="row mt-2">
            <div class="col-md-4">
                <h5>Grade 10 certificate</h5>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/student/grade_10/' . $student->grade_10)}} "
                     style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                     alt="Grade 10 Certificate">
            </div>
            <div class="col-md-4">
                <a href="{{route('std.downloadFile', [$student->grade_10, 'grade_10'] )}}" class="btn btn-primary">Download</a>
            </div>
        </div>
    @endif

    @if (File::exists('uploads/student/grade_12/'.$student->grade_12) & !is_null($student->grade_12))
        <div class="row mt-2">
            <div class="col-md-4">
                <h5>Grade 12 Certificate</h5>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/student/grade_12/' . $student->grade_12)}} "
                     style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                     alt="Grade 12 Certificate">
            </div>
            <div class="col-md-4">
                <a href="{{route('std.downloadFile', [$student->grade_12, 'grade_12'] )}}" class="btn btn-primary">Download</a>
            </div>
        </div>
    @endif

    @if (File::exists('uploads/student/bachelor_mark_sheet/'.$student->bachelor_mark_sheet) & !is_null($student->bachelor_mark_sheet))
        <div class="row mt-2">
            <div class="col-md-4">
                <h5>Bachelor marks sheet</h5>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/student/bachelor_mark_sheet/' . $student->bachelor_mark_sheet)}} "
                     style="height: 70px;width: 70px;border-radius:50% !important;"
                     class="img-circle" alt="Bachelor marksheet">
            </div>
            <div class="col-md-4">
                <a href="{{route('std.downloadFile', [$student->bachelor_mark_sheet, 'bachelor_mark_sheet'] )}}" class="btn btn-primary">Download</a>
            </div>
        </div>
    @endif
    @if (File::exists('uploads/student/bachelor_certificate/'.$student->bachelor_certificate) & !is_null($student->bachelor_certificate))
        <div class="row mt-2">
            <div class="col-md-4">
                <h5>Bachelor certificate</h5>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/student/bachelor_certificate/' . $student->bachelor_certificate)}} "
                     style="height: 70px;width: 70px;border-radius:50% !important;"
                     class="img-circle" alt="Bachelor certificate">
            </div>
            <div class="col-md-4">
                <a href="{{route('std.downloadFile', [$student->bachelor_certificate, 'bachelor_certificate'] )}}" class="btn btn-primary">Download</a>
            </div>
        </div>
    @endif
    @if (File::exists('uploads/student/master_mark_sheet/'.$student->master_mark_sheet) & !is_null($student->master_mark_sheet))
        <div class="row mt-2">
            <div class="col-md-4">
                <h5>Master marks sheet</h5>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/student/master_mark_sheet/' . $student->master_mark_sheet)}} "
                     style="height: 70px;width: 70px;border-radius:50% !important;"
                     class="img-circle" alt="Master marksheet">
            </div>
            <div class="col-md-4">
                <a href="{{route('student.downloadFile', [$student->master_mark_sheet, 'master_mark_sheet'] )}}" class="btn btn-primary">Download</a>
            </div>
        </div>
    @endif
    @if (File::exists('uploads/student/master_certificate/'.$student->master_certificate) & !is_null($student->master_certificate))
        <div class="row mt-2">
            <div class="col-md-4">
                <h5>Master certificate</h5>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/student/master_certificate/' . $student->master_certificate)}} "
                     style="height: 70px;width: 70px;border-radius:50% !important;"
                     class="img-circle" alt="Master certificate">
            </div>
            <div class="col-md-4">
                <a href="{{route('std.downloadFile', [$student->master_certificate, 'master_certificate'] )}}" class="btn btn-primary">Download</a>
            </div>
        </div>
    @endif
    @if (File::exists('uploads/student/lors/'.$student->lors) & !is_null($student->lors))
        <div class="row mt-2">
            <div class="col-md-4">
                <h5>LORS</h5>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/student/lors/' . $student->lors)}} "
                     style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                     alt="lors">
            </div>
            <div class="col-md-4">
                <a href="{{route('std.downloadFile', [$student->lors, 'lors'] )}}" class="btn btn-primary">Download</a>
            </div>
        </div>
    @endif
    @if (File::exists('uploads/student/resume/'.$student->resume) & !is_null($student->resume))
        <div class="row mt-2">
            <div class="col-md-4">
                <h5 class="mt-5">Resume</h5>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/student/resume/' . $student->resume)}} "
                     style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                     alt="resume">
            </div>
            <div class="col-md-4">
                <a href="{{route('std.downloadFile', [$student->resume, 'resume'] )}}" class="btn btn-primary">Download</a>
            </div>
        </div>
    @endif
    @if (File::exists('uploads/student/work_experience/'.$student->work_experience) & !is_null($student->work_experience))
        <div class="row mt-2">
            <div class="col-md-4">
                <h5>Work experience</h5>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/student/work_experience/' . $student->work_experience)}} "
                     style="height: 70px;width: 70px;border-radius:50% !important;"
                     class="img-circle" alt="work experience">
            </div>
            <div class="col-md-4">
                <a href="{{route('std.downloadFile', [$student->work_experience, 'work_experience'] )}}"
                   class="btn btn-primary">Download</a>
            </div>
        </div>
    @endif



    @if (File::exists('uploads/student/moi/'.$student->moi) & !is_null($student->moi))
        <div class="row mt-2">
            <div class="col-md-4">
                <h5>MOI</h5>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/student/moi/' . $student->moi)}} "
                     style="height: 70px;width: 70px;border-radius:50% !important;" class="img-circle"
                     alt="moi">
            </div>
            <div class="col-md-4">
                <a href="{{route('std.downloadFile', [$student->moi, 'moi'] )}}"
                   class="btn btn-primary">Download</a>
            </div>
        </div>
    @endif



    @if (File::exists('uploads/student/personal_statement/'.$student->personal_statement) & !is_null($student->personal_statement))
        <div class="row mt-2">
            <div class="col-md-4">
                <h5>Personal statement</h5>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/student/personal_statement/' . $student->personal_statement)}} "
                     style="height: 70px;width: 70px;border-radius:50% !important;"
                     class="img-circle" alt="personal statement">
            </div>
            <div class="col-md-4">
                <a href="{{route('std.downloadFile', [$student->personal_statement, 'personal_statement'] )}}"
                   class="btn btn-primary">Download</a>
            </div>
        </div>
    @endif

    @if (File::exists('uploads/student/diploma_mark_sheet/'.$student->diploma_mark_sheet) & !is_null($student->diploma_mark_sheet))
        <div class="row mt-2">
            <div class="col-md-4">
                <h5>Diploma marksheet</h5>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/student/diploma_mark_sheet/' . $student->diploma_mark_sheet)}} "
                     style="height: 70px;width: 70px;border-radius:50% !important;"
                     class="img-circle" alt="diploma marksheet">
            </div>
            <div class="col-md-4">
                <a href="{{route('std.downloadFile', [$student->diploma_mark_sheet, 'diploma_mark_sheet'] )}}"
                   class="btn btn-primary">Download</a>
            </div>
        </div>
    @endif
    @if (File::exists('uploads/student/diploma_certificate/'.$student->diploma_certificate) & !is_null($student->diploma_certificate))
        <div class="row mt-2">
            <div class="col-md-4">
                <h5>Diploma certificate</h5>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/student/diploma_certificate/' . $student->diploma_certificate)}} "
                     style="height: 70px;width: 70px;border-radius:50% !important;"
                     class="img-circle" alt="diploma certificate">
            </div>
            <div class="col-md-4">
                <a href="{{route('std.downloadFile', [$student->diploma_certificate, 'diploma_certificate'] )}}"
                   class="btn btn-primary">Download</a>
            </div>
        </div>
    @endif


    @if (File::exists('uploads/student/other_certificate/'.$student->other_certificate) & !is_null($student->other_certificate))
        <div class="row mt-2">
            <div class="col-md-4">
                <h5>Other certificate</h5>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/student/other_certificate/' . $student->other_certificate)}} "
                     style="height: 70px;width: 70px;border-radius:50% !important;"
                     class="img-circle" alt="Other certificate">
            </div>
            <div class="col-md-4">
                <a href="{{route('std.downloadFile', [$student->other_certificate, 'other_certificate'] )}}"
                   class="btn btn-primary">Download</a>
            </div>
        </div>
    @endif
</div>
