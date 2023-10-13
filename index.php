<?php
// Déclaration de la variable points et initialiser à 0
$points = 0;

// DÉCLARATION DES VARIABLES POUR GERER LES ERREURS
$nomErr = $prenomErr = $ageErr = $sexeErr = $poidsErr = $temperatureErr = $touxErr = $mauxTeteErr = $diarrheErr = $perteOdoratErr = "";

session_start();

// RÉCUPÉRATION DES DONNÉES DÉPUIS LE FORMULAIRE AVEC LA MÉTHODE POST ET VÉRIFIER SI TOUS LES CHAMPS SONT REMPLIES
if (isset($_POST["envoyer"])) {
//---------------Nom----------------
    if (empty($_POST["nom"])) {
        $nomErr = "Nom est obligatoire";
    }
    elseif ((!preg_match("/^[a-zA-Z-' ]*$/",$nom))) {
        $nomErr = "Le nom doit avoir uniquement des lettres et des majuscules pas de répetition";
    }
    else {
        $nom = $_POST["nom"];
    }
//--------------Prenom-----------------------------
    if(empty($_POST["prenom"])){
        $prenomErr = "Prénom est obligatoire";
    }
    elseif ((!preg_match("/^[a-zA-Z-' ]*$/",$prenom))) {
        $prenomErr = "Le prénom doit avoir uniquement des lettres et des majuscules pas de répétition";
    }
    else {
        $prenom= $_POST["prenom"];
    } 
//------------------Äge-------------------------------
    if(empty($_POST["age"]) /**|| !is_numeric($_POST["age"])*/){
        $ageErr= "L'âge doit être un nombre.";
    }
    else {
        $age = $_POST["age"];
    }
//--------------Sexe-------------------------------------
    if (empty($_POST["sexe"])) {
        $sexeErr = "Le genre est obligatoire";
    }
    else {
        $sexe = $_POST["sexe"];
    }
//---------------Poids---------------------------
    if (empty($_POST["poids"])) {
        $poidsErr = "Vôtre poids est obligatoire";
    } else {
        $poids = $_POST["poids"];
    }
//-----------------Température------------------------------
if (empty($_POST["temperature"])) {
    $temperatureErr = "Vôtre température est obligatoire";
}
else {
    $temperature = $_POST["temperature"];
}
//-------------Toux-------------------------------------------------
if (empty($_POST["toux"])) {
    $touxErr = "Cette champ est obligatoire";
} else {
    $toux = $_POST["toux"];
}
//--------------------Maux de tête-------------------------------
if (empty($_POST["mauxTete"])) {
    $mauxTeteErr = "Vous avez des maux de têtes, veuillez les mentionner dans ce champs";
}
else {
    $mauxTete = $_POST["mauxTete"];
}
//------------------------Diarrhé--------------------------------
if (empty($_POST["diarrhe"])) {
    $diarrheErr = "Vous avez des diarrhées, veuillez les mentionner dans ce champs";
} else {
    $diarrhe = $_POST["diarrhe"];
}
//----------------Perte d'odorat------------------------------------
if (empty($_POST["perteOdorat"])) {
    $perteOdoratErr = "Veuillez mentioner ce champ.";
} else {
    $perteOdorat = $_POST["perteOdorat"];
}



//-----------------INCRÉMENTATION DES POINTS--------------------------------------------------

//------------------Température-------------------------------------
if ($temperature === "anormale") {
    $points += 20; // ON AJOUTE 20 POINTS DANS LA VARIABLE $POINTS
} else {
    $points += 5; // ON AJOUTE 5 POINTS DANS LA VARIABLE $POINTS
}

//--------------------ÂGE-------------------------------------------------
if (($age === "petit") || ($age === "grand")) {
    $points += 20; // ON AJOUTE 20 POINTS DANS LA VARIABLE $POINTS
} else {
    $points += 5; // ON AJOUTE 5 POINTS DANS LA VARIABLE $POINTS
}

//------------------Maux de tête----------------------------------------------
if ($mauxTete === "oui") {
    $points += 20; // ON AJOUTE 20 POINTS DANS LA VARIABLE $POINTS
} else {
    $points += 5; // ON AJOUTE 5 POINTS DANS LA VARIABLE $POINTS
}

//----------------------Diarrhé---------------------------------------------
if ($diarrhe === "oui") {
    $points += 20; // ON AJOUTE 20 POINTS DANS LA VARIABLE $POINTS
} else {
    $points += 5; // ON AJOUTE 5 POINTS DANS LA VARIABLE $POINTS
}

//----------------------Perte Odorat-----------------------------------------
if ($perteOdorat === "oui") {
    $points += 20; // ON AJOUTE 20 POINTS DANS LA VARIABLE $POINTS
} else {
    $points += 5; // ON AJOUTE 5 POINTS DANS LA VARIABLE $POINTS
}

//------------------------Toux------------------------------------------
if ($toux === "oui") {
    $points += 20; // ON AJOUTE 20 POINTS DANS LA VARIABLE $POINTS
} else {
    $points += 5; // ON AJOUTE 5 POINTS DANS LA VARIABLE $POINTS
}

    // Affichage des erreurs
    if ($nomErr || $prenomErr || $ageErr || $sexeErr || $poidsErr || $temperatureErr || $touxErr || $mauxTeteErr || $diarrheErr || $perteOdoratErr) {
        echo "Veuillez corriger les erreurs dans le formulaire avant de soumettre.";
    }



//header("location: traitement.php");
//exit();

}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulaire testCovid</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <fieldset>
                <legend>Formulaire de test covid19</legend>
                <div class="champ">
                    <label for="nom">Nom de famille :</label>
                    <input type="text" id="nom" name="nom">
                    <span class = "error-message"><?php echo ($nomErr != "") ? $nomErr : ""; ?></span>


                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom">
                    <span class = "error-message"><?php echo $prenomErr ;?></span>
                </div>
                <br>


                <div class="champ">
                    <label for="age">Age :</label>
                    <input type="radio" id="petit" name="age">
                    <label for="petit">0 - 15 ans</label>

                    <input type="radio" id="moyen" name="age">
                    <label for="moyen">16 - 44 ans</label>

                    <input type="radio" name="age" id="grand">
                    <label for="grand">45 - 110 ans</label>
                    <span class = "error-message"><?php echo $ageErr; ?></span>
                </div>
                <br>

                <div class="champ">
                    <input type="radio" id="h" name="sexe" value="homme">
                    <label for="h">Homme</label>

                    <input type="radio" id="f" name="sexe" value="femme">
                    <label for="f">Femme</label>
                    <span class = "error-message"><?php echo $sexeErr; ?></span>
                </div>
                <br>

                <div>
                    <label for="poids">Poids en (kg)</label>
                    <input type="number" id="poids" name="poids">
                    <span class = "error-message"><?php echo $poidsErr; ?></span>
                </div>
                <br>

                <div class="champ">
                    <div>
                        <p>Entrez votre température</p>
                        <input type="radio" id="temperature1" name="temperature" value="normale">
                        <label for="temperature1">35 - 37</label>

                        <input type="radio" id="temperature2" name="temperature" value="anormale">
                        <label for="temperature2">38 - 40</label>
                        <span class = "error-message"><?php echo $temperatureErr; ?></span>
                    </div>
                </div>
                <br>

                <div class="champ">
                    <p>Ressentez-vous des maux de tête?</p>
                    <label>
                        <input type="radio" name="mauxTete" value="oui"> OUI
                    </label>
                    <label>
                        <input type="radio" name="mauxTete" value="non"> NON
                    </label>
                    <span class = "error-message"><?php echo $mauxTeteErr; ?></span>
                </div>
                <br>


                <div>
                    <p>Avez-vous des Diarrhées?</p>
                    <input type="radio" id="oui" name="diarrhe" value="oui">
                    <label for="oui">OUI</label>

                    <input type="radio" id="non" name="diarrhe" value="non">
                    <label for="non">NON</label>
                    <span class = "error-message"><?php echo $diarrheErr; ?></span>
                </div>
                <br>

                <div class="champ">
                    <p>Ressentez-vous les odeurs?</p>
                    <input type="radio" id="oui" name="perteOdorat" value="oui">
                    <label for="oui">OUI</label>

                    <input type="radio" id="non" name="perteOdorat" value="non">
                    <label for="non">NON</label>
                    <span class = "error-message"><?php echo $perteOdoratErr; ?></span>
                </div>
                <br>

                <div class="champ">
                    <p>Faites-vous des toux le plus souvent?</p>
                    <input type="radio" id="oui" name="toux" value="oui">
                    <label for="oui">OUI</label>

                    <input type="radio" name="toux" id="non" value="non">
                    <label for="non">NON</label>
                    <span class = "error-message"><?php echo $touxErr; ?></span>
                </div>
                <br>
                <input type="submit" name="envoyer" value="Vérifier">
            </fieldset>
        </form>
    </div>
</body>

</html>