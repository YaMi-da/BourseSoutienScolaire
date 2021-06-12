@extends('admin.admin_master')
@section('admin')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('admin.body.header')

        <div class="container-fluid">


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" style="margin-top: 50px;">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">Liste d'utilisateurs</h3>
                            <a href="{{ route('users.add') }}" style="float:right;" class="btn rounded-pill btn-success mt-0">Ajouter Utilisateur</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width=5%>#</th>
                                            <th>Type</th>
                                            <th>Nom Complet</th>
                                            <th>Email</th>
                                            <th width=25%>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $user)
                                        <tr>
                                            <th>{{ $key+1 }}</th>
                                            <th>{{ $user->usertype['user_type'] }}</th>
                                            <th>{{ $user->name }}</th>
                                            <th>{{ $user->email }}</th>
                                            <th style="text-align: center;"><a href="{{ route('users.edit', $user->id) }}" class="btn btn-info" id="edit" style="padding:10px 20px">Modifier</a>     <a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger" id="delete" style="padding:10px 20px">Supprimer</a></th>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    @include('admin.body.footer')
</div>


@endsection