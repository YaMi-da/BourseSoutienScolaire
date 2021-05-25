@extends('formatteur.formatteur_master')
@section('formatteur')

<link href="{{ asset('template/css/custom3-css.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;900&display=swap" rel="stylesheet">

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('formatteur.body.header')

        <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" style="margin-top: 50px;">
                        <div class="card-header py-3">
                            <h3 class="m-0" style="color: black; font-size: 40px; font-weight:bold;">Tous Les Cours</h3>
                            <a href="{{ route('coursformatteur.add') }}" style="float:right;" class="btn rounded-pill btn-success mt-0">Ajouter Cours</a>
                        </div>
                        <div class="card-body" style="margin-top: 50px;">
                        <div class="row row-cols-md-5 g-4 justify-content-center">
                                        @foreach($courses as $key => $cours)
                                        <div class="booking-card" style="margin-left: 2%; margin-right: 2%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                <div class="book-container">
                                                <img src="{{ (!empty($cours->photo) ? url('upload/cours_img/'.$cours->photo):url('upload/no_picture.png')) }}" class="card-img-top" style="width: 100%; height: 330px; object-fit: cover;"  alt="...">
                                                </div>
                                                <div class="informations-container" style="height: 220px;">
                                                <h2 class="title" style="color: black; font-size:20px">{{ $cours->titre }}</h2>
                                                <p class="card-text" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;text-align:justify;color:black">{{ $cours-> description }}</p>
                                                <ul class="list-group list-group-flush" style="text-align: center;">
                                                <h6 class="text-muted">Vues: {{ $cours-> view_count }}</h6>
                                                </ul>
                                                <div class="more-information" style="text-align: right;">
                                                <a href="{{ route('showcoursformatteur.view', $cours->id) }}" class="btn btn-primary" id="access">Accéder au cours <i class="fas fa-arrow-right"></i></a>
                                                </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                        </div>
                    </div>
                </div>
    </div>
    @include('formatteur.body.footer')
</div>


@endsection