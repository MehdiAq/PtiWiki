# PtiWiki
Un prototype de Wiki avec authentification en PHP et MySQL

## Lien
https://www-ens.iro.umontreal.ca/~aqdimmeh/ift3225/tp3/

## Structure du projet
```
\---src
    |   admin.php
    |   config.php
    |   index.php
    |   login.php
    |   logout.php
    |   MarkDown.php
    |   Page.php
    |   PtiWiki.php
    |   register.php
    |   Templates.php
    |   Wiki.php
    |
    \---assets
        +---css
        |       style.css
        |
        \---SQL scripts
                db.sql
```

## Fonctionnalités
Le but de ce projet est de vous familiariser avec le concept de site transactionnel en gérant un 
wiki, c’est-à-dire un système qui permet à des usagers qui consultent un site de le modifier.

Le système doit permettre de consulter librement les pages déjà présentes dans le wiki, mais il doit 
aussi implanter deux autres modes d’accès :
- un pour le gestionnaire du site qui peut gérer tous les participants
- un autre pour les participants qui doivent s’inscrire pour modifier ou détruire des pages


Suivant la tradition pour ce type de système, les usagers n’écrivent pas les informations en HTML, 
mais dans un balisage simplifié qualifié de markdown. Le markdown que vous devrez implanter doit 
respecter les consignes suivantes:
- un texte entre deux ** sera affiché en gras
- un texte entre deux * sera affiché en italique
- une série de deux lignes ou plus débutant par un tiret deviendra une liste non numérotée (il n’est pas nécessaire de traiter des listes imbriquées)
- une ligne débutant par des # donnera un titre (<Hn> en HTML) de niveau correspondant au nombre de 
dièses
- les références de la forme `[lien](url)` deviendront des liens vers un URL: `<a href="url">lien</a>`
- un WikiWord, c’est-à-dire un mot débutant par une majuscule et contenant au moins une autre 
majuscule fait référence à une page du wiki ayant ce titre; si cette page n’existe pas alors le 
lien devrait s’afficher en rouge. En cliquant sur le lien, l’usager pourra créer la page (c’est 
d’ailleurs la seule façon de créer une page)
- les paragraphes sont délimités par deux fins de ligne
Ce balisage est transformé en HTML avant d’être affiché, mais peut être réédité par la suite.

## Contraintes techniques
- Vous devez développer votre système en PHP en créant une base de données MySQL qui contiendra les 
informations se rapportant aux usagers et aux pages. La structure et l’organisation de la base de 
données sont laissées à votre choix.
- Il faut prévoir un mécanisme de création et authentification d’usagers avec mot de passe avec 
cryptage. Un de ces usagers devrait être l’administrateur qui a accès à toutes les informations 
liées aux pages et aux participants.
- L’affichage des interfaces est laissé à votre choix.

## Barème
- Programmation (35 pts)
- SQL (qualité du Schéma et des requêtes) (15 pts)
- Résultats et utilisabilité (20 pts)
- Rapport (10 pts)
