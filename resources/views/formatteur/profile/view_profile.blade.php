@extends('formatteur.formatteur_master')
@section('formatteur')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('formatteur.body.header')

        <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" style="margin-top: 50px;">
                        <div class="card-body">
                <div class="box box-widget widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header" style="color: white; background-color:#4e73df">
					<a href="{{ route('formatteurprofile.edit') }}" style="float:right;font-size :15px;padding: 10px 10px" class="btn rounded-pill btn-secondary mt-0">Modifier profil</a>
					</div>
					<div class="widget-user-image" style="margin-left: -80px; top:60px">
					  <img class="rounded-circle" src="{{ (!empty($user->image) ? url('upload/user_img/'.$user->image):url('upload/profile.png')) }}"  style="width: 150px; height: 150px;" alt="User Avatar">
					</div>
					<div class="box-footer">
					  <div style="margin-top:60px; text-align:center;">
						  <h1 style="font-weight:600;color:black;">{{ $user->name }}</h1>
						  <h5 style="color:black; text-transform:uppercase">{{ $user->usertype['user_type'] }}</h5>
						  <div style="margin-top:10px; text-align:center;">
						  <span style="padding: 12px 30px; margin: .3125rem 1px;"><i class="fas fa-fw fa-phone" style="color: #4e73df;"></i> {{ $user->mobile }}</span>
						  <span style="padding: 12px 30px; margin: .3125rem 1px;"><i class="fas fa-fw fa-envelope" style="color: #4e73df;"></i> {{ $user->email }}</span>
						  <span style="padding: 12px 30px; margin: .3125rem 1px;"><i class="fas fa-fw fa-book" style="color: #4e73df;"></i> {{ $user->matiere_formatteur }}</span>
						  <span style="padding: 12px 30px; margin: .3125rem 1px;"><i class="fas fa-fw fa-map-marker-alt" style="color: #4e73df;"></i> {{ $user->address }}</span>
						  </div>
					  </div>
					  <!-- /.row -->
					</div>
				</div>
                        </div>
                    </div>
                </div>
    </div>
    @include('formatteur.body.footer')
</div>


@endsection