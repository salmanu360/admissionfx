@extends('layouts.admin')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h3> Lead History</h3>
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
                            <th>Lead Status</th>
                            <th>Student</th>
                            <th>Created by</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leadHistory as $lead)
                            @php
                                $leadStatus=\App\Models\LeadStatus::select('id','name')->where('id', $lead->name)->first();
                                $student = \App\Models\Student::select('id','first_name','middle_name','last_name')->where('id', $lead->student_id)->first();
                                $created_by = \App\Models\User::select('id','name')->where('id', $lead->created_by)->first();

                            @endphp
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>
                                    {{$leadStatus->name}}
                                </td>
                                <td>
                                    {{$student->first_name .' '.$student->middle_name .' '.$student->last_name}}
                                </td>

                                <td>
                                    {{$created_by->name}}
                                </td>
                                <td>{{$lead->date_created}}</td>
                                <td class="text-centers">
                                    <a class="text text-danger btn-sm" style="color: white" href="javascript:void(0);" onclick="deleterecord('{{$lead->id}}','leads/lead-history-destroy');">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Lead Status</th>
                            <th>Student</th>
                            <th>Created by</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
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