<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Reporting</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('admin') ? 'active' : '' }}" href="{{route('admin')}}" aria-expanded="false">
                        <i class="me-2 mdi mdi-chart-areaspline"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-devider"></li>
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Account Management</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('admin.admin') ? 'active' : '' }}" href="{{route('admin.admin')}}" aria-expanded="false">
                        <i class="me-2 mdi mdi-account-tie"></i>
                        <span class="hide-menu">Admins</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('admin.driver') ? 'active' : '' }}" href="{{route('admin.driver')}}" aria-expanded="false">
                        <i class="me-2 mdi mdi-van-utility"></i>
                        <span class="hide-menu">Drivers</span>
                    </a>
                </li>
                <li class="nav-devider"></li>
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Bookings</span>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('admin.booking.pending-approval') ? 'active' : '' }}" href="{{route('admin.booking.pending-approval')}}" aria-expanded="false">
                            <i class="me-2 mdi mdi-account-clock"></i>
                            <span class="hide-menu">Pending Approval</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('admin.booking.approved-booking') ? 'active' : '' }}" href="{{route('admin.booking.approved-booking')}}" aria-expanded="false">
                            <i class="me-2 mdi mdi-book-account"></i>
                            <span class="hide-menu">Approved Booking</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('admin.booking.rejected-booking') ? 'active' : '' }}" href="{{route('admin.booking.rejected-booking')}}" aria-expanded="false">
                            <i class="me-2 mdi mdi-account-cancel"></i>
                            <span class="hide-menu">Rejected Booking</span>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
