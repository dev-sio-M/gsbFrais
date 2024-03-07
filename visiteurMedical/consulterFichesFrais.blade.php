<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Mes fiches de frais</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="menuGauche">
    <div id="infosUtil">
        <h2></h2>
    </div>   
    <ul id="menuList">
  		 <th class="smenu">
     		 <a href="index.php?uc=gererFrais&action=saisirFrais" title="Saisie fiche de frais ">Saisie fiche de frais</a>
  		 </th>
        <th class="smenu">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Déconnexion
            </a>
            <th class="smenu">
				<a href="javascript:history.back()">Retour</a>
			</th>
			
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </th>
        
    </ul>
</div>
<div class="container">
    <h1>Détails de la fiche de frais</h1>

    <form action="{{ route('validerConsultation') }}" method="POST">
        @csrf
        <label for="lstMois">Sélectionner le mois :</label>
        <select name="lstMois" id="lstMois">
            <option value="01">Janvier</option>
            <option value="02">Février</option>
            <option value="03">Mars</option>
            <option value="04">Avril</option>
            <option value="05">Mai</option>
            <option value="06">Juin</option>
            <option value="07">Juillet</option>
            <option value="08">Août</option>
            <option value="09">Septembre</option>
            <option value="10">Octobre</option>
            <option value="11">Novembre</option>
            <option value="12">Décembre</option>

        </select>
        <button type="submit">Valider</button>
    </form>


@if(isset($ficheFrais))
    <h2>État de la fiche de frais</h2>
    <ul>
        <li><strong>Date associée :</strong> {{ optional($ficheFrais->dateModif)->format('Y-m-d') ?? '' }}</li>
        <li><strong>État :</strong> {{ $ficheFrais->idEtat ?? '' }}</li>
    </ul>

    <h2>Éléments forfaitisés</h2>
    <ul>
		@foreach($elementsForfaitises as $element)
        <li><strong>Quantité :</strong> {{ $element->quantite }}</li>            
        @endforeach
    </ul>

    <h2>Éléments non forfaitisés</h2>
    <ul>
		@foreach($elementsNonForfaitises as $element)
        <li><strong>Libellé :</strong> {{ $element->libelle }}</li> 
        <li><strong>Date d'engagement :</strong> {{ optional($element->date)->format('Y-m-d') ?? '' }}</li> 
         <li><strong>Montant :</strong> {{ $element->montant }}</li> 
		@endforeach
    </ul>
@endif



@if($errors->any())
    <div class="alert alert-danger" role="alert">
        {{ $errors->first() }}
    </div>
@endif
</div>
</body>
</html>
