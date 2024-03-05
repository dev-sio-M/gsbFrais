<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FicheFrais; 
use App\Models\LigneFraisForfait; 
use App\Models\LigneFraisHorsForfait; 
use App\Models\Visiteur;

class cConsultFichesFrais extends Controller
{
	    public function mesFichesFrais()
    {
        return view('visiteurMedical.consulterFichesFrais');
    }
	
    public function validerConsultation (Request $request)
    {
        // Récupère le mois saisi dans la requête
        $moisSaisi = $request->input("lstMois", "");

        // Récupère la fiche de frais associée au mois saisi
        $ficheFrais = Visiteur::find(auth()->id())->fiche_frais()
    ->where('mois', $moisSaisi)
    ->first();


        // Vérifie si la fiche de frais existe
        if ($ficheFrais) {
            // Récupère les éléments forfaitisés pour cette fiche de frais
            $elementsForfaitises = LigneFraisForfait::where('idVisiteur', auth()->id())
                                        ->where('mois', $moisSaisi)
                                        ->get();

            // Récupère les éléments non forfaitisés pour cette fiche de frais
            $elementsNonForfaitises = LigneFraisHorsForfait::where('idVisiteur', auth()->id())
                                            ->where('mois', $moisSaisi)
                                            ->get();

            // Retourne la vue avec les détails de la fiche de frais
            return view('visiteurMedical.consulterFichesFrais', compact('ficheFrais', 'elementsForfaitises', 'elementsNonForfaitises'));
            // Remplace 'nom_de_vue' par le nom de ta vue où tu afficheras ces détails
        } else {
				return back()->withErrors(['error' => 'La fiche de frais pour le mois saisi n\'existe pas.']);

        }
    }
}
