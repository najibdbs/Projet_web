<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? $title : 'Titre par défaut' ?></title>
    <link rel="stylesheet" href="/Content/style.css"> <!-- Lien vers le CSS -->
    <!-- Ajoutez d'autres fichiers CSS, JavaScript, ou balises meta selon vos besoins -->
</head>
<body>
    <header>
        <!-- Contenu de l'en-tête, comme la barre de navigation -->
    </header>

    <main>
        <?= isset($content) ? $content : 'Contenu non disponible.' ?>
        <!-- $content contiendra le contenu spécifique de chaque page -->
    </main>

    <footer>
        <!-- Contenu du pied de page -->
    </footer>

    <script src="/js/form-scripts.js"></script> <!-- Lien vers le JavaScript -->
</body>
</html>
