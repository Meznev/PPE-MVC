<div id="ChoixFormations">
<form method="POST" action="index.php?Chemin=GestionFormation&action=??">
   <fieldset>
     <center><legend>La Formation : <?=$RecupNomDomaine[0] ?></legend></center>
		<p>
      
         <?php
         $i = 0;
       
         foreach($RecupFormationInfos as $formation)
         {
           $i ++;
         }

        echo "Nombre de formations disponible  : ".$i;
           

          foreach($RecupFormationInfos as $uneFormation)
          {
            $numFormation = $uneFormation['NUM_FORMA'];
            $numDomaine= $uneFormation['NUM_DOMAINE'];
            $Libelle = $uneFormation['LIBELLE_FORMA'];
            $public = $uneFormation['PUBLIC_FORMA'];
            $objectif = $uneFormation['OBJ_FORMA'];
            $contenu = $uneFormation['CONTENU_FORMA'];
            $cout = $uneFormation['COUT_FORMA'];

         

        echo '<table  border="2"  size ="2" cellpadding= "5" cellspacing="1">';
        ?>
        <tr>
            <th>Libelle</th>
            <th>Personnes concernés</th>
            <th>Objectifs</th>
            <th>Contenue de la formation</th>
            <th>Coût de la formation</th>
        </tr>
            <tr>
              <td><?=$Libelle ?></td>&nbsp
              <td><?=$public?></td></br>
              <td><?=$objectif ?></td></br>
              <td><?=$contenu?></td></br>
              <td><?=$cout?> €</td></br>
              <td><a href=index.php?Chemin=GestionInscrit&numformation=<?=$numFormation ?>&numdomaine=<?=$numDomaine ?>&action=PrepareInscription><img src="images/AjoutPanier.png" title="Voir les sessions" </td></a>
            </tr>
            <?php
          }

         ?>
         </table>
      </p>
</form>
</div>
