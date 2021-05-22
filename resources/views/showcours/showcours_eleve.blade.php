@extends('students.students_master')
@section('students')

<link href="{{ asset('template/css/custom3-css.css') }}" rel="stylesheet">

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('students.body.header')

        <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="padding-left: 100px; padding-right: 100px; height: auto">
                        <div class="half-half-image-text" style="display: flex;">
                            <div class="row" style="width: 25%;">
                                <div class="col-12">
                                <img src="{{ (!empty($cours->photo) ? url('upload/cours_img/'.$matiere->photo):url('upload/no_picture.png')) }}" style="width: 100%; height: auto; object-fit: cover; " alt="">
                            </div>
                            </div>
                            <div style="display: block; width:100%; padding-left: 50px">
                                <div class="row">
                                    <div class="col-12 col-lg-8">
                                        <h1 style="font-weight: bold">{{ $showData->titre }} ({{ $showData->matiere['name'] }})</h1>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-12 col-lg-8">
                                    <div class="content" style="height: auto; display: block">
                                        <p style="font-size: 17px; white-space: pre-wrap; font-style:italic">Formatteur : {{ $showData->user['name'] }}</p>
                                        <p style="font-size: 18px; white-space: pre-wrap ;color: black; text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum euismod semper. Ut iaculis nisl sit amet elit consequat convallis. Vivamus vitae scelerisque lorem. Aliquam euismod in erat finibus lacinia. Mauris imperdiet enim ut pulvinar rutrum. In sodales ex a elit faucibus bibendum. Nulla viverra erat lacus, sit amet dignissim ligula maximus sit amet. Duis hendrerit, neque non aliquam rutrum, enim est condimentum orci, in rutrum est quam ac urna.</p>
                                        <p></p>
                                    </div>
                                </div>
                                </div>
                                
                            </div>
                            </div>
                            </div>
                            <div class="card-body">
                                
                            </div>
                    </div>
                </div>
    </div>
    @include('students.body.footer')
</div>


@endsection