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
            <h1 class="h3 mb-3 text-gray-800">Modifier Utilisateur</h1>
            <div class="card shadow mb-4">
                <div class="card-body">
                <section class="content">
                    <!-- Basic Forms -->
                    <div class="box">
                    
                    <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">

                                <div class="form-container sign-in-container">

                                    <form method="post" action="{{ route('users.update', $editData->id) }}">
                                        @csrf
                                        <div class="row" style="margin-left:30px;">
                                            <div class="col-12">	

                                                    <div class="col-md-6" >

                                                    <div class="form-group">
                                                            <label class="custom-field one">
                                                                <div class="select">
                                                                    <select name="role" id="role" style="width: 400px;">
                                                                        <option value="" selected="" disabled="">Type d'Utilisateur</option>
                                                                        <option value="1" {{ ($editData-> user_type_id == 1 ? "selected" : "") }}>Admin</option>
                                                                        <option value="2" {{ ($editData-> user_type_id == 2 ? "selected" : "") }}>Eleve</option>
                                                                        <option value="3" {{ ($editData-> user_type_id == 3 ? "selected" : "") }}>Formatteur</option>
                                                                                    
                                                                    </select>
                                                                    </div>
                                                                                                                            
                                                            </label>
                                                        </div>
                                                    </div> <!-- End Col Md-6 -->

                                                    <div class="col-md-6" >	
                                                        <div class="form-group">
                                                            <label class="custom-field one">
                                                                <input type="text" id="name" name="name" style="width: 400px;" value="{{  $editData-> name }}" placeholder=" "/>
                                                                <span class="placeholder">Nom Complet</span>
                                                            </label>
                                                        </div>	

                                                    </div><!-- End Col Md-6 -->

                                                    <div class="col-md-6" >

                                                        <div class="form-group">
                                                            <label class="custom-field one">
                                                                <input type="text" id="email" name="email" style="width: 400px;" value="{{  $editData-> email }}" placeholder=" "/>
                                                                <span class="placeholder">Email</span>
                                                            </label>
                                                        </div>

                                                    </div> <!-- End Col Md-6 -->





                                        
                                                <div class="text-xs-right col-md-6">
                                                    <input type="submit" class="btn btn-rounded btn-info mb-5" style="background-color: #224abe; padding:10px 20px" value="Modifer">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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