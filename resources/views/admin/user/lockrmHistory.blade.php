@extends('layouts.admin')
@section('content')
    <title>@yield('Users') - App Name</title>
    <div class="page-header">
        <div class="page-title">
            <h3>RM History</h3>
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
                            <th>ID</th>
                            <th>RM</th>
                            <th>Lock RM</th>
                            <th>Date Created</th>
                            <th>Created By</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($histories as $history)
                            @php
                              $user = \App\Models\User::where('id', $history->rm_id)->first();
                              $admin = \App\Models\Admin::where('id', $history->created_by)->first();
                            @endphp
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$history->id}}</td>
                                <td>{{$user->name}} ({{$user->email}})</td>
                                <td>
                                    @if($history->lock_user == 1)
                                        <a class="badge bg-success btn-rounded" style="color: #fff;" href="{{route('user.changeRMStatus', $history->rm_id)}}">Lock</a>
                                    @else
                                        <a class="badge bg-danger btn-rounded" style="color: #fff;" href="{{route('user.changeRMStatus', $history->rm_id)}}">Un Lock</a>
                                    @endif
                                </td>
                                <td>{{$history->date_created}}</td>
                                <td>{{$admin->name}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>RM</th>
                            <th>Lock RM</th>
                            <th>Date Created</th>
                            <th>Created By</th>
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