@extends('students.students_master')
@section('students')

<link href="{{ asset('template/css/custom3-css.css') }}" rel="stylesheet">

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('students.body.header')

        <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-3 text-gray-800">Cours</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">Tous Les Cours</h3>
                        </div>
                        <div class="card-body">
                        <div class="row row-cols-md-5 g-4 justify-content-center">
                                        @foreach($allData as $key => $cours)
                                        <div class="booking-card" style="margin-left: 2%; margin-right: 2%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                <div class="book-container">
                                                <img src="{{ (!empty($matiere->image) ? url('upload/matiere_img/'.$matiere->image):url('upload/no_picture.png')) }}" class="card-img-top" style="width: 100%; height: 290px; object-fit: cover;"  alt="...">
                                                </div>
                                                <div class="informations-container" style="height: 235px;">
                                                <h2 class="title" style="color: black; font-size:20px">{{ $cours->titre }}</h2>
                                                <h6 class="text-muted" style="text-align: center;">Matiere: {{ $cours-> matiere['name'] }}</h6>
                                                <p class="card-text" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;text-align:justify;color:black">{{ $cours-> description }}</p>
                                                <ul class="list-group list-group-flush" style="text-align: center;">
                                                <h6 class="text-muted">Niveau: {{ $cours-> niveau['name'] }}</h6>
                                                </ul>
                                                <div class="more-information" style="text-align: right;">
                                                <a href="{{ route('showcourseleve.view', $cours->id) }}" class="btn btn-primary" id="access">Accéder au cours <i class="fas fa-arrow-right"></i></a>
                                                </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                        </div>
                    </div>
                </div>
    </div>
    @include('students.body.footer')
</div>


@endsection