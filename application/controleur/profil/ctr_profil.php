<?php
//controleur secondaire associé à la table profil
require_once "../application/table/profil.php";

/*
Affiche la liste des enregistrements de la table profil
*/
function a_liste()
{
    $result = profil_findAll();
    $vue = "../application/controleur/profil/profil_liste.php";
    require "../application/gabarit/gabarit.php";
}

/*
Affiche le formulaire d'édition/création d'un enregistrement de la table profil
Si $id==0 alors création sinon édition
*/
function a_edit()
{
    $id = (isset($_GET["id"])) ? $_GET["id"] : 0;
    if ($id == 0) {
        $pro_id=0;
$pro_nom='';

    } else {
        $id = mres($id);
        $row = profil_charger($id);
        extract(array_map("hsc", $row));
    }

    $vue = "../application/controleur/profil/profil_edit.php";
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
    profil_delete($id);

    header("location:" . hlien("profil", "liste"));
}

/*
INSERT or UPDATE d'un enregistrement de la table profil
*/
function a_save()
{
    if (isset($_POST["btSubmit"])) {
        profil_save($_POST);
    }

    header("location:" . hlien("profil", "liste"));
}
