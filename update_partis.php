<?php 
$id=htmlspecialchars($_GET["id"]);

////////Partis Politik
$pdo = new PDO("mysql:host=localhost;dbname=gestion_candidature;charset=utf8","admin","admin");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
	$stmt = $pdo->prepare("SELECT * FROM partis_politique WHERE id_partis = (:id_partis)");
	$stmt->execute(['id_partis' => $id]);
	$partis = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
	die("Erreur de connexion : " . $e->getMessage());
}

if (isset($_POST["update_partis"])) {
	$id = htmlspecialchars(trim($_POST["id"]));
	echo  $id;
	try {
		$nom_partis = htmlspecialchars(trim($_POST["name_of_partis"]));
		$sigle = htmlspecialchars(trim($_POST["sigle"]));
		$logos = htmlspecialchars(trim($_POST["logo"]));
		$sql = "UPDATE partis_politique SET nom_partis_politique = :nom_partis, sigle_partis_politique = :sigle, logos_partis_politique = :logos WHERE id_partis = :id";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(params: ["nom_partis" => $nom_partis, "sigle" => $sigle, "logos" => $logos, "id" => $id]);
		echo "J'ai ete cliqué";
		header("Location: listes_partis.php");
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
	<title>Modifier un partis politique</title>
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
		<form action="update_partis.php" method="post">
			<h2>Modifier un Partis politiques </h2>
			<label for="name_of_partis">Nom du partis:</label>
			<input type="text" id="name_of_partis" name="name_of_partis" value="<?= htmlspecialchars($partis['nom_partis_politique']) ?>">
			<label for="sigle">Sigle du partis:</label>
			<input type="text" name="sigle" id="sigle" value="<?= htmlspecialchars($partis['sigle_partis_politique']) ?>">
			<label for="logo">Logo du partis:</label>
			<input type="file" name="logo" id="logo" value="<?= htmlspecialchars($partis['logos_partis_politique']) ?>">
			<input type="hidden" value="<?= $id ?>" name="id">
			<div class="button">
				<button type="submit" id="button" name="update_partis">Envoyer</button>
			</div>
		</form>
	</div>
	<a href="listes_partis.php" style="text-decoration: none;">voir la liste des partis</a>

</body>

</html>