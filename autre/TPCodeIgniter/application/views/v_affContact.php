<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo "Ce site possede : ".$nb. " contacts. Les voici : ";
$list = array();
foreach ($contact as $valeur){
	$list[]=$valeur->Nom." ".$valeur->Prenom;
}
echo ul($list);
?>