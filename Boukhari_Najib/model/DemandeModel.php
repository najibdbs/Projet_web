<?php 

// Instancier le modèle DemandeModel
class DemandeModel {
    private $db; // Instance de connexion à la base de données

    // Constructeur de la classe
    public function __construct($db) {
        $this->db = $db;
    }

    // Méthode pour créer une nouvelle demande
    public function createDemande($email, $emailperso, $tel, $problemtype, $materiel, $local, $urgence, $description, $id_machine) {
        $date = date("Y-m-d H:i:s"); 
        $sql = "INSERT INTO demande (email, emailperso, telephone, problemetype, materiel, local, degre_urgence, description, date, id_machine) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql); // Préparer la requête SQL avec des paramètres
        $stmt->bind_param("ssssssissi", $email, $emailperso, $tel, $problemtype, $materiel, $local, $urgence, $description, $date, $id_machine); // Binder les paramètres à la requête SQL
    
         // Exécuter la requête SQL préparée
        if ($stmt->execute()) {
            return $this->db->insert_id; // Retourne l'identifiant de la dernière ligne insérée (ID de la demande)
        } else {
            return false;
        }
    }
    
}
?>