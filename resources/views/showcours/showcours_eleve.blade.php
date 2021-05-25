@extends('students.students_master')
@section('students')

<link href="{{ asset('template/css/custom3-css.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('students.body.header')

        <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="padding-left: 100px; padding-right: 100px; height: auto; background-color: #9bb3fb">
                        <div class="half-half-image-text col" style="display: flex;">
                            <div style="width: 15%;">
                                <img src="{{ (!empty($cours->photo) ? url('upload/cours_img/'.$matiere->photo):url('upload/no_picture.png')) }}" style="width: 100%; height: auto; object-fit: cover; " alt="">
                            </div>
                            <div class="col-8" style="width:100%; padding-left: 50px">
                                <div class="row">
                                    <h1 style="font-weight:650">{{ $showData->titre }}</h1>
                                </div>
                                <div class="row">
                                    <div class="content" style="height: auto; display: block">
                                        <p style="font-size: 17px; white-space: pre-wrap; font-style:italic; color:#5b6378">Formatteur : {{ $showData->user['name'] }}</p>
                                        <p style="font-size: 18px; white-space: pre-wrap ;color: black; text-align:justify">{{ $showData->description }}</p>
                                    </div>
                                </div>
                                
                            </div>
                            <div  class="col" style="width:25%; margin-left: 120px; padding-bottom:2%; padding-top:5%; text-align:center">
                                <div class="row">
                                    <div style="text-align: center;">
                                        @php    
                                        Carbon\Carbon::setlocale('fr');
                                        @endphp
                                        <p style="font-weight: bold; text-align:center; font-size:20px; color:#5b6378">{{ $showData->created_at->translatedFormat('D d/m/Y') }}</p>
                                        <a href="" style="float:none; padding: 10px 35px; text-align:center" class="btn rounded-pill btn-success mt-0">S'incrire</a>
                                    </div>
                                </div>
                                <div class="row">
                                
                                </div>
                                
                            </div>
                            
                            </div>
                    </div>
                    <div class="card-body" style="display: flex; justify-content:space-around">
                        <div class="col">
                            <div class="card mb-4" style="margin-left: 50px; border: none !important; width:100%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                <div class="card-body" style="border-radius:2px; padding: 50px">
                                <div class="row" style="padding-left: 50px">
                                        <h1 style="font-weight: bold; color:black">Dans ce cours : </h1>
                                    </div>
                                    <div class="row" style="padding-left: 40px; padding-right: 40px">
                                        <div class="content" style="height: auto; display: block;">
                                            <p style="font-size: 18px; white-space: pre-wrap ;color: black; text-align:justify">{{ $showData->description }}</p>
                                            <p style="font-size: 18px; white-space: pre-wrap ;color: black; text-align:justify">{{ $showData->description }}</p>
                                            <p style="font-size: 18px; white-space: pre-wrap ;color: black; text-align:justify">{{ $showData->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-4">
                            <div class="card mb-4" style="margin-left: 100px; ; border: none !important; width:65%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                <div class="card-body" style="border-radius:2px; padding-top: 50px; height:fit-content">
                                    <div class="row" style="padding-right: 40px">
                                        <div class="content" style="height:auto ;display: block">
                                            <p style="font-size: 18px; white-space: pre-wrap ;color: black;"><i class="fas fa-fw fa-book"></i>   <span>{{$showData->matiere['name']}}</span></p>
                                            <p style="font-size: 18px; white-space: pre-wrap ;color: black;"><i class="fas fa-fw fa-graduation-cap"></i>   <span>{{$showData->niveau['name']}}</span></p>
                                            <p style="font-size: 18px; white-space: pre-wrap ;color: black;"><i class="fas fa-fw fa-eye"></i>   <span>{{$showData->view_count}}</span></p>
                                            <p style="font-size: 18px; white-space: pre-wrap ;color: black;"><i class="fas fa-fw fa-book-reader"></i>   <span>{{$showData->enrolled_count}}</span></p>
                                            <p style="font-size: 18px; white-space: pre-wrap ;color: black;"><i class="fas fa-fw fa-comment"></i>   <span>Commentaires</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
    </div>
</div>
    @include('students.body.footer')
</div>


@endsection