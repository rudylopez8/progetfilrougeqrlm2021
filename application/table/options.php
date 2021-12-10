<?php
//@return all records
function options_findAll()
{
    global $link;

    $sql = "select * from options";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
    return $result;
}

//@return one record
function options_charger($id)
{
    global $link;

    $sql = "select * from options where opt_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }

    return mysqli_fetch_assoc($result);
}

//delete one record
function options_delete($id)
{
    global $link;

    $sql = "delete from options where opt_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}

//INSERT or UPDATE one record
function options_save($data)
{
    global $link;

    extract(array_map("mres", $data));

    if ($opt_id==0)
        $sql="insert into options (opt_id,opt_nom,opt_prix) values (null,'$opt_nom','$opt_prix')";
    else 
        $sql="update options set opt_nom='$opt_nom',opt_prix='$opt_prix' where opt_id=$opt_id";

    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}
