@extends('students.students_master')
@section('students')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('students.body.header')

        <div class="container-fluid">

                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">Mon Profil</h3>
                        </div>
                        <div class="card-body">
                        <div class="box box-widget widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header" style="color: white; background-color:#4e73df">
					  <h3 class="widget-user-username">Nom Complet : {{ $user->name }}</h3>
					  <a href="{{ route('studentprofile.edit') }}" style="float:right;font-size :15px;padding: 10px 10px" class="btn rounded-pill btn-secondary mt-0">Modifier profil</a>
					  <h6 class="widget-user-desc">Email : {{ $user->email }}</h6>
					</div>
					<div class="widget-user-image">
					  <img class="rounded-circle" src="{{ (!empty($user->image) ? url('upload/user_img/'.$user->image):url('upload/profile.png')) }}"  style="width: 80px; height: 80px;" alt="User Avatar">
					</div>
					<div class="box-footer">
					  <div class="row">
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">Téléphone</h5>
							<span class="description-text">{{ $user->mobile }}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 bl-1">
						  <div class="description-block">
							<h5 class="description-header">Address</h5>
							<span class="description-text">{{ $user->address }}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 bl-1">
						  <div class="description-block">
							<h5 class="description-header">Niveau</h5>
							<span class="description-text">{{ $user->niveau_eleve }}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
					  </div>
					  <!-- /.row -->
					</div>
				  </div>
                        </div>
                    </div>
                </div>
    </div>
    @include('students.body.footer')
</div>


@endsection