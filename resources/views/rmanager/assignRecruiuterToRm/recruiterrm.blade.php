@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>Rm Assign</h3>
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
                            <th>Unique Id</th>
                            <th>Recruiter</th>
                            <th>RM</th>
                            <th>Created Date</th>
                            <th>Created by</th>
                            <!--<th>Action</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assigns as $assign)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$assign->recruiter_id}}</td>
                            <td>{{$assign->recruiter_name}}</td>
                            <td>{{$assign->rm_name}}</td>
                            <td>{{$assign->created_at}}</td>
                            <td>{{$assign->created_by_name}}</td>
                            <!--<td class="text-centers"> </td>-->
                            
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Recruiter</th>
                            <th>rm</th>
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



{{-- <!-- eduactionModel  Modal -->
<div class="modal fade" id="eduactionModel" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3"> Assign Recruiter to rm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                   <form action="{{route('recruiterToRm.create')}}" method="POST">
                    @csrf
                    @method("POST")
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Recruiter :</label>
                            <select class="form-control" name="recruiter">
                                @foreach ($recruiters as $recruiter)
                                    <option value="{{$recruiter->id}}:{{$recruiter->company_name}}">{{$recruiter->company_name}}</option>
                                @endforeach
                            </select>
                            @error('recruiter')
                                <span class="text text-danger">{{$message}}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">rm :</label>
                        <select class="form-control" name="rm">
                            @foreach ($rms as $rm)
                                <option value="{{$rm->id}}:{{$rm->name}}">{{$rm->name}}</option>
                            @endforeach
                        </select>
                            @error('rm')
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
<!-- eduactionModel Modal -->

<!-- edieduactionModal  Modal -->
@foreach ($assigns as $assign)
<div class="modal fade" id="edieduactionModal{{$assign->id}}" tabindex="-1" role="dialog"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="example-Modal3"> Edit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
               <form action="{{route('recruiterToRm.update', $assign->id)}}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="recipient-name" class="form-control-label">Recruiter :</label>
                        <select class="form-control" name="recruiter">
                            @foreach ($recruiters as $recruiter)
                                <option value="{{$recruiter->id}}:{{$recruiter->company_name}}" {{$assign->recruiter_id == $recruiter->id ? 'selected' : ''}}>{{$recruiter->company_name}}</option>
                            @endforeach
                        </select>
                        @error('recruiter')
                            <span class="text text-danger">{{$message}}</span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="form-control-label">rm :</label>
                    <select class="form-control" name="rm">
                        @foreach ($rms as $rm)
                            <option value="{{$rm->id}}:{{$rm->name}}" {{$assign->rm_id == $rm->id ? 'selected' : ''}}>{{$rm->name}}</option>
                        @endforeach
                    </select>
                        @error('rm')
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
@endforeach --}}
<!-- edieduactionModal Modal -->


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
            url: SITEURL + "/admin/assign/getDetail/" + id,
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
            url: SITEURL + "/admin/assign/getDocument/" + id,
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
            title: 'This recruiter already assigned to rm',
        });
    </script>
</ul>
@endif

@endsection 