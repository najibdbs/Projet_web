<?php

// Classe ProblemesModel représentant le modèle de données pour les problèmes
class ProblemesModel {
    private $pdo; // Instance de connexion à la base de données 

      // Constructeur de la classe
    public function __construct($pdo) {
        $this->pdo = $pdo; // Initialisation de la connexion à la base de données 
    }
        // Méthode pour récupérer tous les problèmes
    public function getAllProblemes() {
        $stmt = $this->pdo->query("SELECT * FROM problemes"); // Exécuter une requête SQL pour obtenir tous les problèmes
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourner tous les problèmes sous forme de tableau associatif
    }
}
?>