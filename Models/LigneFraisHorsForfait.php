<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LigneFraisHorsForfait
 * 
 * @property int $id
 * @property string $idVisiteur
 * @property string $mois
 * @property string|null $libelle
 * @property Carbon|null $date
 * @property float|null $montant
 * 
 * @property FicheFrai $fiche_frai
 *
 * @package App\Models
 */
class LigneFraisHorsForfait extends Model
{
	protected $table = 'LigneFraisHorsForfait';
	public $timestamps = false;

	protected $casts = [
		'date' => 'datetime',
		'montant' => 'float'
	];

	protected $fillable = [
		'idVisiteur',
		'mois',
		'libelle',
		'date',
		'montant'
	];

	public function fiche_frais()
	{
		return $this->belongsTo(FicheFrais::class, 'idVisiteur')
					->where('FicheFrais.idVisiteur', '=', 'LigneFraisHorsForfait.idVisiteur')
					->where('FicheFrais.mois', '=', 'LigneFraisHorsForfait.mois');
	}
}
