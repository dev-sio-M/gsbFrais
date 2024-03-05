<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LigneFraisForfait
 * 
 * @property string $idVisiteur
 * @property string $mois
 * @property string $idFraisForfait
 * @property int|null $quantite
 * 
 * @property FicheFrai $fiche_frai
 * @property FraisForfait $frais_forfait
 *
 * @package App\Models
 */
class LigneFraisForfait extends Model
{
	protected $table = 'LigneFraisForfait';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'quantite' => 'int'
	];

	protected $fillable = [
		'quantite'
	];

	public function fiche_frais()
	{
		return $this->belongsTo(FicheFrais::class, 'idVisiteur')
					->where('FicheFrais.idVisiteur', '=', 'LigneFraisForfait.idVisiteur')
					->where('FicheFrais.mois', '=', 'LigneFraisForfait.mois');
	}

	public function frais_forfait()
	{
		return $this->belongsTo(FraisForfait::class, 'idFraisForfait');
	}
}
