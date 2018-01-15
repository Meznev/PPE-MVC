<?php



$action = $_REQUEST['action'];
switch($action)
{
	case 'AfficherInscription':
	{
        include("vues/v_inscription.php");
        break;
    }
    case 'PrepareInscription' :
    {

       $numFormation = $_REQUEST['numformation'];
       $numDomaine = $_REQUEST['numdomaine'];

       

     
       

       $LesSessionDeLaFormation = $pdo->recupSessiondeFormation($numFormation , $numDomaine);
       include("vues/v_inscription.php");

        break;
    }

    case 'Inscription' :
    {
      $numFormation  = $_REQUEST['numformation'];
      $numDomaine = $_REQUEST['numdomaine'];
      $IdParti = $_REQUEST['numParti'];
      $numSession= $_REQUEST['numSession'];
      $date = $_SESSION['DateActuelle'];

      $NbFormationPart = $pdo->RecupNbForm($IdParti);
      $NbDomainePart = $pdo->RecupNbDom($IdParti , $numDomaine);
      
      foreach($NbFormationPart as $nbform)
      {
        $NbForm = $nbform[0];
      }

      foreach($NbDomainePart as $nbdom)
      {
        $NbDom = $nbdom[0];
      }

      

      if($NbForm >= 3)
      {
          $message = " Vous êtes déja  inscrit a 3 formations , impossible de s'inscrire à une autre session  , ou Impossible de choisir deux session du même domaine ";
          $_SESSION['message'] = $message;
          
          header('location:index.php');
      }
      else
      {

      $InscriptionParticipant = $pdo->InsertionInscrit($numSession,$numFormation,$numDomaine ,$IdParti , $date);
      echo "Bonjour c'est le nombre de domaine : ".$NbDom;

      $message = "Inscription réussie ! ";
      $_SESSION['message'] = $message;

      //header('location:index.php');
      }
        
        break;
    }
}


?>