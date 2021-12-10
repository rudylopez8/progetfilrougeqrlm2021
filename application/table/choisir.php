<?php
//@return all records
function choisir_findAll()
{
    global $link;

    $sql = "select * from choisir";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
    return $result;
}

//@return one record
function choisir_charger($id)
{
    global $link;

    $sql = "select * from choisir where cho_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }

    return mysqli_fetch_assoc($result);
}

//delete one record
function choisir_delete($id)
{
    global $link;

    $sql = "delete from choisir where cho_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}

//INSERT or UPDATE one record
function choisir_save($data)
{
    global $link;

    extract(array_map("mres", $data));

    if ($cho_id==0)
        $sql="insert into choisir (cho_id,cho_option,cho_location) values (null,'$cho_option','$cho_location')";
    else 
        $sql="update choisir set cho_option='$cho_option',cho_location='$cho_location' where cho_id=$cho_id";

    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}
