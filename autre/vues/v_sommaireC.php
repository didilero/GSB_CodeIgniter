    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    
        <h2>
    
</h2>
    
      </div>  
        <ul id="menuList">
			<li >
				Comptable :<br>
				<?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?>
			</li>
			<li class="smenu">
				<a href="index.php?uc=etatFrais&action=selectionnerUtilisateur" title="Consultation des fiches de frais">Fiche de frais à validée</a>
				<a href="index.php?uc=etatFrais&action=VoirTouteLesFiches" title="Consultation des fiches de frais">Toute les fiches de frais validées</a>
			</li>
			<li class="smenu">
				<a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
			</li>
         </ul>
        
    </div>
    