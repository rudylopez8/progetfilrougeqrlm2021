<?php
//controleur secondaire associé à la table categorie
require_once "../application/table/categorie.php";

/*
Affiche la liste des enregistrements de la table categorie
*/
function a_liste()
{
    $result = categorie_findAll();
    $vue = "../application/controleur/categorie/categorie_liste.php";
    require "../application/gabarit/gabarit.php";
}

/*
Affiche le formulaire d'édition/création d'un enregistrement de la table categorie
Si $id==0 alors création sinon édition
*/
function a_edit()
{
    $id = (isset($_GET["id"])) ? $_GET["id"] : 0;
    if ($id == 0) {
        $cat_id=0;
$cat_nom='';

    } else {
        $id = mres($id);
        $row = categorie_charger($id);
        extract(array_map("hsc", $row));
    }

    $vue = "../application/controleur/categorie/categorie_edit.php";
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
    categorie_delete($id);

    header("location:" . hlien("categorie", "liste"));
}

/*
INSERT or UPDATE d'un enregistrement de la table categorie
*/
function a_save()
{
    if (isset($_POST["btSubmit"])) {
        categorie_save($_POST);
    }

    header("location:" . hlien("categorie", "liste"));
}
