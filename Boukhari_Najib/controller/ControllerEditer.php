<?php

// ControllerEditer.php

require_once '../model/DemandeModel.php';
require_once '../config/configB.php';

class ControllerEditer {
    private $demandeModel;

    public function __construct() {
        $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if ($conn->connect_error) {
            die("La connexion a échoué : " . $conn->connect_error);
        }
        $this->demandeModel = new DemandeModel($conn);
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "ID non spécifié.";
            return;
        }

        $demande = $this->demandeModel->getDemandeById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
            // Récupérez les données soumises et mettez à jour la demande
            $updateSuccess = $this->demandeModel->updateDemande($id, $_POST['email'], $_POST['emailperso'], $_POST['telephone'], $_POST['problemetype'], $_POST ['description'], $_POST['objet'], $_POST['statut']);

            if ($updateSuccess) {
                $message = "La mise à jour a été effectué avec succès";
            } else {
                $message = "La mise à jour a échoué";
            }
        }

        include '../view/edit.view.php'; // Afficher la vue
    }
}

$controller = new ControllerEditer();
$controller->edit();
?>