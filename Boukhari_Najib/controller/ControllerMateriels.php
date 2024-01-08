<?php

require_once '../config/config.php';
require_once '../model/MaterielsModel.php';

// Déclaration de la classe du contrôleur
class ControllerMateriels {
    private $materielsModel;  // Instance du modèle de problèmes
    private $pdo; // Instance de la connexion PDO
    // Constructeur de la classe
    public function __construct() {
        global $host, $dbname, $username, $password;  // Récupérer les informations de connexion à la base de données depuis le fichier de configuration

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configurer le mode d'erreur pour afficher les exceptions en cas d'erreur
            $this->materielsModel = new MaterielsModel($this->pdo); // Initialiser le modèle de matériel avec la connexion à la base de données
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
    // Méthode pour récupérer tous les matériels
    public function index() {
        $materiels = $this->materielsModel->getAllMateriels(); // Récupérer tous les matériels depuis le modèle
        header('Content-Type: application/json');
        echo json_encode($materiels);
    }
}
// Créer une instance du contrôleur et appeler la méthode pour récupérer tous les matériels
$controller = new ControllerMateriels();
$controller->index();

?>