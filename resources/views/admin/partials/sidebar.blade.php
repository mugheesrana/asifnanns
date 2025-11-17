<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            <div class="profile-img"> <img src="{{asset('admin/assets/images/users/profile.png')}}" alt="user" />
                <!-- this is blinking heartbit-->
                <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span>
                </div>
            </div>
            <!-- User profile text-->
            <div class="profile-text">
                <h5>Markarn Doe</h5>
                <a href="{{ route('admin.users.edit', Auth::id()) }}" class="dropdown-toggle u-dropdown"
                    data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i
                        class="mdi mdi-settings"></i></a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0" data-toggle="tooltip" title="Logout">
                        <i class="mdi mdi-power"></i>
                    </button>
                </form>

                <div class="dropdown-menu animated flipInY">
                    <!-- text-->
                    <a href="{{ route('admin.users.edit', Auth::id()) }}" class="dropdown-item"><i class="ti-user"></i>
                        My Profile</a>

                    <!-- text-->
                    <div class="dropdown-divider"></div>
                    <!-- text-->
                    <a href="{{ route('admin.users.edit', Auth::id()) }}" class="dropdown-item"><i
                            class="ti-settings"></i> Account Setting</a>
                    <!-- text-->
                    <div class="dropdown-divider"></div>
                    <!-- text-->
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</button>
                    </form>
                    <!-- text-->
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-small-cap">PERSONAL</li>

                {{-- <li> <a class="has-arrow waves-effect waves-dark" href="{{ route('admin.users') }}"
                        aria-expanded="false"><i class="mdi mdi-human-greeting"></i><span
                            class="hide-menu">Users</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.users') }}">Users</a></li>
                        <li><a href="{{ route('admin.roles') }}">Roles</a></li>
                        <li><a href="{{ route('admin.permissions') }}">Permissions</a></li>
                    </ul>

                </li> --}}

                <li> <a class="has-arrow waves-effect waves-dark" href="{{ route('admin.cars.index') }}"
                        aria-expanded="false"><i class="mdi mdi-car"></i><span class="hide-menu">Cars
                            Management</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.cars.index') }}">All Cars</a></li>
                        {{-- <li><a href="{{ route('admin.cars.create') }}">Add New Car</a></li> --}}
                        <li><a href="{{ route('admin.brands.index') }}">Brands</a></li>
                        <li><a href="{{ route('admin.models.index') }}">Models</a></li>
                        <li><a href="{{ route('admin.versions.index') }}">Versions</a></li>
                    </ul>

                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="{{ route('admin.blogs.index') }}"
                        aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu">Blogs
                            Management</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.blogs.index') }}">All blogs</a></li>
                        <li><a href="{{ route('admin.blogs.create') }}">Add New Blog</a></li>

                    </ul>

                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="{{ route('admin.settings') }}"
                        aria-expanded="false"><i class="mdi mdi-settings"></i><span
                            class="hide-menu">Settings</span></a>
                </li>

              <li>
                    <a class="has-arrow waves-effect waves-dark" href="{{ route('admin.app-info') }}" aria-expanded="false">
                        <i class="mdi mdi-information-outline"></i>
                        <span class="hide-menu">App Info</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
