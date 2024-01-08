<?php 

// Controller/LoginController.php
require_once "../config/configB.php";
require_once "../model/DemandeModel.php";

class ControllerLogin {
    private $db; // Ajoutez la propriété pour la connexion à la base de données

    public function __construct() {
        require '../view/login.php';

    }

    public function authenticate() {
        session_start();
        $demandeModel = new DemandeModel($this->db);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $login = $_POST["login"];
            $password = $_POST["password"];

            // Vérifier les informations de connexion
            if ($login == "superadmin" && $password == "aDmin@2024") {
                // Les informations de connexion sont correctes, rediriger vers la liste des demandes
                header("Location: ../view/affiche.demande.php");
                exit();
            } else {
                $errorMessage = "Nom d'utilisateur ou mot de passe incorrect.";
                include('../view/login.php');
            }
        }
    }
}

// Instantiate the controller and call the authenticate method
$loginController = new ControllerLogin();
$loginController->authenticate();
?>