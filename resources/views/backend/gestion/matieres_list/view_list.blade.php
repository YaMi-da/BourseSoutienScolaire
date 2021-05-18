@extends('admin.admin_master')
@section('admin')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('admin.body.header')

        <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-3 text-gray-800">Matieres</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">Matieres</h3>
                            <a href="{{ route('adminmatiere.add') }}" style="float:right;" class="btn rounded-pill btn-success mt-0">Ajouter Matiere</a>
                        </div>
                        <div class="card-body">
                                        <div class="row row-cols-md-5 g-4 justify-content-center">
                                        @foreach($allData as $key => $matiere)
                                        <div class="card" style="width: 20rem; margin-left: 2%; margin-right: 2%">
                                            <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title" style="text-align: center;">{{ $matiere-> name }}</h5>
                                            </div>
                                            <ul class="list-group list-group-flush" style="text-align: center;">
                                                <li class="list-group-item">Vues: {{ $matiere-> view_count }}</li>
                                                <li class="list-group-item"><a href="{{ route('adminmatiere.edit', $matiere->id) }}" class="btn btn-info" id="edit">Modifier</a>     <a href="{{ route('adminmatiere.delete', $matiere->id) }}" class="btn btn-danger" id="delete">Supprimer</a></li>
                                            </ul>
                                        </div>
                                        @endforeach
                                        </div>
                        </div>
                    </div>
                </div>
    </div>
    @include('admin.body.footer')
</div>


@endsection