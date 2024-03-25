<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Mes fiches de frais</title>
    <!--<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css' />  -->
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
                    <a href="/comptable/v_sommaireComptable">Retour</a>
                </th>
                 
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </th>
         
        </ul>
    </div>
    <div class="container">
        <h1>Détails des fiches de frais</h1>

        <form action="{{ route('validerFicheFrais') }}" method="POST">
            @csrf
            <label for="lstVisiteurMedical">Sélectionner un visiteur médical :</label>
            <select name="lstVisiteurMedical" id="lstVisiteurMedical">
                <option value="a131">Villechalane Louis</option>
                <option value="a17">Andre David</option>
                <option value="a55">Bedos Christian</option>
                <option value="a93">Tusseau Louis</option>
                <option value="b13">Bentot Pascal</option>
                <option value="b16">Bioret Luc</option>
                <option value="b19">Bunisset Francis</option>
                <option value="b25">Bunisset Denise</option>
                <option value="b28">Cacheux Bernard</option>
                <option value="b34">Cadic Eric</option>
                <option value="b4">Charoze Catherine</option>
                <option value="b50">Clepkens Christophe</option>
                <option value="b59">Cottin Vincenne</option>
                <option value="d13">Debelle Jeanne</option>
                <option value="d51">Debroise Michel</option>
                <option value="f21">Finck Jacques</option>
                <option value="f39">Frémont Fernande</option>
                <option value="f4">Gest Alain</option>
            </select>
         
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

        @if(isset($elementsForfaitises) || isset($elementsNonForfaitises))
    @if(isset($ficheFrais))
        <h2>État de la fiche de frais</h2>
        <ul>
            <li><strong>Date associée :</strong> {{ optional($ficheFrais->dateModif)->format('Y-m-d') ?? '' }}</li>
            <li><strong>État :</strong> {{ $ficheFrais->idEtat ?? '' }}</li>
        </ul>
    @endif

    @if(isset($elementsForfaitises))
        <h2>Éléments forfaitisés</h2>
        <ul>
            @foreach($elementsForfaitises as $element)
                <li><strong>Quantité :</strong> {{ $element->quantite }}</li>           
            @endforeach
        </ul>
    @endif

    @if(isset($elementsNonForfaitises))
        <h2>Éléments non forfaitisés</h2>
        <ul>
            @foreach($elementsNonForfaitises as $element)
                <li><strong>Libellé :</strong> {{ $element->libelle }}</li>
                <li><strong>Date d'engagement :</strong> {{ optional($element->date)->format('Y-m-d') ?? '' }}</li>
                <li><strong>Montant :</strong> {{ $element->montant }}</li>
            @endforeach
        </ul>
    @endif
@endif


        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                {{ $errors->first() }}
            </div>
        @endif
    </div>
</body>
</html>
