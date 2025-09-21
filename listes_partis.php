<?php
// Partis 
$id = $_GET['id'];
$pdo = new PDO("mysql:host=localhost;dbname=gestion_candidature;charset=utf8", "admin", "admin");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
	$query = "SELECT * FROM `partis_politique`";
	$stmt = $pdo->query($query);
	$partis = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
	echo "Erreur de connexion : " . $e->getMessage();
}
echo count($partis);
if (isset($_GET["id"])) {
	try {
	
		$sql = "DELETE FROM `partis_politique` WHERE `id_partis`=:id";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(["id" => $id]);
		header("Location:listes_partis.php" );
	} catch (PDOException $e) {
		echo "Erreur de connexion : " . $e->getMessage();
	}

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liste partis politique</title>
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
	<div class="liste des partis politiques">
		<h2>Liste des partis politiques</h2>
		<table>
			<thead>
				<tr>
					<th>ID du partis</th>
					<th>Nom du partis</th>
					<th>Sigle du partis</th>
					<th>Logo du partis</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($partis as $parti):; ?>
					<tr>
						<td><?= htmlspecialchars($parti['id_partis']) ?></td>
						<td><?= htmlspecialchars($parti['nom_partis_politique']) ?></td>
						<td><?= htmlspecialchars($parti['sigle_partis_politique']) ?></td>
						<td><img src="<?= htmlspecialchars($parti['logos_partis_politique']) ?>" alt="Photo du candidat"></td>
						<td>
							<div class="button" style="text-align: center; ">
								<a href="update_partis.php?id=<?php echo $parti['id_partis'] ?>" class="button1">Modifier</a>
								<a href="listes_partis.php?id=<?php echo $parti['id_partis'] ?>" name="supprimer_partis" class="button2">Supprimer</a>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot>

			</tfoot>
		</table>
	</div>
	<a href="add_partis.php">Ajouter un partis</a>
</body>

</html>