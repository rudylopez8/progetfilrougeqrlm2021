<?php
//controleur secondaire associé à la table tarif
require_once "../application/table/tarif.php";

/*
Affiche la liste des enregistrements de la table tarif
*/
function a_liste()
{
    $result = tarif_findAll();
    $vue = "../application/controleur/tarif/tarif_liste.php";
    require "../application/gabarit/gabarit.php";
}

/*
Affiche le formulaire d'édition/création d'un enregistrement de la table tarif
Si $id==0 alors création sinon édition
*/
function a_edit()
{
    $id = (isset($_GET["id"])) ? $_GET["id"] : 0;
    if ($id == 0) {
        $tar_id=0;
$tar_categorie='';
$tar_intervalle='';
$tar_prix='';

    } else {
        $id = mres($id);
        $row = tarif_charger($id);
        extract(array_map("hsc", $row));
    }

    $vue = "../application/controleur/tarif/tarif_edit.php";
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
    tarif_delete($id);

    header("location:" . hlien("tarif", "liste"));
}

/*
INSERT or UPDATE d'un enregistrement de la table tarif
*/
function a_save()
{
    if (isset($_POST["btSubmit"])) {
        tarif_save($_POST);
    }

    header("location:" . hlien("tarif", "liste"));
}
