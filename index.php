
{
    case 'accueil' :
    {include("vues/v_accueil.php");break;}

    case 'GestionADM' :
    {include("controleurs/c_gestionPERSO.php");break;}

    case'GestionInscrit':
    {include("controleurs/c_gestionInscriptions.php");break;}

    case'GestionFormation':
    {include("controleurs/c_gestionformations.php");break;}
    
}

?>