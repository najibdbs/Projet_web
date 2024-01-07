<?php
// ControllerHome.php dans le dossier controller/

require_once 'framework/Controller.php';
require_once 'model/Home.Model.php'; // modèle pour la page d'accueil

class ControllerHome extends Controller
{
    public function index()
    {
        $this->generateView(); // Génère la vue home.php
    }
}
?>