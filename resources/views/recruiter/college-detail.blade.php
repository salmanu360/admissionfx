@extends('recruiter.master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <body class="layout-boxed enable-secondaryNav">


        <!--  BEGIN MAIN CONTAINER  -->
        <div class="main-container" id="container">

            <div class="overlay"></div>
            <div class="search-overlay"></div>


            <!--  BEGIN CONTENT AREA  -->
            <div id="content" class="main-content">
                <div class="layout-px-spacing">

                    <div class="middle-content container-xxl p-0">

                        <!--  BEGIN BREADCRUMBS  -->
                        <div class="secondary-nav">
                            <div class="breadcrumbs-container" data-page-heading="Analytics">
                                <header class="header navbar navbar-expand-sm">
                                    <a href="javascript:void(0);" class="btn-toggle sidebarCollapse"
                                        data-placement="bottom">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                                            <line x1="3" y1="12" x2="21" y2="12"></line>
                                            <line x1="3" y1="6" x2="21" y2="6"></line>
                                            <line x1="3" y1="18" x2="21" y2="18"></line>
                                        </svg>
                                    </a>
                                    <div class="d-flex breadcrumb-content">
                                        <div class="page-header">


                                        </div>
                                    </div>
                                    <ul class="navbar-nav flex-row ms-auto breadcrumb-action-dropdown">
                                        <li class="nav-item more-dropdown">
                                            <div class="dropdown  custom-dropdown-icon">
                                                <a class="dropdown-toggle btn" href="#" role="button"
                                                    id="customDropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span>Settings</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-chevron-down custom-dropdown-arrow">
                                                        <polyline points="6 9 12 15 18 9"></polyline>
                                                    </svg>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="customDropdown">

                                                    <a class="dropdown-item" data-value="Settings"
                                                        data-icon="<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; class=&quot;feather feather-settings&quot;><circle cx=&quot;12&quot; cy=&quot;12&quot; r=&quot;3&quot;></circle><path d=&quot;M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z&quot;></path></svg>"
                                                        href="javascript:void(0);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-settings">
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                            <path
                                                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                                            </path>
                                                        </svg> Settings
                                                    </a>

                                                    <a class="dropdown-item" data-value="Mail"
                                                        data-icon="<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; class=&quot;feather feather-mail&quot;><path d=&quot;M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z&quot;></path><polyline points=&quot;22,6 12,13 2,6&quot;></polyline></svg>"
                                                        href="javascript:void(0);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-mail">
                                                            <path
                                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                            </path>
                                                            <polyline points="22,6 12,13 2,6"></polyline>
                                                        </svg> Mail
                                                    </a>

                                                    <a class="dropdown-item" data-value="Print"
                                                        data-icon="<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; class=&quot;feather feather-printer&quot;><polyline points=&quot;6 9 6 2 18 2 18 9&quot;></polyline><path d=&quot;M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2&quot;></path><rect x=&quot;6&quot; y=&quot;14&quot; width=&quot;12&quot; height=&quot;8&quot;></rect></svg>"
                                                        href="javascript:void(0);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-printer">
                                                            <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                                            <path
                                                                d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2">
                                                            </path>
                                                            <rect x="6" y="14" width="12"
                                                                height="8"></rect>
                                                        </svg> Print
                                                    </a>

                                                    <a class="dropdown-item" data-value="Download"
                                                        data-icon="<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; class=&quot;feather feather-download&quot;><path d=&quot;M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4&quot;></path><polyline points=&quot;7 10 12 15 17 10&quot;></polyline><line x1=&quot;12&quot; y1=&quot;15&quot; x2=&quot;12&quot; y2=&quot;3&quot;></line></svg>"
                                                        href="javascript:void(0);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-download">
                                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                            <polyline points="7 10 12 15 17 10"></polyline>
                                                            <line x1="12" y1="15" x2="12"
                                                                y2="3"></line>
                                                        </svg> Download
                                                    </a>

                                                    <a class="dropdown-item" data-value="Share"
                                                        data-icon="<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; class=&quot;feather feather-share-2&quot;><circle cx=&quot;18&quot; cy=&quot;5&quot; r=&quot;3&quot;></circle><circle cx=&quot;6&quot; cy=&quot;12&quot; r=&quot;3&quot;></circle><circle cx=&quot;18&quot; cy=&quot;19&quot; r=&quot;3&quot;></circle><line x1=&quot;8.59&quot; y1=&quot;13.51&quot; x2=&quot;15.42&quot; y2=&quot;17.49&quot;></line><line x1=&quot;15.41&quot; y1=&quot;6.51&quot; x2=&quot;8.59&quot; y2=&quot;10.49&quot;></line></svg>"
                                                        href="javascript:void(0);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-share-2">
                                                            <circle cx="18" cy="5" r="3">
                                                            </circle>
                                                            <circle cx="6" cy="12" r="3">
                                                            </circle>
                                                            <circle cx="18" cy="19" r="3">
                                                            </circle>
                                                            <line x1="8.59" y1="13.51" x2="15.42"
                                                                y2="17.49"></line>
                                                            <line x1="15.41" y1="6.51" x2="8.59"
                                                                y2="10.49"></line>
                                                        </svg> Share
                                                    </a>

                                                </div>

                                            </div>
                                        </li>
                                    </ul>
                                </header>
                            </div>
                        </div>
                        <!--  END BREADCRUMBS  -->


                        <div class="page-title">
                            <h3>College</h3>
                        </div>

                        <div class="row layout-top-spacing">

                            <div class="col-md-12 layout-spacing">
                                <div class="widget widget-card-four">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="college-img">
                                                    <img src="{{ asset($college->image) }}"
                                                        style="width: 100%;height: 100%;" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-8 mt-4">
                                                <div class="">
                                                    <h4 class="mb-3" style="color: red;">
                                                        <b>{{ $college->college_name }}</b></h4>
                                                    <h4 class="mb-3"><b>Location:<span style="color: red;">
                                                                {{ $college->country_name }}</span></b></h4>
                                                    <h4 class="mb-3"><b>Fees:<span style="color: red;"></span></b></h4>
                                                                @if ($course)
                                                                    <p>Tuition fee: {{ $course->tuition_fee }}</p>
                                                                @else
                                                                    <p>N/A</p>
                                                                @endif
                                                                @if ($course)
                                                                    <p>Application fee: {{ $course->application_fee }}</p>
                                                                @else
                                                                    <p>N/A</p>
                                                                @endif
                                                                @if ($course)
                                                                    <p>{{ $course->description }}</p>
                                                                @else
                                                                    <p>N/A</p>
                                                                @endif
                                                                @if ($course)
                                                                    <h4>Addmission Requirements</h4>
                                                                    <p>{{ $course->requirement }}</p>
                                                                @else
                                                                    <p>N/A</p>
                                                                @endif


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="page-title">
                            <h3>Course List</h3>
                        </div>

                        <div class="row layout-top-spacing">

                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                <div class="widget-content widget-content-area br-8">
                                    <div id="ecommerce-list_wrapper"
                                        class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                        <div class="dt--top-section">
                                            <div class="row">
                                                <div
                                                    class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                                                    <div class="dataTables_length" id="ecommerce-list_length">
                                                        <label>Results
                                                            : <select name="ecommerce-list_length"
                                                                aria-controls="ecommerce-list" class="form-control">
                                                                <option value="7">7</option>
                                                                <option value="10">10</option>
                                                                <option value="20">20</option>
                                                                <option value="50">50</option>
                                                            </select></label></div>
                                                </div>
                                                <div
                                                    class="col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3">
                                                    <div id="ecommerce-list_filter" class="dataTables_filter"><label><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-search">
                                                                <circle cx="11" cy="11" r="8">
                                                                </circle>
                                                                <line x1="21" y1="21" x2="16.65"
                                                                    y2="16.65"></line>
                                                            </svg><input type="search" class="form-control"
                                                                placeholder="Search..."
                                                                aria-controls="ecommerce-list"></label></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="ecommerce-list" class="table dt-table-hover dataTable no-footer"
                                                style="width: 100%;" role="grid"
                                                aria-describedby="ecommerce-list_info">
                                                <thead>
                                                    <tr role="row">
                                                        <!--<th class="checkbox-column sorting_asc" rowspan="1"
                                                            colspan="1" aria-label="" style="width: 30px;">
                                                            <div class="form-check form-check-primary d-block new-control">
                                                                <input class="form-check-input chk-parent" type="checkbox"
                                                                    id="form-check-default">
                                                            </div>
                                                        </th>-->
                                                        <th class="sorting" tabindex="0" aria-controls="ecommerce-list"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Product: activate to sort column ascending"
                                                            style="width: 328px;">Course</th>
                                                        <th class="sorting" tabindex="0" aria-controls="ecommerce-list"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Added on: activate to sort column ascending"
                                                            style="width: 152px;">Tuition Fee</th>
                                                        <th class="sorting" tabindex="0" aria-controls="ecommerce-list"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Added on: activate to sort column ascending"
                                                            style="width: 152px;">Application Fee</th>
                                                        <th class="sorting" tabindex="0" aria-controls="ecommerce-list"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Status: activate to sort column ascending"
                                                            style="width: 166px;">Intake</th>
                                                        <th class="sorting" tabindex="0" aria-controls="ecommerce-list"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Price: activate to sort column ascending"
                                                            style="width: 89px;">Duration</th>
                                                        <th class="no-content text-center sorting" tabindex="0"
                                                            aria-controls="ecommerce-list" rowspan="1" colspan="1"
                                                            aria-label="Action: activate to sort column ascending"
                                                            style="width: 106px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($courses as $data)
                                                        <tr role="row">
                                                            <!--<td class="sorting_1">
                                                                <div
                                                                    class="form-check form-check-primary d-block new-control">
                                                                    <input class="form-check-input child-chk"
                                                                        type="checkbox" id="form-check-default">
                                                                </div>
                                                            </td>-->
                                                            <td>
                                                                <div
                                                                    class="d-flex justify-content-left align-items-center">
                                                                    <div class="avatar  me-3">
                                                                    </div>
                                                                    <div class="d-flex flex-column">
                                                                        <span
                                                                            class="text-truncate fw-bold">{{ $data->name }}</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>{{ $data->tuition_fee }}</td>
                                                            <td>{{ $data->application_fee }}</td>
                                                            <td><span class="badge badge-danger">{{ $data->intake }}</span>
                                                            </td>
                                                            <td>{{ $data->duration }}</td>
                                                            <td class="text-center">
                                                                <button type="button"
                                                                class="btn btn-ico btn-sm badge badge-sm btn-info"
                                                                data-toggle="modal"
                                                                data-target="#apply{{ $data->id }}"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Apply">
                                                                Apply
                                                            </button>
                                                                {{-- <div class="dropdown">
                                                                    <a class="dropdown-toggle" href="#"
                                                                        role="button" id="dropdownMenuLink1"
                                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-more-horizontal">
                                                                            <circle cx="12" cy="12"
                                                                                r="1"></circle>
                                                                            <circle cx="19" cy="12"
                                                                                r="1"></circle>
                                                                            <circle cx="5" cy="12"
                                                                                r="1"></circle>
                                                                        </svg>
                                                                    </a>

                                                                    <div class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenuLink1"
                                                                        style="">
                                                                        <a class="dropdown-item"
                                                                            href="javascript:void(0);">View</a>
                                                                        <a class="dropdown-item"
                                                                            href="javascript:void(0);">Edit</a>
                                                                        <a class="dropdown-item"
                                                                            href="javascript:void(0);">Delete</a>
                                                                    </div>
                                                                </div> --}}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        @foreach ($courses as $data)
<!-- Application Team  Modal -->
<div class="modal fade" id="apply{{ $data->id }}" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Check Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('std.applyCourse', $data->id)}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Select a Student to apply :</label>
                            <select name="student" class="form-control">
                                @foreach ($students as $student)
                                    <option value="{{$student->id}}">{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</option>
                                @endforeach
                            </select>
                        @error('student')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button class="btn btn-success">Apply</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal closed -->
@endforeach



                                        <div class="dt--bottom-section d-sm-flex justify-content-sm-between text-center">
                                            <div class="dt--pages-count  mb-sm-0 mb-3">
                                                <div class="dataTables_info" id="ecommerce-list_info" role="status"
                                                    aria-live="polite">Showing page 1 of 2</div>
                                            </div>
                                            <div class="dt--pagination">
                                                <div class="dataTables_paginate paging_simple_numbers"
                                                    id="ecommerce-list_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button page-item previous disabled"
                                                            id="ecommerce-list_previous"><a href="#"
                                                                aria-controls="ecommerce-list" data-dt-idx="0"
                                                                tabindex="0" class="page-link"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-arrow-left">
                                                                    <line x1="19" y1="12" x2="5"
                                                                        y2="12"></line>
                                                                    <polyline points="12 19 5 12 12 5"></polyline>
                                                                </svg></a></li>
                                                        <li class="paginate_button page-item active"><a href="#"
                                                                aria-controls="ecommerce-list" data-dt-idx="1"
                                                                tabindex="0" class="page-link">1</a></li>
                                                        <li class="paginate_button page-item "><a href="#"
                                                                aria-controls="ecommerce-list" data-dt-idx="2"
                                                                tabindex="0" class="page-link">2</a></li>
                                                        <li class="paginate_button page-item next"
                                                            id="ecommerce-list_next">
                                                            <a href="#" aria-controls="ecommerce-list"
                                                                data-dt-idx="3" tabindex="0" class="page-link"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-arrow-right">
                                                                    <line x1="5" y1="12" x2="19"
                                                                        y2="12"></line>
                                                                    <polyline points="12 5 19 12 12 19"></polyline>
                                                                </svg></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    </div>

                </div>
                <!--  BEGIN FOOTER  -->
                <!--  END FOOTER  -->
            </div>
            <!--  END CONTENT AREA  -->

        </div>
        <!-- END MAIN CONTAINER --

            

    </body>

    </html>
    
@endsection
