<div id="Inscription">
<form method="POST" action="index.php?Chemin=GestionADM&action=connexion">
   <fieldset>
     <center><legend>Session Disponible(s) :</legend><center>

     <?php
     $IDPARTI = $_SESSION['ID_PARTI'];

     if($LesSessionDeLaFormation == null)
     {
         $message = "Aucunes session disponible pour cette formation";
         $_SESSION['message'] = $message;
         header('location:index.php');
     }
     else
     {
     $i= 0;

     foreach($LesSessionDeLaFormation as $session)
     {
         $i ++;
     }

     echo "Nombre de sessions disponible  : ".$i;

     foreach($LesSessionDeLaFormation as $uneSession)
     {
         $numDomaineSession = $uneSession['NUM_DOMAINE'];
         $numFormationSession = $uneSession['NUM_FORMA'];
         $numSession = $uneSession['ID_SESSION'];
         $numLieu = $uneSession['NUM_LIEU'];
         $NbPlaceRest = $uneSession['NB_PLACE_RES'];
         $NbPlaceMax = $uneSession['NB_PLACE_MAX'];
         $DateSession = $uneSession['DATE_SESSION'];
         $HeureSession = $uneSession['HEURE_SESSION'];
         $DateLimiteInscription = $uneSession['DATE_LIMITE_INSCRIPTION'];

	?>
    <table border="2" size="2" cellpadding="5" cellespacing="1">
    <tr>
        </br></br><th>Numéro du lieu</th>
        <th>Nombre de places restantes</th>
        <th>Nombre de places maximum</th>
        <th>Date de la session</th>
        <th>Heure de la session</th>
        <th>Date limite d'inscription</th>
    </tr>
        <tr>
            <td><?=$numLieu ?></td>
            <td><?=$NbPlaceRest ?></td>
            <td><?=$NbPlaceMax ?></td>
            <td><?=$DateSession ?></td>
            <td><?=$HeureSession ?></td>
            <td><?=$DateLimiteInscription ?></td>
            <td><a href=index.php?Chemin=GestionInscrit&numformation=<?=$numFormation ?>&numdomaine=<?=$numDomaineSession ?>&numParti=<?=$IDPARTI ?>&numSession=<?=$numSession ?>&action=Inscription><img src="images/AjoutPanier.png" title="S'inscrire" </td></a></br>
        </tr>
    <?php
     }
    }
     ?>
     </table>
    
</form>
</div>