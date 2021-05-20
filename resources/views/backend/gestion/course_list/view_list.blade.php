@extends('admin.admin_master')
@section('admin')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('admin.body.header')

        <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-3 text-gray-800">Cours</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">Cours</h3>
                            <a href="{{ route('admincourse.add') }}" style="float:right;" class="btn rounded-pill btn-success mt-0">Ajouter Cours</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width=5%>#</th>
                                            <th width=15%>Titre</th>
                                            <th width=20%>Formatteur | Matiere</th>
                                            <th width=25%>Description</th>
                                            <th width=5%>Vues</th>
                                            <th width=5%>Eleves inscrits</th>
                                            <th width=20%>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $course)
                                        <tr>
                                            <th>{{ $key+1 }}</th>
                                            <th> <a href="{{ route('showcours.view', $course->id) }}"> {{ $course->titre }}</a></th>
                                            <th>{{ $course->user['name'] }} | {{ $course->matiere['name'] }}</th>
                                            <th>{{ $course->description }}</th>
                                            <th>{{ $course->view_count }}</th>
                                            <th>{{ $course->enrolled_count }}</th>
                                            <th><a href="{{ route('admincourse.edit', $course->id) }}" class="btn btn-info" id="edit">Modifier</a>     <a href="{{ route('admincourse.delete', $course->id) }}" class="btn btn-danger" id="delete">Supprimer</a></th>
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