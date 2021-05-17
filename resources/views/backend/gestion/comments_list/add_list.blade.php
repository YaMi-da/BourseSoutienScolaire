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
			  <h4 class="box-title">Ajouter Commentaire</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('admincomment.store') }}">
	 	@csrf
					  <div class="row">
						<div class="col-12">	
 

 

		<div class="form-group">
		<h5>Utilisateur</span></h5>
		<div class="controls">
	 <input type="number" name="user_id" id="user_id" min="1" style="width: 400px;" class="form-control" > 
	  </div>
		 
	</div>
 
	<div class="form-group">
		<h5>Cours</h5>
		<div class="controls">
	 <input type="number" name="course_id" id="course_id" min="1" style="width: 400px;" class="form-control" > 
	  </div>
		 
	</div>
		
	<div class="form-group">
		<h5>Commentaire</h5>
		<div class="controls">
	 <textarea type="text" name="body" id="body" style="width: 600px;" rows="6" class="form-control"  ></textarea>
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