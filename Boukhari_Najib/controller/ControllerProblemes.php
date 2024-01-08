<?php 
require_once '../config/config.php';
require_once '../model/ProblemesModel.php.';
   

// Déclaration de la classe du contrôleur
class ControllerProblemes {
    private $ProblemesModel;
    private $pdo;

    // Constructeur de la classe
    public function __construct() {
        global $host, $dbname, $username, $password;  // Récupérer les informations de connexion à la base de données depuis le fichier de configuration
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);   // Initialiser la connexion à la base de données
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     // Configurer le mode d'erreur pour afficher les exceptions en cas d'erreur
            $this->problemesModel = new ProblemesModel($this->pdo);             // Initialiser le modèle de matériel avec la connexion à la base de données
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    } 
    // Méthode pour récupérer tous les matériels
    public function index() {
        $logiciels = $this->problemesModel->getAllProblemes();  // Récupérer tous les matériels depuis le modèle
        header('Content-Type: application/json'); // Définir le type de contenu de la réponse comme JSON
        echo json_encode($problemes); 
    }
}

// Créer une instance du contrôleur et appeler la méthode pour récupérer tous les problèmes
$controller = new ControllerProblemes();
$controller->index();
