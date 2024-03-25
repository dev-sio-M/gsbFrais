<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FicheFrais;
use App\Models\LigneFraisForfait;
use App\Models\LigneFraisHorsForfait;

class ComptableConsulterFicheFrais extends Controller
{
    public function allFichesFrais()
    {
        return view('comptable.suivrePaiementFicheFrais');
    }

    public function validerFicheFrais(Request $request)
    {
        $moisSaisi = $request->input("lstMois", "");
        $visiteurMedical = $request->input("lstVisiteurMedical", "");

        $ficheFrais = FicheFrais::where('idVisiteur', $visiteurMedical)
            ->where('mois', $moisSaisi)
            ->first();

        if ($ficheFrais) {
            $elementsForfaitises = LigneFraisForfait::where('idVisiteur', $visiteurMedical)
                ->where('mois', $moisSaisi)
                ->get();

            $elementsNonForfaitises = LigneFraisHorsForfait::where('idVisiteur', $visiteurMedical)
                ->where('mois', $moisSaisi)
                ->get();

            $hasForfaitises = $elementsForfaitises->isNotEmpty();
            $hasNonForfaitises = $elementsNonForfaitises->isNotEmpty();

            return view('comptable.suivrePaiementFicheFrais', compact('ficheFrais', 'elementsForfaitises', 'elementsNonForfaitises', 'hasForfaitises', 'hasNonForfaitises'));
        } else {
            return back()->withErrors(['error' => 'Aucune fiche de frais trouvée pour le visiteur médical et le mois sélectionnés.']);
        }
    }
}
