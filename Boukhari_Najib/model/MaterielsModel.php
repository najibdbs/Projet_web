<?php

// Instancier le modèle MaterielsModel
class MaterielsModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllMateriels() {
        try {
            $stmt = $this->pdo->query("SELECT * FROM materiels");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la récupération des données' : " . $e->getMessage());
        }
    }
}
?>