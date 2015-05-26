<?php
    require("smarty/Smarty.class.php"); //require est identique à include, inclut et exécute le fichier spécifié en argument. On inclut la classe Smarty
    //Instanciation d'un objet de la classe Smarty
    $smarty = new Smarty();
    include("c_functions.php"); //inclusion des fonctions php
    require("models/m_main.php");  // On inclut le fichier contenant les données model.php
    require("c_start.php");
    require("panier.php");
    //Récupération de la fonction relative aux messages d'erreur
    getMessage();
    //inclusion du controleur de manière variable
    ((isset($_GET['tab'])) AND (isset($ValidTab[$_GET['tab']]))) ? include($ValidTab[$_GET['tab']]) : header('Location: index.php');
    // inclusion du fichier haut.tpl qui contient les informations qui ne change pas à savoir les balises tels <!doctype>, <html>, <head>, <body>, le header etc.
    $smarty->display('views/haut.tpl'); 
    // inclusion de la partie variable de notre page
    $smarty->display('views/'.$middleHTML);
    $smarty->display('views/bas.tpl');// inclusion du fichier bas.tpl qui contient les informations qui ne change pas à savoir la fermeture des balises <html>, <body>, le footer etc.
?>