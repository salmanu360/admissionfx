<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function profile()
    {
        return view('profile');
    }
   public function story()
    {
        return view ('frontend.story');
    }

    public function about()
    {
        return view ('frontend.about');
    }

    public function career()
    {
        return view ('frontend.career');
    }

    public function faq()
    {
        return view ('frontend.faq');
    }
    public function contact()
    {
        return view ('frontend.contact');
    }

    public function students()
    {
        return view ('frontend.students');
    }
    
     public function recruiters()
    {
        return view ('frontend.recruiters');
    }
     public function institutions()
    {
        return view ('frontend.institutions');
    }
    
    
    public function terms()
    {
        return view ('frontend.terms-and-conditions');
    }
    public function refund()
    {
        return view ('frontend.refund-policy');
    }
    public function policy()
    {
        return view ('frontend.privacy-and-cookies-policy');
    }
    
        //:::::::::::::::::::::countries universitie:::::::::::::::::://

    public function studyAbroad(){
        return view('frontend.university-countries.index');
    }
    public function studyAUS(){
        return view('frontend.university-countries.aus');
    }
    public function studyCAN(){
        return view('frontend.university-countries.canada');
    }
    public function studyEurope(){
        return view('frontend.university-countries.eur');
    }
    public function studyNZ(){
        return view('frontend.university-countries.nz');
    }
    public function studyUK(){
        return view('frontend.university-countries.uk');
    }
    public function studyUSA(){
        return view('frontend.university-countries.usa');
    }
    //:::::::::::::::::::::countries universitie:::::::::::::::::://
    
}
