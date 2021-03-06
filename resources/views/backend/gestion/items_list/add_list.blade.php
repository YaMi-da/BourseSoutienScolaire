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
			  <h4 class="box-title">Ajouter Cours</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('adminitem.store') }}">
	 	@csrf
					  <div class="row">
						<div class="col-12">	
 

 

		<div class="form-group">
		<h5>Utilisateur</h5>
		<div class="controls">
	 <input type="number" name="user_id" id="user_id" style="width: 400px;" min="1" class="form-control"> 
	  </div>
		 
	</div>
 

	<div class="form-group">
		<h5>Cours</h5>
		<div class="controls">
	 <input type="number" name="course_id" id="course_id" style="width: 400px;" min="1" class="form-control"> 
	  </div>
		 
	</div>
 
	 
		
	<div class="form-group">
		<h5>Description</h5>
		<div class="controls">
	 <textarea type="text" name="description" id="description" style="width: 600px;" rows="6" class="form-control"  ></textarea>
	   </div>
		 
	</div>

	<div class="form-group">
		<h5>Vues</h5>
		<div class="controls">
	 <textarea type="number" name="view_count" id="view_count" style="width: 400px;" min="1" class="form-control"  ></textarea>
	   </div>
		 
	</div>

	<div class="form-group">
		<h5>Lien Session <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="url" name="session_url" id="session_url" style="width: 600px;" class="form-control" > 
	 @error('session_url')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
		 
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

@endsection