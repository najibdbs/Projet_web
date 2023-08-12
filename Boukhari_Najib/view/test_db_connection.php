<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Test de Sélection de Sites et Locaux</title>
</head>
<body>
    <h1>Sélection de Sites et Locaux</h1>

    <?php
    // Inclure le fichier de configuration
    require_once '../Config/config.php';

    // Connexion à la base de données
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }

    // Récupérer les données de la table "sites"
    try {
        $stmt = $pdo->query("SELECT * FROM sites");
        $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur lors de la récupération des données de la table 'sites' : " . $e->getMessage());
    }

    // Récupérer les données de la table "locaux"
    try {
        $stmt = $pdo->query("SELECT * FROM locaux");
        $locaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur lors de la récupération des données de la table 'locaux' : " . $e->getMessage());
    }
    ?>

    <form action="#" method="post">
        <label for="site">Sélectionnez un site :</label>
        <select name="site" id="site">
            <?php foreach ($sites as $site) : ?>
                <option value="<?php echo $site['id']; ?>"><?php echo $site['nom_site']; ?></option>
            <?php endforeach; ?>
        </select>
        
        <label for="local">Sélectionnez un local :</label>
        <select name="local" id="local">
            <!-- Les options seront remplies dynamiquement par JavaScript -->
        </select>

        <input type="submit" value="Afficher les détails">
    </form>

    <div id="details">
        <!-- Les détails des locaux seront affichés ici -->
    </div>

    <script>
        const siteSelect = document.getElementById('site');
        const localSelect = document.getElementById('local');
        const detailsDiv = document.getElementById('details');

        siteSelect.addEventListener('change', function () {
            const selectedSite = this.value;
            getLocauxBySite(selectedSite);
        });

        function getLocauxBySite(site) {
            // Faites une requête AJAX vers le fichier get_locaux.php avec le site sélectionné en tant que paramètre
            // Assurez-vous d'ajuster le chemin vers get_locaux.php si nécessaire
            fetch('get_locaux.php?site=' + encodeURIComponent(site))
                .then(response => response.json())
                .then(data => {
                    localSelect.innerHTML = '';

                    data.forEach(local => {
                        const option = document.createElement('option');
                        option.value = local.id;
                        option.textContent = local.nom_local;
                        localSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        }
    </script>
</body>
</html>

