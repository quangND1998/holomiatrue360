@inject('request', 'Illuminate\Http\Request')
<div class="sidebar">

    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="asset/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                           {{ Auth::user()->name }}
                            <span class="user-level">{{ Auth::user()->roles[0]->name }}</span>
                        <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item {{ Request::segment(2) == 'dashboard' ? 'active' : null }}">
                    <a href="{{ route('admin.dashboard') }}" >
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        <span class="badge badge-count">5</span>
                    </a>
                </li>
                {{-- <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li> --}}

                @can('users_manage') 
                <li class="nav-item {{ $request->segment(2) == 'permissions' ? 'active ' : '' }} {{ $request->segment(2) == 'roles' ? 'active ' : '' }} {{ $request->segment(2) == 'users' ? 'active ' : '' }}">
                    <a data-toggle="collapse" href="#user">
                        <i class="fas fa-user"></i>
                        <p>Quản lý tài khoản</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="user">
                        <ul class="nav nav-collapse">
                            <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                                <a  href="{{ route('admin.permissions.index') }}">
                                    <span class="sub-item">Danh sách quyền</span>
                                </a>
                            </li>
                              <li  class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                                <a href="{{ route('admin.roles.index') }}">
                                    <span class="sub-item">Phân quyền</span>
                                </a>
                            </li>
                            <li  class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                                <a href="{{ route('admin.users.index') }}">
                                    <span class="sub-item">Danh sách nhân viên</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan

                <li class="nav-item {{ Request::segment(2) === 'project' ? 'active' : null }}">
                    <a href="{{ route('admin.project.index') }}" >
                        <i class="fas fa-tasks"></i>
                        <p>Dự án</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
