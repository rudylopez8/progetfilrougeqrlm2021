<?php
//controleur secondaire associé à la table intervalle
require_once "../application/table/intervalle.php";

/*
Affiche la liste des enregistrements de la table intervalle
*/
function a_liste()
{
    $result = intervalle_findAll();
    $vue = "../application/controleur/intervalle/intervalle_liste.php";
    require "../application/gabarit/gabarit.php";
}

/*
Affiche le formulaire d'édition/création d'un enregistrement de la table intervalle
Si $id==0 alors création sinon édition
*/
function a_edit()
{
    $id = (isset($_GET["id"])) ? $_GET["id"] : 0;
    if ($id == 0) {
        $int_id=0;
$int_min='';
$int_max='';

    } else {
        $id = mres($id);
        $row = intervalle_charger($id);
        extract(array_map("hsc", $row));
    }

    $vue = "../application/controleur/intervalle/intervalle_edit.php";
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
    intervalle_delete($id);

    header("location:" . hlien("intervalle", "liste"));
}

/*
INSERT or UPDATE d'un enregistrement de la table intervalle
*/
function a_save()
{
    if (isset($_POST["btSubmit"])) {
        intervalle_save($_POST);
    }

    header("location:" . hlien("intervalle", "liste"));
}
