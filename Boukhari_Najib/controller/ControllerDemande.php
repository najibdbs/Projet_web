<?php

require_once '../model/DemandeModel.php';

class ControllerDemande {
    private $model;

    public function __construct() {
        $this->model = new DemandeModel();
    }

    public function index() {
        // Afficher la liste des demandes
        $demandes = $this->model->getAllDemandes();
        require_once '../view/affiche.demande.php';
    }

    public function edit() {
        // Logique pour éditer une demande
    }
}
?>