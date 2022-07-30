<?php
require('config.php');
session_start();
if (isset($_SESSION['username'])) {
  $content = "<h4><a href=\"logout.php\">Se déconnecter</a></h4>";
} else {
  $content = "<p><a href=\"login.php\">Se connecter</a></p>
    <p><a href=\"register.php\">Créer un compte</a></p>";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bienvenue au PtiWiki</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Bienvenue <?php if (isset($_SESSION['username'])) echo "<em>" . $_SESSION['username'] . "</em>" ?> au PtiWiki</h1>
  <p>Un prototype de Wiki très simple en PHP</p>
  <p><a href="PtiWiki.php?op=read&amp;file=PageAccueil">Débuter</a></p>
  <?php echo $content ?>
</body>

</html>