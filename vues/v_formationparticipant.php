<div id="ChoixFormations">
<form method="POST" action="index.php?Chemin=GestionFormation&action=AfficherFormations">
   <fieldset>
     <center><legend>Choisissez une formation</legend></center>
		<p>
        <center><FORM>

        <?php
        if($LaSessionParticipant == null)
        {
            echo " Pas d'inscription  ";
        }
        else
        {
            foreach($LaSessionParticipant as $LaSession)
            {
                $numDomaineSession = $LaSession['NUM_DOMAINE'];
                $numFormationSession = $LaSession['NUM_FORMA'];
                $DateSession = $LaSession['DATE_INSCRIPTION'];
                $IdSessionPart = $LaSession['ID_SESSION'];

                $recupLibelleDomaine = $pdo->recupLibelleDomaine($numDomaineSession);
                $recupLibelleFormation = $pdo->recupLibelleFormation($numFormationSession);
                $LibelleDomainePart = $recupLibelleDomaine[0];
                $LibelleFormationPart = $recupLibelleFormation[0];
                
            
            
        
        echo '<table  border="2"  size ="2" cellpadding= "8" cellspacing="8">';
        ?>
        <tr>            
            <th>Domaine</th>
            <th>Contenue de la formation</th>
            <th>Date</th>
            
        </tr>
            <tr>
              <td><?=$LibelleDomainePart ?></td></br>
              <td><?=$LibelleFormationPart?></td></br>
              <td><?=$DateSession?></td></br>

              
            </tr>
            <?php
   }
}
         ?>
         </table>
          
         
            
            
        </FORM></center>
      </p>
</form>
</div>