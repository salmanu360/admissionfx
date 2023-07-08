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
                            <th>ACTION</th>
                            <th>ENTITY</th>
                            <th>CREATED BY</th>
                            <th>CREATED AT</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($loggers as $log)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$log->id}}</td>
                                <td>{{$log->description}}</td>
                                <td>{{$log->subject_type}}</td>
                                <td>
                                    @php
                                        $adminUser = \App\Models\Admin::select('name')->where('id', $log->causer_id)->first();
                                    @endphp
                                    {{$adminUser->name}}
                                </td>
                                <td>{{$log->created_at}}</td>
                                <td>
                                    <a class="text text-primary btn-sm " style="color: white" href="javascript:void(0);"
                                       onclick="getActivityLogDetail('{{$log->id}}');">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a class="text text-danger btn-sm deleteRecord" style="color: white" href="javascript:void(0);"  onclick="deleterecord('{{$log->id}}','activity-logger/destroy');">
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
                            <th>ACTION</th>
                            <th>ENTITY</th>
                            <th>NAME</th>
                            <th>CREATED AT</th>
                            <th>ACTION</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>


    <!-- modal for Activity Log detail -->
    <div class="modal fade" id="activityLogDetailModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl customWidth" role="document">
            <div class="modal-content ActivityLogDetailModalBody">
                ....
            </div>
        </div>
    </div>
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
            //--------- activity log detail modal function start -----
            getActivityLogDetail = function (activity_id) {
                var SITEURL = '{{ URL::to('') }}';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                $.ajax({
                    url: SITEURL + '/admin/activity-logger/getActivityLogDetail/' + activity_id,
                    type: 'GET',
                    success: function (response) {
                        console.log(response)
                        $('#activityLogDetailModal').modal('show');
                        $(".ActivityLogDetailModalBody").empty();
                        $(".ActivityLogDetailModalBody").html(response);
                    }
                });
            }
//--------- activity log modal function end -----
//-------------------------------------------------------------------------------

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