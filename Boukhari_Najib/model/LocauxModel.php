<?php

// Instancier le modèle LocauxModel
class LocauxModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo; // Initialisation de la connexion à la base de données
    } 
    
    // Méthode pour récupérer les locaux en fonction de l'ID du site
    public function getLocauxBySiteId($siteId) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM locaux WHERE id_site = :siteid");  // Préparer la requête SQL
            $stmt->bindParam(':siteid', $siteId, PDO::PARAM_INT);
            $stmt->execute(); // Exécuter la requête SQL préparée 
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourner tous les locaux sous forme de tableau associatif
        } catch (PDOException $e) {
            // Vous pouvez gérer l'erreur comme vous le souhaitez
            die("Erreur lors de la récupération des données de la table 'locaux' : " . $e->getMessage());
        }
    }
}
?>