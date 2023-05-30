@extends('layouts.admin')
@section('content')
@php 
use App\Models\LeadStatus;
@endphp
<body class="sidebar-noneoverflow">
    <div class="page-header">
        <div class="page-title">
            <h3>Report List</h3>
        </div>
        <div class="page-title">
            <form action="" method="">
                <div class="input-group">
                <div class="form-outline"> From Date
                    <input id="search-focus" name="fromDate" type="date"
                    id="form1" class="form-control m-1" placeholder="Search"/>
                </div>
                <div class="form-outline"> To Date
                    <input id="search-focus" name="toDate" type="date"
                        id="form1" class="form-control m-1" placeholder="Search"/>
                </div>&nbsp;
                <div class="form-outline" style="margin-top: 25px;">
                    <button type="submit"
                        class="btn m-1 btn-success">Submit</button>
                    <a href="{{ url('/rmanager/report') }}"><button type="button"
                        class="btn m-1 btn-warning"><i
                        class="fa fa-refresh"></i></button></a>
                </div>
                </div>
            </form>
        </div>
    </div>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                
                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table class="multi-table table table-striped table-bordered table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Unique ID</th>
                                            <th>Full Name</th>
                                            <th>Intake</th>
                                            <th>Application Status</th>
                                            <th>Created Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($studentLists as $list)
                                        @php 
                                        $lead = LeadStatus::where('id', $list->lead_status)->first();
                                        @endphp
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$list->unique_id}}</td>
                                            <td>{{$list->first_name}} {{$list->middle_name}} {{$list->last_name}}</td>
                                            <td>
                                                @if ($list->intake != null)
                                                    {{date('M Y', strtotime($list->intake))}}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{$lead->name}}</td>
                                            {{-- <td>{{date('M Y', strtotime($list->created_at))}}</td> --}}
                                            <td>{{ $list->created_at->format('Y-m-d') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Unique ID</th>
                                            <th>Full Name</th>
                                            <th>Intake</th>
                                            <th>Application Status</th>
                                            <th>Created Date</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                </div>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->
    
</body>
@endsection