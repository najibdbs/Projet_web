<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">   
    <title>Modifier Demande</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            width: 300px;
        }

        label {
            margin-top: 10px;
        }

        input[type=text], input[type=submit] {
            height: 30px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
            padding-left: 10px;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        a {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            color: blue;
        }
    </style>
</head>
<body>
    <?php
    require_once "../config/configB.php"; // Votre fichier de configuration

    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Vérifier si l'ID est présent
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM demande WHERE id = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Aucune demande trouvée.";
        }

        if (isset($_POST['update'])) {
            $email = $conn->real_escape_string($_POST['email']);
            $emailperso = $conn->real_escape_string($_POST['emailperso']);
            $telephone = $conn->real_escape_string($_POST['telephone']);
            $problemetype = $conn->real_escape_string($_POST['problemetype']);
            $description = $conn->real_escape_string($_POST['description']);
            $objet = $conn->real_escape_string($_POST['objet']);
            $statut = $conn->real_escape_string($_POST['statut']);

            $update_sql = "UPDATE demande SET email='$email', emailperso='$emailperso', telephone='$telephone', problemetype='$problemetype', description='$description', objet='$objet', statut='$statut' WHERE id=$id";
            if ($conn->query($update_sql) === TRUE) {
                echo "Demande mise à jour avec succès.";
            } else {
                echo "Erreur lors de la mise à jour: " . $conn->error;
            }
        }
    } else {
        echo "ID non spécifié.";
    }
    $conn->close();
    ?>
    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $row['email']; ?>">

        <label for="emailperso">Email Personnel:</label>
        <input type="text" id="emailperso" name="emailperso" value="<?php echo $row['emailperso']; ?>">

        <label for="telephone">Téléphone:</label>
        <input type="text" id="telephone" name="telephone" value="<?php echo $row['telephone']; ?>">

        <label for="problemetype">Type de Problème:</label>
        <input type="text" id="problemetype" name="problemetype" value="<?php echo $row['problemetype']; ?>">

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" value="<?php echo $row['description']; ?>">

        <label for="objet">Objet:</label>
        <input type="text" id="objet" name="objet" value="<?php echo $row['objet']; ?>">

        <label for="objet">Objet:</label>
    <input type="text" id="objet" name="objet" value="<?php echo $row['objet']; ?>">

    <label for="statut">Statut:</label>
    <select id="statut" name="statut">
        <option value="En cours" <?php echo ($row['statut'] == 'En cours') ? 'selected' : ''; ?>>En cours</option>
        <option value="Résolu" <?php echo ($row['statut'] == 'Résolu') ? 'selected' : ''; ?>>Résolu</option>
        <option value="Non résolu" <?php echo ($row['statut'] == 'Non résolu') ? 'selected' : ''; ?>>Non résolu</option>
    </select>

        <input type="submit" name="update" value="Mettre à jour">
    </form>

    <a href="../view/affiche.demande.php">Retour aux demandes</a>
</body>
</html>