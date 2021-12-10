<?php
//controleur secondaire associé à la table departement
require_once "../application/table/departement.php";

/*
Affiche la liste des enregistrements de la table departement
*/
function a_liste()
{
    $result = departement_findAll();
    $vue = "../application/controleur/departement/departement_liste.php";
    require "../application/gabarit/gabarit.php";
}

/*
Affiche le formulaire d'édition/création d'un enregistrement de la table departement
Si $id==0 alors création sinon édition
*/
function a_edit()
{
    $id = (isset($_GET["id"])) ? $_GET["id"] : 0;
    if ($id == 0) {
        $dep_id=0;
$dep_nom='';
$dep_code='';

    } else {
        $id = mres($id);
        $row = departement_charger($id);
        extract(array_map("hsc", $row));
    }

    $vue = "../application/controleur/departement/departement_edit.php";
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
    departement_delete($id);

    header("location:" . hlien("departement", "liste"));
}

/*
INSERT or UPDATE d'un enregistrement de la table departement
*/
function a_save()
{
    if (isset($_POST["btSubmit"])) {
        departement_save($_POST);
    }

    header("location:" . hlien("departement", "liste"));
}
