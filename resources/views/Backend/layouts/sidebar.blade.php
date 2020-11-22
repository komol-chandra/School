<nav class="sidebar-nav">
    <ul id="sidebarnav" class="p-t-30">
        <li class="sidebar-item {{ (request()->is('admin')) ? 'active' : '' }}">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin')}}" aria-expanded="false">
                <i class="mdi mdi-view-dashboard"></i>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item "> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class=" fas fa-university"></i><span class="hide-menu">Academic</span></a>
            <ul aria-expanded="false" class="collapse  first-level">
                <li class="sidebar-item">
                    <a href="{{ url('/admin/class')}}" class="sidebar-link">
                        <i class="mdi mdi-note-outline"></i>
                        <span class="hide-menu">Class</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{url('/admin/section')}}" class="sidebar-link">
                        <i class="mdi mdi-note-plus"></i>
                        <span class="hide-menu">Section</span>
                    </a>
                </li>
                <li class="sidebar-item {{ (request()->is('admin/subject')) ? 'active' : '' }}}">
                    <a href="{{ url('/admin/subject')}}" class="sidebar-link">
                        <i class="mdi mdi-note-outline"></i>
                        <span class="hide-menu">Subject</span>
                    </a>
                </li>
                <li class="sidebar-item {{ (request()->is('admin/classroom')) ? 'active' : '' }}}">
                    <a href="{{ url('/admin/classroom')}}" class="sidebar-link">
                        <i class="mdi mdi-note-outline"></i>
                        <span class="hide-menu">Class Room</span>
                    </a>
                </li>
                <li class="sidebar-item {{ (request()->is('admin/routine')) ? 'active' : '' }}}">
                    <a href="{{ url('/admin/routine')}}" class="sidebar-link">
                        <i class="mdi mdi-note-outline"></i>
                        <span class="hide-menu">Routine</span>
                    </a>
                </li>
                <li class="sidebar-item {{ (request()->is('admin/daily_attendance')) ? 'active' : '' }}}">
                    <a href="{{ url('/admin/daily_attendance')}}" class="sidebar-link">
                        <i class="mdi mdi-note-outline"></i>
                        <span class="hide-menu">Daily Attendance</span>
                    </a>
                </li>

                {{-- <li class="sidebar-item {{ (request()->is('admin/class_routine')) ? 'active' : '' }}}">
                    <a href="{{ url('/admin/class_routine')}}" class="sidebar-link">
                        <i class="mdi mdi-note-outline"></i>
                        <span class="hide-menu">Class Routine</span>
                    </a>
                </li> --}}

                <li class="sidebar-item {{ (request()->is('admin/syllabus')) ? 'active' : '' }}}">
                    <a href="{{ url('/admin/syllabus')}}" class="sidebar-link">
                        <i class="mdi mdi-note-outline"></i>
                        <span class="hide-menu">Syllabus</span>
                    </a>
                </li>
                <li class="sidebar-item {{ (request()->is('admin/department')) ? 'active' : '' }}}">
                    <a href="{{ url('/admin/department')}}" class="sidebar-link">
                        <i class="mdi mdi-note-outline"></i>
                        <span class="hide-menu">Department</span>
                    </a>
                </li>
                <li class="sidebar-item {{ (request()->is('admin/event_calendar')) ? 'active' : '' }}}">
                    <a href="{{ url('/admin/eventCalender')}}" class="sidebar-link">
                        <i class="mdi mdi-note-outline"></i>
                        <span class="hide-menu">Event Calender</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item "> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-user"></i><span class="hide-menu">User</span></a>
            <ul aria-expanded="false" class="collapse  first-level">
                <li class="sidebar-item">
                    <a href="{{ url('/admin/student')}}" class="sidebar-link">
                        <i class="fas fa-piggy-bank"></i>
                        <span class="hide-menu">Student & Guardian</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('/admin/teacher')}}" class="sidebar-link">
                        <i class="fas fa-piggy-bank"></i>
                        <span class="hide-menu">Teacher</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('/admin/staff')}}" class="sidebar-link">
                        <i class="fas fa-piggy-bank"></i>
                        <span class="hide-menu">Staff</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link  ">
                        <i class="mdi mdi-note-outline"></i>
                        <span class="hide-menu">Admin</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item "> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class=" fas fa-x-ray"></i><span class="hide-menu">Office</span></a>
            <ul aria-expanded="false" class="collapse  first-level">
                <li class="sidebar-item " style="margin-left: 20px;"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-book"></i><span class="hide-menu">Library</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li class="sidebar-item">
                            <a href="{{ url('/admin/library')}}" class="sidebar-link {{ (request()->is('admin/library')) ? 'active' : '' }}">
                                <i class="mdi mdi-note-outline"></i>
                                <span class="hide-menu">Book List</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('/admin/session/')}}" class="sidebar-link  {{ (request()->is('admin/session')) ? 'active' : '' }}">
                        <i class="mdi mdi-note-outline"></i>
                        <span class="hide-menu">Session Manager</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item">
                    <a href="" class="sidebar-link  {{ (request()->is('admin/library')) ? 'active' : '' }}">
                        <i class="mdi mdi-note-outline"></i>
                        <span class="hide-menu">Addon Manager</span>
                    </a>
                </li> --}}

                <li class="sidebar-item">
                    <a href="{{ url('/admin/notice/')}}" class="sidebar-link  {{ (request()->is('admin/notice')) ? 'active' : '' }}">
                        <i class="mdi mdi-note-outline"></i>
                        <span class="hide-menu">Noticeboard</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item "> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-cog"></i><span class="hide-menu">Settings</span></a>
            <ul aria-expanded="false" class="collapse  first-level">
                <li class="sidebar-item">
                    <a href="{{ url('/admin/system_setting')}}" class="sidebar-link">
                        <i class="fas fa-piggy-bank"></i>
                        <span class="hide-menu">System Settings</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('/admin/school_setting')}}" class="sidebar-link">
                        <i class="fas fa-piggy-bank"></i>
                        <span class="hide-menu">School Settings</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{url('/admin/website_setting')}}" class="sidebar-link">
                        <i class="fas fa-piggy-bank"></i>
                        <span class="hide-menu">WebSite Settings</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{url('/admin/about_developer')}}" class="sidebar-link">
                        <i class="fas fa-piggy-bank"></i>
                        <span class="hide-menu">About Developer</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
