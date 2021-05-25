@extends('admin.admin_master')
@section('admin')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('admin.body.header')

        <div class="container-fluid">
            <div class="card shadow mb-4" style="margin-top: 50px;">
                <div class="card-body">
                <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Niveau</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('adminniveau.update', $editData->id) }}">
	 	@csrf
					  <div class="row">
						<div class="col-12">	
 

 

		<div class="form-group">
		<h5>Name</h5>
		<div class="controls">
	 <input type="name" name="name" id="name" style="width: 400px;" class="form-control" value="{{ $editData->name }}"> 
	  </div>
		 
	</div>


	<div class="form-group">
		<h5>Vues</h5>
		<div class="controls">
	 <input type="number" name="view_count" id="view_count" min="1" style="width: 400px;" min="0" class="form-control" value="{{ $editData->view_count }}"> 
	  </div>
		 
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