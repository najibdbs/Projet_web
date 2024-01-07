<?php

require_once '../config/config.php';
require_once '../model/LogicielsModel.php';

class ControllerLogiciels {
    private $logicielsModel;
    private $pdo;

    public function __construct() {
        global $host, $dbname, $username, $password;

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->logicielsModel = new LogicielsModel($this->pdo);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function index() {
        $logiciels = $this->logicielsModel->getAllLogiciels();
        header('Content-Type: application/json');
        echo json_encode($logiciels);
    }
}

$controller = new ControllerLogiciels();
$controller->index();


?>