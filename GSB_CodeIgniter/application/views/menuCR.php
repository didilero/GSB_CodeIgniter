<!-- <div name="haut" class="divHaut">
	<?php 
		$image_properties = array(
			'src'   => 'images/logo.jpg',
			'width' => '100',
			'height' => '100'
		);

		echo (img($image_properties));

		echo "Gestion des visites";
	?>
</div>
<div name="gauche" class="divGauche">
	<?php echo "Outils"; ?>
	<ul><li><?php echo "Comptes-Rendus"; ?></li>
		<ul>
			<li><?php echo anchor('MonControleur/formRAPPORT_VISITE',' Nouveaux '); ?></li>
			<li><?php echo anchor('MonControleur/formCONSULTER_RAPPORT',' Consulter '); ?></li>
		</ul>
		<li><?php echo "Consulter"; ?></li>
		<ul>
			<li><?php echo anchor('MonControleur/formMEDICAMENT',' Medicaments '); ?></li>
			<li><?php echo anchor('MonControleur/formPRATICIEN',' Praticiens '); ?></li>
			<li><?php echo anchor('MonControleur/formVISITEUR',' Autres visiteurs '); ?></li>
		</ul>	
	</ul>
</div> -->

<div name="haut" style="margin: 2 2 2 2 ;height:6%;">
<?php 
	$properties = array(
			'src'=>'images/logo.jpg',
			'width'=>'100',
			'height'=>'60'
	);
	echo heading(img($properties).'Gestion des visites'); //<h1><img src="logo.jpg" width="100" height="60"/>Gestion des visites</h1>
?>
</div>
<div name="gauche" style="float:left;width:18%; background-color:white; height:100%;">
	<ul><li>Comptes-Rendus</li>
		<ul>
			<li><a href="formRAPPORT_VISITE.php" >Nouveaux</a></li>
			<li>Consulter</li>
		</ul>
		<li>Consulter</li>
		<ul><li><a href="formMEDICAMENT.php" >Médicaments</a></li>
			<li><a href="formPRATICIEN.php" >Praticiens</a></li>
			<li><a href="formVISITEUR.php" >Autres visiteurs</a></li>
		</ul>
	</ul>
</div>