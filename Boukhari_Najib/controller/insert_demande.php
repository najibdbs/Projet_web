<?php
require_once '../config/config.php';

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $emailperso = $_POST['emailperso'];
    $tel = $_POST['tel'];
    $problemtype = $_POST['problemtype'];
    $materiel = $_POST['materiel'];
    $site = $_POST['site'];
    $local = $_POST['local'];
    $i_city = $_POST['i-city'];
    $urgence = $_POST['urgence'];
    $remarque = $_POST['remarque'];
    $objet = ""; // À définir selon vos besoins
    $statut = "Nouveau"; // À définir selon vos besoins
    $date = date("Y-m-d H:i:s"); // Date et heure actuelles
    $numero_ticket_i_city = ""; // À définir selon vos besoins
    
    // Préparer la requête d'insertion
    $sql = "INSERT INTO demande (email, email_perso, telephone, probleme_type, materiel, id_i_city, local, degre_urgence, description, objet, statut, date, numero_ticket_i_city) 
            VALUES (:email, :emailperso, :tel, :problemtype, :materiel, :i_city, :local, :urgence, :remarque, :objet, :statut, :date, :numero_ticket_i_city)";
    
    // Exécuter la requête avec les valeurs des paramètres
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':emailperso', $emailperso);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':problemtype', $problemtype);
    $stmt->bindParam(':materiel', $materiel);
    $stmt->bindParam(':i_city', $i_city);
    $stmt->bindParam(':local', $local);
    $stmt->bindParam(':urgence', $urgence);
    $stmt->bindParam(':remarque', $remarque);
    $stmt->bindParam(':objet', $objet);
    $stmt->bindParam(':statut', $statut);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':numero_ticket_i_city', $numero_ticket_i_city);

    // Exécuter la requête et vérifier le succès
    if ($stmt->execute()) {
        // Rediriger vers la page de confirmation avec l'ID de la demande nouvellement insérée
        $insertedId = $pdo->lastInsertId();
        header("Location: ../view/confirmation.php?id=$insertedId");
        exit();
    } else {
        echo "Erreur lors de l'insertion de la demande.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>
