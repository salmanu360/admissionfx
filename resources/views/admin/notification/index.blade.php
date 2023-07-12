@extends('layouts.admin')
@section('css')
    <style>
        .log {
            padding: 0 20px;
            max-height: 75vh;
            overflow-y: scroll;
        }
        .head {
            display: flex;
        }
        .head h4 {
            flex: 1;
        }

        .log .body .log-row {
            display: flex;
            margin-bottom: 5px;
            border-bottom:1px solid;
            border-bottom-style: groove;
        }
        .log .body .old {
            flex: 1;
            padding: 0 5px;
            overflow-wrap: anywhere;
            display: flex;
        }
        .log .body .new {
            flex: 1;
            padding: 0 5px;
            overflow-wrap: anywhere;
            display: flex;
        }
        .log .body .same {
            background: #4caf5073;
        }
        .log .body .different {
            background: #f4433673;
        }
        .log .body .log-key {
            font-weight: bolder;
            margin-right: 5px;
            width: 140px;
        }
        .log .body .log-value {
            flex: 1;
        }
    </style>
@endsection

@section('content')

    <div class="page-header">
        <div class="page-title">
            <h3>Activity Logger</h3>
        </div>
    </div>


    <div class="row layout-top-spacing" id="cancel-row">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">

                    <table class="multi-table table table-striped table-bordered table-hover non-hover"
                           style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>NOTIFICATION</th>
                            <th>Read At</th>
                            <th>CREATED BY</th>
                            <th>CREATED AT</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notifications as $notification)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$notification->id}}</td>
                                <td>{{$notification->notification}}</td>
                                <td>{{$notification->read_at}}</td>
                                <td>{{$notification->created_name}}</td>
                                <td>{{$notification->created_at}}</td>
                                <td>
                                    <a class="text text-danger btn-sm deleteRecord" style="color: white" href="javascript:void(0);"  onclick="deleterecord('{{$notification->id}}','notification/destroy');">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>NOTIFICATION</th>
                            <th>Read At</th>
                            <th>CREATED BY</th>
                            <th>CREATED AT</th>
                            <th>ACTION</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div></div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleterecord(id, deletefunction) {
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
                "closeButton": true,
                "progressBar": true
            }
        toastr.success("{{ $message }}");
        @endif
    </script>
@endsection