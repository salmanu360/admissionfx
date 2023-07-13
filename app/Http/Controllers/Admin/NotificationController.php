<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NotificationController extends Controller
{

    public function index()
    {
//        $notifications = Notification::latest()->get();
//        return view('admin.notification.index', compact('notifications'));
    }

    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        Session::flash('success_message', 'Notification Has Been deleted Successfully');
        return redirect()->back();
    }

    public function updateStatus($id)
    {
        Notification::where('id', $id)->update(['read_at'=> Carbon::now()]);
        return redirect()->back();
    }

}
