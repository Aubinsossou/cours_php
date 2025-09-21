<?php 

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ajouter un partis</title>
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
	<div class="Formulaire_partis">
		<form action="traitement.php" method="post">
			<h2>Ajouter un Partis politique </h2>
			<label for="name_of_partis">Nom du partis:</label>
			<input type="text" id="name_of_partis" name="name_of_partis">
			<label for="sigle">Sigle du partis:</label>
			<input type="text" name="sigle" id="sigle">
			<label for="logo">Logo du partis:</label>
			<input type="file" name="logo" id="logo">

			<div class="button">
				<button type="submit" id="button" name="valider_partis">Envoyer</button>
			</div>
		</form>
	</div>
	<a href="listes_partis.php" style="text-decoration: none;">voir la liste des partis</a>
</body>

</html>