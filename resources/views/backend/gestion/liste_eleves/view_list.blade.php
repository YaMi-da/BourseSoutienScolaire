@extends('admin.admin_master')
@section('admin')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('admin.body.header')

        <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-3 text-gray-800">Eleves</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">Liste d'eleves</h3>
                            <a href="{{ route('users.add') }}" style="float:right;" class="btn rounded-pill btn-success mt-0">Ajouter Eleve</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width=5%>#</th>
                                            <th width=25%>Nom Complet</th>
                                            <th width=25%>Email</th>
                                            <th width=20%>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $eleve)
                                        <tr>
                                            <th>{{ $key+1 }}</th>
                                            <th>{{ $eleve->nom }}</th>
                                            <th>{{ $eleves->email }}</th>
                                            <th><a href="{{ route('users.edit', $eleve->id) }}" class="btn btn-info" id="edit">Modifier</a>     <a href="{{ route('users.delete', $eleve->id) }}" class="btn btn-danger" id="delete">Supprimer</a></th>
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