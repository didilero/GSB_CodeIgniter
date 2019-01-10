<html>
<head>
<title>Mon journal intime</title>
<?php $this->load->helper('html');
echo meta('Content-type', 'text/html; charset=UTF-8', 'equiv');
		echo  link_tag('css/cssGeneral.css'); ?>
		<style>
			.menu ul {
			    list-style-type: none;
			    overflow: hidden;
			    background-color: #333333;
			}
			
			.menu li {
			    float: left;
			}
			
			.menu li a {
			    display: block;
			    color: white;
			    text-align: center;
			    padding: 16px;
			    text-decoration: none;
			}
			
			.menu li a:hover {
			    background-color: #111111;
			}
		</style>
	</head>
<body>
<?php 
echo heading('Mon journal intime',1);
$menu = array(
		anchor('moncontroleur/index','Accueil'),
		anchor('moncontroleur/voirContact','Afficher les contacts'),
		anchor('moncontroleur/vueAjouter','Ajouter des contacts'),
		anchor('c_connexion/connexion','Administration')
);
echo "<div class='menu'>";
echo ul($menu);
echo "</div>";
?>