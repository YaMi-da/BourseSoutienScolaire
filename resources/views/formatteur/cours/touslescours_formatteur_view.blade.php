@extends('formatteur.formatteur_master')
@section('formatteur')

<link href="{{ asset('template/css/custom3-css.css') }}" rel="stylesheet">

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('formatteur.body.header')

        <div class="container-fluid">

        

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" style="margin-top: 50px;">
                        <div class="card-header py-3" style="justify-content: center;">
                            <h3 class="m-0" style="color: black; font-size: 40px; font-weight:bold">Tous Les Cours</h3>
                        </div>
                        <div class="card-body" style="margin-top: 50px;">
                        <div class="row row-cols-md-5 g-4 justify-content-center">
                                        @foreach($allData as $key => $cours)
                                        <div class="booking-card" style="margin-left: 2%; margin-right: 2%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                <div class="book-container">
                                                <img src="{{ (!empty($cours->photo) ? url('upload/cours_img/'.$cours->photo):url('upload/no_picture.png')) }}" class="card-img-top" style="width: 100%; height: 330px; object-fit: cover;"  alt="...">
                                                </div>
                                                <div class="informations-container" style="height: 220px;">
                                                <h2 class="title" style="color: black; font-size:20px">{{ $cours->titre }}</h2>
                                                <ul class="list-group list-group-flush" style="text-align: center;">
                                                <h6 class="text-muted"> <span style="color: black; font-weight:bold">Cours Par :</span> {{ $cours-> user['name'] }}</h6>
                                                <h6 class="text-muted"> <span style="color: black; font-weight:bold">Niveau :</span> {{ $cours-> niveau['name'] }}</h6>
                                                <h6 class="text-muted"> <span style="color: black; font-weight:bold">Matière :</span> {{ $cours-> matiere['name'] }}</h6>
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