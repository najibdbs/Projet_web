<?php

require_once '../model/DemandeModel.php';

class ControllerDemande {
    private $model;

    public function __construct() {
        $this->model = new DemandeModel();
    }

    public function index() {
        // Logique pour afficher la liste des demandes
        $demandes = $this->model->getAllDemandes();
        require_once '../view/affiche.demande.php';
    }

    public function edit() {
        // Logique pour éditer une demande
    }

    public function login() {
        session_start();
        $errorMessage = "";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $login = $_POST["login"];
            $password = $_POST["password"];

            if ($login == "superadmin" && $password == "aDmin@2024") {
                $_SESSION["authenticated"] = true;
                header("Location: ../view/affiche.demande.php");
                exit();
            } else {
                $errorMessage = "Nom d'utilisateur ou mot de passe incorrect.";
            }
        }

        require_once '../view/login.php';
    }
}
