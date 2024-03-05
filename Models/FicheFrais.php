<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FicheFrais
 * 
 * @property string $idVisiteur
 * @property string $mois
 * @property int|null $nbJustificatifs
 * @property float|null $montantValide
 * @property Carbon|null $dateModif
 * @property string|null $idEtat
 * 
 * @property Etat|null $etat
 * @property Visiteur $visiteur
 * @property Collection|LigneFraisForfait[] $ligne_frais_forfaits
 * @property Collection|LigneFraisHorsForfait[] $ligne_frais_hors_forfaits
 *
 * @package App\Models
 */
class FicheFrais extends Model
{
	protected $table = 'FicheFrais';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'nbJustificatifs' => 'int',
		'montantValide' => 'float',
		'dateModif' => 'datetime'
	];

	protected $fillable = [
		'nbJustificatifs',
		'montantValide',
		'dateModif',
		'idEtat'
	];

	public function etat()
	{
		return $this->belongsTo(Etat::class, 'idEtat');
	}

	public function visiteur()
	{
		return $this->belongsTo(Visiteur::class, 'idVisiteur');
	}

	public function ligne_frais_forfaits()
	{
		return $this->hasMany(LigneFraisForfait::class, 'idVisiteur');
	}

	public function ligne_frais_hors_forfaits()
	{
		return $this->hasMany(LigneFraisHorsForfait::class, 'idVisiteur');
	}
}
