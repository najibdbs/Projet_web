<?php 
class ControllerConfirmation {
    public function showConfirmation() {
        // Ici, la logique pour obtenir le numéro de référence.
        // Par exemple, cela peut être récupéré de la base de données ou de la session
        $reference = $_GET['reference'] ?? 'Aucune référence disponible';

        // Appeler la vue avec les données nécessaires
        include '../view/confirmation.php';
    }
}

?>