<?php
//@return all records
function intervalle_findAll()
{
    global $link;

    $sql = "select * from intervalle";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
    return $result;
}

//@return one record
function intervalle_charger($id)
{
    global $link;

    $sql = "select * from intervalle where int_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }

    return mysqli_fetch_assoc($result);
}

//delete one record
function intervalle_delete($id)
{
    global $link;

    $sql = "delete from intervalle where int_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}

//INSERT or UPDATE one record
function intervalle_save($data)
{
    global $link;

    extract(array_map("mres", $data));

    if ($int_id==0)
        $sql="insert into intervalle (int_id,int_min,int_max) values (null,'$int_min','$int_max')";
    else 
        $sql="update intervalle set int_min='$int_min',int_max='$int_max' where int_id=$int_id";

    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}
