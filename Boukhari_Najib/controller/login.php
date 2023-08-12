<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];

    // Vérifier les informations de connexion (vous devrez implémenter cette partie)
    if ($login == "superadmin" && $password == "aDmin@2024") {
        // Les informations d'identification sont correctes, marquer l'utilisateur comme authentifié
        $_SESSION["authenticated"] = true;
    
        // Rediriger vers la page d'affichage des demandes encodées
        header("Location: ../view/affiche.demande.php");
        exit();
    } else {
        // Informations d'identification incorrectes, afficher un message d'erreur
        $errorMessage = "Identifiant ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        /* Styles spécifiques pour la page login.php */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('../public/AdobeStock_266111762.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .login-container h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .form-field {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s ease-in-out;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #3498db;
        }

        button[type="submit"] {
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        button[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
    <title>Connexion</title>
</head>
<body>
    <div class="login-container">
        <h1>Connexion</h1>
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
        </form>
    </div>
</body>
</html>
