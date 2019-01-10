<h3>Etes-vous sûr de vouloir supprimer ce contact ?</h3>
<?php
	$this->load->helper('form');
?>
	Nom : <?php echo $contact->Nom; ?>
	<br />
	Prénom : <?php echo $contact->Prenom; ?>
	<br />
	Email : <?php echo $contact->Email; ?>
	<br />
	Commentaire : <?php echo $contact->Commentaire; ?>
	<br />
<?php
	echo form_open('c_administrer/validation_supprimer/'.$contact->Numero);
	echo form_submit('mysubmit', 'Supprimer');
	echo form_close();
?>