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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css/custom2-css.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/custom3-css.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/custom-css.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <style>
        body{
            font-family: 'Montserrat', sans-serif;
        }
    </style>

</head>

<body class="">
    
    <div class="container" id="container">
        <x-guest-layout>
        <div class="form-container sign-up-container">
            <form method="POST" action="{{ route('register') }}" x-data="{user_type_id: 1}">
                @csrf
                <h1 class="typewrite" data-period="2500" data-type='["Nouveau ici ?"]' style="color: #4e73df;"><span class="wrap"></span></h1>
                <x-jet-validation-errors class="mb-4" />
                <x-jet-input id="name" name="name" type="text" placeholder="Nom Complet" :value="old('name')" required autofocus autocomplete="name"/>
                <x-jet-input id="email" name="email" type="email" placeholder="Email" :value="old('email')" required/>
                <x-jet-input id="password" name="password" type="password" placeholder="Mot de Passe" required autocomplete="new-password"/>
                <x-jet-input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirmer Mode de Passe" required autocomplete="new-password"/>
                <div class="mt-4" style="width: 100%;">
                
                    <select name="user_type_id" x-model="user_type_id" class="form-control" style="width: 100%; height:34px; margin-bottom:10px;">
                        <option :value="1" selected>Etes vous?</option>
                        <option :value="2">Elève</option>
                        <option :value="3">Formatteur</option>
                    </select>
                </div>
                @php
                $niveaux = DB::table('niveaux')->get();
                $matieres = DB::table('matieres')->get();
                @endphp
                
                <div class="mt-4" style="width: 100%;" x-show="user_type_id == 2">
                    <select name="niveau_eleve" class="form-control" style="width: 100%; height:34px; margin-bottom:10px;">
                                        <option value="" selected>Niveau scolaire </option>
                                        @foreach($niveaux as $niveau)
										<option value="{{ $niveau->name }}">{{ $niveau->name }}</option>
										@endforeach
                    </select>
                </div>
                <div class="mt-4" style="width: 100%;" x-show="user_type_id == 3">
                <select name="matiere_formatteur" class="form-control" style="width: 100%; height:34px; margin-bottom:10px;">
                                    <option value="" selected>Matière d'expertise</option>
                                    @foreach($matieres as $matiere)
										<option value="{{ $matiere->name }}">{{ $matiere->name }}</option>
										@endforeach
                    </select>
                </div>
                
                <x-jet-button>S'inscrire</x-jet-button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1 style="color: #4e73df;" class="typewrite" data-period="2000" data-type='["Connectez-vous !"]'><span class="wrap"></span></h1>
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
                <h1 class="typewrite" data-period="3000" data-type='["Bienvenue !"]'><span class="wrap"></span></h1>
                    <p>Vous avez un compte ?</p>
                    <button class="ghost" id="signIn">Connectez-vous !</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="typewrite" data-period="3000" data-type='["Nouveau ici ?"]'><span class="wrap"></span></h1>
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

    <script>
        var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { font-size:40px; border-right: 0.08em solid black}";
        document.body.appendChild(css);
    }; 
    </script>

</body>

</html>