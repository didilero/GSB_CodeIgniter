<?php $this->load->helper('url'); ?>
  <h3><?php echo count($listeContacts); ?> contacts : </h3>
  <table border=1>
  	<tr>
  		<th>Numero</th>
  		<th>Nom</th>
  		<th>Prenom</th>
  		<th>Commentaire</th>
  		<th>Modifier</th>
  		<th>Supprimer</th>
  	</tr>
<?php
	//Affichage des contacts
	foreach ($listeContacts as $contact) { ?>
		<tr>
			<td><?php echo $contact->Numero; ?></td>
			<td><?php echo $contact->Nom; ?></td>
			<td><?php echo $contact->Prenom; ?></td>
			<td><?php echo $contact->Commentaire; ?></td>
			<td><?php echo anchor('c_administrer/voir/'.$contact->Numero, 'Modifier'); ?></td>
			<td><?php echo anchor('c_administrer/supprimer/'.$contact->Numero, 'Supprimer'); ?></td>
		</tr>
<?php
	}
?>
</table>