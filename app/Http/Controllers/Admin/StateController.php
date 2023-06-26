<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Exception;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class StateController extends Controller
{

    public function index()
    {
        $states = State::with('country')->latest()->get();
        return view('admin.state.index', compact('states'));
    }

    public function getStates($id)
    {
         $country_id = (int) $id;
         return State::where('country_id', $country_id)->get();
    }

    public function create()
    {
        $Country = Country::all();
        return view('admin.state.add', compact('Country'));
    }


    public function store(Request $request)
    {
        $state = new State();
        $state->name = ucfirst($request->name);
        $state->country_id = $request->country_id;
        $state->slug = Str::slug(ucfirst($request->name));
        $state->save();

        Session::flash('success_message', 'State has been successfully added');
        return redirect()->route('states.index');;
    }


    public function show(State $state)
    {
        abort(503);
    }


    public function edit($id)
    {
        $state = State::find($id);
        $Country = Country::all();
        return view('admin.state.edit', compact('state', 'Country'));

    }


    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $state = State::find($id);
        $state->name = ucfirst($name);
        $state->slug = Str::slug(ucfirst($name));
        $state->country_id = $request->country_id;
        if (empty($request->status)) {
            $state->status = 0;
        } else {
            $state->status = 1;
        }
        $state->update();
        Session::flash('success_message', 'State Has Been updated Successfully');
        return redirect()->route('states.index');
    }

    public function destroy($id)
    {

        $state = State::findOrFail($id);
        $state->delete();

        Session::flash('success_message', 'State Has Been deleted Successfully');
        return redirect()->back();

    }
}
