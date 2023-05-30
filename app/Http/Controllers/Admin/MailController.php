<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\demoMail;


class MailController extends Controller
{
    public function basic_email() 
    {
     
    //   $data = array('name'=>"Virat Gandhi");
      
      $mailData = [
          'title' => 'Mail From University Bureau',
          'body' => 'This is only test mail',
          ];
     Mail::to('mithungupta781@gmail.com')->send(new DemoMail($mailData));
    //  echo "Basic Email Sent. Check your inbox.";
    dd('email send');

   }
}
