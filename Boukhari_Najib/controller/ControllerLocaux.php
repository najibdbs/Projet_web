<?php

require_once '../config/config.php';
require_once '../model/LocauxModel.php';

// Déclaration de la classe du contrôleur
class ControllerLocaux {
    private $locauxModel;  // Instance du modèle de problèmes
    private $pdo;  // Instance de la connexion PDO

// Constructeur de la classe
    public function __construct() {
        global $host, $dbname, $username, $password; // Récupération des informations de connexion à la base de données depuis le fichier de configuration

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); // Initialiser la connexion à la base de données
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Configurer le mode d'erreur pour afficher les exceptions en cas d'erreur
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }

        $this->locauxModel = new LocauxModel($this->pdo);  // Initialiser le modèle de locaux avec la connexion à la base de données
    }

    // Méthode pour récupérer les locaux en fonction du site
    public function getLocauxBySite() {
        $siteId = isset($_GET['idsite']) ? $_GET['idsite'] : null;
        if ($siteId) {
            $locaux = $this->locauxModel->getLocauxBySiteId($siteId);  // Si l'identifiant du site est présent, récupérer les locaux associés
            header('Content-Type: application/json');
            echo json_encode($locaux);
        } else {
            http_response_code(400);   // Si l'identifiant du site est manquant, retourner une erreur 400 Bad Request
            echo "Paramètre 'idsite' manquant.";
        }
    }
}
// Création une instance du contrôleur et appeler la méthode pour récupérer les locaux par site
$controller = new ControllerLocaux();
$controller->getLocauxBySite();

?>
