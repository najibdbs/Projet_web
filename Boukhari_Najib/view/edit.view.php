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

        input[type=text], select, input[type=submit] {
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
    <?php if (isset($demande) && $demande) : ?>
        <form action="../Controller/ControllerEditer.php?id=<?php echo htmlspecialchars($id); ?>" method="post">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($demande['email']); ?>">

            <label for="emailperso">Email Personnel:</label>
            <input type="text" id="emailperso" name="emailperso" value="<?php echo htmlspecialchars($demande['emailperso']); ?>">

            <label for="telephone">Téléphone:</label>
            <input type="text" id="telephone" name="telephone" value="<?php echo htmlspecialchars($demande['telephone']); ?>">

            <label for="problemetype">Type de Problème:</label>
            <input type="text" id="problemetype" name="problemetype" value="<?php echo htmlspecialchars($demande['problemetype']); ?>">

            <label for="description">Description:</label>
            <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($demande['description']); ?>">

            <label for="objet">Objet:</label>
            <input type="text" id="objet" name="objet" value="<?php echo htmlspecialchars($demande['objet']); ?>">

            <label for="statut">Statut:</label>
            <select id="statut" name="statut">
                <option value="En cours" <?php echo ($demande['statut'] == 'En cours') ? 'selected' : ''; ?>>En cours</option>
                <option value="Résolu" <?php echo ($demande['statut'] == 'Résolu') ? 'selected' : ''; ?>>Résolu</option>
                <option value="Non résolu" <?php echo ($demande['statut'] == 'Non résolu') ? 'selected' : ''; ?>>Non résolu</option>
            </select>

            <input type="submit" name="update" value="Mettre à jour">
            <?php if (isset($message)) : ?>
             <p><?php echo htmlspecialchars($message); ?></p>
            <?php endif; ?>

        </form>
    <?php else: ?>
        <p>Aucune demande trouvée ou ID non spécifié.</p>
    <?php endif; ?>

    <a href="../view/affiche.demande.php">Retour aux demandes</a>
</body>
</html>
