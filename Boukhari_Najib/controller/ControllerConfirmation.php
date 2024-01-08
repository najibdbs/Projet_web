<?php 

// Déclaration de la classe du contrôleur
class ControllerConfirmation {
    public function showConfirmation() {
        // Ici, la logique pour obtenir le numéro de référence.
        $reference = $_GET['reference'] ?? 'Aucune référence disponible';

        // Appeler la vue avec les données nécessaires
        include '../view/confirmation.php';
    }
}

?>