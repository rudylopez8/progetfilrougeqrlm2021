<?php
//@return all records
function agence_findAll()
{
    global $link;

    $sql = "select * from agence";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
    return $result;
}

//@return one record
function agence_charger($id)
{
    global $link;

    $sql = "select * from agence where age_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }

    return mysqli_fetch_assoc($result);
}

//delete one record
function agence_delete($id)
{
    global $link;

    $sql = "delete from agence where age_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}

//INSERT or UPDATE one record
function agence_save($data)
{
    global $link;

    extract(array_map("mres", $data));

    if ($age_id==0)
        $sql="insert into agence (age_id,age_nom,age_departement) values (null,'$age_nom','$age_departement')";
    else 
        $sql="update agence set age_nom='$age_nom',age_departement='$age_departement' where age_id=$age_id";

    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}
