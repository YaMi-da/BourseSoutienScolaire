@extends('admin.admin_master')
@section('admin')

<style>
    .custom-field {
    position: relative;
    font-size: 14px;
    border-top: 20px solid transparent;
    margin-bottom: 5px;
    --field-padding: 12px;
    }

    .custom-field input {
    border: none;
    -webkit-appearance: none;
    -ms-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background: #f2f2f2;
    padding: var(--field-padding);
    border-radius: 10px;
    width: 250px;
    outline: none;
    font-size: 14px;
    }

    .custom-field .placeholder {
    position: absolute;
    left: var(--field-padding);
    width: calc(100% - (var(--field-padding) * 2));
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    top: 22px;
    line-height: 100%;
    transform: translateY(-50%);
    color: #aaa;
    transition: 
        top 0.3s ease,
        color 0.3s ease,
        font-size 0.3s ease;
    }

    .custom-field input.dirty + .placeholder,
    .custom-field input:focus + .placeholder,
    .custom-field input:not(:placeholder-shown) + .placeholder {
    top: -10px;
    font-size: 10px;
    color: #222;
    }

    .custom-field .error-message {
    width: 100%;
    display: flex;
    align-items: center;
    padding: 0 8px;
    font-size: 12px;
    background: #d30909;
    color: #fff;
    height: 24px;
    }

    .custom-field .error-message:empty {
    opacity: 0;
    }

    /* ONE */
    .custom-field.one input {
    background: none;
    border: 2px solid #ddd;
    transition: border-color 0.3s ease;
    }

    .custom-field.one input + .placeholder {
    left: 8px;
    padding: 0 5px;
    }

    .custom-field.one input.dirty,
    .custom-field.one input:not(:placeholder-shown),
    .custom-field.one input:focus {
    border-color: #224abe;
    transition-delay: 0.1s
    }

    .custom-field.one input.dirty + .placeholder,
    .custom-field.one input:not(:placeholder-shown) + .placeholder,
    .custom-field.one input:focus + .placeholder {
    top: 0;
    font-size: 10px;
    color: #222;
    background: #fff;
    width: auto
    }

    .custom-field.one select {
    background: none;
    border: 2px solid #ddd;
    transition: border-color 0.3s ease;
    }

    .custom-field.one select + .placeholder {
    left: 8px;
    padding: 0 5px;
    }

    .custom-field.one select.dirty,
    .custom-field.one select:not(:placeholder-shown),
    .custom-field.one select:focus {
    border-color: #224abe;
    transition-delay: 0.1s
    }

    .custom-field.one select.dirty + .placeholder,
    .custom-field.one select:not(:placeholder-shown) + .placeholder,
    .custom-field.one select:focus + .placeholder {
    top: 0;
    font-size: 10px;
    color: #222;
    background: #fff;
    width: auto
    }

    .custom-field select {
    border: none;
    -webkit-appearance: none;
    -ms-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background: #f2f2f2;
    padding: var(--field-padding);
    border-radius: 10px;
    width: 250px;
    outline: none;
    font-size: 14px;
    }

	.custom-field.one textarea {
    background: none;
    border: 2px solid #ddd;
    transition: border-color 0.3s ease;
    }

    .custom-field.one textarea + .placeholder {
    left: 8px;
    padding: 0 5px;
    }

    .custom-field.one textarea.dirty,
    .custom-field.one textarea:not(:placeholder-shown),
    .custom-field.one textarea:focus {
    border-color: #224abe;
    transition-delay: 0.1s
    }

    .custom-field.one textarea.dirty + .placeholder,
    .custom-field.one textarea:not(:placeholder-shown) + .placeholder,
    .custom-field.one textarea:focus + .placeholder {
    top: 0;
    font-size: 10px;
    color: #222;
    background: #fff;
    width: auto
    }

    .custom-field textarea {
    border: none;
    -webkit-appearance: none;
    -ms-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background: #f2f2f2;
    padding: var(--field-padding);
    border-radius: 10px;
    width: 250px;
    outline: none;
    font-size: 14px;
    }


    .select::after {
    content: '\25BC';
    position: absolute;
    top: 30%;
    height: 100%;
    right: 0;
    padding: 0 1em;
    cursor: pointer;
    pointer-events: none;
    -webkit-transition: .25s all ease;
    -o-transition: .25s all ease;
    transition: .25s all ease;
    }
    /* Transition */
    .select:hover::after {
    color: #224abe;
    }

</style>

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
			  <h4 class="box-title">Modifier Cours</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('admincourse.update', $editData->id) }}" enctype="multipart/form-data">
	 	@csrf
					  <div class="row" style="margin-left: 30px;">
						<div class="col-12">

						<div class="col-md-6">
							<div class="form-group">
								<label class="custom-field one">
									<input type="name" id="titre" name="titre" style="width: 400px;" required value="{{ $editData->titre }}" placeholder=" "/>
									<span class="placeholder">Titre</span>
								</label>
							</div>	
						</div>

						<div class="col-md-6" >

                            <div class="form-group">
                        	<label for="matiere_id" class="custom-field one">
                            	<div class="select">
                                	<select name="matiere_id" id="matiere_id" required style="width: 400px;">
                                    	<option value="" selected="" disabled="">Matière</option>
                                    	@foreach($matieres as $matiere)
										<option value="{{ $matiere->id }}">{{ $matiere->name }}</option>
										@endforeach 
                                	</select>
                                	</div>
                                                                                                                            
                        	</label>
                    		</div>
                		</div>

						<div class="col-md-6" >

                            <div class="form-group">
                        	<label for="niveau_id" class="custom-field one">
                            	<div class="select">
                                	<select name="niveau_id" id="niveau_id" required style="width: 400px;">
                                    	<option value="" selected="" disabled="">Niveau</option>
                                    	@foreach($niveaux as $niveau)
										<option value="{{ $niveau->id }}">{{ $niveau->name }}</option>
										@endforeach 
                                	</select>
                                	</div>
                                                                                                                            
                        	</label>
                    		</div>
                		</div>

						<div class="col-md-6" >

                            <div class="form-group">
                        	<label for="user_id" class="custom-field one">
                            	<div class="select">
                                	<select name="user_id" id="user_id" required style="width: 400px;">
                                    	<option value="" selected="" disabled="">Formateur</option>
                                    	@foreach($users as $user)
										<option value="{{ $user->id }}">{{ $user->name }}</option>
										@endforeach 
                                	</select>
                                	</div>
                                                                                                                            
                        	</label>
                    		</div>
                		</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="custom-field one">
									<textarea type="text" id="description" name="description" rows="6" style="width: 600px;" placeholder=" "/></textarea>
									<span class="placeholder">Description</span>
								</label>
							</div>	
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="custom-field one">
									<textarea type="text" id="incourse" name="incourse" rows="6" style="width: 600px;" placeholder=" "/></textarea>
									<span class="placeholder">Dans ce cours :</span>
								</label>
							</div>	
						</div>

						<div class="col-md-6" >	
							<div class="form-group">
								<label class="custom-field one">
									<input type="file" id="photo" name="photo" style="width: 600px;" placeholder=" "/>
									<span class="placeholder">Photo</span>
								</label>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="custom-field one">
									<input type="url" id="session_url" name="session_url" value="{{ $editData->session_url }}" style="width: 600px;" placeholder=" "/>
									<span class="placeholder">Lien Session</span>
								</label>
							</div>	
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="debut_seance" class="custom-field one">
									<input type="datetime-local" id="debut_seance" name="debut_seance" style="width: 400px;" placeholder=" "/>
									<span class="placeholder">Début de séance </span>
								</label>
							</div>	
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="fin_seance" class="custom-field one">
									<input type="datetime-local" id="fin_seance" name="fin_seance" style="width: 400px;" placeholder=" "/>
									<span class="placeholder">Fin de séance </span>
								</label>
							</div>	
						</div>
 
  
							 
						<div class="col-md-6">
						<div class="text-xs-right">
	 						<input type="submit" class="btn btn-rounded btn-info mb-5" style="background-color: #224abe; padding:10px 20px" value="Modifier">
						</div>
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