<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">

        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <span class="fw-bold text-info">{{ config('app.name') }}</span>
            </a>
        </div>

        <div class="navbar-collapse">

            <ul class="navbar-nav me-auto">
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                        href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>

                <li class="nav-item hidden-xs-down search-box"> <a
                        class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i
                            class="fa fa-search"></i></a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i
                                class="fa fa-times"></i></a>
                    </form>
                </li>
            </ul>

            <ul class="navbar-nav my-lg-0">

                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic"
                        href="user/profile/{{ Auth::user()->name }}" id="navbarDropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">

                        <img src="{{ Auth::user()->image !== null ? asset(Auth::user()->image) : asset('assets/img/default-profile.png') }}"
                            alt="user profil" />
                        <span class="hidden-md-down">{{ Auth::user()->name }} &nbsp;</span> </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> <a class="waves-effect waves-dark {{ $active === 'dashboard' ? 'active' : '' }}"
                        href="{{ route('dashboard') }}" aria-expanded="false"><i class="fa fa-tachometer"></i><span
                            class="hide-menu">Dashboard</span></a>
                </li>

                @if (Auth::user()->role === 'admin')
                <li> <a class="waves-effect waves-dark {{ $active === 'categories' ? 'active' : '' }}"
                        href="{{ route('categories') }}" aria-expanded="false"><i class="fa fa-tags"></i><span
                            class="hide-menu">Manajemen
                            Kategori</span></a>
                </li>
                @endif

                <li> <a class="waves-effect waves-dark {{ $active === 'posts' ? 'active' : '' }}"
                        href="{{ route('posts') }}" aria-expanded="false"><i class="fa fa-archive"></i><span
                            class="hide-menu">Manajemen
                            Post</span></a>
                </li>

                @if (Auth::user()->role === 'admin')
                <li> <a class="waves-effect waves-dark {{ $active === 'users' ? 'active' : '' }}"
                        href="{{ route('users') }}" aria-expanded="false"><i class="fa fa-user"></i><span
                            class="hide-menu">Manajemen
                            User</span></a>
                </li>
                @endif

                <li> <a class="waves-effect waves-dark {{ $active === 'profile' ? 'active' : '' }}"
                        href="user/profile/{{ Auth::user()->name }}" aria-expanded="false"><i
                            class="fa fa-user-circle-o"></i><span class="hide-menu">Profile</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{route('home')}}" aria-expanded="false"><i
                            class="fa fa-eye"></i><span class="hide-menu">Back to Home</span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>