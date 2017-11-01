
	<form method="post" action="index.php?action=Connexion">   
	<fieldset>
	
	<legend>Connexion</legend>

	<?php

	if (isset($pseudo_password_empty) && $pseudo_password_empty) {
		echo "Il faut entrer des Idds";
	}

	if (isset($pseudo_password_incorrect) && $pseudo_password_incorrect) {
	    echo "Ici on écrit un message d'erreur car le couple pseudo / password saisi n'existe pas en BDD";
    }

   
	?>

	<p>
	<label for="pseudo">Pseudo :</label><input name="pseudo" type="text" id="pseudo" /><br />
	<label for="password">Mot de Passe :</label><input type="password" name="password" id="password" />
	</p>
	</fieldset>
	<p><input type="submit" value="Connexion" /></p></form>

	 
	


