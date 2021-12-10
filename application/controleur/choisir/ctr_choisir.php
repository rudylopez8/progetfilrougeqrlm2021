<?php
//controleur secondaire associé à la table choisir
require_once "../application/table/choisir.php";

/*
Affiche la liste des enregistrements de la table choisir
*/
function a_liste()
{
    $result = choisir_findAll();
    $vue = "../application/controleur/choisir/choisir_liste.php";
    require "../application/gabarit/gabarit.php";
}

/*
Affiche le formulaire d'édition/création d'un enregistrement de la table choisir
Si $id==0 alors création sinon édition
*/
function a_edit()
{
    $id = (isset($_GET["id"])) ? $_GET["id"] : 0;
    if ($id == 0) {
        $cho_id=0;
$cho_option='';
$cho_location='';

    } else {
        $id = mres($id);
        $row = choisir_charger($id);
        extract(array_map("hsc", $row));
    }

    $vue = "../application/controleur/choisir/choisir_edit.php";
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
    choisir_delete($id);

    header("location:" . hlien("choisir", "liste"));
}

/*
INSERT or UPDATE d'un enregistrement de la table choisir
*/
function a_save()
{
    if (isset($_POST["btSubmit"])) {
        choisir_save($_POST);
    }

    header("location:" . hlien("choisir", "liste"));
}
