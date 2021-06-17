<header>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<!-- Topbar Search -->
<form action="{{ route('formatteursearch') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Chercher cours..."
            aria-label="Search" aria-describedby="basic-addon2" name="query">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
            aria-labelledby="searchDropdown">
            <form action="{{ route('formatteursearch') }}" method="GET" class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Chercher cours..."
                        aria-label="Search" aria-describedby="basic-addon2" name="query">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>

    <!-- Nav Item - Alerts -->
    @unless (Auth::user()->unreadNotifications->isEmpty())
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter">{{ Auth::user()->unreadNotifications->count() }}</span>
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Notifications
            </h6>
            @foreach(Auth::user()->unreadNotifications as $notification)
            <div class="dropdown-item d-flex align-items-center">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-book text-white"></i>
                    </div>
                </div>
                <div>
                    <span class="font-weight-bold">{{ $notification->data['username'] }}</span> <span>{{ $notification->data['reply'] }}</span> <span class="font-weight-bold">{{ $notification->data['titreCours'] }}</span>
                </div>
                <div class="">
                    <a href="{{ route('markAsRead') }}" class=" ml-3 icon-circle bg-secondary">
                        <i class="fas fa-check text-white"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </li>
    @endunless


    <div class="topbar-divider d-none d-sm-block"></div>

    @php

    $user = DB::table('users')->where('id', Auth::user()->id)->first();

    @endphp

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
            <img class="img-profile rounded-circle"
                src="{{ (!empty($user->image) ? url('upload/user_img/'.$user->image):url('upload/profile.png')) }}">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="{{ route('formatteurprofile.view') }}">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profil
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('formatteur.logout') }}">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Se Déconnecter
            </a>
        </div>
    </li>

</ul>

</nav>
</header>
