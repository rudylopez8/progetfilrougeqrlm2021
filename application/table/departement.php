<?php
//@return all records
function departement_findAll()
{
    global $link;

    $sql = "select * from departement";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
    return $result;
}

//@return one record
function departement_charger($id)
{
    global $link;

    $sql = "select * from departement where dep_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }

    return mysqli_fetch_assoc($result);
}

//delete one record
function departement_delete($id)
{
    global $link;

    $sql = "delete from departement where dep_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}

//INSERT or UPDATE one record
function departement_save($data)
{
    global $link;

    extract(array_map("mres", $data));

    if ($dep_id==0)
        $sql="insert into departement (dep_id,dep_nom,dep_code) values (null,'$dep_nom','$dep_code')";
    else 
        $sql="update departement set dep_nom='$dep_nom',dep_code='$dep_code' where dep_id=$dep_id";

    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}
