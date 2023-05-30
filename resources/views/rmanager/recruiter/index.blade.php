@extends('layouts.admin')
@section('content')
@php use App\Models\RecruiterPassword;
use App\Models\User;
use App\Models\RecruiterNotes;
@endphp
<div class="page-header">
    <div class="page-title">
        <h3>All recruiters</h3>
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a href="{{route('recruiters.create')}}"><button class="btn btn-success"><i class="fa-solid fa-square-plus"></i> Add recruiter</button></a>
        <a href="{{route('recruiters.uploadexcel')}}"><button class="btn btn-success"><i class="fa-solid fa-square-plus"></i> Upload Excel</button></a>
        <a target="_blank" href="{{asset('uploads/excel_template/recruiter.csv')}}"><button class="btn btn-success"><i class="fa fa-download"></i>Download Excel</button> </a>
    </div>
</div>


<div class="row layout-top-spacing" id="cancel-row">
                
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
                
                <table class="multi-table table table-striped table-bordered table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Unique ID</th>
                            <th>Company Name</th>
                            <th>Full Name</th>
                            <th>Created by</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Website</th>
                            <th>Recruiting From</th>
                            <th>Recruiting country</th>
                            <th>Recruiting per year</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Notes</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recruiters as $recruiter)
                        @php 
                        $recruiterpass = RecruiterPassword::where('user_id', $recruiter->user_id)->first();
                        $username = User::where('id', $recruiter->user_id)->first();
                        @endphp
                        
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$recruiter->unique_id}}</td>
                            <td><a style="color:blue" href="{{route('recruiters.getDetail', $recruiter->id)}}"> {{$recruiter->company_name}}</a></td>
                            <td><a style="color:blue" href="{{route('recruiters.getDetail', $recruiter->id)}}"> {{$recruiter->first_name}} {{$recruiter->last_name}}</a></td>
                            <td>{{$recruiter->created_by_name}}</td>
                            <td>{{$recruiter->phone}}</td>
                            <td>{{$recruiter->email}}</td>
                            <td>{{$recruiter->city}}</td>
                            <td>{{$recruiter->country}}</td>
                            <td>{{$recruiter->website}}</td>
                            <td>{{$recruiter->recruiting_from_date}}</td>
                            <td>{{$recruiter->recruiting_from_country}}</td>
                            
                            <td>{{$recruiter->students_per_year}}</td>
                            <td>
                                @if(!empty($username->email))
                                {{$username->email}}
                                @else
                                {{'N/A'}}
                                @endif
                            </td>
                            <td>
                                @if(!empty($recruiterpass->recruiter_password))
                                {{$recruiterpass->recruiter_password}}
                                @else
                                {{'N/A'}}
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-info" data-toggle="modal"data-target="#viewNotes{{ $recruiter->id }}">view notes</button>
                            </td>
                            <td>
                                @if($recruiter->status == 1)
                                    <a class="badge bg-success updaterecruiterStatus btn-rounded" style="color: #fff;" href="javascript:" id="recruiter-{{$recruiter->id}}" recruiter_id="{{$recruiter->id}}">Active</a>
                                @else
                                <a class="badge bg-danger updaterecruiterStatus btn-rounded" style="color: #fff;" href="javascript:" id="recruiter-{{$recruiter->id}}" recruiter_id="{{$recruiter->id}}">Deactive</a>
                                @endif
                            </td>
                            <td class="text-centers">
                                {{-- <a href=""><i class="far fa-eye"></i></a> --}}
                                {{--<a class="text-primary" href="javascript:" onclick="getDetail({{$recruiter->id}})" ><i class="fa-solid fa-eye"></i></a>--}}
                                {{--<a class="text-primary" href="javascript:" onclick="getDocument({{$recruiter->id}})" ><i class="fa-solid fa-file"></i></a>--}}

                                <a href="{{route('recruiters.create')}}"><i class="fa-solid fa-square-plus"></i></a>
                               {{-- <a href=""><i class="fa-solid fa-square-plus"></i></a>--}}
                                <a href="{{route('recruiters.edit', $recruiter->id)}}"><i class="far fa-edit"></i></a>
                                <a class="text text-danger btn-sm deleteRecord" style="color: white" href="javascript:void(0);" rel="{{ $recruiter->id }}" rel1="delete_recruiter" onclick="deleterecord('{{$recruiter->id}}','rm/recruiter/destroy');">
                                    <i class="far fa-trash-alt"></i>
                                </a>

                                <button type="button"
                                class="btn btn-ico btn-sm badge badge-sm btn-info"
                                data-toggle="modal"
                                data-target="#appTeamModel{{ $recruiter->id }}"
                                data-toggle="tooltip" data-placement="top"
                                title="Change Password">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </button>
                            <button class="btn btn-success" data-toggle="modal"data-target="#addNotes{{ $recruiter->id }}" title="Add Notes"><i class="fa-solid fa-square-plus"></i></button>
                            {{-- <button type="button"
                                class="btn btn-ico btn-sm badge badge-sm btn-secondary"
                                data-toggle="modal"
                                data-target="#showPasswordModel{{ $recruiter->id }}"
                                data-toggle="tooltip" data-placement="top"
                                title="Show Password">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </button> --}}

                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Unique ID</th>
                            <th>Company Name</th>
                            <th>Full Name</th>
                            <th>Created by</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Website</th>
                            <th>Recruiting From</th>
                            <th>Recruiting country</th>
                            <th>Recruiting per year</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Notes</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    </div>

<div class="modal fade" id="recruiterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl customWidth" role="document">
        <div class="modal-content recruiterModalBody">
            ....
        </div>
    </div>
</div>

@foreach ($recruiters as $recruiter)
<!-- Application Team  Modal -->
<div class="modal fade" id="appTeamModel{{ $recruiter->id }}" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('recruiters.password', $recruiter->id)}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Email :</label>
                            <input type="email" class="form-control" name="email" readonly value="{{$recruiter->email}}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">New Password :</label>
                            <input type="password" class="form-control" name="newPassword">
                    </div>
                    @error('newPassword')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Confirm Password :</label>
                            <input type="password" class="form-control" name="confirmPassword">
                    </div>
                    @error('confirmPassword')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button class="btn btn-success">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Application Team  Modal -->
@endforeach

<!--::::::::::::::::::::::::::::Recruiter Notes::::::::::::::::::::::::-->
@foreach($recruiters as $recruiter)
<div class="modal fade" id="addNotes{{ $recruiter->id }}" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3"> Add Notes for Recruiter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                   <form action="{{route('rec.addNotes')}}" method="POST">
                    @csrf
                    @method("POST")
                    <input type="hidden" name="id" value="{{ $recruiter->id }}">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Add Notes :</label>
                          <textarea name="notes" id="" cols="30" rows="10" class="form-control">{{old('notes')}}</textarea>
                          @error('notes')
                              <span class="text text-danger">{{$message}}</span>
                          @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" data-dismiss="#">Save</button>
            </div>
                   </form>
        </div>
    </div>
</div>
@endforeach
<!--::::::::::::::::::::::::::::Recruiter Notes::::::::::::::::::::::::-->


<!--::::::::::::::::::::::::::::View Recruiter Notes::::::::::::::::::::::::-->
@foreach($recruiters as $recruiter)
<div class="modal fade" id="viewNotes{{ $recruiter->id }}" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3"> Notes of {{$recruiter->first_name}} {{$recruiter->last_name}} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                    <table class="table table-bordered table-hover">
                        @php
                             $notes = RecruiterNotes::where('recruiter_id', $recruiter->id)->get();
                        @endphp
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Notes</th>
                                <th>Created by</th>
                                <th>Created Date</th>
                            </tr>
                        </thead>
                        @foreach ($notes as $note)
                        <tbody>
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$note->notes}}</td>
                                <td>{{$note->created_by_name}}</td>
                                <td>{{date('M Y', strtotime($note->created_at))}}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!--::::::::::::::::::::::::::::View Recruiter Notes::::::::::::::::::::::::-->


{{-- @foreach ($recruiters as $recruiter)
<!-- Application Team  Modal -->
<div class="modal fade" id="showPasswordModel{{ $recruiter->id }}" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">{{ $recruiter->company_name }} Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Password :</label>
                            <input type="text" class="form-control" name="password" value="{{$recruiter->password}}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Show Password Modal -->
@endforeach --}}


@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deleterecord(id,deletefunction){
    var SITEURL = '{{ URL::to('') }}';

    var id = id;
    

    var deleteFunction = deletefunction;


    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
        window.location.href = SITEURL + "/" + deleteFunction + "/" + id;
    }
    })
 
    }

    getDetail = function (id)
    {
        var SITEURL = '{{ URL::to('') }}';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $.ajax({
            url: SITEURL + "/recruiter/getDetail/" + id,
            type: 'GET',
            success: function (response)
            {
                $('#recruiterModal').modal('toggle');
                $('#recruiterModal').modal('show');
                $(".recruiterModalBody").empty();
                $(".recruiterModalBody").html(response);
            }
        });
    }

    getDocument = function (id)
    {
        var SITEURL = '{{ URL::to('') }}';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $.ajax({
            url: SITEURL + "/recruiter/getDocument/" + id,
            type: 'GET',
            success: function (response)
            {
                $('#recruiterModal').modal('toggle');
                $('#recruiterModal').modal('show');
                $(".recruiterModalBody").empty();
                $(".recruiterModalBody").html(response);
            }
        });
    }
</script>

@if (Session::get('change'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ Session::get('change') }}',
            showConfirmButton: false,
            timer: 5000
        });
    </script>
@endif

@if ($errors->any())
<ul>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'The new password confirmation does not match',
        });
    </script>
</ul>
@endif
@if (Session::get('add'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ Session::get('add') }}',
            showConfirmButton: false,
            timer: 5000
        });
    </script>
@endif
@if (Session::get('empty'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '{{Session::get('empty')}}',
        });
    </script>
@endif
@endsection 