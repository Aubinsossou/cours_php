<?php
try {
	$id = $_GET['id'];
	$pdo = new PDO("mysql:host=localhost;dbname=gestion_candidature;charset=utf8", "admin", "admin");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = "SELECT * FROM `candidats`  ORDER BY nom_candidat ASC";
	$stmt = $pdo->query($query);
	$candidats = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
	echo "Erreur de connexion : " . $e->getMessage();
}
//var_dump( $candidats );

try {

	$sql = "DELETE FROM `candidats` WHERE `id_candidats`=:id";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(["id" => $id]);
} catch (PDOException $e) {
	echo "Erreur de connexion : " . $e->getMessage();
}


//var_dump($partis);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liste des candidats</title>
	<style>
		a {
			text-decoration: none;
			padding: 7px 12px;
			border-radius: 5px;
		}

		.button1 {
			background-color: green;
			color: white;
		}

		.button2 {
			background-color: red;
			color: white;
			margin-left: 10px;
		}

		h2 {
			text-align: center;
		}

		table {
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 30px;
		}

		th,
		td {

			padding: 8px;
		}

		img {
			max-width: 60px;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		tr:nth-child(odd) {
			background-color: white;
		}
	</style>
</head>

<body>
	<h2>Liste des candidats</h2>
	<div class="liste_candidat">
		<table>
			<thead>
				<tr>
					<th>ID du candidat</th>
					<th>Nom du candidat</th>
					<th>Prénom du candidat</th>
					<th>Date de naissance</th>
					<th>Photo</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($candidats as $candidat): ?>
					<tr>
						<td><?= htmlspecialchars($candidat['id_candidats']) ?></td>
						<td><?= htmlspecialchars($candidat['nom_candidat']) ?></td>
						<td><?= htmlspecialchars($candidat['prenom_candidat']) ?></td>
						<td><?= htmlspecialchars($candidat['date_of_naissance']) ?></td>
						<td>
							<img src="<?= htmlspecialchars($candidat['photo_candidat']) ?>" alt="Photo du candidat">
						</td>
						<td>
							<div class="button" style="text-align: center; ">
								<a href="update_candidat.php?id=<?php echo $candidat['id_candidats'] ?>" class="button1">Modifier</a>
								<a href="listes_candidat.php?id=<?php echo $candidat['id_candidats'] ?>" name="valider_supprimer" class="button2">Supprimer</a>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
								<a href="add_candidat.php" >Ajouter un candidat</a>

	</div>
	
</body>

</html>