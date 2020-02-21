<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu nav-list" id="side-menu">

            <li class="nav-header">
                @auth
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle" src="{{ asset('admin/img/admin.png') }}" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ ucfirst(Auth::user()->name) .' '. Auth::user()->last_name }}</strong>
                        </span> <span class="text-muted text-xs block">{{ Auth::user()->role_id == 1 ? 'Administrator' : 'Student'}}<b class="caret"></b></span> </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ route('profile') }}">Profile</a></li>
                        <li><a href="{{ route('password.change') }}">Change Password</a></li>
                        <li class="divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Log out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
                @endauth
            </li>

            @if(Auth::check() && Auth::user()->role_id == 1)

                 <li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
                    <a href="{{ url('dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                 </li>

                 <li class="{{ Request::is('notifications*') ? 'active' : '' }}">
                    <a href="{{ route('admin.notifications.index') }}"><i style="font-size: 14px" class="fa fa-bell"></i><span class="nav-label">Notifications</span></a>
                 </li>

                 <li class="{{ Request::is('users*', 'user*') ? 'active' : '' }}">
                    <a href="{{ Route('admin.users.index') }}"><i style="font-size: 14px" class="fa fa-users"></i><span class="nav-label">Users</span></a>
                 </li>

                 <li class="{{ Request::is('question-template*') ? 'active' : '' }}">
                    <a href="{{ route('admin.question-templates.index') }}"><i class="fa fa-file-text"></i><span class="nav-label">Question Template</span></a>
                 </li>

                 <li class="{{ Request::is('questions*') ? 'active' : '' }}">
                    <a href="{{ route('admin.questions.index') }}"><i style="font-size: 20px" class="fa fa-question"></i> <span class="nav-label">Questions</span></a>
                 </li>

                 <li class="{{ Request::is('departments*') ? 'active' : '' }}">
                    <a href="{{ route('admin.departments.index') }}"><i style="font-size: 14px" class="fa fa-users"></i><span class="nav-label">Departments</span></a>
                 </li>

                 <li class="{{ Request::is('subjects*') ? 'active' : '' }}">
                    <a href="{{ route('admin.subjects.index') }}"><i style="font-size: 14px" class="fa fa-book"></i><span class="nav-label">Subjects</span></a>
                 </li>
            @else
                <li>
                    <a href="#"><i style="font-size: 18px" class="fa fa-home" aria-hidden="true"></i><span class="nav-label">Home</span></a>
                </li>

                <li class="{{ Request::is('study*') ? 'active' : '' }}">
                    <a href="{{ route('study.select-subject') }}"><i style="font-size: 18px" class="fa fa-graduation-cap"></i><span class="nav-label">Study</span></a>
                </li>

                <li class="{{ Request::is('practice*') ? 'active' : '' }}">
                    <a href="{{ route('practice.select-subject') }}"><i style="font-size: 18px" class="fa fa-pinterest"></i> <span class="nav-label">Practice</span></a>
                </li>

                <li class="{{ Request::is('examination*') ? 'active' : '' }}">
                    <a href="{{ route('examination.prepare') }}"><i style="font-size: 18px" class="fa fa-thermometer-empty" aria-hidden="true"></i><span class="nav-label">Examination</span></a>
                </li>
            @endif
        </ul>
    </div>
</nav>