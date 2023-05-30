@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>All Grading Scheme</h3>
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a><button class="btn btn-success" data-toggle="modal"data-target="#gradingModel"><i class="fa-solid fa-square-plus"></i> Add Grading Scheme</button></a>
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
                            <th>Created Date</th>
                            <th>Created by</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gradings as $grading)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$grading->name}}</td>
                            <td>{{$grading->create_date}}</td>
                            <td>@if ($grading->created_by)
                                {{auth()->user()->name}}
                            @endif</td>
                            <td class="text-centers">
                                <button type="button"
                                class="btn btn-sm badge badge-sm btn-info"
                                data-toggle="modal"
                                data-target="#ediGradingModal{{$grading->id}}"
                                data-toggle="tooltip" data-placement="top"
                                title="edit grading">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </button>
                            <a class="text text-danger btn-sm deleteRecord" style="color: white" href="javascript:void(0);" rel="{{ $grading->id }}" rel1="delete_recruiter" onclick="deleterecord('{{$grading->id}}','grading/destroy');">
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
                            <th>Created Date</th>
                            <th>Created by</th>
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



<!-- gradingModel  Modal -->
<div class="modal fade" id="gradingModel" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3"> Add Grading Scheme</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                   <form action="{{route('grading.create')}}" method="POST">
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
                        <label for="recipient-name" class="form-control-label">Date :</label>
                            <input type="date" class="form-control" name="date">
                            @error('date')
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
<!-- gradingModel Modal -->

<!-- ediGradingModal  Modal -->
@foreach ($gradings as $grading)
<div class="modal fade" id="ediGradingModal{{$grading->id}}" tabindex="-1" role="dialog"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="example-Modal3"> Edit Grading Scheme</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
               <form action="{{route('grading.update', $grading->id)}}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="recipient-name" class="form-control-label">Name :</label>
                        <input type="text" class="form-control" name="name" value="{{$grading->name}}">
                        @error('name')
                            <span class="text text-danger">{{$message}}</span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="form-control-label">Date :</label>
                        <input type="date" class="form-control" name="date" value="{{$grading->create_date}}">
                        @error('date')
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
<!-- ediGradingModal Modal -->


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
            url: SITEURL + "/admin/grading/getDetail/" + id,
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
            url: SITEURL + "/admin/grading/getDocument/" + id,
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