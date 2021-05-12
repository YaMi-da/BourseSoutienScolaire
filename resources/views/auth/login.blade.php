<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Soutien Scolaire</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css/custom2-css.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/custom-css.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

<body class="">
    
    <div class="container" id="container">
        <x-guest-layout>
        <div class="form-container sign-up-container">
            <form method="POST" action="{{ route('register') }}" x-data="{user_type_id: 2}">
                @csrf
                <h1 style="color: #4e73df;">Créez Votre Compte</h1>
                <x-jet-validation-errors class="mb-4" />
                <x-jet-input id="name" name="name" type="text" placeholder="Nom Complet" :value="old('name')" required autofocus autocomplete="name"/>
                <x-jet-input id="email" name="email" type="email" placeholder="Email" :value="old('email')" required/>
                <x-jet-input id="password" name="password" type="password" placeholder="Mot de Passe" required autocomplete="new-password"/>
                <x-jet-input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirmer Mode de Passe" required autocomplete="new-password"/>
                <div class="mt-4" style="width: 100%;">
                    <select name="user_type_id" x-model="user_type_id" class="form-control" style="width: 100%; height:34px; margin-bottom:10px;">
                        <option :value="2">Elève</option>
                        <option :value="3">Formatteur</option>
                    </select>
                </div>
                <div class="mt-4" style="width: 100%;" x-show="user_type_id == 2">
                    <x-jet-input id="niveau_eleve" type="text" placeholder="Entrer le niveau d'études" :value="old('niveau_eleve')" name="niveau_eleve" />
                </div>

                <div class="mt-4" style="width: 100%;" x-show="user_type_id == 2">
                    <x-jet-input id="matiere_eleve" type="text" placeholder="Entrer la matière à étudier" :value="old('student_licence_number')" name="student_licence_number" />
                </div>
                <div class="mt-4" style="width: 100%;" x-show="user_type_id == 3">
                    <x-jet-input id="niveau_formatteur" type="text" placeholder="Entrer le niveau d'enseignement" :value="old('niveau_formatteur')" name="niveau_formatteur" />
                </div>
                <div class="mt-4" style="width: 100%;" x-show="user_type_id == 3">
                    <x-jet-input id="matiere_formatteur" type="text" placeholder="Entrer le niveau d'enseignement" :value="old('matiere_formatteur')" name="matiere_formatteur" />
                </div>
                
                <x-jet-button>S'inscrire</x-jet-button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1 style="color: #4e73df;">Connectez-vous !</h1>
                <x-jet-validation-errors class="mb-4" />
                <x-jet-input id="email" name="email" type="email" placeholder="Email" :value="old('email')" required autofocus />
                <x-jet-input id="password" name="password" type="password" placeholder="Mot de Passe" required autocomplete="current-password"/>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Mot de Passe oublié ?</a>
                @endif
                <x-jet-button>Se Connecter</x-jet-button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Bienvenue !</h1>
                    <p>Vous avez un compte ?</p>
                    <button class="ghost" id="signIn">Connectez-vous !</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Nouveau ici ?</h1>
                    <p>Créez votre compte !</p>
                    <button class="ghost" id="signUp">S'inscrire</button>
                </div>
            </div>
        </div>
        </x-guest-layout>
        
    </div>

<footer>
	<p>
		
	</p>
</footer>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template/js/custom-js.js') }}"></script>

</body>

</html>