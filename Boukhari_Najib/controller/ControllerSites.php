<?php
require_once '../config/config.php';
require_once '../model/SitesModel.php';

// Déclaration de la classe du contrôleur
class ControllerSites {
    private $sitesModel;  // Instance du modèle de sites
    private $pdo; // Instance de la connexion PDO

     // Constructeur de la classe
    public function __construct() {
        global $host, $dbname, $username, $password;  // Récupérer les informations de connexion à la base de données depuis le fichier de configuration
        
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); // Initialiser la connexion à la base de données 
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configurer le mode d'erreur pour afficher les exceptions en cas d'erreur
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }

        $this->sitesModel = new SitesModel($this->pdo);  // Initialiser le modèle de sites avec la connexion à la base de données
    }

    // Méthode pour récupérer tous les sites
    public function getAllSites() {
        $sites = $this->sitesModel->getAllSites();  // Récupérer tous les sites depuis le modèle
        header('Content-Type: application/json');  // Définir le type de contenu de la réponse comme JSON
        echo json_encode($sites);
    }
}

// Créer une instance du contrôleur et appeler la méthode pour récupérer tous les sites
$controller = new ControllerSites();
$controller->getAllSites();

?>