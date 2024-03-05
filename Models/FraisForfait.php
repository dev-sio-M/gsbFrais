<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FraisForfait
 * 
 * @property string $id
 * @property string|null $libelle
 * @property float|null $montant
 * 
 * @property Collection|LigneFraisForfait[] $ligne_frais_forfaits
 *
 * @package App\Models
 */
class FraisForfait extends Model
{
	protected $table = 'FraisForfait';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'montant' => 'float'
	];

	protected $fillable = [
		'libelle',
		'montant'
	];

	public function ligne_frais_forfaits()
	{
		return $this->hasMany(LigneFraisForfait::class, 'idFraisForfait');
	}
}
