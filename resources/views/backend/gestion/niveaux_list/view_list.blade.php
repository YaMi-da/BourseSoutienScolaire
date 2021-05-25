@extends('admin.admin_master')
@section('admin')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('admin.body.header')

        <div class="container-fluid">


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" style="margin-top: 50px;">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">Niveau</h3>
                            <a href="{{ route('adminniveau.add') }}" style="float:right;" class="btn rounded-pill btn-success mt-0">Ajouter Niveau</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width=5%>#</th>
                                            <th width=25%>Nom</th>
                                            <th width=20%>Vues</th>
                                            <th width=20%>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $niveau)
                                        <tr>
                                            <th>{{ $key+1 }}</th>
                                            <th>{{ $niveau->name }}</th>
                                            <th>{{ $niveau->view_count }}</th>
                                            <th><a href="{{ route('adminniveau.edit', $niveau->id) }}" class="btn btn-info" id="edit">Modifier</a>     <a href="{{ route('adminniveau.delete', $niveau->id) }}" class="btn btn-danger" id="delete">Supprimer</a></th>
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