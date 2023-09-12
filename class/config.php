<?php

session_start();

require "dbconnect.php";
$bdd= new ConnectBdd();

require "class_user.php";
$user= new User($bdd);

require "class_produit.php";
$prod= new Produits($bdd);

require "class_panier.php";
$panier= new Panier($bdd);