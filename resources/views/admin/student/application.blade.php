@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>All Students</h3>
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a href="{{route('student.create')}}"><button class="btn btn-success"><i class="fa-solid fa-square-plus"></i> Add Student</button></a>
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
                            <!--<th>Action</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $student)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            
                            <td>{{$student->username}}</td>
                            <td>{{$student->email}}</td>
                            
                            <!--<td class="text-centers">
                                
                                <a class="text-primary" href="javascript:" onclick="getDocument({{$student->id}})" ><i class="fa-solid fa-file"></i></a>

                                <a href="{{route('student.create')}}"><i class="fa-solid fa-square-plus"></i></a>
                                <a href="{{route('student.edit', $student->id)}}"><i class="far fa-edit"></i></a>
                                <a class="text text-danger btn-sm deleteRecord" style="color: white" href="javascript:void(0);" rel="{{ $student->id }}" rel1="delete_student" onclick="deleterecord('{{$student->id}}','student/destroy');">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <button type="button"
                                class="btn btn-sm badge badge-sm btn-info"
                                data-toggle="modal"
                                data-target="#appTeamModel{{ $student->id }}"
                                data-toggle="tooltip" data-placement="top"
                                title="Application Team">
                                <i class="fa fa-tasks" aria-hidden="true"></i>
                            </button>
                            </td>-->
                            
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                             <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            
                            <!--<th>Action</th>-->
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    </div>

<div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl customWidth" role="document">
        <div class="modal-content studentModalBody">
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
            url: SITEURL + "/admin/student/getDetail/" + id,
            type: 'GET',
            success: function (response)
            {
                $('#studentModal').modal('toggle');
                $('#studentModal').modal('show');
                $(".studentModalBody").empty();
                $(".studentModalBody").html(response);
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
            url: SITEURL + "/admin/student/getDocument/" + id,
            type: 'GET',
            success: function (response)
            {
                $('#studentModal').modal('toggle');
                $('#studentModal').modal('show');
                $(".studentModalBody").empty();
                $(".studentModalBody").html(response);
            }
        });
    }
</script>
@if (Session::get('assign'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ Session::get('assign') }}',
            showConfirmButton: false,
            timer: 5000
        });
    </script>
@endif

@endsection 