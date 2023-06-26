@extends('layouts.admin')
@section('content')
    <title>@yield('Users') - App Name</title>
    <div class="page-header">
        <div class="page-title">
            <h3>RM Requests</h3>
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
                            <th>Status</th>
                            <th>Date Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($requests as $request)
                            @php
                                $user = \App\Models\User::where('id', $request->rm_id)->first();
                            @endphp
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$request->id}}</td>
                                <td>{{$user->name}} ({{$user->email}})</td>
                                <td>
                                    @if($request->status == 1)
                                        <a class="badge bg-success btn-rounded" style="color: #fff;" >Approved</a>
                                    @else
                                        <a class="badge bg-danger btn-rounded" style="color: #fff;" >Un Unapproved</a>
                                    @endif
                                </td>
                                <td>{{$request->date_created}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>RM</th>
                            <th>Status</th>
                            <th>Date Created</th>
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