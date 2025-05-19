<div class="topbar-custom" style="margin-top: -70px; background-color: #FAFAFA;" >
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <ul class="mb-0 list-unstyled topnav-menu d-flex align-items-center">
                <li>
                    <button class="button-toggle-menu nav-link">
                        <i data-feather="menu" class="noti-icon"></i>
                    </button>
                </li>
                {{-- <li class="d-none d-lg-block">
                    <h5 class="mb-0">   <div>{{ Auth::user()->user_type }}</div></h5>
                </li> --}}
                <li class="d-none d-lg-block">
                    <div class="position-relative topbar-search">
                        <input style="border-radius: 10px" type="text" class="bg-white form-control bg-light ps-4" placeholder="Search name, email or role">
                        <i
                            class="mdi mdi-magnify fs-16 position-absolute text-muted top-50 translate-middle-y ms-2"></i>
                    </div>
                </li>
            </ul>

            <ul class="list-unstyled topnav-menu d-flex align-items-center">



                <li class="d-none d-sm-flex">
                    <button type="button" class="btn nav-link" data-toggle="fullscreen">
                        <i data-feather="maximize" class="align-middle fullscreen noti-icon"></i>
                    </button>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <i data-feather="bell" class="noti-icon"></i>

                    </a>

                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ url('assets/images/logo/Border-Haul-logo.png') }}" alt="user-image"
                            class="rounded-circle">
                        <span class="pro-user-name ms-1">
                            {{-- {{ Auth::user()->role }} --}}
                            <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                        <!-- item-->

                        @hasrole('Shipper')

                        <div class="dropdown-header noti-title">
                            <h6 class="m-0 text-overflow">Welcome! {{ Auth::user()->shipper->company_name }}</h6>
                        </div>
                        @endhasrole

                        @hasrole('Carrier')

                        <div class="dropdown-header noti-title">
                            <h6 class="m-0 text-overflow">Welcome! {{ Auth::user()->carrier->company_name }}</h6>
                        </div>
                        @endhasrole

                        <!-- item-->
                        @hasrole('Admin')
                            <a href="{{ route('profile.list') }}" class="dropdown-item notify-item">
                                <i class="align-middle mdi mdi-account-circle-outline fs-16"></i>
                                <span>My Account</span>


                                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                    @csrf
                                    <a href="{{ route('logout') }}" class="dropdown-item notify-item"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="align-middle mdi mdi-location-exit fs-16"></i>
                                        <span>Logout</span>
                                    </a>
                                </form>
                            </a>
                        @endhasrole
                        @hasrole('Carrier')
                            <a href="{{ route('carrier.profile.list') }}" class="dropdown-item notify-item">
                                <i class="align-middle mdi mdi-account-circle-outline fs-16"></i>
                                <span>My Account</span>
                            </a>
                        @endhasrole

                        @hasrole('Shipper')
                            <a href="{{ route('shipper.profile.list') }}" class="dropdown-item notify-item">
                                <i class="align-middle mdi mdi-account-circle-outline fs-16"></i>
                                <span>My Account</span>
                            </a>
                        @endhasrole


                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        @hasrole('Carrier')
                            <form method="POST" action="{{ route('carrier.logout') }}" id="logout-form">
                                @csrf
                                <a href="{{ route('carrier.logout') }}" class="dropdown-item notify-item"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="align-middle mdi mdi-location-exit fs-16"></i>
                                    <span>Logout</span>
                                </a>
                            </form>
                        @endhasrole

                        @hasrole('Shipper')
                            <form method="POST" action="{{ route('shipper.logout') }}" id="logout-form">
                                @csrf
                                <a href="{{ route('shipper.logout') }}" class="dropdown-item notify-item"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="align-middle mdi mdi-location-exit fs-16"></i>
                                    <span>Logout</span>
                                </a>
                            </form>
                        @endhasrole


                    </div>
                </li>

            </ul>
        </div>

    </div>

</div>
