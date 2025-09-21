<?php
$id = $_GET['id'];
//var_dump($_GET);
$pdo = new PDO("mysql:host=localhost;dbname=gestion_candidature;charset=utf8", "admin", "admin");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {

	$stmt = $pdo->prepare("SELECT * FROM candidats WHERE id_candidats = (:id_candidats)");
	$stmt->execute(['id_candidats' => $id]);
	$candidat = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
	die("Erreur de connexion : " . $e->getMessage());
}

if (isset($_POST["valider_update"])) {
	$last_name = htmlspecialchars(trim($_POST["last_name"]));
	$prenom = htmlspecialchars(trim($_POST["prenom"]));
	$date_of_naissance = htmlspecialchars(trim($_POST["date_of_naissance"]));
	$photo_candidat = htmlspecialchars(trim($_POST["photo_candidat"]));
	$id_partis = htmlspecialchars(trim($_POST["id_partis"]));
	echo $last_name, $prenom, $date_of_naissance, $photo_candidat, $id_partis;
	try {
		$sql = "UPDATE `candidats` SET `nom_candidat`=':last_name',`prenom_candidat`=':prenom',`date_of_naissance`=':date_of_naissance',`photo_candidat`=':photo_candidat',`id_partis`=':id_partis'";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(["last_name" => $last_name, "prenom" => $prenom, "date_of_naissance" => $date_of_naissance, "photo_candidat" => $photo_candidat, "id_partis" => $id_partis]);
	} catch (PDOException $e) {
		die("Erreur de connexion : " . $e->getMessage());
	}
}



?>
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
			margin: 30px auto;

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
	<div class="Formulaire">
		<form action="update_candidat.php" method="post">
			<h2>Modifier les infos d'un candidats</h2>
			<label for="last_name">Nom du candidat:</label>
			<input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($candidat['nom_candidat']) ?>">
			<label for="prenom">Prénom du candidat:</label>
			<input type="text" name="prenom" id="prenom" value="<?= htmlspecialchars($candidat['prenom_candidat']) ?>">
			<label for="date_of_naissance">Date de naissance:</label>
			<input type="date" name="date_of_naissance" id="date_of_naissance" value="<?= htmlspecialchars($candidat['date_of_naissance']) ?>">
			<label for="phto_candidat">Photo du candidat:</label>
			<input type="file" id="photo_candidat" name="photo_candidat" value="<?= htmlspecialchars($candidat['photo_candidat']) ?>">
			<label for="id_partis">ID du partis:</label>
			<input type="text" id="id_partis" name="id_partis" value="<?= htmlspecialchars($candidat['id_partis']) ?>">
			<div class="button">
				<button type="submit" id="button" name="valider_update">Envoyer</button>
			</div>
		</form>
	</div>

</body>

</html>