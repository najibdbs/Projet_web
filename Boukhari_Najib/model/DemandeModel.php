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
    // Méthode pour récupérer une demande par son ID.
    public function getDemandeById($id) {
    // Préparation de la requête SQL pour sélectionner une demande spécifique.
        $stmt = $this->db->prepare("SELECT * FROM demande WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    // Méthode pour mettre à jour une demande existante dans la base de données.
    public function updateDemande($id, $email, $emailperso, $telephone, $problemetype, $description, $objet, $statut) {
    // Préparation de la requête SQL pour la mise à jour d'une demande.
        $stmt = $this->db->prepare("UPDATE demande SET email=?, emailperso=?, telephone=?, problemetype=?, description=?, objet=?, statut=? WHERE id=?");
        $stmt->bind_param("sssssssi", $email, $emailperso, $telephone, $problemetype, $description, $objet, $statut, $id);
        return $stmt->execute();
    }
    
}
?>