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
			  <h4 class="box-title">Cours Utilisateur</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('admincourseuser.update', $editData->id) }}">
	 	@csrf
					  <div class="row">
						<div class="col-12">	
 

 

		<div class="form-group">
		<h5>Utilisateur</h5>
		<div class="controls">
	 <input type="number" name="user_id" id="user_id" min="1" style="width: 400px;" class="form-control" value="{{ $editData->user_id }}"> 
	  </div>
		 
	</div>


	<div class="form-group">
		<h5>Cours</h5>
		<div class="controls">
	 <input type="number" name="course_id" id="course_id" min="1" style="width: 400px;" class="form-control" value="{{ $editData->course_id }}"> 
	  </div>
		 
	</div>
 
	
	<div class="form-group">
		<h5>Status</h5>
		<div class="controls">
	 <input type="number" name="status" id="status" min="1" style="width: 400px;" class="form-control" value="{{ $editData->status }}"> 
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