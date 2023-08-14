<?php
session_start();
require_once "../config/configB.php"; // Inclure le fichier de configuration

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données du formulaire
    $email = $_POST["email"];
    $emailperso = $_POST["emailperso"];
    $tel = $_POST["tel"];
    $problemtype = $_POST["problemtype"];
    $materiel = $_POST["materiel"];
    $local = $_POST["local"];
    $urgence = $_POST["urgence"];
    $remarque = $_POST["remarque"];

    // Valider et traiter les données...

    // Exemple : Insérer les données dans la base de données
    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Préparer la requête d'insertion
    $sql = "INSERT INTO demande (email, emailperso, telephone, problemetype, materiel, local, degre_urgence, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssis", $email, $emailperso, $tel, $problemtype, $materiel, $local, $urgence, $remarque);
    $stmt->execute();
    if ($stmt->execute()) {
        // Récupérer l'identifiant généré automatiquement pour la dernière entrée
        // Rediriger vers la page de confirmation avec le numéro de référence
        //insert_id recupère ledernier id inserer dans demande
        $reference = $conn->insert_id;
        echo $reference;
    } else {
        $errorMessage = "Une erreur s'est produite lors de l'envoi de la demande.";
    }

    $stmt->close();
    $conn->close();
}
?>
