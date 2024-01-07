<?php
require_once '../config/config.php';
require_once '../model/SitesModel.php';

class ControllerSites {
    private $sitesModel;
    private $pdo;

    public function __construct() {
        global $host, $dbname, $username, $password;
        
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }

        $this->sitesModel = new SitesModel($this->pdo);
    }

    public function getAllSites() {
        $sites = $this->sitesModel->getAllSites();
        header('Content-Type: application/json');
        echo json_encode($sites);
    }
}

$controller = new ControllerSites();
$controller->getAllSites();

?>