<?php $this->load->helper('url'); ?>
<style>
	#menu_a ul {
  	list-style-type: none;
  	margin: 0;
  	padding: 0;
  	width: 200px;
  	background-color: 	#778899;
	}

	#menu_a li a {
  	display: block;
  	color: #000;
  	padding: 8px 16px;
  	text-decoration: none;
	}

/* Change the link color on hover */
	#menu_a li a:hover {
  	background-color: #555;
 	color: white;
	}
</style>
<h3>Espace administrateur 
<?php echo $this->session->userdata('user'); ?>
</h3>
<ul id="menu_a" >
	<li>
		<?php echo anchor('c_connexion/accueil',' Accueil '); ?>
	</li>
	<li>
		<?php echo anchor('c_administrer/afficher',' Afficher les contacts '); ?>
	</li>
	<li>
		<?php echo anchor('c_connexion/deconnexion',' Déconnexion '); ?>
	</li>
</ul>