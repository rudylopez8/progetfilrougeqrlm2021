<?php
//@return all records
function tarif_findAll()
{
    global $link;

    $sql = "select * from tarif";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
    return $result;
}

//@return one record
function tarif_charger($id)
{
    global $link;

    $sql = "select * from tarif where tar_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }

    return mysqli_fetch_assoc($result);
}

//delete one record
function tarif_delete($id)
{
    global $link;

    $sql = "delete from tarif where tar_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}

//INSERT or UPDATE one record
function tarif_save($data)
{
    global $link;

    extract(array_map("mres", $data));

    if ($tar_id==0)
        $sql="insert into tarif (tar_id,tar_categorie,tar_intervalle,tar_prix) values (null,'$tar_categorie','$tar_intervalle','$tar_prix')";
    else 
        $sql="update tarif set tar_categorie='$tar_categorie',tar_intervalle='$tar_intervalle',tar_prix='$tar_prix' where tar_id=$tar_id";

    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}
