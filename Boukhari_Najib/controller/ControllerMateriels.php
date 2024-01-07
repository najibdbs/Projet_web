<?php

require_once '../config/config.php';
require_once '../model/MaterielsModel.php';

class ControllerMateriels {
    private $materielsModel;
    private $pdo;

    public function __construct() {
        global $host, $dbname, $username, $password;

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->materielsModel = new MaterielsModel($this->pdo);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function index() {
        $materiels = $this->materielsModel->getAllMateriels();
        header('Content-Type: application/json');
        echo json_encode($materiels);
    }
}

$controller = new ControllerMateriels();
$controller->index();

?>