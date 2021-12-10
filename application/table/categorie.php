<?php
//@return all records
function categorie_findAll()
{
    global $link;

    $sql = "select * from categorie";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
    return $result;
}

//@return one record
function categorie_charger($id)
{
    global $link;

    $sql = "select * from categorie where cat_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }

    return mysqli_fetch_assoc($result);
}

//delete one record
function categorie_delete($id)
{
    global $link;

    $sql = "delete from categorie where cat_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}

//INSERT or UPDATE one record
function categorie_save($data)
{
    global $link;

    extract(array_map("mres", $data));

    if ($cat_id==0)
        $sql="insert into categorie (cat_id,cat_nom) values (null,'$cat_nom')";
    else 
        $sql="update categorie set cat_nom='$cat_nom' where cat_id=$cat_id";

    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}
