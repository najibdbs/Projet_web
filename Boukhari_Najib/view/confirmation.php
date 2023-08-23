<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        /* Styles spécifiques pour la page confirmation.php */
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

        .confirmation-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            background-image: url('../public/loading-spin-defaut.gif');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .confirmation-container h1 {
            color: #333;
            margin-bottom: 15px;
        }

        .success-message {
            color: #1d8c32;
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .reference-number {
            font-size: 24px;
            font-weight: bold;
            color: #2980b9;
            margin: 10px 0;
        }

        .info-message {
            font-size: 14px;
            color: #555;
            margin-top: 20px;
        }

        .button-container {
            margin-top: 30px;
        }

        .return-button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .return-button:hover {
            background-color: #2980b9;
        }
    </style>
    <title>Confirmation de Demande</title>
</head>
<body>
<div class="confirmation-container">
        <h1>Merci d'avoir pris le temps de remplir notre formulaire</h1>
        
        <?php
        // Générer un ID unique avec incrémentation automatique
        $id = uniqid();
        
        // Vérifier s'il y a un paramètre de référence dans l'URL
        if (isset($_GET['reference'])) {
            $reference = $_GET['reference'];
            echo '<p class="success-message">Nous vous remercions d\'avoir soumis votre demande avec succès.</p>';
            echo '<p>Veuillez noter attentivement votre <strong>numéro de référence</strong> :</p>';
            echo '<p class="reference-number">' . $reference . '</p>';
            echo '<p class="info-message">Ce numéro sera essentiel pour suivre l\'avancement de votre demande. Veuillez le conserver soigneusement.</p>';
        }
        ?>
        
        <!-- Ajout le script pour la redirection automatique ici -->
        <script>
            setTimeout(function() {
                window.location.href = '/index.php'; // Redirection vers la page d'accueil
            }, 10000); // Redirection après 10 secondes 
        </script>
    </div>
</body>
</html>
