<?php
//@return all records
function profil_findAll()
{
    global $link;

    $sql = "select * from profil";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
    return $result;
}

//@return one record
function profil_charger($id)
{
    global $link;

    $sql = "select * from profil where pro_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }

    return mysqli_fetch_assoc($result);
}

//delete one record
function profil_delete($id)
{
    global $link;

    $sql = "delete from profil where pro_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}

//INSERT or UPDATE one record
function profil_save($data)
{
    global $link;

    extract(array_map("mres", $data));

    if ($pro_id==0)
        $sql="insert into profil (pro_id,pro_nom) values (null,'$pro_nom')";
    else 
        $sql="update profil set pro_nom='$pro_nom' where pro_id=$pro_id";

    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}
