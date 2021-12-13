<?php
//controleur secondaire associé à la table locations
require_once "../application/table/locations.php";

/*
Affiche la liste des enregistrements de la table locations
*/
function a_liste()
{
    $result = locations_findAll();
    $vue = "../application/controleur/locations/locations_liste.php";
    require "../application/gabarit/gabarit.php";
}

/*
Affiche le formulaire d'édition/création d'un enregistrement de la table locations
Si $id==0 alors création sinon édition
*/
function a_edit()
{
    $id = (isset($_GET["id"])) ? $_GET["id"] : 0;
    if ($id == 0) {
        $loc_id=0;
$loc_datedemande='';
$loc_datedebut='';
$loc_datefin='';
$loc_client='';
$loc_agencedepart='';
$loc_agencearrivee='';
$loc_voiture='';
$loc_statut='';
$loc_gestionaire='';

    } else {
        $id = mres($id);
        $row = locations_charger($id);
        extract(array_map("hsc", $row));
    }

    $vue = "../application/controleur/locations/locations_edit.php";
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
    locations_delete($id);

    header("location:" . hlien("locations", "liste"));
}

/*
INSERT or UPDATE d'un enregistrement de la table locations
*/
function a_save()
{
    if (isset($_POST["btSubmit"])) {
        locations_save($_POST);
    }

    header("location:" . hlien("locations", "liste"));
}
