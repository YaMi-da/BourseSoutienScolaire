@php

$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp


<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-text mx-3" style="font-weight: light;">Espace Eleve</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ ($route == 'dashboard')?'active':'' }} ">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de Bord</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item {{ ($prefix == '/eleveProfile')?'active':'' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProfile"
                    aria-expanded="true" aria-controls="collapseProfile">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profil</span>
                </a>
                <div id="collapseProfile" class="collapse" aria-labelledby="headingProfile"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('studentprofile.view') }}">Mon Profil</a>
                        <a class="collapse-item" href="{{ route('studentpassword.view') }}">Changer mon mot de passe</a>
                    </div>
                </div>
            </li>

            @php

            $users = DB::table('users')->where('id', Auth::user()->id)->first();

            @endphp


            <!-- Nav Item - Charts -->
            <li class="nav-item {{ ($prefix == '/coursEleve')?'active':'' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCours"
                    aria-expanded="true" aria-controls="collapseCours">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Cours</span>
                </a>
                <div id="collapseCours" class="collapse" aria-labelledby="headingCours" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('touslescourseleves.view') }}">Tous les cours</a>
                        <a class="collapse-item" href="{{ route('courseleves.view', $users->id) }}">Mes cours</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>