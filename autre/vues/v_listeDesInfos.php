<div id="lesFrais">
	<p>Les fiches de frais : </p>
	<?php 
	echo "<table border=\"1\"><tr><td>IdVisiteur</td><td>Nombre Justificatifs</td><td>Montant Valider</td><td>Date de la derniere Modif</td></tr>";
	foreach($lesInfos as $key=>$value){
		echo "<tr>";
		foreach($value as $clef=>$valeur){
			echo "<td>".$valeur[0]."</td>";
			echo "<td>".$valeur[2]."</td>";
			echo "<td>".$valeur[3]."</td>";
			echo "<td>".$valeur[1]."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	?>
</div>