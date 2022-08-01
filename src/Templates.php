<?php
require_once 'MarkDown.php';
require_once 'config.php';
// templates transposés de 
// James Payne, Beginning Python, Wiley, 2010, p 435-436

function mainTPL($title, $body, $navlinks) {
    return <<<HTML
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>$title</title>
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
    <body>
        $body
        <hr>
        $navlinks
    </body>
</html>
HTML;
}

function viewTPL($banner, $processedText) {
    return <<<VIEW
    $banner
    $processedText
VIEW;
}

function editTPL($banner, $pageURL, $text) {
    return <<<WRITE
    $banner
    <form method="POST" action="PtiWiki.php">
        <input type="hidden" name="op" value="save"></input>
        <input type="hidden" name="file" value="$pageURL"></input>
        <textarea rows="15" cols="80" name="data">$text</textarea>
        <br></br>
        <input type="submit" value="sauver"></input>
    </form>
WRITE;
}

function errorTPL($error) {
    return "<h1>Erreur: $error</h1>";
}

function bannerTPL($banner) {
    return "<p style='color:green'>$banner</p><hr></hr>";
}

function viewLinkTPL($file, $name) {
    global $wiki, $conn;
    $page = $wiki->getPage($file);
    if ($page->exists($conn)) {
        $op = "read";
        $style = "";
    } else { 
        $op = "create";
        $style = " style='color:red'";
    }
    return "<a href='PtiWiki.php?op=$op&file=$file'$style>$name</a>";
}

function editLinkTPL($file, $name) {
    return "<a href='PtiWiki.php?op=update&file=$file'>$name</a>";
}

function deleteLinkTPL($file, $name) {
    return "<a href='PtiWiki.php?op=delete&file=$file'>$name</a>";
}

function deleteTPL($pageURL) {
    return <<<DELETE
    <p>Êtes-vous certain de vouloir détruire la page "$pageURL"</p>
    <form method="GET action="PtiWiki.php">
        <input type="hidden" name="op" value="confirm-delete"></input>
        <input type="hidden" name="file" value="$pageURL"></input>
        <input type="submit" value="Détruire $pageURL!"></input>
    </form>    
DELETE;
}
