<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;


class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('name', 'ASC')->get();
        return view('admin.program.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.program.add');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validateData = $request->validate([
            'name' => 'required|unique:programs',
        ]);
        $program = new Program();
        $program->name = ucwords(strtolower($data['name']));
        $program->slug =  Str::slug($data['name']);

        if(empty($data['description'])){
            $program->description = "";
        } else{
            $program->description = $data['description'];
        }
        if(empty($data['status'])){
            $program->status = 0;
        } else{
            $program->status = 1;
        }

        $program->save();
        Session::flash('success_message', 'Course Program has been successfully added');
        return redirect()->back();
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('admin.program.edit', compact( 'program'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validateData = $request->validate([
            'name' => 'required|max:255',

        ]);
        $program = Program::findOrFail($id);
        $program->name = ucwords(strtolower($data['name']));
        $program->slug =  Str::slug($data['name']);
        if(empty($data['description'])){
            $program->description = "";
        } else{
            $program->description = $data['description'];
        }
        if(empty($data['status'])){
            $program->status = 0;
        } else{
            $program->status = 1;
        }

        $program->save();
        Session::flash('success_message', 'Course Program has been successfully Updated');
        return redirect()->back();
    }

    public function destroy($id){
        $program = Program::findOrFail($id);
        $program->delete();

        Session::flash('success_message', 'Course Program  Has Been deleted Successfully');
        return redirect()->back();
    }
}