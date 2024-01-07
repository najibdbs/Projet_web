<?php
// index.php dans le dossier racine

require_once 'config/config.php';     // Charge la configuration
require_once 'framework/Router.php';  // Charge le routeur ou le framework

// Création et traitement d'une requête par le routeur
$router = new Router();
$router->routerRequest();
?>