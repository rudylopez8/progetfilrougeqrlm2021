<?php
//controleur secondaire associé à la table agence
require_once "../application/table/agence.php";

/*
Affiche la liste des enregistrements de la table agence
*/
function a_liste()
{
    $result = agence_findAll();
    $vue = "../application/controleur/agence/agence_liste.php";
    require "../application/gabarit/gabarit.php";
}

/*
Affiche le formulaire d'édition/création d'un enregistrement de la table agence
Si $id==0 alors création sinon édition
*/
function a_edit()
{
    $id = (isset($_GET["id"])) ? $_GET["id"] : 0;
    if ($id == 0) {
        $age_id=0;
$age_nom='';
$age_departement='';

    } else {
        $id = mres($id);
        $row = agence_charger($id);
        extract(array_map("hsc", $row));
    }

    $vue = "../application/controleur/agence/agence_edit.php";
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
    agence_delete($id);

    header("location:" . hlien("agence", "liste"));
}

/*
INSERT or UPDATE d'un enregistrement de la table agence
*/
function a_save()
{
    if (isset($_POST["btSubmit"])) {
        agence_save($_POST);
    }

    header("location:" . hlien("agence", "liste"));
}
