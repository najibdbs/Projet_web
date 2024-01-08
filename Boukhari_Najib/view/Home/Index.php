<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Content/style.css"> <!-- Lien vers le fichier CSS -->
    <title>FORMULAIRE</title>
    
</head>
<body>
<!--création un formulaire vers traitement.php --> 
<form action="../controller/ControllerTraitement" method="POST" class="form-container">

        <fieldset>
            <legend class="important-legend"> /!\ Information importante /!\ </legend>
            <p>Cher membre de la communauté H2B,</p>
            <p>Si vous avez des difficultés pour vous connecter à vos outils H2B, vérifiez que vous avez bien validé l’authentification à doubles facteurs. Il suffit de vous rendre sur <a href="https://poesi.esi-bru.be/">poesi.esi</a>, de vous reconnecter avec votre compte he2b et de suivre la procédure affichée à l’écran.</p>
            <p>Cela permettra au service informatique de répondre plus efficacement et rapidement aux demandes les plus problématiques.</p>
        </fieldset>

        <fieldset>
            <legend> Vos coordonnées </legend>
            <div class="form-field">
        
            <label for="h2b">H2B:</label>
            <input name="email" type="email" class="form-field form-input-required" placeholder='votre_identifiant@etu.he2b.be ' title="Introduire une adresse mail he2b, champs obligatoire." pattern=".+@etu.he2b.be" required/>
            <span class="required-indicator">*</span>
        </p>
        <p>
            <label for="emailperso">Adresse mail personnelle:</label>
            <input placeholder="Exemple: adresse@gmail.com" name="emailperso" type="email" class="form-field" title="Introduire une adresse mail personelle, facultatif."/>
        </p>
        <p>
            <label for="tel">Numéro de téléphone:</label>
            <input name="tel" type="tel" class="form-field form-input-required" placeholder="Votre numéro de téléphone" required/>
            <span class="required-indicator">*</span>
        </p>
    </div>
    <p class="required-text">*Champs obligatoires</p>
</fieldset>
       
      <fieldset>
    <legend> Quel type de problème rencontrez-vous? </legend>
    <p class="form-field">
        <label for="problemtype">S'agit-il d'un problème physique (Ecran cassé, clavier cassé, ordinateur ne s'allume plus,...) ? ou logiciel(absence d'un logiciel, impossibilité de lancer un logiciel, ouvrir un fichier,...)</label><br/>
        <select name="problemtype" id="problemtype" title="S'agit-il d'un problème physique (Ecran cassé, clavier cassé, ordinateur ne s'allume plus,...) ? ou logiciel(absence d'un logiciel, impossibilité de lancer un logiciel, ouvrir un fichier,...)">
            <option value="Logiciel">Logiciel</option>
            <option value="Materiel">Matériel</option>
        </select>
    </p>
</fieldset>

<fieldset>
    <legend> Sélectionnez le matériel ou le logiciel </legend>
    <p class="form-field">
        <label for="materiel">Sélectionnez le matériel ou le type de problème :</label><br />
        <select name="materiel" id="materiel" title="Sélectionnez le matériel ou le type de problème">
            <!-- Les options seront remplies dynamiquement par JavaScript plus bas -->
        </select>
    </p>
</fieldset>


<fieldset>
<legend> Sélectionnez votre emplacement </legend>
            <p class="form-field">
                <label for="site">Sélectionnez un site :</label><br />
                <select name="site" id="site" title="Sélectionnez un site">
                    <!-- Les options seront remplies dynamiquement par JavaScript -->
                </select>
            </p>
            <p class="form-field">
                <label for="local">Sélectionnez un local :</label><br />
                <select name="local" id="local" title="Sélectionnez un local selon le site où se trouve le problème concerné.">
                    <!-- Les options seront remplies dynamiquement par JavaScript -->
                </select>
            </p>
        </fieldset>

        <fieldset>
            <legend> Veuillez entrer l'id, si existant: </legend>
            <p>
            Cette étiquette est généralement collée sur le côté ou à l'arrière de la machine. Exemple: ordinateur, écran, projecteur, imprimante,...
            </p>
                
                
            <p class="form-field">
    <label for="id_machine">ID Machine :</label>
    <input placeholder="Exemple : id095741" type="text" name="id_machine" id="id_machine" class="form-input" />
</p>


            <fieldset>
    <legend> Degré d'urgence </legend>
    <p>
               <label for="urgence">Niveau d'urgence :</label>
                <select id="urgence" name="urgence">
                    <option value="1">Faible</option>
                    <option value="2">Moyen</option>
                    <option value="3">Urgent</option>
                </select>
            </p>
</fieldset>


            <legend> Décrivez votre problème </legend>
            
                <input placeholder="Description détaillée de votre problème." name="description" class="form-textarea" style="FONT-SIZE: 12pt; WIDTH: 700px; height:150px; FONT-FAMILY: Calibri" rows=5/>

    <div class="button-container">
            <input type="submit" value="Envoyer" class="form-button" />
            <input type="reset" value="Effacer" class="form-button" id="resetButton" />
            <!-- Lien pour accéder directement à la page de connexion (login.php) -->
            <a href="../controller/login.php" id="connectDonneesButton" class="connect-button">Affichage demande</a>
        </div>
            </form>

            <footer class="footer-container">
    <p>&copy;2023 par Najib. Tous droits réservés.</p>
</footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Inclure jQuery avant les scripts utilisant jQuery -->
    
<script>

$(document).ready(function() {
    // Remplir le menu déroulant des sites au chargement de la page
    $.ajax({
        type: 'GET',
        url: '../controller/ControllerSites.php', // Chemin vers le fichier PHP qui récupère les sites
        dataType: 'json',
        success: function(data) {
            var siteSelect = $('#site');
            siteSelect.empty();
            $.each(data, function(index, site) {
                siteSelect.append($('<option>', {
                    value: site.id,
                    text: site.nom_site
                }));
            });

            // Appel initial pour remplir les locaux en fonction du premier site
            var initialSite = siteSelect.val();
            getLocauxBySite(initialSite);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });

    // Écoutez les changements dans le menu déroulant "site"
    $('#site').on('change', function() {
        var selectedSite = $(this).val();
        getLocauxBySite(selectedSite);
    });

    // Fonction pour récupérer les locaux en fonction du site sélectionné
    function getLocauxBySite(site) {
        $.ajax({
            type: 'GET',
            url: '../controller/ControllerLocaux.php', // Chemin vers le fichier PHP qui récupère les locaux
            data: { idsite: site },
            dataType: 'json',
            success: function(data) {
                var localSelect = $('#local');
                localSelect.empty();
                $.each(data, function(index, local) {
                    localSelect.append($('<option>', {
                        value: local.id_local,
                        text: local.nom_local
                    }));
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
});

    // Fonction pour mettre à jour les options du menu déroulant "materiel" en fonction du type de problème sélectionné
    $(document).ready(function() {

    $('#problemtype').on('change', function() {
        var selectedProblemType = $(this).val();
        
        // Vider le menu déroulant "materiel"
        $('#materiel').empty();
        
        if (selectedProblemType === 'Logiciel') {
            // Appeler le fichier ControllerLogiciels.php pour obtenir les options de logiciels
            $.ajax({
                type: 'GET',
                url: '../controller/ControllerLogiciels.php', // Chemin vers le fichier PHP qui récupère les options de logiciels
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(index, logiciel) {
                        $('#materiel').append($('<option>', {
                            value: logiciel.id_logiciel,
                            text: logiciel.nom_logiciel
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        } else if (selectedProblemType === 'Materiel') {
            // Appeler le fichier get_materiels.php pour obtenir les options de matériel
            $.ajax({
                type: 'GET',
                url: '../controller/ControllerMateriels.php', // Chemin vers le fichier PHP qui récupère les options de matériel
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(index, materiel) {
                        $('#materiel').append($('<option>', {
                            value: materiel.id_materiel,
                            text: materiel.nom_materiel
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
});


$(document).ready(function() {
   
    $('form').on('submit', function(event) {
        event.preventDefault(); // Empêche l'envoi traditionnel du formulaire
        // Récupérer les données du formulaire
        var formData = {
            email: $('input[name=email]').val(),
            emailperso: $('input[name=emailperso]').val(),
            tel: $('input[name=tel]').val(),
            problemtype: $('#problemtype').val(),  
            materiel: $('#materiel').val(),
            local: $('#local').val(),
            urgence: $('#urgence').val(),
            description: $('input[name=description]').val(),
            id_machine: $('input[name=id_machine]').val()
        };
        
        // Envoyer les données au serveur via AJAX
        $.ajax({
            type: 'POST',
            url: '../controller/ControllerTraitement.php', // envoi du traitement
            data: formData,
            dataType: 'text',
            success: function(response) {
                window.location.href = "../view/confirmation.php?reference=" + response;

            },
            error: function(xhr, status, error) {
                console.error(error);
                alert(error);
            }
        });
    });

//"click" du bouton Effacer
$('#resetButton').on('click', function(event) {
    var confirmReset = confirm('Voulez-vous vraiment effacer le formulaire ? Cette action est irréversible.');
    if (!confirmReset) {
        event.preventDefault(); // Empêche l'effacement du formulaire
    } else {
        // Réinitialiser le formulaire manuellement
        $('form')[0].reset();
    }
});
        });
    
</script>
</body>
</html>