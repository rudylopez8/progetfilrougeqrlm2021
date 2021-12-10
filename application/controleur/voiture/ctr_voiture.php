<?php
//controleur secondaire associé à la table voiture
require_once "../application/table/voiture.php";

/*
Affiche la liste des enregistrements de la table voiture
*/
function a_liste()
{
    $result = voiture_findAll();
    $vue = "../application/controleur/voiture/voiture_liste.php";
    require "../application/gabarit/gabarit.php";
}

/*
Affiche le formulaire d'édition/création d'un enregistrement de la table voiture
Si $id==0 alors création sinon édition
*/
function a_edit()
{
    $id = (isset($_GET["id"])) ? $_GET["id"] : 0;
    if ($id == 0) {
        $voi_id=0;
$voi_immatriculation='';
$voi_categorie='';
$voi_localisation='';

    } else {
        $id = mres($id);
        $row = voiture_charger($id);
        extract(array_map("hsc", $row));
    }

    $vue = "../application/controleur/voiture/voiture_edit.php";
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
    voiture_delete($id);

    header("location:" . hlien("voiture", "liste"));
}

/*
INSERT or UPDATE d'un enregistrement de la table voiture
*/
function a_save()
{
    if (isset($_POST["btSubmit"])) {
        voiture_save($_POST);
    }

    header("location:" . hlien("voiture", "liste"));
}
