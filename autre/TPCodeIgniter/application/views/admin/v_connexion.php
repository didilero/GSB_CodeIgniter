<h3>Connexion à l'espace sécurisé</h3>
<?php 
	$this->load->helper('form');
	echo form_open("c_administrer");
?>

<p>Login :</p>
<?php 
echo validation_errors();
echo form_input("identifiant");?>
<p>Mot de passe :</p>
<?php echo form_password("password");
	echo form_submit("login", "Connexion");
	echo form_close('</div>');
?>
