<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Se connecter</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
</head>

<!-- Division pour le sommaire -->
<body> <div id="menuGauche">
    <div id="infosUtil">
        <h2></h2>
    </div>   
    <ul id="menuList">
        <th>
            Connecté en tant que : {{ Session::get('prenom') }} {{ Session::get('nom') }}
        </th><br><br>
  		 <th class="smenu">
     		 <a href="index.php?uc=gererFrais&action=saisirFrais" title="Saisie fiche de frais ">Saisie fiche de frais</a>
  		 </th>
  		 <th class="smenu">
     		 <a href="/visiteurMedical/consulterFichesFrais" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
  		 </th>
        <!-- Lien de déconnexion -->
        <th class="smenu">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Déconnexion
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </th>
    </ul>
</div>
</body>
</html>
