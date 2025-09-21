<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Traitement de Formulaire en php</title>
	<style>
		h2 {
			text-align: center;
		}

		.formulaire {
			display: flex;
			justify-content: center;
			flex-direction: column;
		}

		form {
			width: 470px;
			padding: 20px 40px;
			background-color: azure;
			border-radius: 5px;
			margin: 25px auto;

		}

		label {
			display: block;
			padding: 5px;
		}

		input,
		select {
			width: 100%;
			height: 17px;
			border-radius: 6px;
			border: 1px solid;
		}

		.button {
			display: flex;
			justify-content: center;
			margin: 10px;

		}

		#button {
			width: 120px;
			height: 30px;
			background-color: blue;
			border-radius: 7px;
			color: white;
			font-weight: 900;
			border: 1px solid;
		}
	</style>
</head>

<body>
	<div class="Formulaire_candidat">
		<form action="traitement.php" method="post">
			<h2> Ajouter un candidats</h2>
			<label for="last_name">Nom du candidat:</label>
			<input type="text" id="last_name" name="last_name">
			<label for="prenom">Prénom du candidat:</label>
			<input type="text" name="prenom" id="prenom">
			<label for="date_of_naissance">Date de naissance:</label>
			<input type="date" name="date_of_naissance" id="date_of_naissance">
			<label for="phto_candidat">Photo du candidat:</label>
			<input type="file" id="photo_candidat" name="photo_candidat">
			<!-- <label for="id_partis">ID du partis:</label>
			<input type="text" id="id_partis" name="id_partis"> -->
			<div class="button">
				<button type="submit" id="button" name="valider">Envoyer</button>
			</div>
		</form>
	</div>
<a href="listes_candidat.php">Voir la liste des candidats</a>
</body>

<!--  strlen() pour connaitre la longueur d'un string
trim() pour supprimer l'espace au debut et a la fin
ltrim() pour supprimer l'espace au debut
rtrim() pour supprimer l'espace a la fin
str_word_count() pour afficher le nombre de mot
str_replace("PHP", "Python", $texte) pour remplacer une chaine par une autre

str_replace("PHP", "Python", $txt); pour remplacer une partie d'une chaine de caractere
 -->

</html>

<?php

/* 	echo "Bonjour je m'appelle " . $_POST["last_name"] ." " . $_POST["prenom"] . " <br>" . " je commence bientot mes stages <br>" . "Voici mon Email " . $_POST["email"] ."<br> Mon numéro est ". $_POST["num"] . "<br> Le mot de passe est ". $_POST["password"] ;
 */
//$ville = "Parakou";


?>