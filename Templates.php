<?php
require_once 'MarkDown.php';
require_once 'config.php';
// templates transposés de 
// James Payne, Beginning Python, Wiley, 2010, p 435-436

function mainTPL($title,$body,$navlinks){
    return <<<HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
    	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->
        <title>$title</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        $body
        <hr></hr>
        $navlinks
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> -->
    </body>
</html>
HTML;
}

function viewTPL($banner,$processedText){
    return <<<VIEW
    $banner
    $processedText
VIEW;
}

function editTPL($banner,$pageURL,$text){
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

function errorTPL($error){
    return "<h1>Erreur: $error</h1>";
}

function bannerTPL($banner){
    return "<p style='color:green'>$banner</p><hr></hr>";
}

function viewLinkTPL($file,$name){
    global $wiki, $conn;
    // $wiki = new Wiki();          // création de l'object Wiki
    $page = $wiki->getPage($file);
    if($page->exists($conn)){
        $op="read";
        $style="";
    } else { // new file, make the link in red and set op to create
        $op="create";
        $style=" style='color:red'";
    }
    return "<a href='PtiWiki.php?op=$op&file=$file'$style>$name</a>";
}

function editLinkTPL($file,$name){
    return "<a href='PtiWiki.php?op=update&file=$file'>$name</a>";
}

function deleteLinkTPL($file,$name){
    return "<a href='PtiWiki.php?op=delete&file=$file'>$name</a>";
}

function deleteTPL($pageURL){
    return <<<DELETE
    <p>Êtes-vous certain de vouloir détruire la page "$pageURL"</p>
    <form method="GET action="PtiWiki.php">
        <input type="hidden" name="op" value="confirm-delete"></input>
        <input type="hidden" name="file" value="$pageURL"></input>
        <input type="submit" value="Détruire $pageURL!"></input>
    </form>    
DELETE;
}

?>
