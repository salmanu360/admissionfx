<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recruiter;
use App\Models\RecruiterPassword;
use App\Models\User;
use App\Models\Role;
use App\Models\Student;
use App\Models\StudentPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.user.index', compact('users'));
    }
    
    public function application()
    {
        $users = User::where('role','application')->latest()->get();
        return view('admin.user.application', compact('users'));
    }
    public function rm()
    {
        $users = User::where('role','rm')->latest()->get();
        return view('admin.user.rm', compact('users'));
    }
    public function create(){
        $roles = Role::all();
        return view('admin.user.add', compact('roles'));
    } 
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required',
            'role'=>'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->save();
        
        if($user->role == 'student'){
            $student = new Student();
            $student->first_name = $request->name;
            $student->email = $request->email;
            $student->user_id = $user->id;
            $student->created_by = Auth()->user()->id;
            $student->created_by_name = Auth()->user()->name;
            $student->password = Hash::make($request->password);
            $student->save();

            $stdPass = new StudentPassword();
                $stdPass->student_password = $request->password;
                $stdPass->user_id = $user->id;
                $stdPass->save();
        }
        if($user->role == 'recruiter'){
            $recruiter = new Recruiter();
            $recruiter->company_name = $request->name;
            $recruiter->email = $request->email;
            $recruiter->user_id = $user->id;
            $recruiter->created_by = Auth()->user()->id;
            $recruiter->created_by_name = Auth()->user()->name;
            $recruiter->password = Hash::make($request->password);
            $recruiter->save();

            $recPass = new RecruiterPassword();
                $recPass->recruiter_password = $request->password;
                $recPass->user_id = $user->id;
                $recPass->save();
        }
        Session::flash('success_message', 'User added Successfully');
        return redirect()->back();
    }
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->back();
    }
    public function edit($id){
        $roles = Role::all();
        $users = User::find($id);
        return view('admin.user.edit', compact('users', 'roles'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'role'=>'required',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
       if($request->newPassword != ""){
        $user->password = $request->newPassword;
       }
        $user->role = $request->role;
        $user->update();
        
        if($user->role == 'student'){
            Student::where('user_id', $id)->update([
                'first_name' => $request->name,
                'email' => $request->email,
            ]);
        }
        if($user->role == 'recruiter'){
            Recruiter::where('user_id', $id)->update([
                'company_name' => $request->name,
                'email' => $request->email,
            ]);
        }

        if($user->role == 'student' && $request->newPassword  != ""){
            StudentPassword::where('user_id',$id)->update([
                'student_password' => $request->newPassword,
            ]);
        }

        if($user->role == 'recruiter' && $request->newPassword != ""){
            RecruiterPassword::where('user_id',$id)->update([
                'recruiter_password' => $request->newPassword,
            ]);
        }

Session::flash('success_message', 'User updated Successfully');
        return redirect()->route('user.index');
    }
}