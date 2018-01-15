<div id="ChoixFormations">
<form method="POST" action="index.php?Chemin=GestionFormation&action=AfficherFormations">
   <fieldset>
     <center><legend>Choisissez une formation</legend></center>
		<p>
        <center><FORM>



          <select name="form" id="form">
          <?php
         
         foreach($RecupDomaine as $unDomaine)
         {
           
            echo '<option value="'.$unDomaine['NUM_DOMAINE'].'" id ="num_domaine" >'.$unDomaine['LIBELLE_DOMAINE'].'</option>';
          
          }
          ;

          ?>
          </select>
         
            
            </br></br><input type="submit" value="Valider" name="valider">
        </FORM></center>
      </p>
</form>
</div>