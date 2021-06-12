@extends('admin.admin_master')
@section('admin')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('admin.body.header')

        <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" style="margin-top: 50px;">
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
                                            <th width=15%>Formatteur</th>
                                            <th width=10%>Matiere</th>
                                            <th width=10%>Niveau</th>
                                            <th width=25%>Description</th>
                                            <th width=20%>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $course)
                                        <tr>
                                            <th>{{ $key+1 }}</th>
                                            <th> <a href="{{ route('showcoursadmin.view', $course->id) }}"> {{ $course->titre }}</a></th>
                                            <th>{{ $course->user['name'] }}</th>
                                            <th>{{ $course->matiere['name'] }}</th>
                                            <th>{{ $course->niveau['name'] }}</th>
                                            <th>{{ $course->description }}</th>
                                            <th style="text-align: center;"><a href="{{ route('admincourse.edit', $course->id) }}" class="btn btn-info" id="edit" style="padding:10px 20px" >Modifier</a>     <a href="{{ route('admincourse.delete', $course->id) }}" class="btn btn-danger" id="delete" style="padding:10px 20px">Supprimer</a></th>
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