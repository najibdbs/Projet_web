<?php
session_start();
require_once "../config/configB.php"; // Inclure le fichier de configuration

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];

    // Vérifier les informations de connexion
    if ($login == "superadmin" && $password == "aDmin@2024") {
        // Les informations de connexion sont correctes, rediriger vers la liste des demandes
        header("Location: ../view/affiche.demande.php");
        exit();
    } else {
        $errorMessage = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

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