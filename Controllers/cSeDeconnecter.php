<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cSeDeconnecter extends Controller
{
<?php  
/**
 * Script de contrôle et d'affichage du cas d'utilisation "Se déconnecter"
 * @package default
 * @todo  RAS
 */
  $repInclude = './include/';
  require($repInclude . "_init.inc.php");
 
  deconnecterVisiteur() ;  
  header("Location:cSeConnecter.php");
 
?>

}
