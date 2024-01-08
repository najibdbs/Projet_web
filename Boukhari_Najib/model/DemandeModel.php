<?php 

// Instancier le modèle DemandeModel
class DemandeModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createDemande($email, $emailperso, $tel, $problemtype, $materiel, $local, $urgence, $description, $id_machine) {
        $date = date("Y-m-d H:i:s"); 
        $sql = "INSERT INTO demande (email, emailperso, telephone, problemetype, materiel, local, degre_urgence, description, date, id_machine) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssssssissi", $email, $emailperso, $tel, $problemtype, $materiel, $local, $urgence, $description, $date, $id_machine);
    
        if ($stmt->execute()) {
            return $this->db->insert_id;
        } else {
            return false;
        }
    }
    
}
?>