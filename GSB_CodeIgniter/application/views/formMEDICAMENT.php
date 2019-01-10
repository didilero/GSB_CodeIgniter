
<html>
<head>
	<title>formulaire MEDICAMENT</title>
	<style type="text/css">
		body {background-color: white; color:5599EE; } 
		label.titre { width : 180 ;  clear:left; float:left; } 
		label.zone { width : 30car ; float : left; color:7091BB }
	</style>
</head>
<body>
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
<div name="droite" style="float:left;width:80%;">
	<div name="bas" style="margin : 10 2 2 2;clear:left;background-color:77AADD;color:white;height:88%;">
		<h1> Pharmacopee </h1>
		<form name="formMEDICAMENT" method="post" action="formMEDICAMENT.php">
		<?php 
			if($medicaments != null) {
				$attributesDepot = array(
					'class' => 'titre'
				);
				$attributesInputDepot = array(
					'type' => 'text',
					'size' => '10',
					'name' => 'MED_DEPOTLEGAL',
					'class' => 'zone',
					'value' => $medicaments['MED_DEPOTLEGAL']
				);
				$attributesInput = array(
					'type'=>'text',
					'size'=>'25',
					'name'=>'MED_NOMCOMMERCIAL',
					'class'=>'zone'
				);
				echo form_label('DEPOT LEGAL :',$attributesDepot).form_input($attributesInputDepot);
				echo form_label('NOM COMMERCIAL :',$attributesDepot).form_input($attributesInput);
				echo form_label('FAMILLE :',$attributesDepot).form_input(array('type'=>'text','size'=>'3','name'=>'FAM_CODE','class'=>'zone'));
				echo form_label('COMPOSITION',$attributesDepot).form_textarea(array('rows'=>'5','cols'=>'50','name'=>'MED_COMPOSITION','class'=>'zone'));
				
				
				
				/*<label class="titre">FAMILLE :</label><input type="text" size="3" name="FAM_CODE" class="zone" />
				<label class="titre">COMPOSITION :</label><textarea rows="5" cols="50" name="MED_COMPOSITION" class="zone" ></textarea>
				<label class="titre">EFFETS :</label><textarea rows="5" cols="50" name="MED_EFFETS" class="zone" ></textarea>
				<label class="titre">CONTRE INDIC. :</label><textarea rows="5" cols="50" name="MED_CONTREINDIC" class="zone" ></textarea>
				<label class="titre">PRIX ECHANTILLON :</label><input type="text" size="7" name="MED_PRIXECHANTILLON" class="zone" />
				<label class="titre">&nbsp;</label>
				<input class="zone" type="submit" name="sens" value="&lt;"></input><input class="zone" type="submit" name="sens" value="&gt;"></input>';	
				*/
			}
		?>
	</form>
	</div>
</div>
</body>
</html>