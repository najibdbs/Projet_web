<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">   
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .demandes-container {
            background-color: #fff;
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow-x: auto;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .center-align {
            text-align: center;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .return-button, a {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        .return-button:hover, a:hover {
            background-color: #2980b9;
        }

        a {
            background-color: #28a745;
            margin: 5px;
            padding: 8px 15px;
        }
    </style>
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
            // Convertir les résultats en un tableau
            $demandes = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $demandes = [];
        }

        // Fermer la connexion à la base de données
        $conn->close();
        ?>

        <?php if (!empty($demandes)): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Email personnel</th>
                    <th>Numéro de téléphone</th>
                    <th>Type de problème</th>
                    <th>Id machine</th>
                    <th>Local</th>
                    <th>Niveau d'importance</th>
                    <th>Description</th>
                    <th>Objet du problème</th>
                    <th>Statut</th>
                    <th>Date de la demande</th>
                    <th>Editer demande</th>
                </tr>
                <?php foreach ($demandes as $demande): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($demande['id']); ?></td>
                        <td><?php echo htmlspecialchars($demande['email']); ?></td>
                        <td><?php echo htmlspecialchars($demande['emailperso']); ?></td> 
                        <td><?php echo htmlspecialchars($demande['telephone']); ?></td> 
                        <td><?php echo htmlspecialchars($demande['problemetype']); ?></td>
                        <td><?php echo htmlspecialchars($demande['id_machine']); ?></td> 
                        <td><?php echo htmlspecialchars($demande['local']); ?></td> 
                        <td><?php echo htmlspecialchars($demande['degre_urgence']); ?></td> 
                        <td><?php echo htmlspecialchars($demande['description']); ?></td>
                        <td><?php echo htmlspecialchars($demande['objet']); ?></td>
                        <td><?php echo htmlspecialchars($demande['statut']); ?></td>
                        <td><?php echo htmlspecialchars($demande['date']); ?></td>
                        <td>
    <a href="/Controller/ControllerEditer.php?id=<?php echo htmlspecialchars($demande['id']); ?>">Éditer</a>
</td> <!-- Ajoutez cette ligne dans chaque boucle de demande -->
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aucune demande encodée pour le moment.</p>
        <?php endif; ?>

        <div class="button-container">
            <a href="../index.php" class="return-button">Retour à l'Accueil</a>
        </div>
    </div>
</body>
</html>