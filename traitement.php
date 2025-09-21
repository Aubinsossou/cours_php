<?php
$host = 'localhost';
$dbname = 'gestion_candidature';
$user = 'admin';
$pass = 'admin';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
$pdo = new PDO($dsn,  $user,  $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


/*Coté candidats*/
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if (isset($_POST["valider"])) {
		if (!empty($_POST["last_name"]) && !empty($_POST["prenom"]) && !empty($_POST["date_of_naissance"]) && !empty($_POST["photo_candidat"])) {
			$last_name = htmlspecialchars(trim($_POST["last_name"]));
			$prenom = htmlspecialchars(trim($_POST["prenom"]));
			$date_of_naissance = htmlspecialchars(trim($_POST["date_of_naissance"]));
			$photo_candidat = htmlspecialchars(trim($_POST["photo_candidat"]));
			$id_partis = htmlspecialchars(trim($_POST["id_partis"]));
			//echo "Bonjour " . $last_name . " " . $prenom . "Voici ma date de naissance  " . $date_of_naissance . "Voici le lien vers ma photo  " . $photo_candidat;
			//echo "<br>Information du formulaire récupérer <br>  ";
			try {
				$sql = "INSERT INTO candidats(nom_candidat, prenom_candidat, date_of_naissance, photo_candidat,id_partis) VALUES (:nom_candidat,:prenom_candidat,:date_of_naissance,:photo_candidat,:id_partis)";
				$stmt = $pdo->prepare($sql);
				$stmt->execute(['nom_candidat' => $last_name, 'prenom_candidat' => $prenom, 'date_of_naissance' => $date_of_naissance, 'photo_candidat' => $photo_candidat,'id_partis'=> $id_partis]);
				//echo "Bonjour $last_name,  $prenom,Voici mon email $email,Voici mon numéro $num, et mon Mot de passe $password";
				header("Location:listes_candidat.php");
				echo "Candidat ajouté à la base de données ";
			} catch (PDOException $e) {
				echo "Erreur de connexion : " . $e->getMessage();
			}
		} else {
			echo "Veillez remplir tout les champs";
		}
	}
}
/*Coté partis */

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if (isset($_POST["valider_partis"])) {
		if (!empty($_POST["name_of_partis"]) && !empty($_POST["sigle"]) && !empty($_POST["logo"])) {
			$name_of_partis = htmlspecialchars(trim($_POST["name_of_partis"]));
			$sigle_partis_politique = htmlspecialchars(trim($_POST["sigle"]));
			$logos_partis_politique = htmlspecialchars(trim($_POST["logo"]));
			//echo "Bonjour " . $name_of_partis . " "  . " Voici le sigle de mon parti  " . $nom_partis_politique . " Voici le logo de mon parti  " . $logos_partis_politique;
			try {
				//$pdo = new PDO($dsn,  $user,  $pass);
				$sql = "INSERT INTO partis_politique(nom_partis_politique, sigle_partis_politique,  logos_partis_politique) VALUES (:nom_partis_politique,:sigle_partis_politique,:logos_partis_politique)";
				$stmt = $pdo->prepare($sql);
				$stmt->execute(['nom_partis_politique' => $name_of_partis, 'sigle_partis_politique' => $sigle_partis_politique, 'logos_partis_politique' => $logos_partis_politique]);
				 echo "Parti ajouté à la base de données ";
				header("Location:listes_partis.php");
			} catch (PDOException $e) {
				echo "Erreur de connexion : " . $e->getMessage();
			}
			echo "<br>Information du formulaire récupérer <br>  ";
		} else {
			echo "Veillez remplir tout les champs";
		}
	}
}

/*Envoie des donnéees dans la table partis*/
