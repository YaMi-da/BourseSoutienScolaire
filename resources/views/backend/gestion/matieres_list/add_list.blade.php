@extends('admin.admin_master')
@section('admin')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('admin.body.header')

        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-body">
                <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Ajouter Matiere</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('adminmatiere.store') }}" enctype="multipart/form-data">
	 	@csrf
					  <div class="row">
						<div class="col-12">	
 

 

		<div class="form-group">
		<h5>Nom</h5>
		<div class="controls">
	 <input type="name" name="name" id="name" style="width: 400px;" class="form-control"> 
	  </div>
		 
	</div>
 
 
			
	<div class="form-group">
		<h5>Vues</h5>
		<div class="controls">
	 <input type="number" name="view_count" id="view_count" style="width: 400px;" min="0" class="form-control"  >
	   </div>
		 
	</div>
	
	<div class="form-group">
		<h5>Photo <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="file" name="image" class="form-control" style="height: 50px; width: 600px;" id="image" >  </div>
	 </div>
  
							 
						<div class="text-xs-right">
	 <input type="submit" class="btn btn-rounded btn-info mb-5" value="Ajouter">
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
