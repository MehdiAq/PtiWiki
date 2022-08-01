<?php
require 'config.php';
require 'Templates.php';
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username'] != 'admin') {
  header('location: index.php');
}
if (isset($_GET['delete'])) deleteAccount($_GET['delete']);


$accounts = $pages = array();

$resultat = $conn->prepare("SELECT * FROM accounts");
$resultat->setFetchMode(PDO::FETCH_ASSOC);
$resultat->execute();
$accounts = $resultat->fetchAll();

$resultat = $conn->prepare("SELECT * FROM pages");
$resultat->setFetchMode(PDO::FETCH_ASSOC);
$resultat->execute();
$pages = $resultat->fetchAll();

function deleteAccount($username) {
  global $conn;
  $resultat = $conn->prepare("DELETE FROM accounts WHERE username = '$username'");
  $resultat->execute();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panneau d'administration</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <br />
  <a href="PtiWiki.php?op=read&file=PageAccueil">Accueil</a>
  <br />
  <h1>Comptes utilisateurs:</h1>
  <table>
    <tr>
      <th>Identifiant</th>
      <th>Mot de passe crypté</th>
      <th>Mode d'accès</th>
      <th>Action</th>
    </tr>
    <?php
    foreach ($accounts as $account) { ?>
      <tr>
        <td><b><?php echo $account['username']; ?></b></td>
        <td><?php echo $account['password']; ?></td>
        <td><?php echo $account['role']; ?></td>
        <td><a href="?delete=<?php echo $account['username']; ?>">Supprimer</a></td>
      </tr>
    <?php } ?>
  </table>
  <br />
  <h1>Pages:</h1>
  <table>
    <tr>
      <th>Titre</th>
      <th>Contenu</th>
      <th>Action</th>

    </tr>
    <?php
    foreach ($pages as $page) { ?>
      <tr>
        <td><b><?php echo $page['title']; ?></b></td>
        <td><textarea rows="15" cols="80"><?php echo $page['content']; ?></textarea></td>
        <td><?php echo editLinkTPL($page['title'], "Éditer") . "<br><br><br>" . deleteLinkTPL($page['title'], "Supprimer"); ?></td>
      </tr>
    <?php } ?>
  </table>
  <br />

</body>

</html>