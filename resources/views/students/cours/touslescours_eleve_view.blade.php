@extends('students.students_master')
@section('students')

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
                                        <div class="card" style="margin-left: 2%; margin-right: 2%">
                                            <img src="{{ (!empty($cours->photo) ? url('upload/cours_img/'.$cours->photo):url('upload/no_picture.png')) }}" class="card-img-top" style="width: 100%; height: 25vh; object-fit: cover;"  alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title" style="text-align: center;">{{ $cours-> titre }}</h5>
                                                <p class="card-text" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;text-align:justify;color:black">{{ $cours-> description }}</p>
                                                <ul class="list-group list-group-flush" style="text-align: center;">
                                                <small class="text-muted">Vues: {{ $cours-> view_count }}</small>
                                                </ul>
                                            </div>
                                            <div class="card-footer" style="text-align:right;">
                                                <a href="{{ route('showcourseleve.view', $cours->id) }}" class="btn btn-primary" id="access">Accéder au cours <i class="fas fa-arrow-right"></i></a>
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