<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($rep != false){
	echo br();
	echo heading("Votre saisie a ete faite avec succes !",2);
}
echo validation_errors();
echo form_fieldset("Form");
echo form_open('moncontroleur/ajouterContact');
echo form_label('* Saisie obligatoire');
echo br();
echo form_label('Saisir le nom :*');
echo br();
echo form_input('Nom',set_value('Nom'));
echo br();
echo form_label('Saisir le prenom :*');
echo br();
echo form_input('Prenom',set_value('Prenom'));
echo br();
echo form_label('Saisir l\'email :*');
echo br();
echo form_input('Email',set_value('Email'));
echo br();
echo form_label('Saisir le commentaire :');
echo br();
echo form_textarea('Commentaire');
echo br();

echo form_submit('Valider','Submit');
echo form_close();

?>