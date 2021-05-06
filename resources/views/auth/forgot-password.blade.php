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

    
    <div class="container2" id="container">
        <div>
            <x-jet-validation-errors class="mb-4" />
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <h1>Mot de Passe oublié ?</h1>
                <h4>Pas de problème. Saisissez votre adresse email ci-dessous, nous vous enverrons un email vous permettant de changer votre mot de passe</h6>
                <x-jet-input id="email" name="email" type="email" placeholder="Email" :value="old('email')" required autofocus/>
                <x-jet-button>Réinitialiser mot de passe</x-jet-button>
            </form>
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