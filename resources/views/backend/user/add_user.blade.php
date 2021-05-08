@extends('admin.admin_master')
@section('admin')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('admin.body.header')

        <div class="container-fluid">
            <h1 class="h3 mb-3 text-gray-800">Ajouter Utilisateur</h1>
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

                                    <form method="post" action="{{ route('users.store') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">	


                                                <div class="row">
                                                    <div class="col-md-6" >

                                                        <div class="form-group">
                                                            <h5>Role de l'Utilisateur<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="role" id="role" required class="form-control">
                                                                    <option value="" selected="" disabled="">Choisir Role</option>
                                                                    <option value="Admin">Admin</option>
                                                                    <option value="Operator">Formatteur</option>
                                                                    <option value="Operator">Eleve</option>
                        
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div> <!-- End Col Md-6 -->

                                                    <div class="col-md-6" >		
                                                        <div class="form-group">
                                                            <h5>Nom Complet <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input id="name" name="name" type="text" class="form-control" required>  
                                                            </div>

                                                        </div>

                                                    </div><!-- End Col Md-6 -->


                                                </div> <!-- End Row -->



                                                <div class="row">
                                                    <div class="col-md-6" >

                                                        <div class="form-group">
                                                            <h5>Email <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input id="email" type="email" name="email" class="form-control" required> 
                                                            </div>

                                                        </div>

                                                    </div> <!-- End Col Md-6 -->

                                                    <div class="col-md-6" >		
                                                        <div class="form-group">
                                                            <h5>Mot de Passe <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input id="password" name="password" type="password" class="form-control" required>  
                                                            </div>

                                                        </div>

                                                    </div><!-- End Col Md-6 -->


                                                </div> <!-- End Row -->



                                        
                                                <div class="text-xs-right">
                                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Ajouter">
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