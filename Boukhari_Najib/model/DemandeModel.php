<?php 

class DemandeModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createDemande($email, $emailperso, $tel, $problemtype, $materiel, $local, $urgence, $description) {
        $date = date("Y-m-d H:i:s"); 
        $sql = "INSERT INTO demande (email, emailperso, telephone, problemetype, materiel, local, degre_urgence, description, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssssssiss", $email, $emailperso, $tel, $problemtype, $materiel, $local, $urgence, $description, $date);
    
        if ($stmt->execute()) {
            return $this->db->insert_id;
        } else {
            return false;
        }
    }
    
}
?>