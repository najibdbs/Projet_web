<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Content/style.css"> <!-- Lien vers le fichier CSS -->
    <title>Accueil</title>
    <style>
        body {
            background-image: url('../public/service desk1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .welcome-container {
            text-align: center;
            padding: 100px;
            color: black; /* Texte en noir */
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Bienvenue sur notre formulaire de demande d'assistance</h1>
        <p>Utilisez ce formulaire pour soumettre vos demandes d'assistance informatique.</p>
        <p>Vous allez être redirigé vers le formulaire dans <span id="countdown">5</span> secondes...</p>
        <a href="view/formulaire.php" class="form-button">Accéder au formulaire</a>
    </div>

    <script>
        // Compteur de redirection
        var seconds = 5; 
        var countdown = document.getElementById('countdown');

        var timer = setInterval(function() {
            seconds--;
            countdown.textContent = seconds;

            if (seconds <= 0) {
                clearInterval(timer);
                window.location.href = 'view/formulaire.php'; // Redirection vers le formulaire
            }
        }, 1000);
    </script>
</body>
</html>
