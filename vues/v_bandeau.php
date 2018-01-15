<div id="bandeau">
<!-- Images En-t�te -->

</div>
<!--  Menu haut-->

	<center><?php 
	if(isset($_SESSION['Authentifier']) && $_SESSION['Authentifier'] == 1)
		{
			echo '<li><a href="index.php?Chemin=accueil&action=accueil"> Accueil </a></li>';
			echo '<li><a href="index.php?Chemin=GestionFormation&action=ChoixFormations"> Consulter Formations </a></li>';
			echo '<li><a href="index.php?Chemin=GestionFormation&action=FormationPerso"> Vos Formations </a></li>';
			echo '<li><a href="index.php?Chemin=GestionADM&action=deconnexion"> Déconnexion </a></li>';
			
			

			
		}
		else
		{
			echo '<li><a href="index.php?Chemin=GestionADM&action=prepareconnexion"> Connexion </a></li>';
			
		}
	
	?></center>l


