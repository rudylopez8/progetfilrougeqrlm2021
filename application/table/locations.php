<?php
//@return all records
function locations_findAll()
{
    global $link;

    $sql = "select * from locations";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
    return $result;
}

//@return one record
function locations_charger($id)
{
    global $link;

    $sql = "select * from locations where loc_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }

    return mysqli_fetch_assoc($result);
}

//delete one record
function locations_delete($id)
{
    global $link;

    $sql = "delete from locations where loc_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}

//INSERT or UPDATE one record
function locations_save($data)
{
    global $link;

    extract(array_map("mres", $data));

    if ($loc_id==0)
        $sql="insert into locations (loc_id,loc_datedemande,loc_datedebut,loc_datefin,loc_client,loc_agencedepart,loc_agencearrivee,loc_voiture,loc_statut,loc_gestionaire) values (null,'$loc_datedemande','$loc_datedebut','$loc_datefin','$loc_client','$loc_agencedepart','$loc_agencearrivee','$loc_voiture','$loc_statut','$loc_gestionaire')";
    else 
        $sql="update locations set loc_datedemande='$loc_datedemande',loc_datedebut='$loc_datedebut',loc_datefin='$loc_datefin',loc_client='$loc_client',loc_agencedepart='$loc_agencedepart',loc_agencearrivee='$loc_agencearrivee',loc_voiture='$loc_voiture',loc_statut='$loc_statut',loc_gestionaire='$loc_gestionaire' where loc_id=$loc_id";

    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}
