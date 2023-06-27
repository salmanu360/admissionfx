<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MouDetail;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;

class MouController extends Controller
{
    // public function index(){
    //     return  view('recruiter.recruiter.moutest');

    // }
     public function index(){
        $mouDetails = MouDetail::join('users', 'users.id', 'mou_detail.recruiter_id')
        ->join('recruiters', 'recruiters.user_id', 'users.id')
        ->orderby('mou_detail.id','DESC')->get();
        return  view('admin.student.mou', compact('mouDetails'));

    }
    public function textToPdf(){
        $dompdf = new Dompdf();

        $html = view('recruiter.recruiter.moutest')->render();

        $dompdf->loadHtml($html);
        $dompdf->render();
        return $dompdf->stream('uploads/recruiter/mou/mou.pdf');


    }


    public function pdfdownloadfresh($file)
    {
        $mouDetails = MouDetail::where('mou_agreement_file', $file)->first();
        $filePath = Storage::path('/public/uploads/recruiter/mou/' . $mouDetails->mou_agreement_file);
        $headers = ['Content-Type: application/pdf'];
        $fileName = time() . '.pdf';

        return response()->download($filePath, $fileName, $headers);
    }

    public function pdfViewfresh($file)
    {
        $mouDetails = MouDetail::where('mou_agreement_file', $file)->first();
        $filePath = Storage::path('/public/uploads/recruiter/mou/' . $mouDetails->mou_agreement_file);
        $headers = ['Content-Type: application/pdf'];
        $fileName = time() . '.pdf';

        return response()->file($filePath, $headers);
    }

}
