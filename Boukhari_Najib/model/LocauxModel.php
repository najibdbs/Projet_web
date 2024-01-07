<?php

class LocauxModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getLocauxBySiteId($siteId) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM locaux WHERE id_site = :siteid");
            $stmt->bindParam(':siteid', $siteId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Vous pouvez gérer l'erreur comme vous le souhaitez
            die("Erreur lors de la récupération des données de la table 'locaux' : " . $e->getMessage());
        }
    }
}
?>