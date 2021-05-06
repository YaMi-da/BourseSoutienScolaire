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
    <link href="{{ asset('template/css/custom-css.css') }}" rel="stylesheet">

</head>

<body class="">
    
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Créez Votre Compte</h1>
                <x-jet-validation-errors class="mb-4" />
                <x-jet-input id="name" name="name" type="text" placeholder="Nom Complet" :value="old('name')" required autofocus autocomplete="name"/>
                <x-jet-input id="email" name="email" type="email" placeholder="Email" :value="old('email')" required/>
                <x-jet-input id="password" name="password" type="password" placeholder="Mot de Passe" required autocomplete="new-password"/>
                <x-jet-input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirmer Mode de Passe" required autocomplete="new-password"/>
                <x-jet-button>S'inscrire</x-jet-button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Connectez-vous !</h1>
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