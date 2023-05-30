@extends('application.master')



@section('css')
@endsection

@section('content')
@php 
 $leadstatus=\App\Models\LeadStatus::get();
 $studentcount=\App\Models\Student::where('application_team',auth()->user()->id)->count();
 
@endphp
    <div class="page-header">
        <div class="page-title">
            <h3>Hi, Application Team</h3>
        </div>
    </div>
    <br>

                    <div class="row">
                        
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                            <a href="{{route('application.totalstudent')}}">
                                <div class="widget widget-card-four">
                                    <div class="widget-content">
                                        <div class="w-content m-0">
                                            <div class="w-info">
                                                <h6 class="" style="font-size: 16px;">Total Students</h6>
                                                <!--<p class="m-0"><a href="new-detail.html">View</a></p>-->
                                            </div>
                                            <div class="">
                                                <div class="w-icon">
                                                    {{$studentcount}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                               </div>
                               </a>
                            </div>
                            
                            
                            @foreach($leadstatus as $lead)
                            @php 
                            $student_lead_count=\App\Models\Student::where('application_team',auth()->user()->id)->where('lead_status', $lead->id)->count();
                            @endphp
                            
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                                   
                                    <a href="{{route('application.application1', $lead->id)}}">
                                    <div class="widget widget-card-four">
                                        <div class="widget-content">
                                            <div class="w-content m-0">
                                                <div class="w-info">
                                                    <h6 class="" style="font-size: 16px;">{{$lead->name}}</h6>
                                                </div>
                                                <div class="">
                                                    <div class="w-icon">
                                                      {{$student_lead_count}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                   </div>
                                   </a>
                                </div>
                                
                            @endforeach
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