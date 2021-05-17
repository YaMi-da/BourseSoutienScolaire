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
                            <h3 class="m-0 font-weight-bold text-primary">Liste de cours</h3>
                            <a href="" style="float:right;" class="btn rounded-pill btn-success mt-0">Ajouter Cours</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width=5%>#</th>
                                            <th width=15%>Titre</th>
                                            <th width=25%>Description</th>
                                            <th width=20%>Lien Session</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $course)
                                        <tr>
                                            <th>{{ $key+1 }}</th>
                                            <th>{{ $course->titre }}</th>
                                            <th>{{ $course->description }}</th>
                                            <th>{{ $course->session_url }}</th>
                                            <th><a href="" class="btn btn-info" id="edit">Modifier</a>     <a href="" class="btn btn-danger" id="delete">Supprimer</a></th>
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