<?php
//controleur secondaire associé à la table options
require_once "../application/table/options.php";

/*
Affiche la liste des enregistrements de la table options
*/
function a_liste()
{
    $result = options_findAll();
    $vue = "../application/controleur/options/options_liste.php";
    require "../application/gabarit/gabarit.php";
}

/*
Affiche le formulaire d'édition/création d'un enregistrement de la table options
Si $id==0 alors création sinon édition
*/
function a_edit()
{
    $id = (isset($_GET["id"])) ? $_GET["id"] : 0;
    if ($id == 0) {
        $opt_id=0;
$opt_nom='';
$opt_prix='';

    } else {
        $id = mres($id);
        $row = options_charger($id);
        extract(array_map("hsc", $row));
    }

    $vue = "../application/controleur/options/options_edit.php";
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
    options_delete($id);

    header("location:" . hlien("options", "liste"));
}

/*
INSERT or UPDATE d'un enregistrement de la table options
*/
function a_save()
{
    if (isset($_POST["btSubmit"])) {
        options_save($_POST);
    }

    header("location:" . hlien("options", "liste"));
}
