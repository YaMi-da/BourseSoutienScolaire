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
			  <h4 class="box-title">Changer mot de passe</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('password.update') }}">
	 	@csrf
					  <div class="row">
						<div class="col-12">	
 

 

		<div class="form-group">
		<h5>Mot de passe actuel <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="password" name="oldpassword" id="current_password" style="width: 400px;" class="form-control" > 
	 @error('oldpassword')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
		 
	</div>
 
	 
		
	<div class="form-group">
		<h5>Nouveau mot de passe <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="password" name="password" id="password" style="width: 400px;" class="form-control"  >
      @error('password')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	   </div>
		 
	</div>

		<div class="form-group">
		<h5>Confirmer Mot de passe  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="password" name="password_confirmation" style="width: 400px;" id="password_confirmation" class="form-control" >
    @error('password_confirmation')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror

	   </div>
		 
	</div>
 
  
							 
						<div class="text-xs-right">
	 <input type="submit" class="btn btn-rounded btn-info mb-5" value="Changer">
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