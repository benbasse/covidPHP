<?php

// session_start();
include("index.php");

// DÉCLARATION DES VARIABLES POUR GERER LES ERREURS
$nomErr = $prenomErr = $ageErr = $sexeErr = $poidsErr = $temperatureErr = $touxErr = $mauxTeteErr = $diarrheErr = $perteOdoratErr = "";


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

// Affichage des erreurs
    if ($nomErr || $prenomErr || $ageErr || $sexeErr || $poidsErr || $temperatureErr || $touxErr || $mauxTeteErr || $diarrheErr || $perteOdoratErr) {
        echo "Veuillez corriger les erreurs dans le formulaire avant de soumettre.";
    }






















}
?>