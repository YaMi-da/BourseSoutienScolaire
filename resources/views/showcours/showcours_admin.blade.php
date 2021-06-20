@extends('admin.admin_master')
@section('admin')

<link href="{{ asset('template/css/custom3-css.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('admin.body.header')

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
                                    <h1 style="font-weight: bold">{{ $showData->titre }}</h1>
                                </div>
                                <div class="row">
                                    <div  style="height: auto; display: block">
                                        <p style="font-size: 17px; white-space: pre-wrap; font-style:italic; color:#5b6378"><span style="font-weight: bold">Formateur :</span> <a style="color: black;" href="{{ route('formatteurprofile1', $showData->user['id']) }}">{{ $showData->user['name'] }}</a></p>
                                        <p style="font-size: 18px; white-space: pre-wrap ;color: black; text-align:justify">{{ $showData->description }}</p>
                                    </div>
                                </div>
                                
                            </div>
                            <div  class="col" style="width:25%; margin-left: 120px; padding-bottom:2%; padding-top:3%; text-align:center">
                                <div class="row">
                                    <div style="text-align: center;">
                                        @php    
                                        Carbon\Carbon::setlocale('fr');
                                        @endphp
                                        <p style="font-weight: bold; text-align:center; font-size:25px; color:black"> Créé le : </p>
                                        <p style="font-weight: bold; text-align:center; font-size:20px; color:#5b6378"> {{ $showData->created_at->translatedFormat('D d/m/Y') }}</p>
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
                            <div class="card-body" style="border-radius:2px; padding: 50px; padding-bottom:0px">
                                <div class="row" style="padding-left: 50px">
                                        <h1 style="font-weight: bold; color:black">Lien de la séance : </h1>
                                    </div>
                                    <div class="row" style="padding-left: 40px; padding-right: 40px; padding-top: 10px">
                                        <div style="height: auto; display: block;">
                                        @php    
                                        Carbon\Carbon::setlocale('fr');
                                        @endphp
                                        <p style="font-size: 18px; white-space: pre-wrap ;color: black; text-align:justify"><span style="font-weight: bold;">La séance aura lieu le :</span>  <i class="fas fa-fw fa-calendar-alt" style="color: #2e59d9;"></i> {{ Carbon\Carbon::parse($showData->debut_seance)->translatedFormat('D d/m/Y') }}       <span style="font-weight: bold;">{{ Carbon\Carbon::parse($showData->debut_seance)->translatedFormat('H:i') }} - {{ Carbon\Carbon::parse($showData->fin_seance)->translatedFormat('H:i') }}</span></p>
                                            <a href="{{ $showData->session_url }}" style="font-size: 18px; white-space: pre-wrap ;color: #2e59d9; text-align:justify">{{ $showData->session_url }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="border-radius:2px; padding: 50px">
                                <div class="row" style="padding-left: 50px" >
                                        <h1 style="font-weight: bold; color:black">Dans ce cours : </h1>
                                    </div>
                                    <div class="row" style="padding-left: 40px; padding-right: 40px; padding-top: 10px">
                                        <div style="height: auto; display: block;">
                                            <p style="font-size: 18px; white-space: pre-wrap ;color: black; text-align:justify">{{ $showData->incourse }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-4">
                            <div class="card mb-4" style="margin-left: 100px; ; border: none !important; width:65%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                <div class="card-body" style="border-radius:2px; padding-top: 50px; padding-bottom: 50px; padding-left: 60px; padding-right: 60px ;height:fit-content">
                                    <div class="row">
                                        <div style="height:auto ;display: block">
                                        <p style="font-size: 18px; white-space: pre-wrap ;color: black;"><i class="fas fa-fw fa-book"></i>   <span>{{$showData->matiere['name']}}</span></p>
                                            <p style="font-size: 18px; white-space: pre-wrap ;color: black;"><i class="fas fa-fw fa-graduation-cap"></i>   <span>{{$showData->niveau['name']}}</span></p>
                                            <p style="font-size: 18px; white-space: pre-wrap ;color: black;"><i class="fas fa-fw fa-book-reader"></i>   <a href="{{ route('subscribersview1', $showData->id) }}"><span>{{$enrolledcount}}</span></a></p>
                                            <p style="font-size: 18px; white-space: pre-wrap ;color: black;"><i class="fas fa-fw fa-comment"></i>   <a href="{{ route('commentsview1', $showData->id) }}"><span>{{$commentcount}}</span></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
    </div>
    </div>
    @include('admin.body.footer')
</div>


@endsection