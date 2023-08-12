// form-scripts.js

$(document).ready(function() {
    // Remplir le menu déroulant des sites au chargement de la page
    $.ajax({
        // ...
    });

    // Écoutez les changements dans le menu déroulant "site"
    $('#site').on('change', function() {
        // ...
    });

    // Fonction pour récupérer les locaux en fonction du site sélectionné
    function getLocauxBySite(site) {
        // ...
    }

    // Script pour mettre à jour les options du menu déroulant "materiel" en fonction du type de problème sélectionné
    $('#problemtype').on('change', function() {
        // ...
    });

    // Écoutez l'événement "submit" du formulaire
    $('form').on('submit', function(event) {
        // ...
    });

    // ... Le reste de votre code ...

    // Écoutez l'événement "click" du bouton "Effacer"
    $('#resetButton').on('click', function(event) {
        // ...
    });

    // Écoutez l'événement "click" du bouton "ConnecDonnées"
    $('#connectDonneesButton').on('click', function() {
        // ...
    });
});

function getUrgenceColor(value) {
    // ...
}

function getUrgencePhrase(value) {
    // ...
}
