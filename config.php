<?php
/* Nom d'hôte du serveur MySQL */
$host = 'localhost';
/* Nom d'utilisateur du compte MySQL */
$user = 'root';
/* Mot de passe du compte MySQL */
$passwd = 'root';
/* Le schéma que vous souhaitez utiliser */
$schema = 'pti_wiki';
/* L'objet AOP */
$conn = NULL;
/* Chaîne de connexion ou "nom de la source de données" */
$dsn = 'mysql:host=' . $host . ';dbname=' . $schema;

/* Connexion à l'intérieur d'un bloc try/catch */
try {
     /* Création d'un objet PDO */
     $conn = new PDO($dsn, $user, $passwd);
    /* Activer les exceptions sur les erreurs */
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    /* S'il y a une erreur, une exception est levée */
    echo "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>