<?php

// Inclure le fichier contenant la classe FormulaireModel
require_once 'model/FormulaireModel.php';


class FormulaireController
{
    public function afficherFormulaire()
    {
        // Instancier le modèle FormulaireModel
        $formulaireModel = new FormulaireModel();

        // Afficher la vue du formulaire en utilisant les propriétés du modèle
        require 'view/formulaire.php';
    }

    public function traiterFormulaire()
    {
        // Vérifier si le formulaire a été soumis (utiliser $_POST)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Instancier le modèle FormulaireModel
            $formulaireModel = new FormulaireModel();

            // Récupérer les données soumises du formulaire et les enregistrer dans le modèle
            $formulaireModel->setEmail($_POST['email']);
            $formulaireModel->setEmailPerso($_POST['emailperso']);
            $formulaireModel->setTel($_POST['tel']);
            $formulaireModel->setProblemType($_POST['problemtype']);
            $formulaireModel->setMateriel($_POST['materiel']);
            $formulaireModel->setLocal($_POST['local']);
            $formulaireModel->setUrgence($_POST['urgence']);
            $formulaireModel->setRemarque($_POST['remarque']);

          

            // Rediriger l'utilisateur vers une page de confirmation
            header('Location: view/confirmation.php');
            exit();
        } else {
            // Si le formulaire n'a pas été soumis, rediriger l'utilisateur vers la page du formulaire
            header('Location: index.php?action=afficherFormulaire');
            exit();
        }
    }
}
?>