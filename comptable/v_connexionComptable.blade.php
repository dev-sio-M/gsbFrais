<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Se connecter</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>Se connecter</h1>
    @if($errors->any())
        <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
        </div><br>
    @endif
    <form action="{{ route('valideConnexion') }}" method="POST">
        @csrf 
        <label>Login :</label><br>
        <input type="text" name="login" placeholder="Login" required="required"><br>
                        
        <br><label>Mot de passe :</label><br>
        <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required="required">
        
        <!-- Case à cocher pour afficher/masquer le mot de passe -->
        <input type="checkbox" id="togglePassword">
        <label for="togglePassword">Afficher le mot de passe</label><br><br>

        <ul>
            <button type="submit"> Valider </button>    
            <input type="reset" value="Annuler" /><br><br>
        </ul>
    </form>

    <!-- Script JavaScript pour gérer l'affichage/masquage du mot de passe -->
    <script>
        document.getElementById('togglePassword').addEventListener('change', function() {
            var passwordField = document.getElementById('mdp');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    </script>
</body>
</html>
