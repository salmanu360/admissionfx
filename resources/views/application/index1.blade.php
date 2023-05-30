@extends('application.master')



@section('css')
@endsection
@php
use App\Models\LeadStatus;
@endphp
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h3>Hi, Application Team</h3>
        </div>
    </div>


                    <div class="row layout-top-spacing">
                        
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-card-four mb-3">
                                <div class="widget-content">
                                    <div class="row m-0">
                                        
                                        <div class="table-responsive mb-4 mt-4">
                                            <table class="multi-table table table-striped table-bordered table-hover non-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Unique ID</th>
                            <th>Student Name</th>
                            <th>Passport NO</th>
                            <th>Collage</th>
                            <th>Course</th>
                            <th>Intake </th>
                            <th>Lead Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                        @php $lead = LeadStatus::where('id', $student->lead_status)->first();@endphp
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td><a style="color:blue" href="{{route('application.showstudent', $student->id)}}">{{$student->unique_id}}</a></td>
                                <td><a style="color:blue" href="{{route('application.showstudent', $student->id)}}">{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</a></td>
                                <td>{{$student->passport_number}}</td>
                                <td>{{$student->institute_name}}</td>
                                <td>{{$student->degree_name}}</td>
                                <td>
                                    @if ($student->intake == null)
                                    N/A
                                        @else
                                    {{date('d M Y', strtotime($student->intake))}}
                                    @endif
                                </td>
                                <td>{{$lead->name}}</td>
                                <td class="text-centers">
                                     <button type="button"
                                class="btn btn-sm badge badge-sm btn-info"
                                data-toggle="modal"
                                data-target="#appTeamModel{{ $student->id }}"
                                data-toggle="tooltip" data-placement="top"
                                title="Change Lead Status">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                                </button>
                                </td>
                               

                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Unique ID</th>
                            <th>Student Name</th>
                            <th>Passport NO</th>
                            <th>Collage</th>
                            <th>Course</th>
                            <th>Intake </th>
                            <th>Lead Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>

                            
                        </div>

                        <!-- sidebar -->
                    </div>
 @foreach ($students as $student)
<!-- Application Team  Modal -->
<div class="modal fade" id="appTeamModel{{ $student->id }}" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Change Lead Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             <form action="{{route('application.changeLeadStatus')}}" method="post">
                 @csrf
                 @method('POST')
                <input type="hidden" name="studentId" value="{{$student->id}}">
                <select name="leadStatus" class="form-select form-control" id="exampleFormControlSelect1">
                    @foreach ($leadStatus as $status)
                        <option value="{{$status->id}}">{{$status->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button class="btn btn-success">Change</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal closed -->
@endforeach
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
@endsection