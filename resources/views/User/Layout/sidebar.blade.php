<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ url('user/pelajaran') }}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Pelajaran</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('user/profile') }}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Profile</span>
                    </a>
                </li>

                

                <li class="menu-title">Auth</li>

                <li>
                    <form id="logoutUser" method="POST" action="{{ route('logout') }}" >
                        @csrf
                        <a onclick="event.preventDefault(); this.closest('form').submit();" class=" waves-effect">
                            <i class="ri-share-line"></i>
                            <span>Logout</span>
                        </a>
                    </form>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->