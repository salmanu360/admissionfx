@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('modern-light-menu/plugins/jquery-step/jquery.steps.css')}}">
@endsection
@section('content')
    
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">

    <div class="skills layout-spacing ">
        <div class="widget-content widget-content-area">
            
            <td><img src="{{asset($college->image)}}" style="width:300px" alt=""></td>
            <br>
            <h2 class="" style="color:#e31e24; margin-top:20px; margin-bottom:20px;">College: {{$college->name}}</h2>
            
            <table class="table table-bordered table-hover table-striped mb-4">
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>Campus</th>
                        <th>Intake</th>
                        <th>Application Fee</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$college->country->name}}</td>
                        <td>{{$college->campus}}</td>
                        <td>{{date('d M Y',strtotime($college->intake))}}</td>
                        <td>{{$college->application_fee}}</td>
                    </tr>
                </tbody>
            </table>
            <div class="row mt-2">
                <div class="col-md-12">
                    <!--<h5>Basic Information</h5>-->
                    <p>Description:&nbsp; {{$college->description}}</p>
                    <p>Level Of Education:&nbsp; {{$college->level_of_edu}}</p>
                    <p>Created:&nbsp; {{$college->created_at}}</p>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection

