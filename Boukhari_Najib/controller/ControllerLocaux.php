<?php

require_once '../config/config.php';
require_once '../model/LocauxModel.php';

class ControllerLocaux {
    private $locauxModel;
    private $pdo;

    public function __construct() {
        global $host, $dbname, $username, $password;

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }

        $this->locauxModel = new LocauxModel($this->pdo);
    }

    public function getLocauxBySite() {
        $siteId = isset($_GET['idsite']) ? $_GET['idsite'] : null;
        if ($siteId) {
            $locaux = $this->locauxModel->getLocauxBySiteId($siteId);
            header('Content-Type: application/json');
            echo json_encode($locaux);
        } else {
            http_response_code(400);
            echo "Paramètre 'idsite' manquant.";
        }
    }
}

$controller = new ControllerLocaux();
$controller->getLocauxBySite();

?>
