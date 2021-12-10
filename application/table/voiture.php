<?php
//@return all records
function voiture_findAll()
{
    global $link;

    $sql = "select * from voiture";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
    return $result;
}

//@return one record
function voiture_charger($id)
{
    global $link;

    $sql = "select * from voiture where voi_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }

    return mysqli_fetch_assoc($result);
}

//delete one record
function voiture_delete($id)
{
    global $link;

    $sql = "delete from voiture where voi_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}

//INSERT or UPDATE one record
function voiture_save($data)
{
    global $link;

    extract(array_map("mres", $data));

    if ($voi_id==0)
        $sql="insert into voiture (voi_id,voi_immatriculation,voi_categorie,voi_localisation) values (null,'$voi_immatriculation','$voi_categorie','$voi_localisation')";
    else 
        $sql="update voiture set voi_immatriculation='$voi_immatriculation',voi_categorie='$voi_categorie',voi_localisation='$voi_localisation' where voi_id=$voi_id";

    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}
