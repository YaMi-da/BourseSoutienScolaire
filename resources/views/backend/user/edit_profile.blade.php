@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('admin.body.header')

        <div class="container-fluid">
            <h1 class="h3 mb-3 text-gray-800">Modifier Profil</h1>
            <div class="card shadow mb-4">
                <div class="card-body">
                <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Profile</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('adminprofile.store') }}" enctype="multipart/form-data">
	 	@csrf
					  <div class="row">
						<div class="col-12">	

 

    <div class="row">
	<div class="col-md-6" >

		<div class="form-group">
		<h5>Nom <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="name" id="name" class="form-control" value="{{ $editData->name }}">  </div>
		 
	</div>

	</div> <!-- End Col Md-6 -->

	<div class="col-md-6" >
		
 <div class="form-group">
		<h5>Email <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="email" name="email" id="email" class="form-control" value="{{ $editData->email }}">  </div>
		 
	</div>

	</div><!-- End Col Md-6 -->
	

</div> <!-- End Row -->


 <div class="row">
	<div class="col-md-6" >

		<div class="form-group">
		<h5>Téléphone <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="mobile" id="mobile" class="form-control" value="{{ $editData->mobile }}">  </div>
		 
	</div>

	</div> <!-- End Col Md-6 -->

	<div class="col-md-6" >
		
 <div class="form-group">
		<h5>Addresse <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="address" id="address" class="form-control" value="{{ $editData->address }}">  </div>
		 
	</div>

	</div><!-- End Col Md-6 -->
	

</div> <!-- End Row -->







<div class="row">
	

	<div class="col-md-6" >		
	<div class="form-group">
		<h5>Photo de profil <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="file" name="image" class="form-control" style="height: 50px;" id="image" >  </div>
	 </div>

	 	<div class="form-group">
		<div class="controls">
	<img id="showImage" class="rounded-circle" src="{{ (!empty($user->image) ? url('upload/user_img/'.$user->image):url('upload/profile.png')) }}" style="width: 100px; height: 100px; border: 1px solid #000000;"> 

	 </div>
	 </div>


	</div><!-- End Col Md-6 -->
	

</div> <!-- End Row -->



 
 
  
							 
						<div class="text-xs-right">
	 <input type="submit" class="btn btn-rounded btn-info mb-5" value="Modifier">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
                </div>
            </div>
                    
        </div>

        
    </div>
    @include('admin.body.footer')
    
    
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection 