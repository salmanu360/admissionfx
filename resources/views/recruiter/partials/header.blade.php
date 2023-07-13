@php
    use App\Models\RecruiterNotes;
    use App\Models\Recruiter;
@endphp
<div class="header-container">
    <header class="header navbar navbar-expand-sm">

        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>
        @if (auth()->user()->role == 'student')
        <div class="nav-logo align-self-center">
            <a class="navbar-brand" href="#"><img alt="logo" src="{{asset('modern-light-menu/assets/img/ub.png')}}"> 
                <span class="navbar-brand-name">University Bureau</span>
            </a>
        </div>
            @elseif(auth()->user()->role == 'recruiter')
            <div class="nav-logo align-self-center">
                <a class="navbar-brand" href="#"><img alt="logo" src="{{asset('modern-light-menu/assets/img/ub.png')}}"> 
                    <!--<span class="navbar-brand-name">University Bureau</span>-->
                </a>
            </div>
            @elseif(auth()->user()->role == 'rm')
            <div class="nav-logo align-self-center">
                <a class="navbar-brand" href="#"><img alt="logo" src="{{asset('modern-light-menu/assets/img/ub.png')}}"> 
                    <!--<span class="navbar-brand-name">University Bureau</span>-->
                </a>
            </div>
            @else
            <div class="nav-logo align-self-center">
                <a class="navbar-brand" href="{{ route('admin.index') }}"> 
                    <span class="navbar-brand-name"><img alt="logo" src="{{asset('modern-light-menu/assets/img/ub.png')}}"></span>
                </a>
            </div>
        @endif

        <ul class="navbar-item flex-row mr-auto">
            <li class="nav-item align-self-center search-animated">
                <form class="form-inline search-full form-inline search" role="search">
                    <div class="search-bar">
                        <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                    </div>
                </form>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </li>
        </ul>
        
         <ul class="navbar-item flex-row mr-auto">
            <li><a href="{{ route('std.create') }}"><button class="btn btn-success"><i class="fa fa-plus"></i> Add Student</button></a></li>
        </ul>
        
        <ul class="navbar-item flex-row mr-auto">
            <li><button class="btn btn-info" data-toggle="modal"data-target="#viewNotes"><i class="fa fa-plus"></i> View Notes</button></li>
        </ul>

        <ul class="navbar-item flex-row nav-dropdowns">
            
            <li class="nav-item dropdown message-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="messageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg><span class="badge badge-success"></span>
                </a>
                <div class="dropdown-menu p-0 position-absolute animated fadeInUp" aria-labelledby="messageDropdown">
                    <div class="">
                        <a class="dropdown-item">
                            <div class="">

                                <div class="media">
                                    <div class="user-img">
                                        <div class="avatar avatar-xl">
                                            <span class="avatar-title rounded-circle">KY</span>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="">
                                            <h5 class="usr-name">Kara Young</h5>
                                            <p class="msg-title">ACCOUNT UPDATE</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="">
                                <div class="media">
                                    <div class="user-img">
                                        <div class="avatar avatar-xl">
                                            <span class="avatar-title rounded-circle">DA</span>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="">
                                            <h5 class="usr-name">Daisy Anderson</h5>
                                            <p class="msg-title">ACCOUNT UPDATE</p>
                                        </div>
                                    </div>
                                </div>                                    
                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="">

                                <div class="media">
                                    <div class="user-img">
                                        <div class="avatar avatar-xl">
                                            <span class="avatar-title rounded-circle">OG</span>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="">
                                            <h5 class="usr-name">Oscar Garner</h5>
                                            <p class="msg-title">ACCOUNT UPDATE</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>
                </div>
            </li>

            @php
                $notifications = \App\Models\Notification::where('created_at', '>=', \Carbon\Carbon::now()->subDays(15))
                                ->whereNull('read_at')->orderBy('created_at', 'DESC')->get()
            @endphp
            <li class="nav-item dropdown notification-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-bell">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                    <span class="badge badge-success"></span>
                </a>
                <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="notificationDropdown"
                     style="overflow-y: auto;">
                    <div class="notification-scroll">
                        @foreach($notifications as $notification)
                            @if ($notification->notifiable_type == 'App\Models\College')
                                @php
                                    $college = \App\Models\College::where('id', $notification->notifiable_id)
                                    ->where('created_by',auth()->user()->id)
                                    ->where('created_by_name',auth()->user()->name)->first();
                                @endphp
                                @if($college)
                                    <div class="dropdown-item">
                                        <div class="media server-log">
                                            <div class="media-body">
                                                <div class="data-info">
                                                    <h6>
                                                        <a href="{{url('/college/getDetail', $notification->notifiable_id)}}">{{$notification->data}}
                                                            by {{$notification->created_by}} ({{$notification->role}}
                                                            )</a></h6>
                                                    <p class="">{{ Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}
                                                        <br>
                                                        <span class="badge bg-light-info">Unread</span>
                                                        <a href="{{route('notification-read', $notification->id)}}">
                                                            <span class="badge bg-light-danger"> Mark as read</span>
                                                        </a>
                                                    </p>
                                                </div>

                                                <div class="icon-status">
                                                    <a href="{{route('notification-read', $notification->id)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-x markAsRead"
                                                             data-id="{{$notification->id}}">
                                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @elseif($notification->notifiable_type == 'App\Models\Course')
                                @php
                                    $course = \App\Models\Course::where('id', $notification->notifiable_id)
                                    ->where('created_by',auth()->user()->id)
                                    ->where('created_by_name',auth()->user()->name)->first();
                                @endphp
                                @if($course)
                                    <div class="dropdown-item">
                                        <div class="media server-log">
                                            <div class="media-body">
                                                <div class="data-info">
                                                    <h6>
                                                        <a href="{{url('/course/getDetail', $notification->notifiable_id)}}">{{$notification->data}}
                                                            by {{$notification->created_by}} ({{$notification->role}}
                                                            )</a></h6>
                                                    <p class="">{{ Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}
                                                        <br>
                                                        <span class="badge bg-light-info">Unread</span>
                                                        <a href="{{route('notification-read', $notification->id)}}">
                                                            <span class="badge bg-light-danger"> Mark as read</span>
                                                        </a>
                                                    </p>
                                                </div>

                                                <div class="icon-status">
                                                    <a href="{{route('notification-read', $notification->id)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-x markAsRead"
                                                             data-id="{{$notification->id}}">
                                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @elseif ($notification->notifiable_type == 'App\Models\Recruiter')
                                @php
                                    $recruiter = \App\Models\Recruiter::where('id', $notification->notifiable_id)
                                    ->where('created_by',auth()->user()->id)
                                    ->where('created_by_name',auth()->user()->name)->first();
                                @endphp
                                @if($recruiter)
                                    <div class="dropdown-item">
                                        <div class="media server-log">
                                            <div class="media-body">
                                                <div class="data-info">
                                                    <h6>
                                                        <a href="{{url('/recruiter/getDetail', $notification->notifiable_id)}}">{{$notification->data}}
                                                            by {{$notification->created_by}} ({{$notification->role}}
                                                            )</a></h6>
                                                    <p class="">{{ Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}
                                                        <br>
                                                        <span class="badge bg-light-info">Unread</span>
                                                        <a href="{{route('notification-read', $notification->id)}}">
                                                            <span class="badge bg-light-danger"> Mark as read</span>
                                                        </a>
                                                    </p>
                                                </div>

                                                <div class="icon-status">
                                                    <a href="{{route('notification-read', $notification->id)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-x markAsRead"
                                                             data-id="{{$notification->id}}">
                                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @elseif($notification->notifiable_type =='App\Models\Student')
                                @php
                                    $student = \App\Models\Student::where('id', $notification->notifiable_id)
                                    ->where('created_by',auth()->user()->id)
                                    ->where('created_by_name',auth()->user()->name)->first();
                                @endphp
                                @if($student)
                                    <div class="dropdown-item">
                                        <div class="media server-log">
                                            <div class="media-body">
                                                <div class="data-info">
                                                    <h6>
                                                        <a href="{{url('/student/getDetail', $notification->notifiable_id)}}">{{$notification->data}}
                                                            by {{$notification->created_by}} ({{$notification->role}}
                                                            )</a></h6>
                                                    <p class="">{{ Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}
                                                        <br>
                                                        <span class="badge bg-light-info">Unread</span>
                                                        <a href="{{route('notification-read', $notification->id)}}">
                                                            <span class="badge bg-light-danger"> Mark as read</span>
                                                        </a>
                                                    </p>

                                                </div>

                                                <div class="icon-status">
                                                    <a href="{{route('notification-read', $notification->id)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-x markAsRead"
                                                             data-id="{{$notification->id}}">
                                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif

                        @endforeach


                    </div>
                </div>
            </li>

            <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media">
                        <img src="{{asset('modern-light-menu/assets/img/favicon-32x32.png')}}" class="img-fluid"
                             alt="admin-profile">
                        <div class="media-body align-self-center">
                            <h6><span>Hi,</span> {{Auth::user()->name}}</h6>
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="user-profile-dropdown">
                    <div class="">
                        @if (auth()->user()->role == 'student')
                        <div class="dropdown-item">
                            <a class="" href="{{route('student.profile')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
                        </div>
                        @elseif (auth()->user()->role == 'recruiter')
                        <div class="dropdown-item">
                            <a class="" href="{{route('recruiter.profile')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
                        </div>
                        @elseif (auth()->user()->role == 'rm')
                        <div class="dropdown-item">
                            <a class="" href="{{route('rm.profile')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
                        </div>
                        @else
                        <div class="dropdown-item">
                            <a class="" href="{{route('admin.profile')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
                        </div>
                        @endif
                        <div class="dropdown-item">
                            <a class="" href="apps_mailbox.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> Inbox</a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="auth_lockscreen.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> Lock Screen</a>
                        </div>
                        @if (auth()->user()->role == 'recruiter' || auth()->user()->role == 'rm' || auth()->user()->role == 'student')
                        <div class="dropdown-item">
                            <form method="POST" action="{{ route('role.logout') }}">
                                @csrf
                                <a class="" href="{{route('role.logout')}}" onclick="event.preventDefault();this.closest('form').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line></svg> Log Out
                                </a>
                            </form>

                        </div>
                        @else
                        <div class="dropdown-item">
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <a class="" href="{{route('admin.logout')}}" onclick="event.preventDefault();this.closest('form').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line></svg> Log Out
                                </a>
                            </form>

                        </div>
                        @endif
                    </div>
                </div>

            </li>
        </ul>
    </header>
</div>

<div class="modal fade" id="viewNotes" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3"> Notes of {{auth()->user()->name}} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                    <table class="table table-bordered table-hover">
                        @php
                            $notes = RecruiterNotes::join('recruiters', 'recruiters.id', 'recruiter_notes.recruiter_id')
                            ->join('users', 'users.id', 'recruiters.user_id')
                            ->where('recruiters.user_id', auth()->user()->id)
                            ->get();
                       @endphp
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Notes</th>
                                <th>Created by</th>
                                <th>Created Date</th>
                            </tr>
                        </thead>
                        @foreach ($notes as $note)
                        <tbody>
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$note->notes}}</td>
                                <td>{{$note->created_by_name}}</td>
                                <td>{{date('M Y', strtotime($note->created_at))}}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>