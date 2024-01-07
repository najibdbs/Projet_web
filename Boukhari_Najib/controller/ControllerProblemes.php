<?php 
require_once '../config/config.php';
require_once '../model/ProblemesModel.php.';

class ControllerProblemes {
    private $ProblemesModel;
    private $pdo;

    public function __construct() {
        global $host, $dbname, $username, $password;

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->problemesModel = new ProblemesModel($this->pdo);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function index() {
        $logiciels = $this->problemesModel->getAllProblemes();
        header('Content-Type: application/json');
        echo json_encode($problemes);
    }
}

$controller = new ControllerProblemes();
$controller->index();
