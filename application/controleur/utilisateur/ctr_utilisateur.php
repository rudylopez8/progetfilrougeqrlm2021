<?php
//controleur secondaire associé à la table utilisateur
require_once "../application/table/utilisateur.php";

/*
Affiche la liste des enregistrements de la table utilisateur
*/
function a_liste()
{
    $result = utilisateur_findAll();
    $vue = "../application/controleur/utilisateur/utilisateur_liste.php";
    require "../application/gabarit/gabarit.php";
}

/*
Affiche le formulaire d'édition/création d'un enregistrement de la table utilisateur
Si $id==0 alors création sinon édition
*/
function a_edit()
{
    $id = (isset($_GET["id"])) ? $_GET["id"] : 0;
    if ($id == 0) {
        $uti_id=0;
$uti_nom='';
$uti_login='';
$uti_mail='';
$uti_mdp='';
$uti_profil='';
$uti_agence='';

    } else {
        $id = mres($id);
        $row = utilisateur_charger($id);
        extract(array_map("hsc", $row));
    }

    $vue = "../application/controleur/utilisateur/utilisateur_edit.php";
    require "../application/gabarit/gabarit.php";
}

/*
Suppression de l'enregsitrement $id
*/
function a_delete()
{
    $id = (isset($_GET["id"])) ? $_GET["id"] : 0;
    //protection contre injection sql
    $id = mres($id);
    utilisateur_delete($id);

    header("location:" . hlien("utilisateur", "liste"));
}

/*
INSERT or UPDATE d'un enregistrement de la table utilisateur
*/
function a_save()
{
    if (isset($_POST["btSubmit"])) {
        utilisateur_save($_POST);
    }

    header("location:" . hlien("utilisateur", "liste"));
}
