<?php

namespace App\Http\Controllers\RM;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Mail;
use App\Mail\demoMail;
class ReportController extends Controller
{
    
     public function basic_email1() {
     
      $data = array('name'=>"Virat Gandhi");
   
      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('salman.u360@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('mithungupta781@gmail.com','Virat Gandhi');
      });
      echo "Basic Email Sent. Check your inbox.";
   }
   
   public function basic_email() 
    {
     
    //   $data = array('name'=>"Virat Gandhi");
      
      $mailData = [
          'title' => 'Mail From University Bureau',
          'body' => 'This is only test mail',
          ];
     Mail::to('salman.u360@gmail.com')->send(new DemoMail($mailData));
    //  echo "Basic Email Sent. Check your inbox.";
    dd('email send');

   }
   
   public function index(Request $request){
        $from = $request->fromDate ?? "";
        $to = $request->toDate ?? "";
        if($from != "" && $to != "")
        {
            $studentLists = student::whereDate('created_at', '>=', $from)
            ->whereDate('created_at', '<=', $to)
            ->get();
        }
        else
        {
            $studentLists = Student::latest()->get();
        } 
        // return view('admin.report.index', compact('studentLists'));
         return view('rmanager.report.index_report', compact('studentLists'));
    }
   

}
