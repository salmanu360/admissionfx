<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class OffersController extends Controller
{
    public function offers(){
        $offers = Offers::get();
        return view('admin.offers.index',compact('offers'));
    }
    public function addOffers(){
        return view('admin.offers.add');
    }
    public function storeOffers(Request $request){
         $image = request()->file('image');
    $imageName = time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('images'), $imageName);
        $encodedOffer = utf8_encode($request->offer);
        $encodedDesc = utf8_encode($request->description);
        $encodedApplyCoupon = utf8_encode($request->apply_coupon);
        $encodedAboutOffer = utf8_encode($request->about_offer);
        $encodedAvailOffer = utf8_encode($request->avail_offer);
        
        
        $add = Offers::insert([
            'offer' => $encodedOffer,
            'img' => $imageName,
            'description' => $encodedDesc,
            'offer_till' => $request->offer_till,
            'apply_coupon' => $encodedApplyCoupon,
            'max_discount' => $request->max_discount,
            'min_booking_amount' => $request->min_booking,
            'about_offer' => $encodedAboutOffer,
            'avail_offer' => $encodedAvailOffer,
            ]);
            if($add){
                return redirect()->route('offers.index');
            }
            else{
                echo 'error';
            }
    }
    public function updateOffers($id){
        $Offers = Offers::find($id);
        return view('admin.offers.edit',compact('Offers'));
    }
    public function editOffers(Request $request){
        if(request()->file('image') == null){
        $id = $request->id;
        $encodedOffer = utf8_encode($request->offer);
        $encodedDesc = utf8_encode($request->description);
        $encodedApplyCoupon = utf8_encode($request->apply_coupon);
        $encodedAboutOffer = utf8_encode($request->about_offer);
        $encodedAvailOffer = utf8_encode($request->avail_offer);
        
        
        $add = Offers::where('id',$id)->update([
            'offer' => $encodedOffer,
            'description' => $encodedDesc,
            'offer_till' => $request->offer_till,
            'apply_coupon' => $encodedApplyCoupon,
            'max_discount' => $request->max_discount,
            'min_booking_amount' => $request->min_booking,
            'about_offer' => $encodedAboutOffer,
            'avail_offer' => $encodedAvailOffer,
            ]);
        } else {
            $image = request()->file('image');
    $imageName = time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('images'), $imageName);
            $id = $request->id;
        $encodedOffer = utf8_encode($request->offer);
        $encodedDesc = utf8_encode($request->description);
        $encodedApplyCoupon = utf8_encode($request->apply_coupon);
        $encodedAboutOffer = utf8_encode($request->about_offer);
        $encodedAvailOffer = utf8_encode($request->avail_offer);
        
        
        $add = Offers::where('id',$id)->update([
            'offer' => $encodedOffer,
            'description' => $encodedDesc,
            'offer_till' => $request->offer_till,
            'apply_coupon' => $encodedApplyCoupon,
            'max_discount' => $request->max_discount,
            'min_booking_amount' => $request->min_booking,
            'about_offer' => $encodedAboutOffer,
            'avail_offer' => $encodedAvailOffer,
            ]);
        }
            if($add){
                return redirect()->route('offers.index');
            }
            else{
                echo 'error';
            }
    }
    public function deleteOffers($id){
        $Offers = Offers::find($id);
        $del = $Offers->delete();
        if($del){
            return redirect()->route('offers.index');
        } else {
            return redirect()->route('offers.addOffers');
        }
        
    }
}
