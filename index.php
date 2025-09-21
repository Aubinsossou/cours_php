<?php

$nom = htmlspecialchars($_POST["nom"]);
$message = htmlspecialchars($_POST["message"]);
//var_dump($_POST);

if (isset($_POST["envoyer"])) {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "admin", "admin");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql =  "INSERT INTO `message`(nom,msg) VALUES (?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $message]);
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }
}
try {
    $sql =  "SELECT * FROM `message`";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
	$forum = $stmt->fetchAll(PDO::FETCH_ASSOC);

}catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
</head>

<body>
    <div class="forum">
        <form action="index.php" method="post">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom">
            <label for="message">Message:</label>
            <input type="text" name="message" id="message">
            <button type="submit" name="envoyer">Envoyer</button>
        </form>
    </div>
    <?php foreach($forum as $forums): ?>
    <div class="display">
    
        <h3><?php echo $forums["nom"] ;?></h3>
        <p><?php echo $forums["msg"] ;?></p>
    </div>
    <?php endforeach ?>

</body>

</html>