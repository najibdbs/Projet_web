<?php

// Classe SitesModel représentant le modèle de données pour les sites
class SitesModel {
    private $pdo; // Instance de connexion à la base de données

     // Constructeur de la classe
    public function __construct($pdo) {
        $this->pdo = $pdo; // Initialisation de la connexion à la base de données 
    }

    // Méthode pour récupérer tous les sites
    public function getAllSites() {
        try {
            $stmt = $this->pdo->query("SELECT * FROM sites"); // Exécuter une requête SQL pour obtenir tous les sites
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la récupération des données de la table 'sites' : " . $e->getMessage());
        }
    }
}
?>