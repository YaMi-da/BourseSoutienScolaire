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
			  <h4 class="box-title">Modifier Cours</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('admincomment.update', $editData->id) }}">
	 	@csrf
					  <div class="row">
						<div class="col-12">	
 

 

		<div class="form-group">
		<h5>Utilisateur</h5>
		<div class="controls">
	 <input type="number" name="user_id" id="user_id" style="width: 400px;" min="1" class="form-control" value="{{ $editData->uder_id }}"> 
	  </div>
		 
	</div>
 

	<div class="form-group">
		<h5>Cours</h5>
		<div class="controls">
	 <input type="name" name="course_id" id="course_id" style="width: 600px;" min="1" class="form-control" value="{{ $editData->user_id }}"> 
	  </div>
		 
	</div>

	<div class="form-group">
		<h5>Commentaire</h5>
		<div class="controls">
		<textarea type="text" name="body" id="body" style="width: 600px;" rows="6" class="form-control"></textarea>
	   </div>		 
	</div>
 
  
							 
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

@endsection