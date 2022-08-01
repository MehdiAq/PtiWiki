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
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bienvenue au PtiWiki</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <h1>Bienvenue <?php if (isset($_SESSION['username'])) echo "<em>" . $_SESSION['username'] . "</em>" ?> au PtiWiki</h1>
  <p>Un prototype de Wiki très simple en PHP</p>
  <p><a href="PtiWiki.php?op=read&amp;file=PageAccueil">Débuter</a></p>
  <?php echo $content ?>
  <br>
  <article>
      <h2>Choix de présentation</h2>
      <p>
        J'ai abordé ce TP en commençant par implanter l'authentification des Comptes 
        utilisateurs. Pour cela j'ai créé une table 'accounts' où sont stockés les 
        identifiants (username), les mots de passe cryptés ainsi que le type d'accès 
        dédié à chaque compte ('user' ou 'admin'). Par la suite j'ai créé les fichier 
        'login.php', 'logout.php' et 'register.php' qui gèrent cette fonctionnalité 
        tout en s'occupant de l'encryption et la décryption des mots de passe. 
        Il est évidemment impossible de créer un compte avec un identifiant existant 
        dans la base de donnée.
        <br><br>
        Il existe un compte administrateur dans la base de données et un compte utilisateur 
        que vous pouvez utiliser pour tester les deux mode d'accès. Les identifiants et 
        mots de passes ont été laissés dans le fichier contenant l'URL vers cette page.
        Un compte utilisateur permet notamment de modifier, détruire et créer des pages, 
        ce qu'un visiteur du site ne peut faire sans se connecter ou créer un compte.
        <br><br>
        Le compte administrateur lui, en plus de pouvoir faire ce qu'un compte 
        utilisateur peut faire, a accès à un panneau d'administration accessible à travers
        la barre de navigation en bas de page où il peut voir toutes les informations liées 
        aux usagers et aux pages tels que stockées dans la base de donnée.
        <br><br>
        Pour rendre la communication avec la base de donnée triviale et facile à utiliser 
        j'ai créé un fichier 'config.php' qui contient la configuration nécessaire pour 
        se connecter à la base de donnée. J'importe ensuite ce fichier avec "require 
        'config.php'" dans tous les fichiers php qui utilisent la connexion avec la BD.
        <br><br>
        L'étape suivant a été d'adapter les fonctions du fichier 'page.php' qui lisaient, 
        modifiaient, supprimaient et créaient les pages et leur contenu depuis des fichiers 
        texte stockées dans les serveurs. À la place j'ai implanté les requête nécessaires 
        pour effectuer les mêmes opérations en utilisant la base de donnée.
        <br><br>
        Pour finir, j'ai modifié la barre de navigation en bas de page pour la rendre 
        dynamique. Si le visiteur du site n'est pas identifié, la barre lui affiche un lien 
        pour se connecter ou s'inscrire. Aussi, il ne voit pas de liens pour modifier ou 
        détruire une page. Un utilisateur identifié, lui voit les liens pour modifier et 
        détruire une page, ainsi qu'un lien pour se déconnecter. L'administrateur lui, 
        en plus des liens accessible à l'usager identifié, voit un lien vers le panneau 
        d'administration.
      </p>
    <br>
    <article>
      <h2>Connaissances accumulées</h2>
      <p>
        Ce TP m'a permis de me familiariser avec des concepts importants de
        PHP et mySQL tel que:
      </p>
      <ul>
        <li>
          L'interface PDO qui permet de communiquer avec la base de donnée en 
          éxecutant des requêtes afin d'inscrire un usager, l'identifier, chercher
          des données à afficher dans une page ou encore pour 
          effectuer les opérations CRUD: Créer, lire, modifier et supprimer des
          données. 
        </li>
        <br>
        <li>
          L'approche dynamique de PHP qui permet de modifier le contenu d'une page 
          selon le type d'usager. Dans le cas de ce TP on a trois mode d'accès: 
          visiteur, utilisateur identifié et administrateur. Chaque type d'usager 
          donc a accès a différentes fonctionnalités
        </li>
        <br>
        <li>
          Le traitement des requêtes 'GET' et 'POST' avec PHP. J'ai appris comment 
          traiter ces requêtes pour effectuer différentes opérations comme 
          l'authentification et l'inscription d'usagers, ainsi que la création, la 
          modification et la suppression du contenu de pages.
        </li>
        <br>
        <li>
          La syntaxe de PHP, notamment les différentes fonctions prédéfinis qui sont 
          propres à ce langage comme isset(), empty(), unset(), header()...etc. 
          Sans oublier la programmation orienté-objet avec ce langage qu'on utilise 
          dans ce TP pour les objets 'Page' et 'Wiki'.
        </li>
        <br>
        <li>
          Les requêtes SQL nécessaires pour manipuler les données, que ce soit pour 
          créer la BD, les tables, gérer les accès, ainsi que les requêtes de type 
          'SELECT, 'INSERT', 'UPDATE' et 'DELETE'.
        </li>
        <br>
        <li>
          La modélisation des données: Comment créer une base de données normalisée 
          avec des relations entre les tables gérées par les clés primaires et étrangères 
          afin de garder l'intégrité et la cohérence des données.
        </li>
      </ul>
    </article>
    <br />
    <article>
      <h2>Liens</h2>
      <ul>
        <li><a href="assets/SQL scripts/db.sql">Script SQL pour la création de la BD</a></li>
        <li><a href="register.php">register.php</a></li>
        <li><a href="login.php">login.php</a></li>
        <li><a href="logout.php">logout.php</a></li>
        <li><a href="admin.php">admin.php (accessible seulement avec un compte administrateur)</a></li>
        <li><a href="config.php">config.php</a></li>
        <li><a href="Page.php">Page.php</a></li>
        <li><a href="MarkDown.php">MarkDown.php</a></li>
        <li><a href="PtiWiki.php">PtiWiki.php</a></li>
        <li><a href="Wiki.php">Wiki.php</a></li>
        <li><a href="Templates.php">Templates.php</a></li>
        <li><a href="assets/css/style.css">CSS</a></li>
      </ul>
    </article>
</body>

</html>