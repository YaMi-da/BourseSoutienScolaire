@extends('students.students_master')
@section('students')

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
        @include('students.body.header')

        <div class="container-fluid">
            <div class="card shadow mb-4" style="margin-top: 50px;">
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

	 <form method="post" action="{{ route('studentpassword.update') }}">
	 	@csrf
					  <div class="row" style="margin-left: 30px;">
						<div class="col-12">	
						<div class="col-md-6">
							<div class="form-group">
								<label class="custom-field one">
									<input type="password" id="oldpassword" name="current_password" style="width: 400px;" placeholder=" "/>
									<span class="placeholder">Mot de passe actuel <span class="text-danger">*</span></span>
									@error('oldpassword')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</label>
							</div>	
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="custom-field one">
									<input type="password" id="password" name="password" style="width: 400px;" placeholder=" "/>
									<span class="placeholder">Nouveau mot de passe <span class="text-danger">*</span></span>
									@error('password')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</label>
							</div>	
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="custom-field one">
									<input type="password" id="password_confirmation" name="password_confirmation" style="width: 400px;" placeholder=" "/>
									<span class="placeholder">Confirmer Mot de passe <span class="text-danger">*</span></span>
									@error('password_confirmation')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</label>
							</div>	
						</div>
							
						<div class="col-md-6">
							<div class="text-xs-right">
								<input type="submit" class="btn btn-rounded btn-info mb-5" style="background-color: #224abe; padding:10px 20px" value="Changer">
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
    @include('students.body.footer')
    
    
</div>

@endsection