@php

$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp


<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-text mx-3">Admin</div>
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
            <li class="nav-item {{ ($prefix == '/users')?'active':'' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                    aria-expanded="true" aria-controls="collapseUsers">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Utilisateurs</span>
                </a>
                <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Utilisateurs</h6>
                        <a class="collapse-item" href="{{ route('users.view') }}">Liste Utilisateurs</a>
                        <a class="collapse-item" href="{{ route('users.add') }}">Ajouter Utilisateur</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item {{ ($prefix == '/adminProfile')?'active':'' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProfile"
                    aria-expanded="true" aria-controls="collapseProfile">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profil</span>
                </a>
                <div id="collapseProfile" class="collapse" aria-labelledby="headingProfile"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('adminprofile.view') }}">Mon Profil</a>
                        <a class="collapse-item" href="{{ route('adminpassword.view') }}">Changer mon mot de passe</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ ($prefix == '/gestion')?'active':'' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGestion"
                    aria-expanded="true" aria-controls="collapseGestion">
                    <i class="fas fa-fw fa-tools"></i>
                    <span>Gestion</span>
                </a>
                <div id="collapseGestion" class="collapse" aria-labelledby="headingGestion" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admincourse.view') }}">Cours</a>
                        <a class="collapse-item" href="{{ route('adminitem.view') }}">Elements</a>
                        <a class="collapse-item" href="{{ route('admincourseuser.view') }}">Inscriptions</a>
                        <a class="collapse-item" href="{{ route('admincomment.view') }}">Commentaires</a>
                        <a class="collapse-item" href="{{ route('adminview.view') }}">Vues</a>
                        <a class="collapse-item" href="{{ route('adminmatiere.view') }}">Matières</a>
                        <a class="collapse-item" href="{{ route('adminniveau.view') }}">Niveaux</a>
                        <div class="collapse-divider"></div>
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