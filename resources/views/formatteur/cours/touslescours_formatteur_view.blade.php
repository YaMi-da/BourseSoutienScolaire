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
                        </div>
                        <div class="card-body">
                                        <div class="row row-cols-md-5 g-4 justify-content-center">
                                        @foreach($allData as $key => $cours)
                                        <div class="card" style="margin-left: 2%; margin-right: 2%">
                                            <img src="{{ (!empty($cours->photo) ? url('upload/cours_img/'.$cours->photo):url('upload/no_picture.png')) }}" class="card-img-top" style="width: 100%; height: 25vh; object-fit: cover;"  alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title" style="text-align: center;">{{ $cours-> title }}</h5>
                                                <p class="card-text">{{ $cours-> description }}</p>
                                                <ul class="list-group list-group-flush" style="text-align: center;">
                                                <small class="text-muted">Vues: {{ $matiere-> view_count }}</small>
                                                </ul>
                                            </div>
                                            <div class="card-footer" style="text-align: center;">
                                                <a href="" class="btn btn-info" id="edit">Accéder au cours</a>
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