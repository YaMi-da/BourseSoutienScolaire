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
					  <h3 class="widget-user-username">Nom Complet : {{ $showData->name }}</h3>
                      <h6 class="widget-user-desc">Type : {{ $showData->usertype['user_type'] }}</h6>	
					  <h6 class="widget-user-desc">Email : {{ $showData->email }}</h6>
					</div>
					<div class="widget-user-image">
					  <img class="rounded-circle" src="{{ (!empty($showData->image) ? url('upload/user_img/'.$showData->image):url('upload/profile.png')) }}"  style="width: 80px; height: 80px;" alt="User Avatar">
					</div>
					<div class="box-footer">
					  <div class="row">
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">Téléphone</h5>
							<span class="description-text">{{ $showData->mobile }}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 bl-1">
						  <div class="description-block">
							<h5 class="description-header">Address</h5>
							<span class="description-text">{{ $showData->address }}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 bl-1">
						  <div class="description-block">
							<h5 class="description-header">Niveau</h5>
							<span class="description-text">{{ $showData->niveau_eleve }}</span>
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
    @include('formatteur.body.footer')
</div>


@endsection