<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\Checkout;
use App\Models\Package;
use App\Models\Insurances;
use App\Models\Insurance_Travelers;
use App\Models\Insurance_Checkout;
use App\Models\Travelers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;


class BookingController extends Controller
{
  public function package_booking()
    {
        $packages = Checkout::with('package','users','travelers')->get();
        // dd($categories);
        return view('admin.booking.index',compact('packages'));
    }
    public function viewpackage_booking($id)
    {
        $checkout = Checkout::with('package','users','travelers')->where('id', $id)->first();
        $travelers = Travelers::where('checkout_id',$id)->get();
        $traveler_count= count($travelers);
        $adult = Travelers::where('checkout_id',$id)->where('age','>=',18)->get();
        $adultcount = count($adult);
        $child = Travelers::where('checkout_id',$id)->where('age','<',18)->get();
        $childcount = count($child);
        return view('admin.booking.checkout_view',compact('childcount','adultcount','travelers','checkout','traveler_count'));
    }
    
    //delete packages
    public function delete_bookings($id)
    {
        $package = Checkout::findOrFail($id);
        $package->delete();
        
        Session::flash('success_message', 'Booking Has Been deleted Successfully');
        return redirect()->back();
    }
    public function insurance_booking()
    {
        $packages = Insurance_Checkout::with('insurances','users')->get();
        // dd($categories);
        return view('admin.booking.insurance',compact('packages'));
    }
    public function viewinsurance_booking($id)
    {
        $checkout = Insurance_Checkout::with('insurances','users')->where('id', $id)->first();
        $travelers = Insurance_Travelers::where('checkout_id',$id)->get();
        $traveler_count= count($travelers);
        $adult = Insurance_Travelers::where('checkout_id',$id)->where('age','>=',18)->get();
        $adultcount = count($adult);
        $child = Insurance_Travelers::where('checkout_id',$id)->where('age','<',18)->get();
        $childcount = count($child);
        
        return view('admin.booking.insurancecheckout_view',compact('childcount','adultcount','travelers','checkout','traveler_count'));
    }
    
    //delete packages
    public function delete_insurance_booking($id)
    {
        $package = Insurance_Checkout::findOrFail($id);
        $package->delete();
        
        Session::flash('success_message', 'Booking Has Been deleted Successfully');
        return redirect()->back();
    }
    
}
