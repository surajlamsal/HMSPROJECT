<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('/')}}" class="nav-link">Home</a>
            </li>
            {{--@can('dashboard-list')--}}
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('/dashboard')}}" class="nav-link">Dashboard</a>
            </li>
            {{--@endcan--}}
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <!-- Navbar Search -->
            <li hidden class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                   aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Messages Dropdown Menu -->
            <li hidden class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{asset('dist/img/user1-128x128.jpg')}}" alt="User Avatar"
                                 class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{asset('dist/img/user8-128x128.jpg')}}" alt="User Avatar"
                                 class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{asset('dist/img/user3-128x128.jpg')}}" alt="User Avatar"
                                 class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li hidden class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="btn btn-primary" href="{{url('logout')}}">Logout</a>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{asset('/')}}" class="brand-link">
            <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Administrative </span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{{ isset(\Illuminate\Support\Facades\Auth::user()->name) ?
                    \Illuminate\Support\Facades\Auth::user()->name : \Illuminate\Support\Facades\Auth::user()->email
                     }}}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                           aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="{{url('dashboard')}}" class="nav-link">
                            <i class="nav-icon fas fa-utensils"></i>
                            <p>HMS</p>
                        </a>
                    </li>
                    @if( Gate::check('floor-list') || Gate::check('amenities-list')  || Gate::check('role-list')  || Gate::check('roomtype-list') || Gate::check('room-list')  || Gate::check('department-list')  || Gate::check('housekeeping-list')   || Gate::check('shift-list')  || Gate::check('halltype-list') )
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-cog"></i>
                                <p>
                                    Hotel Configuration
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('floor-list')
                                    <li class="nav-item">
                                        <a href="{{url('/floor')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Manage Floor</p>
                                        </a>
                                    </li>
                                @endcan

                                @can('amenities-list')
                                    <li class="nav-item">
                                        <a href="{{url('/amenities')}}" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Amenities</p>
                                        </a>
                                    </li>
                                @endcan

                                @can('role-list')

                                    <li class="nav-item">
                                        <a href="{{url('/role')}}" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Role</p>
                                        </a>
                                    </li>
                                @endcan

                                @can('roomtype-list')

                                    <li class="nav-item">
                                        <a href="{{url('/roomtype')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Room Type</p>
                                        </a>
                                    </li>
                                @endcan

                                @can('room-list')

                                    <li class="nav-item">
                                        <a href="{{url('/room')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Room </p>
                                        </a>
                                    </li>
                                @endcan

                                @can('department-list')

                                    <li class="nav-item">
                                        <a href="{{url('/department')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Department </p>
                                        </a>
                                    </li>
                                @endcan

                                @can('housekeeping-list')
                                    <li class="nav-item">
                                        <a href="{{url('/housekeeping')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Housekeeping</p>
                                        </a>
                                    </li>
                                @endcan

                                @can('shift-list')

                                    <li class="nav-item">
                                        <a href="{{url('/shift')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Shift </p>
                                        </a>
                                @endcan

                                @can('halltype-list')

                                    <li class="nav-item">
                                        <a href="{{url('/halltype')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Hall</p>
                                        </a>

                                    </li>
                                @endcan


                            </ul>
                        </li>
                    @endif
                    @can('guest-list')

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Guest
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('/guest')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Guest List</p>
                                    </a>

                                </li>
                            </ul>
                        </li>
                    @endcan

                    @if( Gate::check('users-list') || Gate::check('role-list') )
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-users"></i>
                                <p>
                                    Users and Roles
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('users-list')
                                    <li class="nav-item">
                                        <a href="{{url('/users')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Users List</p>
                                        </a>

                                    </li>
                                @endcan
                                @can('role-list')
                                    <li class="nav-item">
                                        <a href="{{url('/role')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Role List</p>
                                        </a>

                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endif


                    {{--@can('employee-list')

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>
                                Employee
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/employee')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Employee List</p>
                                </a>
                                </i>
                        </ul>
                    </li>
                    @endcan--}}

                    @if( Gate::check('reservation-list') || Gate::check('checkout-list') )
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-book-open"></i>
                                <p>
                                    Reservation
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('reservation-list')
                                    <li class="nav-item">
                                        <a href="{{url('/reservation')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Reservation List</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('checkout-list')
                                    <li class="nav-item">
                                        <a href="{{url('/checkout')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Checkout List</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endif


                    @can('reservationcalendar-list')


                        <li class="nav-item">
                            <a href="{{url('/reservationcalendar')}}" class="nav-link">
                                <i class="far fa-calendar-alt"></i>
                                <p>Reservation Calender</p>
                            </a>
                        </li>
                    @endcan



                        <li class="nav-item">
                            <a href="{{url('/find-rooms')}}" class="nav-link">
                                <i class="fas fa-arrows-alt"></i>
                                <p>Find Room</p>
                            </a>
                        </li>

                    @can('food-list')
                        <li class="nav-item">
                            <a href="{{url('/food')}}" class="nav-link ">
                                <i class="fas fa-pizza-slice"></i>
                                <p>List Of Food</p>
                            </a>
                        </li>
                    @endcan

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
