@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>All Course Program</h3>
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a href="{{route('program.create')}}"> <button class="btn btn-success"><i class="fa-solid fa-square-plus"></i> Add Course Program</button></a>
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
                            <th>Program Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($programs as $program)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$program->name}}</td>
                            <td>{{$program->slug}}</td>
                            <td>
                                @if($program->status == 1)
                                    <a class="badge bg-success btn-rounded" style="color: #fff;" href="javascript:" id="program-{{$program->id}}" program_id="{{$program->id}}">Active</a>
                                @else
                                <a class="badge bg-danger btn-rounded" style="color: #fff;" href="javascript:" id="program-{{$program->id}}" program_id="{{$program->id}}">Deactive</a>
                                @endif
                            </td>
                            <td class="text-centers">
                                {{-- <a href=""><i class="far fa-eye"></i></a> --}}
                                <a href="{{route('program.create')}}"><i class="fa-solid fa-square-plus"></i></a>
                                <a href="{{route('program.edit', $program->id)}}"><i class="far fa-edit"></i></a>
                                <a class="text text-danger btn-sm deleteRecord" style="color: white" href="javascript:void(0);" rel="{{ $program->id }}" rel1="delete_program" onclick="deleterecord('{{$program->id}}','program/destroy');">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                               
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        {{-- <tr>
                            <th>#</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr> --}}
                    </tfoot>
                </table>
            </div>
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
        @if($message = Session::get('success_message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ $message }}");
  @endif
    
</script>
@endsection 