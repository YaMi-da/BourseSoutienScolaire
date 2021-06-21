@extends('admin.admin_master')
@section('admin')

<link href="{{ asset('template/css/custom3-css.css') }}" rel="stylesheet">

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('admin.body.header')

        <div class="container-fluid">


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" style="margin-top: 50px;">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">Matières</h3>
                            <a href="{{ route('adminmatiere.add') }}" style="float:right;" class="btn rounded-pill btn-success mt-0">Ajouter Matière</a>
                        </div>
                        <div class="card-body">
                                        <div class="row row-cols-md-5 g-4 justify-content-center">
                                        @foreach($allData as $key => $matiere)
                                        
                                            <div class="booking-card" style="margin-left: 2%; margin-right: 2%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                <div class="book-container">
                                                <img src="{{ (!empty($matiere->image) ? url('upload/matiere_img/'.$matiere->image):url('upload/no_picture.png')) }}" class="card-img-top" style="width: 100%; height: 330px; object-fit: cover;"  alt="...">
                                                </div>
                                                <div class="informations-container">
                                                <h2 class="title">{{ $matiere->name }}</h2>
                                                <div class="more-information">
                                                <a href="{{ route('adminmatiere.edit', $matiere->id) }}" class="btn btn-info" id="edit">Modifier</a>     <a href="{{ route('adminmatiere.delete', $matiere->id) }}" class="btn btn-danger" id="delete">Supprimer</a>
                                                </div>
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