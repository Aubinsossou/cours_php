<?php

$host = 'localhost';
$dbname = 'minichat';
$user = 'admin';
$pass = 'admin';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if (isset($_POST["valider"])) {
		if (!empty($_POST["last_name"]) && !empty($_POST["prenom"]) && !empty($_POST["email"]) && !empty($_POST["num"]) && !empty($_POST["password"])) {
			$last_name = htmlspecialchars(trim($_POST["last_name"]));
			$prenom = htmlspecialchars(trim($_POST["prenom"]));
			$email = htmlspecialchars(trim($_POST["email"]));
			$num = htmlspecialchars(trim($_POST["num"]));
			$pass_word = htmlspecialchars($_POST["password"]);
			//echo "Bonjour " . $last_name . " " . $prenom . "Voici mon email " . $email . "Voici mon numéro " . $num . "et mon Mot de passe " . $pass_word;
			echo "<br>Information du formulaire récupérer <br>  ";
			try {
				$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",  $user,  $pass);
				//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO users(nom, prenom, email, num, pass_word) VALUES (:last_name,:prenom,:email,:num,:pass_word)";
				$stmt = $pdo->prepare($sql);
				$stmt->execute(['last_name' => $last_name, 'prenom' => $prenom, 'email' => $email, 'num' => $num, 'pass_word' => $pass_word]);
				//echo "Bonjour $last_name,  $prenom,Voici mon email $email,Voici mon numéro $num, et mon Mot de passe $password";
				echo "Connexion réussie à la base de données ";
			} catch (PDOException $e) {
				echo "Erreur de connexion : " . $e->getMessage();
			}
		} else {
			echo "Veillez remplir tout les champs";
		}
	}
}
//var_dump($_POST);

 /*echo "le mot ecole229 est ecrit avec " . strlen($ecole) . " caractère <br>";
	echo str_replace("ecole229", "HECM", $ecole) . "</br>";
	define("ville", "Natitingou");*/


  
 


/*Connexion a une base de donnée */
