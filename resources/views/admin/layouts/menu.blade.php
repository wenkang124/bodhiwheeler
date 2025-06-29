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
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('admin') ? 'active' : '' }}"
                        href="{{ route('admin') }}" aria-expanded="false">
                        <i class="me-2 mdi mdi-chart-areaspline"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                @if(auth('admin')->user()->hasPermission('manage_admins') || auth('admin')->user()->hasPermission('manage_drivers'))
                <li class="nav-devider"></li>
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Account Management</span>
                </li>
                @endif
                @if(auth('admin')->user()->hasPermission('manage_admins'))
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('admin.admin') ? 'active' : '' }}"
                        href="{{ route('admin.admin') }}" aria-expanded="false">
                        <i class="me-2 mdi mdi-account-tie"></i>
                        <span class="hide-menu">Admins</span>
                    </a>
                </li>
                @endif
                @if(auth('admin')->user()->hasPermission('manage_drivers'))
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('admin.driver') ? 'active' : '' }}"
                        href="{{ route('admin.driver') }}" aria-expanded="false">
                        <i class="me-2 mdi mdi-van-utility"></i>
                        <span class="hide-menu">Drivers</span>
                    </a>
                </li>
                @endif
                <li class="nav-devider"></li>
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Bookings</span>
                </li>
                @if(auth('admin')->user()->hasPermission('create_bookings'))
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('admin.booking.create') ? 'active' : '' }}"
                        href="{{ route('admin.booking.create') }}" aria-expanded="false">
                        <i class="me-2 mdi mdi-plus-circle"></i>
                        <span class="hide-menu">Create Booking</span>
                    </a>
                </li>
                @endif
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('admin.booking.draft-booking') ? 'active' : '' }}"
                        href="{{ route('admin.booking.draft-booking') }}" aria-expanded="false">
                        <i class="me-2 mdi mdi-file-document-alert"></i>
                        <span class="hide-menu">Draft Booking</span>
                        @if (($draft_booking_count = \App\Models\Booking::isDraft()->count()) > 0)
                            <span class="badge badge-pill bg-success">{{ $draft_booking_count }}</span>
                        @endif
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('admin.booking.pending-approval') ? 'active' : '' }}"
                        href="{{ route('admin.booking.pending-approval') }}" aria-expanded="false">
                        <i class="me-2 mdi mdi-account-clock"></i>
                        <span class="hide-menu">Pending Approval</span>
                        @if (($pending_booking_count = \App\Models\Booking::isPendingReview()->count()) > 0)
                            <span class="badge badge-pill bg-success">{{ $pending_booking_count }}</span>
                        @endif
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('admin.booking.approved-booking') ? 'active' : '' }}"
                        href="{{ route('admin.booking.approved-booking') }}" aria-expanded="false">
                        <i class="me-2 mdi mdi-book-account"></i>
                        <span class="hide-menu">Approved Booking</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('admin.booking.rejected-booking') ? 'active' : '' }}"
                        href="{{ route('admin.booking.rejected-booking') }}" aria-expanded="false">
                        <i class="me-2 mdi mdi-account-cancel"></i>
                        <span class="hide-menu">Rejected Booking</span>
                    </a>
                </li>
                @if(auth('admin')->user()->hasPermission('manage_system_config'))
                <li class="nav-devider"></li>
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Others</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('admin.system-config') ? 'active' : '' }}"
                        href="{{ route('admin.system-config') }}" aria-expanded="false">
                        <i class="me-2 mdi mdi-database-cog-outline"></i>
                        <span class="hide-menu">System Configs</span>
                    </a>
                </li>
                @endif
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.logout') }}"
                        aria-expanded="false">
                        <i class="me-2 mdi mdi-logout"></i>
                        <span class="hide-menu">Logout</span>
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
