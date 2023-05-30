@extends('layouts.admin')
@section('content')
<title>@yield('Users') - App Name</title> 
<div class="page-header">
    <div class="page-title">
        <h3>All Users</h3>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>
                                @if($user->status == 1)
                                    <a class="badge bg-success updaterecruiterStatus btn-rounded" style="color: #fff;" href="javascript:" id="recruiter-{{$user->id}}" recruiter_id="{{$user->id}}">Active</a>
                                @else
                                <a class="badge bg-danger updaterecruiterStatus btn-rounded" style="color: #fff;" href="javascript:" id="recruiter-{{$user->id}}" recruiter_id="{{$user->id}}">Deactive</a>
                                @endif
                            </td>
                            <td class="text-centers">

                                <a href="{{route('user.edit', $user->id)}}"><i class="far fa-edit"></i></a>
                                <a class="text text-danger btn-sm deleteRecord" style="color: white" href="javascript:void(0);" rel="{{ $user->id }}" rel1="delete_recruiter" onclick="deleterecord('{{$user->id}}','user/destroy');">
                                    <i class="far fa-trash-alt"></i>
                                </a>

                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
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
        window.location.href = SITEURL + "/admin/" + deleteFunction + "/" + id;
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
            url: SITEURL + "/admin/user/getDetail/" + id,
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
            url: SITEURL + "/admin/user/getDocument/" + id,
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
    
        @if($message = Session::get('success_message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ $message }}");
  @endif
</script>

@if (Session::get('update'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ Session::get('update') }}',
            showConfirmButton: false,
            timer: 5000
        });
    </script>
@endif

@endsection 