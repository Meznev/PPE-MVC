<div id="ConnexionAdmin">
<form method="POST" action="index.php?Chemin=GestionADM&action=connexion">
   <fieldset>
     <legend>Identifiez-vous</legend>
		<p>
			&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="nom">Nom </label>
			<input id="nom" type="text" name="nom"  size="30" maxlength="45" required>
		</p>
		<p>
			<label for="mdp">Mot de passe</label>
			 <input id="mdp" type="text" name="mdp"  size="30" maxlength="45" required>
		</p>
	
	  	<p>
         <input type="submit" value="Valider" name="valider">
    	 
      </p>
</form>
</div>