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

	 <form method="post" action="{{ route('admincourse.update', $editData->id) }}">
	 	@csrf
					  <div class="row">
						<div class="col-12">	
 

 

		<div class="form-group">
		<h5>Titre</h5>
		<div class="controls">
	 <input type="name" name="titre" id="titre" style="width: 400px;" class="form-control" value="{{ $editData->titre }}"> 
	  </div>
		 
	</div>
 
	 
		
	<div class="form-group">
		<h5>Description</h5>
		<div class="controls">
		<textarea type="text" name="description" id="description" style="width: 600px;" rows="6" class="form-control"></textarea>
	   </div>		 
	</div>

	<div class="form-group">
		<h5>Lien Session</h5>
		<div class="controls">
	 <input type="url" name="session_url" id="session_url" style="width: 600px;" class="form-control" value="{{ $editData->session_url }}"> 
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