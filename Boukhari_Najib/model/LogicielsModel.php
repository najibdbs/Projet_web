<?php 

// Classe LogicielsModel représentant le modèle de données pour les logiciels
class LogicielsModel {
    private $pdo; // Instance de connexion à la base de données

     // Constructeur de la classe
    public function __construct($pdo) {
        $this->pdo = $pdo; // Initialisation de la connexion à la base de données 
    }
   
    // Méthode pour récupérer tous les logiciels
    public function getAllLogiciels() {
        try {
            $stmt = $this->pdo->query("SELECT * FROM logiciels"); // Exécuter une requête SQL pour obtenir tous les logiciels
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourner tous les logiciels sous forme de tableau associatif
        } catch (PDOException $e) {
            die("Erreur lors de la récupération des données : " . $e->getMessage());
        }
    }
}
?>