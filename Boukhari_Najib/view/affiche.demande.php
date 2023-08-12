<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <style>
            body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .demandes-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 80%;
            max-width: 1200px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f7f7f7;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .return-button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            text-decoration: none;
            display: inline-block;
        }

        .return-button:hover {
            background-color: #2980b9;
        }
    
    </style>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Afficher les Demandes</title>
</head>
<body>
    <div class="demandes-container">
        <h1>Liste des Demandes Encodées</h1>
        
        <?php
        // Inclure le fichier de configuration pour la connexion à la base de données
        require_once "../config/configB.php";

        // Établir une connexion à la base de données
        $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        // Vérifier si la connexion a réussi
        if ($conn->connect_error) {
            die("La connexion à la base de données a échoué : " . $conn->connect_error);
        }

        // Récupérer les demandes encodées depuis la base de données
        $sql = "SELECT * FROM demande";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>ID</th><th>Email</th><th>Email Personnel</th><th>Téléphone</th><th>Type de Problème</th><th>Matériel</th><th>ID i-City</th><th>Local</th><th>Degré d\'Urgence</th><th>Description</th><th>Objet</th><th>Statut</th><th>Date</th><th>Numéro Ticket i-City</th></tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['emailperso'] . '</td>';
                echo '<td>' . $row['telephone'] . '</td>';
                echo '<td>' . $row['problemetype'] . '</td>';
                echo '<td>' . $row['materiel'] . '</td>';
                echo '<td>' . $row['id_i_city'] . '</td>';
                echo '<td>' . $row['local'] . '</td>';
                echo '<td>' . $row['degre_urgence'] . '</td>';
                echo '<td>' . $row['description'] . '</td>';
                echo '<td>' . $row['objet'] . '</td>';
                echo '<td>' . $row['statut'] . '</td>';
                echo '<td>' . $row['date'] . '</td>';
                echo '<td>' . $row['numero_ticket_i_city'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>Aucune demande encodée pour le moment.</p>';
        }

        // Fermer la connexion à la base de données
        $conn->close();
        ?>
        
        <div class="button-container">
            <a href="../index.php" class="return-button">Retour à l'Accueil</a>
        </div>
    </div>
</body>
</html>
