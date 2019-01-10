<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo doctype();
echo meta('Content-type', 'text/html; charset=utf-8', 'equiv');
?>
<style>
	.img{
		text-align:center;
		border:solid 2px black;
		padding: 3px;
		background-image: url("Image/a.jpg");
	}
	body{
		background-color:orange;
	}
	form{
		border:solid 1px;
		padding:3px;
		background-color:	#FAEBD7;
		
	}
</style>
<?php 

// Affichage de l'image
$imcar= array(
		'src'   => 'Image/Fine_Equipe.jpg',
        'alt'   => 'Moi et mon crou !!',
        'class' => 'post_images',
        'title' => 'La fine equipe',
        'rel'   => 'lightbox'
);
echo '<div class=\'img\'>';
echo img($imcar);
echo br();
echo '</div>';
echo $this->calendar->generate();
echo "Bienvenue ! Vous avez ".$nb." personnes saisies. Les voici : ";
echo br();

// Affichage de la requete dans un ul
$list = array();
foreach ($query as $valeur){
	$list[]=$valeur->Nom." ".$valeur->Prenom;
}
echo ul($list);

// Formulaire
echo validation_errors();
echo form_fieldset("Form");
echo form_open('moncontroleur/ajouterContact');
echo form_label('* Saisie obligatoire');
echo br();
echo form_label('Saisir le nom :*');
echo br();
echo form_input('Nom');
echo br();
echo form_label('Saisir le prenom :*');
echo br();
echo form_input('Prenom');
echo br();
echo form_label('Saisir l\'email :*');
echo br();
echo form_input('Email');
echo br();
echo form_label('Saisir le commentaire :');
echo br();
echo form_textarea('Commentaire');
echo br();

echo form_submit('Valider','Submit');
echo form_close();
?>