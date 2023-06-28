<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\MouDetail;
use App\Models\Signature;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SignaturePadController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function upload(Request $request)
    {
        $folderPath = 'uploads/signature/sig';
        
        $image_parts = explode(";base64,", $request->image);
              
        $image_type_aux = explode("image/", $image_parts[0]);
           
        $image_type = $image_type_aux[1];
           
        $image_base64 = base64_decode($image_parts[1]);
        $filename = uniqid() . '.'.$image_type;
         $file = public_path($folderPath . $filename);
       file_put_contents($file, $image_base64);
        Signature::create([
            'image' => $folderPath . $filename
        ]);
        return response()->json('successfully uploaded signature');
    }
    public function uploadFile(Request $request){
        $signature = new Signature();
        if($request->hasFile('mouSignature')){
            $file = $request->file('mouSignature');
            $fileName = 'sig' . uniqid() . '.' . $file->getClientOriginalExtension();
            $signature->image = $request->file('mouSignature')->move('uploads/signature/', $fileName);
            if($signature->image){
                $signature->delete('uploads/signature/', $signature->image);
            }
        }
        $signature->save();
        return response()->json('successfully uploaded signature');
    }
     public function textToPdf()
    {
//        return base_path(). 'public/uploads/recruiter/mou/';
        $dompdf = new Dompdf();

        $row = DB::table('signatures')->orderByDesc('id')->first();
        $recruiter = DB::table('recruiters')->where('user_id', auth()->user()->id)->first();

        $html = view('recruiter.recruiter.mou', compact('recruiter', 'row'))->render();

        $dompdf->loadHtml($html);
        $dompdf->render();

        $pdfContents = $dompdf->output();
        $fileName = str_replace(" ","",auth()->user()->name . uniqid() . '.pdf');

        $filePath = '/public/uploads/recruiter/mou/' . $fileName;
        Storage::put($filePath, $pdfContents);

        $mouDetail = new MouDetail();
        $mouDetail->recruiter_id = auth()->user()->id;
        $mouDetail->reference_id = null;
        $mouDetail->signature_image = null;
        $mouDetail->mou_agreement_file = $fileName;
        $mouDetail->created_by = auth()->user()->id;
        $mouDetail->save();

        return $dompdf->stream($fileName);
    }
}
