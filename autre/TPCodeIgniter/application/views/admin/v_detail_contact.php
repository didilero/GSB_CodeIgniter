<?php
if(isset($message)) 
	echo $message;?>
<h3>détail du contact :</h3>
<?php //Formulaire de modification d'un contact 
	$this->load->helper('form');
	echo validation_errors();
	echo form_open('c_administrer/modifier/'.$contact->Numero);
	echo form_label('Nom*', 'lnom');
	echo form_input('nom', $contact->Nom );
	echo '<br />';
	echo form_label('Prénom*', 'lprenom');
	echo form_input('prenom', $contact->Prenom);
	echo '<br />';
	echo form_label('Email*', 'lemail');
	echo form_input('email', $contact->Email);
	echo '<br />';
	$tArea = array('name'=>"commentaire", 'rows'=>"5", 'cols'=>"20");
	echo form_label('Commentaire', 'lcommentaire');
	echo form_textarea($tArea, $contact->Commentaire);
	echo '<br />';
	echo form_submit('mysubmit', 'Modifier');
	echo form_close();
?>