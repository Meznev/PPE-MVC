<?php



$action = $_REQUEST['action'];
switch($action)
{
	case 'prepareconnexion':
	{
                include("vues/v_connexion.php");
        break;
    }
    case 'connexion' :
    {
                $Connect = $pdo->Connexion($_POST['nom'] , $_POST['mdp']);
                $SiAdmin = $pdo->Admin($_POST['nom']);
                $RecupIdPerso = $pdo->RecupIdPerso($_POST['nom']);
                $_SESSION['ID_PARTI'] = $RecupIdPerso;
                
                if($Connect)
                { 
                  
                    $_SESSION['Authentifier'] = 1;
                    header("location:index.php");			
                    
                }
                else
                {
                    
                    $_SESSION['Authentifier'] = 0;
                    include("vues/v_erreurs.php");
	
                }

                if($SiAdmin)
                {
                    $_SESSION['admin'] = 0;
                }
                else
                {
                    $_SESSION['admin'] = 1;
                }
                break;
	
    }

    case 'deconnexion' :
    {
        unset($_SESSION['admin']);
        unset($_SESSION['Authentifier']);
        unset($_SESSION['ID_PARTI'] );
        
        header('location:index.php');

        
        break;
    }
}


?>


