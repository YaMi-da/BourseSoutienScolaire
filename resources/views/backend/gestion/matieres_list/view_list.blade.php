@extends('admin.admin_master')
@section('admin')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('admin.body.header')

        <div class="container-fluid">


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">Matieres</h3>
                            <a href="{{ route('adminmatiere.add') }}" style="float:right;" class="btn rounded-pill btn-success mt-0">Ajouter Matiere</a>
                        </div>
                        <div class="card-body">
                                        <div class="row row-cols-md-5 g-4 justify-content-center">
                                        @foreach($allData as $key => $matiere)
                                        <div class="card" style="margin-left: 2%; margin-right: 2%">
                                            <img src="{{ (!empty($matiere->image) ? url('upload/matiere_img/'.$matiere->image):url('upload/no_picture.png')) }}" class="card-img-top" style="width: 100%; height: 25vh; object-fit: cover;"  alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title" style="text-align: center; color:black">{{ $matiere-> name }}</h5>
                                                <ul class="list-group list-group-flush" style="text-align: center;">
                                                <small class="text-muted">Vues: {{ $matiere-> view_count }}</small>
                                                </ul>
                                            </div>
                                            <div class="card-footer" style="text-align: center;">
                                                <a href="{{ route('adminmatiere.edit', $matiere->id) }}" class="btn btn-info" id="edit">Modifier</a>     <a href="{{ route('adminmatiere.delete', $matiere->id) }}" class="btn btn-danger" id="delete">Supprimer</a>
                                            </div>
                                            
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