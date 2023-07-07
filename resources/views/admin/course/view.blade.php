@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('modern-light-menu/plugins/jquery-step/jquery.steps.css')}}">
@endsection
@section('content')
    

    
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">

        <div class="skills layout-spacing ">

            <div class="widget-content widget-content-area">
            
                <td><img src="{{asset($course->image)}}" style="width:300px" alt=""></td>
                <br>
                <h2 class="" style="color:#e31e24">Course: {{$course->name}}</h2>
                
                <table class="table table-bordered table-hover table-striped mb-4">
                    <thead>
                        <tr>
                            <th>College</th>
                            <th>Duration</th>
                            <th>Intake</th>
                            <th>Tuition fee</th>
                            <th>Application Fee</th>
                            <th>Program</th>
                            <th>Category</th>
                            <th>Country</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$college->name}}</td>
                            <td>{{$course->duration}}</td>
                            <td>{{date('d M Y',strtotime($course->intake))}}</td>
                            <td>{{$course->tuition_fee}}</td>
                            <td>{{$course->application_fee}}</td>
                            <td>{{isset($program) ? $program->name : ''}}</td>
                            <td>{{ isset($category) ? $category->name : ''}}</td>
                            <td>{{isset($country) ? $country->name : ''}}</td>

                        </tr>
                    </tbody>
                </table>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <!--<h5>Basic Information</h5>-->
                        <p>Description:&nbsp; {{$course->description}}</p>
                        <p>Requirement:&nbsp; {{$course->requirement}}</p>
                        <p>Created:&nbsp; {{$course->created_at}}</p>
                    </div>
                </div>
    
            </div>

        </div>

    </div>
@endsection

