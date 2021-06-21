@extends('formatteur.formatteur_master')
@section('formatteur')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 <style>

@media (min-width: 0) {
    .g-mr-15 {
        margin-right: 1.07143rem !important;
    }
}
@media (min-width: 0){
    .g-mt-3 {
        margin-top: 0.21429rem !important;
    }
}

.g-height-50 {
    height: 60px;
}

.g-width-50 {
    width: 60px !important;
}

@media (min-width: 0){
    .g-pa-30 {
        padding: 2.14286rem !important;
    }
}

.g-bg-secondary {
    background-color: #fafafa !important;
}

.u-shadow-v18 {
    box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
}

.g-color-gray-dark-v4 {
    color: #777 !important;
}

.g-font-size-12 {
    font-size: 0.85714rem !important;
}

.media-comment {
    margin-top:20px
}
 </style>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('formatteur.body.header')

        <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" style="margin-top: 50px; background-color: #d5e6ff">
                        <div class="card-body">
                        <div class="container">
                        @php

                        $user = DB::table('users')->where('id', Auth::user()->id)->first();

                        @endphp
                        <form method="POST" action="{{ route('commentspost2') }}">
                            @csrf
                                <div class="form-group">
                                    <div class="controls" style="display:flex;">
                                    <input type="hidden" name="course_id" value="{{ $showData->id }}">
                                    <input type="hidden" name="course_title" value="{{ $showData->titre }}">
                                    <input type="hidden" name="course_user" value="{{ $showData->user_id }}">
                                        <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="{{ (!empty($user->image) ? url('upload/user_img/'.$user->image):url('upload/profile.png')) }}" alt="Image Description">
                                        <textarea type="text" name="body" id="body" class="form-control" rows="2" placeholder="Ajouter votre commentaire.." style="max-width:80%; border-radius:30px; padding-left:20px; padding-left:20px; padding-right:20px;"></textarea>
                                        <button type="submit" style="background-color:transparent;border: none;color: black;padding: 10px;text-align: center;text-decoration: none;display: inline-block;font-size: 20px; margin: 4px 2px;border-radius: 50%   "><i class="fa fa-paper-plane" aria-hidden="true"></i></button>        
                                    </div>  
                                                           
                                </div>
                            </form>  
                            <div class="row">                                            
                                @foreach($showData->comments as $comment)
                                <div class="col-md-10">
                                    <div class="media g-mb-30 media-comment">
                                        <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="{{ (!empty($comment->user['image']) ? url('upload/user_img/'.$comment->user['image']):url('upload/profile.png')) }}" alt="Image Description">
                                        <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30" style="border-radius: 10px;">
                                        <div class="g-mb-15">
                                        @php    
                                        Carbon\Carbon::setlocale('fr');
                                        @endphp
                                            <h5 class="h5 g-color-gray-dark-v1 mb-0" style="color: black; font-size:20px; font-weight: 600">{{ $comment->user['name'] }}</h5>
                                            <span class="g-color-gray-dark-v4 g-font-size-12">Posté le: {{ $comment->created_at->translatedFormat('D d/m/Y') }} à {{ $comment->created_at->translatedFormat('H:i') }}</span>
                                        </div>
                                    
                                        <p style="color: black; font-size:17px;">{{ $comment->body }}</p>
                                    
                                        <ul class=" d-sm-flex my-0">
                                            <li class="list-inline-item ml-auto">
                                            @if(Auth::user()->id== $comment->user_id)
                                            <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="{{ route('deletecomment3', $comment->id) }}" id="delete">
                                            <i class="fa fa-ban g-pos-rel g-top-1 g-mr-3"></i>Supprimer
                                            </a>
                                            @endif
                                            </li>
                                        </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
    </div>
    @include('formatteur.body.footer')
</div>


@endsection