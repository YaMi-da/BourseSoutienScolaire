@php

$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp


<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-text mx-3">Espace Formatteur</div>
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

            <!-- Nav Item - Utilities Collapse Menu -->


            <li class="nav-item {{ ($prefix == '/formatteurProfile')?'active':'' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProfile"
                    aria-expanded="true" aria-controls="collapseProfile">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profil</span>
                </a>
                <div id="collapseProfile" class="collapse" aria-labelledby="headingProfile"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('formatteurprofile.view') }}">Mon Profil</a>
                        <a class="collapse-item" href="{{ route('formatteurpassword.view') }}">Changer mon mot de passe</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Charts -->
            <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCours"
                    aria-expanded="true" aria-controls="collapseCours">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Cours</span>
                </a>
                <div id="collapseCours" class="collapse" aria-labelledby="headingCours" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"></h6>
                        <a class="collapse-item" href="">Tous les cours</a>
                        <a class="collapse-item" href="">Mes cours</a>
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