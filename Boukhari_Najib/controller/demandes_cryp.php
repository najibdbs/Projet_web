<?php
session_start();
require_once "../config/configB.php"; // Inclure le fichier de configuration

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];

    // Connexion à la base de données en utilisant MySQLi
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données: " . $conn->connect_error);
    }

    // Préparation de la requête sécurisée
    $stmt = $conn->prepare("SELECT password_hash FROM utilisateurs WHERE login = ?");
    $stmt->bind_param("s", $login);

    // Exécution de la requête
    $stmt->execute();

    // Récupération du résultat
    $stmt->bind_result($stored_password_hash);
    $stmt->fetch();

    // Vérification du mot de passe haché
    if (password_verify($password, $stored_password_hash)) {
        // Les informations de connexion sont correctes, rediriger vers la liste des demandes
        header("Location: ../view/affiche.demande.php");
        exit();
    } else {
        $errorMessage = "Nom d'utilisateur ou mot de passe incorrect.";
    }

    // Fermeture de la connexion et de la requête préparée
    $stmt->close();
    $conn->close();
}
?>
<!-- Votre code HTML pour le formulaire de connexion -->
<form action="demandes.php" method="POST">
    <div class="form-field">
        <label for="login">Nom d'utilisateur:</label>
        <input type="text" name="login" required>
    </div>
    <div class="form-field">
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>
    </div>
    <div class="form-field">
        <button type="submit">Se connecter</button>
    </div>
    
    <?php
    // Afficher le message d'erreur si présent
    if (isset($errorMessage)) {
        echo '<p style="color: red;">' . $errorMessage . '</p>';
    }
    ?>
</form>
