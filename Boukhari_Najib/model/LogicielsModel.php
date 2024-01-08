<?php 

// Instancier le modèle LogicielsModel
class LogicielsModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllLogiciels() {
        try {
            $stmt = $this->pdo->query("SELECT * FROM logiciels");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la récupération des données : " . $e->getMessage());
        }
    }
}
?>