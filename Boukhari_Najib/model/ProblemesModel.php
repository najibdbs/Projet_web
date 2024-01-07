<?php
// model/ProblemesModel.php

class ProblemesModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllProblemes() {
        $stmt = $this->pdo->query("SELECT * FROM problemes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>