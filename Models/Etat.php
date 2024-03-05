<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Etat
 * 
 * @property string $id
 * @property string|null $libelle
 * 
 * @property Collection|FicheFrai[] $fiche_frais
 *
 * @package App\Models
 */
class Etat extends Model
{
	protected $table = 'Etat';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'libelle'
	];

	public function fiche_frais()
	{
		return $this->hasMany(FicheFrai::class, 'idEtat');
	}
}
