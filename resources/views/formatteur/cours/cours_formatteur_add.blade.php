@extends('formatteur.formatteur_master')
@section('formatteur')

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

                @php

                $users = DB::table('users')->where('id', Auth::user()->id)->first();

                @endphp
	 <form method="post" action="{{ route('coursformatteur.store', $users->id) }}">
	 	@csrf
					  <div class="row">
						<div class="col-12">	
 

 

		<div class="form-group">
		<h5>Titre <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="name" name="titre" id="titre" style="width: 400px;" class="form-control" > 
	 @error('titre')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
		 
	</div>

	<div class="form-group">
    <label for="matiere_id"><h5>Matiere <span class="text-danger">*</span></h5></label>
    <select class="form-control" id="matiere_id" name= "matiere_id" style="width: 400px;">
		@foreach($matieres as $matiere)
      	<option value="{{ $matiere->id }}">{{ $matiere->name }}</option>
		@endforeach
      
    </select>
  	</div>
 
	 
		
	<div class="form-group">
		<h5>Description</h5>
		<div class="controls">
	 <textarea type="text" name="description" id="description" style="width: 600px;" rows="6" class="form-control"  ></textarea>
	   </div>
		 
	</div>


	<div class="form-group">
	<label for="user_id"><h5>Formatteur <span class="text-danger">*</span></h5></label>
    <select class="form-control" id="user_id" name= "user_id" style="width: 400px;">
    @php

    $users = DB::table('users')->where('id', Auth::user()->id)->first();

    @endphp
      	<option value="{{ $users->id }}">{{ $users->name }}</option>
      
    </select>
		 
	</div>

	<div class="form-group">
	<label for="niveau_id"><h5>Niveaux <span class="text-danger">*</span></h5></label>
    <select class="form-control" id="niveau_id" name= "niveau_id" style="width: 400px;">
		@foreach($niveaux as $niveau)
      	<option value="{{ $niveau->id }}">{{ $niveau->name }}</option>
		@endforeach
      
    </select>
		 
	</div>

	<div class="form-group">
		<h5>Vues <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="number" name="view_count" id="view_count" style="width: 400px;" min="0" class="form-control"  >
	 @error('view_count')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	   </div>
		 
	</div>

	<div class="form-group">
		<h5>Eleves Inscrits <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="number" name="enrolled_count" id="enrolled_count" style="width: 400px;" min="0" class="form-control"  >
	 @error('enrolled_count')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	   </div>
		 
	</div>


	<div class="form-group">
		<h5>Photo <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="file" name="photo" class="form-control" style="height: 50px; width: 600px;" id="photo" >  </div>
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
    @include('formatteur.body.footer')
    
    
</div>

@endsection