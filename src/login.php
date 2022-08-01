<?php
require('config.php');
session_start();


if (isset($_POST['username']) & isset($_POST['password'])) {
    try {
        $sth = $conn->prepare("SELECT * FROM accounts WHERE username=:username");
        $sth->bindParam(':username', $_POST['username']);
        $sth->execute();
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            echo "<script>alert(\"Cet identifiant n'existe pas\");</script>";
        } else {
            $hash = $row['password'];
            if (password_verify($_POST['password'], $hash)) {
                $_SESSION['username'] = $row['username'];
                header('Location: ' . ($row['role'] == "admin" ? 'admin' : 'index') . '.php');
            } else {
                echo "<script>alert(\"Mot de passe erroné\");</script>";
            }
        }
    } catch (PDOException $e) {
        echo "<script>alert(\"" . $e->getMessage() . "\");</script>";
    }
} else {
    echo "";
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <br />
    <a href="PtiWiki.php?op=read&file=PageAccueil">Accueil</a>
    <br />
    <div>
        <form class="formulaire" action="" method="POST">
            <label for="username">Identifiant</label>
            <input type="text" id="username" name="username" placeholder="Entrez votre identifiant..."></input>
            <br />
            <br />
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe..."></input>
            <br />
            <br />
            <input type="submit" value="Se connecter" />
        </form>
    </div>
</body>

</html>