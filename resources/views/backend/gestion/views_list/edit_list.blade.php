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
			  <h4 class="box-title">Modifier Vues</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('adminview.update') }}">
	 	@csrf
					  <div class="row">
						<div class="col-12">	
 

 

                        <div class="form-group">
		<h5>Utilisateur</h5>
		<div class="controls">
	 <input type="number" name="user_id" id="user_id" style="width: 400px;" min="1" class="form-control" value="{{ $editData->user_id }}> 
	  </div>
		 
	</div>

    <div class="form-group">
		<h5>Matiere</h5>
		<div class="controls">
	 <input type="number" name="matiere_id" id="matiere_id" style="width: 400px;" min="1" class="form-control" value="{{ $editData->matiere_id }}> 
	  </div>
		 
	</div>

    <div class="form-group">
		<h5>Niveau</h5>
		<div class="controls">
	 <input type="number" name="course_id" id="course_id" style="width: 400px;" min="1" class="form-control" value="{{ $editData->niveau_id }}> 
	  </div>
		 
	</div>
 

	<div class="form-group">
		<h5>Cours</h5>
		<div class="controls">
	 <input type="number" name="course_id" id="course_id" style="width: 400px;" min="1" class="form-control" value="{{ $editData->course_id }}> 
	  </div>
		 
	</div>

    <div class="form-group">
		<h5>Items</h5>
		<div class="controls">
	 <input type="number" name="item_id" id="item_id" style="width: 400px;" min="1" class="form-control" value="{{ $editData->item_id }}> 
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