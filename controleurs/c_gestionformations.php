<?php
include("util/fonctions.inc.php");

$action = $_REQUEST['action'];
switch($action)
{
	case 'ChoixFormations':
	{   
        $RecupDomaine = $pdo->recupdomaine();
       
      
        include("vues/v_choixformations.php");
        break;
    }
    case 'AfficherFormations' :
    { 
        $_REQUEST['idselect'] = $_POST['form'];
        $idDomaine = $_POST['form'];


        $RecupFormationInfos = $pdo->recupFormation($idDomaine);
        $RecupNomDomaine = $pdo->recupLibelleDomaine($idDomaine);

        

       
        // Envoyer l'id de la liste vers fonction qui renvoie toutes les informations a afficher dans la vue ( formations et tout le reste quoi )
        include("vues/v_afficheformations.php");
        break;
    }
    case 'connexion' :
    {
              
	
    }

    case 'FormationPerso' :
    {

        $idParti = $_SESSION['ID_PARTI'];
 

        $LaSessionParticipant = $pdo->recupSessionParti($idParti);

    

        include("vues/v_formationparticipant.php");

        
        break;
    }
}


?>


