<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Visiteur
 * 
 * @property string $id
 * @property string|null $nom
 * @property string|null $prenom
 * @property string|null $login
 * @property string|null $mdp
 * @property string|null $adresse
 * @property string|null $cp
 * @property string|null $ville
 * @property Carbon|null $dateEmbauche
 * 
 * @property Collection|FicheFrai[] $fiche_frais
 *
 * @package App\Models
 */

class Visiteur extends Authenticatable
{
    use Notifiable;

    protected $table = 'Visiteur';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'dateEmbauche' => 'datetime',
    ];

    protected $fillable = [
        'nom',
        'prenom',
        'login',
        'mdp',
        'adresse',
        'cp',
        'ville',
        'dateEmbauche',
    ];

    public function fiche_frais()
    {
        return $this->hasMany(FicheFrais::class, 'idVisiteur');
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->mdp;
    }
}

