<?php

require_once '../model/DemandeModel.php';

// Déclaration de la classe du contrôleur
class ControllerDemande {
    private $model;

    public function __construct() {
        $this->model = new DemandeModel();
    }

    public function index() {
        // Afficher la liste des demandes
        $demandes = $this->model->getAllDemandes();
        require_once '../view/affiche.demande.php';  // Appeler la vue avec les données nécessaires 
    }

    public function edit() {
        // Logique pour éditer une demande
    }
}
?>