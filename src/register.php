<?php
require('config.php');
session_start();


if (isset($_POST['username']) & isset($_POST['password'])) {
    try {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sth = $conn->prepare("INSERT INTO `accounts`(`username`, `password`) VALUES (:username, :password)");
        $sth->bindParam(':username', $username);
        $sth->bindParam(':password', $password);
        $sth->execute();
        $_SESSION['username'] = $username;
        header('location: index.php');
    } catch (PDOException $e) {
        echo "<script>alert(\"" . $e->getMessage() . "\");</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <br />
    <a href="PtiWiki.php?op=read&file=PageAccueil">Accueil</a>
    <br />
    <div>
        <form class="formulaire" action="" method="POST">
            <label for="username">Identifiant</label>
            <input type="text" id="username" name="username" placeholder="Choisissez un identifiant..."></input>
            <br />
            <br />
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Choisissez un mot de passe..."></input>
            <br />
            <br />
            <input type="submit" value="S'inscrire" />
        </form>
    </div>

</body>

</html>