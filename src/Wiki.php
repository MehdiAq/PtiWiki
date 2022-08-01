<?php
/**
* Classe pour construire une page d'un Wiki
*  on transpose la structuration proposée par 
*   James Payne, Beginning Python, Wiley, 2010, p 430-431
*/
require_once 'Page.php';
class Wiki{
    
    function __construct(){
    }
    
    function getPage($nom){
        return new Page($this,$nom);
    }
}
?>
