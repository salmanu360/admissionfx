@extends('layouts.admin')
@section('content')
@php
    use App\Models\RoleHasPermission;
@endphp
<div class="page-header">
    <div class="page-title">
        <h3>All Roles</h3>
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a><button class="btn btn-success" data-toggle="modal"data-target="#appRoleModel"><i class="fa-solid fa-square-plus"></i> Add role</button></a>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$role->name}}</td>
                            <td class="text-centers">
                                <button type="button"
                                class="btn btn-sm badge badge-sm btn-info"
                                data-toggle="modal"
                                data-target="#ediRoleModal{{$role->id}}"
                                data-toggle="tooltip" data-placement="top"
                                title="edit role">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </button>
                            <a class="text text-danger btn-sm deleteRecord" style="color: white" href="javascript:void(0);" rel="{{ $role->id }}" rel1="delete_recruiter" onclick="deleterecord('{{$role->id}}','role/destroy');">
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



<!-- appRoleModel  Modal -->
<div class="modal fade" id="appRoleModel" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3"> Add Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                   <form action="{{route('role.create')}}" method="POST">
                    @csrf
                    @method("POST")
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Name :</label>
                            <input type="text" class="form-control" name="name">
                            @error('name')
                                <span class="text text-danger">{{$message}}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Permissions :</label>
                        <div class="row">
                            @foreach ($permissions as $permission)
                                <div class="col-md-3">
                                    <input type="checkbox" name="permission[]" value="{{$permission->id}}:{{$permission->name}}"> {{$permission->name}}
                                </div>
                            @endforeach
                        </div>
                        @error('permission')
                            <span class="text text-danger">{{$message}}</span>
                        @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" data-dismiss="#">Create</button>
            </div>
                   </form>
        </div>
    </div>
</div>
<!-- appRoleModel Modal -->

<!-- appRoleModel  Modal -->
@foreach ($roles as $role)
<div class="modal fade" id="ediRoleModal{{$role->id}}" tabindex="-1" role="dialog"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="example-Modal3"> Edit Role</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
               <form action="{{route('role.update', $role->id)}}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="recipient-name" class="form-control-label">Name :</label>
                        <input type="text" class="form-control" name="name" value="{{$role->name}}">
                        @error('name')
                            <span class="text text-danger">{{$message}}</span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="form-control-label">Permissions :</label>
                    <div class="row">
                        @foreach ($permissions as $permission)
                            <div class="col-md-3">
                                @php
                                    $rolePermission = RoleHasPermission::where('role_id', $role->id)->get();
                                @endphp
                                <input type="checkbox" name="permission[]" {{ $rolePermission->pluck('permission_id')->contains($permission->id) ? 'checked' : '' }}  value="{{$permission->id}}:{{$permission->name}}"> {{$permission->name}}
                            </div>
                        @endforeach
                    </div>
                    @error('permission')
                        <span class="text text-danger">{{$message}}</span>
                    @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" data-dismiss="#">Update</button>
        </div>
               </form>
    </div>
</div>
</div>
@endforeach
<!-- appRoleModel Modal -->


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
            url: SITEURL + "/admin/role/getDetail/" + id,
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
            url: SITEURL + "/admin/role/getDocument/" + id,
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

@if (Session::get('success'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ Session::get('success') }}',
            showConfirmButton: false,
            timer: 5000
        });
    </script>
    @elseif(Session::get('update'))
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

@if ($errors->any())
<ul>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'The name field are required',
        });
    </script>
</ul>
@endif
@endsection 