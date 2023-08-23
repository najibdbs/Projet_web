<?php
// Informations d'accès à la base de données
$host = "localhost";
$dbname = "mon_formulaire";
$username = "root";
$password = "nippo.1930";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];

    // Hacher le mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Connexion à la base de données en utilisant PDO (plus sécurisé)
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        // Configurer PDO pour afficher les erreurs SQL
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête préparée pour insérer l'utilisateur avec le mot de passe haché
        $sql = "INSERT INTO utilisateurs (login, mot_de_passe) VALUES (:login, :password)";

        // Préparer la requête
        $stmt = $conn->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $hashedPassword);

        // Exécuter la requête
        $stmt->execute();

        echo "Nouvel utilisateur inséré avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de l'insertion de l'utilisateur : " . $e->getMessage();
    }

    // Fermer la connexion
    $conn = null;
}
?>
<!-- Votre code HTML pour le formulaire d'inscription -->
<form action="" method="POST">
    <div class="form-field">
        <label for="login">Nom d'utilisateur:</label>
        <input type="text" name="login" required>
    </div>
    <div class="form-field">
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>
    </div>
    <div class="form-field">
        <button type="submit">S'inscrire</button>
    </div>
</form>