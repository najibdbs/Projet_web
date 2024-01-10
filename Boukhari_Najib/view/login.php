<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
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
</head>
<body>
    <div class="login-container">
        <h1>Connexion</h1>
        <form action="../view/affiche.demande.php" method="POST">
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
            if (!empty($errorMessage)) {
                echo '<p style="color: red;">' . $errorMessage . '</p>';
            }
            ?>
        </form>
    </div>
</body>
</html>
