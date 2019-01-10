<?php
if($_SESSION['role'] == 0){
	include("vues/v_sommaireV.php");
	$action = $_REQUEST['action'];
	$idVisiteur = $_SESSION['idVisiteur'];
	switch($action){
		case 'selectionnerMois':{
			$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
			// Afin de sélectionner par défaut le dernier mois dans la zone de liste
			// on demande toutes les clés, et on prend la première,
			// les mois étant triés décroissants
			$lesCles = array_keys( $lesMois );
			$moisASelectionner = $lesCles[0];
			include("vues/v_listeMois.php");
			break;
		}
		case 'voirEtatFrais':{
			$leMois = $_REQUEST['lstMois']; 
			$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
			$moisASelectionner = $leMois;
			include("vues/v_listeMois.php");
			$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
			$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois);
			$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);
			$numAnnee =substr( $leMois,0,4);
			$numMois =substr( $leMois,4,2);
			if(isset($libEtat)&& isset($montantValide) && isset($nbJustificatifs) && isset($dateModif)){
				$libEtat = $lesInfosFicheFrais['libEtat'];
				$montantValide = $lesInfosFicheFrais['montantValide'];
				$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
				$dateModif =  $lesInfosFicheFrais['dateModif'];
				$dateModif =  dateAnglaisVersFrancais($dateModif);
			}else{
				$libEtat = null;
				$montantValide = null;
				$nbJustificatifs = null;
				$dateModif =  null;
			}
			include("vues/v_etatFrais.php");
			break;
		}
		case 'voirPdf':{
			$mois = $pdo->dernierMoisSaisi($idVisiteur);
			$lstInfo = $pdo->getinfo($idVisiteur,$mois);
			$lstInfoHorsforfait = $pdo->getinfohors($idVisiteur,$mois);
		
			include("c_pdf.php");
			break;
		}
	}
}
else{
	include("vues/v_sommaireC.php");
	$action = $_REQUEST['action'];
	$idVisiteur = $_SESSION['idVisiteur'];
	//Script de gestion des cloture de fiche de frais du mois precedent
	$liste = $pdo->getVisiteur();
	$lstCL = array();
	$i = 0;
	// if(isset($liste['id']) &&!empty($liste['id']))
	// foreach($liste as $key=>$valeur){
		// 
		// $reponse = $pdo->estPremierFraisMois($valeur['id'],$mois);
		// $etat = $pdo->getLesInfosFicheFrais($valeur['id'],$mois);
		// if(!empty($mois) && $mois!=$pdo->getMois() && !$reponse && $etat['idEtat'] =='CR'){
			// $pdo->majEtatFicheFrais($valeur['id'],$mois,'CL');
		// }
		// if($etat['idEtat'] == 'CL'){
			// $lstCL[$i] = array($valeur['id'],$valeur['login'],$mois);
			// $i+=1;
		// }
	// }
	$lesFiches = array();
	for($i =0;$i<count($liste);$i++){
		$mois = $pdo->dernierMoisSaisi($liste[$i]['id']);
		if(estMoisDepassee($mois)){
			$res =$pdo->getLesFraisSaisieDuMoisPrecedent($liste[$i]['id'],$mois);
			if($res != null){
				$lesFiches[] = $pdo->getLesFraisSaisieDuMoisPrecedent($liste[$i]['id'],$mois);
			}
		}
	}
	for($i =0;$i<count($liste);$i++){
		if(isset($lesFiches[$i]['idEtat']) && $lesFiches[$i]['idEtat'] == 'CR'){
			$pdo->majEtatFicheFrais($liste['id'],$mois,'CL');
		}
		$lstCL = array($liste[$i]['id'],$liste[$i]['login'],$mois);
	}
	
	echo "<script>get_color(".$_SESSION['role'].");</script>";
	switch($action){
		
		case 'selectionnerUtilisateur':{
			include("vues/v_gestionC.php");
			echo "<script>document.bgColor='orange';</script>";
			break;
		}
		case 'validerFForfait':{
			echo "<script>get_color(".$_SESSION['role'].");</script>";
			if(isset($_REQUEST['ok']) && $_REQUEST['ok'] == "Valider"){
				$pdo->validerFrais($_SESSION['lutil']);
			}
			echo "<script>document.bgColor='orange';</script>";
			include("vues/v_liste_fraisC.php");
			break;
		}
		case 'VoirTouteLesFiches':{
			$lesInfos = array();
			for($i=0;$i<count($liste);$i++){
				$rep = $pdo->getLesFraisValider($liste[$i][1]);
				if(!empty($rep)){
					$lesInfos[] = $rep;
				}
			}
			include("vues/v_listeDesInfos.php");
			echo "<script>document.bgColor='orange';</script>";
			break;
		}
		case 'etatFrais':{
			if(isset($_POST['lstUtil']) && !empty($_POST['lstUtil'])){
				$lutil=$_POST['lstUtil'];
				$_SESSION['lutil']=$lutil;
				$rs = rechercheUtilLeMois($lutil,$lstCL);
				$lesFrais = $pdo->getLesFraisForfait($lutil,$rs);
				echo "<p>".var_dump($lesFrais)."</p>";
				if(!empty($lesFrais)){
					include("vues/v_gestionC.php");
					include("vues/v_liste_fraisC.php");
					echo "<script>document.bgColor='orange';</script>";
					break;
				}else{
					include("vues/v_gestionC.php");
					include("vues/v_pas2frais.php");
					echo "<script>document.bgColor='orange';</script>";
					break;
				}
				echo "<script>get_color(".$_SESSION['role'].");</script>";
				echo "<script>document.bgColor='orange';</script>";
			} 
			echo "<script>get_color(".$_SESSION['role'].");</script>";
			$leMois = $_REQUEST['lstMois']; 
			$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
			$moisASelectionner = $leMois;
			include("vues/v_listeMois.php");
			$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
			$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois);
			$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);
			$numAnnee =substr( $leMois,0,4);
			$numMois =substr( $leMois,4,2);
			$libEtat = $lesInfosFicheFrais['libEtat'];
			$montantValide = $lesInfosFicheFrais['montantValide'];
			$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
			$dateModif =  $lesInfosFicheFrais['dateModif'];
			$dateModif =  dateAnglaisVersFrancais($dateModif);
			include("vues/v_etatFrais.php");
			echo "<script>document.bgColor='orange';</script>";
			echo "<script>get_color(".$_SESSION['role'].");</script>";
			break;
		}
	}
}
?>