
	<form method="post" action="index.php?action=Connexion">   
	<fieldset>
	
	<legend>Connexion</legend>

	<?php

	if (isset($pseudo_password_empty) && $pseudo_password_empty) {
		echo "<i>Il faut entrer l'identifiant et le mot de passe</i>";
	}

	if (isset($pseudo_password_incorrect) && $pseudo_password_incorrect) {
	    echo "<i>Oups ! Il semblerait qu'il y ait une erreur dans l'identifiant ou le mot de passe</i>";
    }

   
	?>

	<p>
	<label for="pseudo">Pseudo :</label><input name="pseudo" type="text" id="pseudo" /><br />
	<label for="password">Mot de Passe :</label><input type="password" name="password" id="password" />
	</p>
	</fieldset>
	<p><input type="submit" value="Connexion" /></p></form>

	 
	


