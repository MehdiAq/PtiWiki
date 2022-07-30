<?php

/**
 * Classe pour construire une page d'un Wiki
 *  on transpose la structuration proposée par 
 *   James Payne, Beginning Python, Wiley, 2010, p 430-431
 */
require_once 'config.php';
class Page {
    private $wiki, $nomFichier, $texte;

    function __construct($wiki, $nomFichier) {
        $this->wiki = $wiki;
        $this->nomFichier = $nomFichier;
    }

    function exists($conn) {
        try {
            $sth = $conn->prepare("SELECT * FROM pages WHERE title=\"$this->nomFichier\"");
            $sth->execute();
            $row = $sth->fetch(PDO::FETCH_ASSOC);
            return isset($row['title']);
        } catch (PDOException $e) {
            return false;
        }
    }

    function load($conn) {
        try {
            $sth = $conn->prepare("SELECT * FROM pages WHERE title=\"$this->nomFichier\"");
            $sth->execute();
            $row = $sth->fetch(PDO::FETCH_ASSOC);
            $this->texte = $row['content'];
            return $this;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
        }
    }

    function create($conn) {
        try {
            $sth = $conn->prepare("INSERT INTO pages (title) VALUES (\"$this->nomFichier\")");
            $sth->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
        }
    }

    function save($conn) {
        try {
            $sth = $conn->prepare("UPDATE pages SET content=\"$this->texte\" WHERE title=\"$this->nomFichier\"");
            $sth->execute();
            return $this;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
        }
    }

    function delete($conn) {
        try {
            $sth = $conn->prepare("DELETE FROM pages WHERE title=\"$this->nomFichier\"");
            $sth->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
        }
    }

    function getText() {
        return $this->texte;
    }

    function setText($texte) {
        $this->texte = $texte;
        return $this;
    }
}
