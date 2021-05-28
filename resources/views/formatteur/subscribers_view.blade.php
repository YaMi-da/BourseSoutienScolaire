@extends('formatteur.formatteur_master')
@section('formatteur')

<link href="{{ asset('template/css/custom3-css.css') }}" rel="stylesheet">

<style>

.card {
  background-color: #fff;
  display: flex;
  flex-direction: column;
  overflow: hidden;
  border-radius: 2rem;
  box-shadow: 0px 1rem 1.5rem rgba(0,0,0,0.5);
}
.card .banner {
  background-color: #4e73df;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 10rem;
  display: flex;
  align-items: flex-end;
  justify-content: center;
  box-sizing: border-box;
}
.card .banner img {
  background-color: #fff;
  width: 8rem;
  height: 8rem;
  box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.3);
  border-radius: 50%;
  transform: translateY(50%);
  transition: transform 200ms cubic-bezier(0.18, 0.89, 0.32, 1.28);
}

.card .menu {
  width: 100%;
  height: 5.5rem;
  padding: 1rem;
  display: flex;
  align-items: flex-start;
  justify-content: flex-end;
  position: relative;
  box-sizing: border-box;
}

.card h2.name {
  text-align: center;
  padding: 0 2rem 0.5rem;
  margin: 0;
}

.card .actions {
  padding: 0 2rem 1.2rem;
  display: flex;
  flex-direction: column;
  order: 99;
}

.card .actions .follow-btn button {
  color: white;
  font: inherit;
  font-weight: bold;
  background-color: #4e73df;
  width: 100%;
  border: none;
  padding: 1rem;
  outline: none;
  box-sizing: border-box;
  border-radius: 1.5rem/50%;
  transition: background-color 200ms ease-in-out, transform 200ms cubic-bezier(0.18, 0.89, 0.32, 1.28);
}
.card .actions .follow-btn button:hover {
  background-color: #2e59d9;
}
.card .actions .follow-btn button:active {
  background-color: #2e59d9;
}


</style>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('formatteur.body.header')

        <div class="container-fluid">


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" style="margin-top: 50px;">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">Eleves inscrits dans ce cours</h3>
                        </div>
                        <div class="card-body">
                                        <div class="row row-cols-md-5 g-4 justify-content-center">
                                        @foreach($showData->users as $user) 
                                        <div class="card">
                                            <div class="banner"><img viewBox="0 0 100 100" src="{{ (!empty($user->image) ? url('upload/user_img/'.$user->image):url('upload/profile.png')) }}">
                                            </div>
                                            <div class="menu">    
                                            </div>
                                            <h2 class="name">{{ $user->name }}</h2>
                                            <div class="actions">
                                                <a href="{{ route('studentprofile2', $user->id) }}" class="follow-btn"><button>Voir Profil <i class="fas fa-arrow-right"></i></button></a>
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