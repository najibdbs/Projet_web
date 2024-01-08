<?php

// Instancier le modèle SitesModel
class SitesModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllSites() {
        try {
            $stmt = $this->pdo->query("SELECT * FROM sites");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la récupération des données de la table 'sites' : " . $e->getMessage());
        }
    }
}
?>