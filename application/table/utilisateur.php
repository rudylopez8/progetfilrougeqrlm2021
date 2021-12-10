<?php
//@return all records
function utilisateur_findAll()
{
    global $link;

    $sql = "select * from utilisateur";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
    return $result;
}

//@return one record
function utilisateur_charger($id)
{
    global $link;

    $sql = "select * from utilisateur where uti_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }

    return mysqli_fetch_assoc($result);
}

//delete one record
function utilisateur_delete($id)
{
    global $link;

    $sql = "delete from utilisateur where uti_id=$id";
    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}

//INSERT or UPDATE one record
function utilisateur_save($data)
{
    global $link;

    extract(array_map("mres", $data));

    if ($uti_id==0)
        $sql="insert into utilisateur (uti_id,uti_nom,uti_login,uti_mail,uti_mdp,uti_profil,uti_agence) values (null,'$uti_nom','$uti_login','$uti_mail','$uti_mdp','$uti_profil','$uti_agence')";
    else 
        $sql="update utilisateur set uti_nom='$uti_nom',uti_login='$uti_login',uti_mail='$uti_mail',uti_mdp='$uti_mdp',uti_profil='$uti_profil',uti_agence='$uti_agence' where uti_id=$uti_id";

    $result = mysqli_query($link, $sql);
    if ($result === false) {
        echo mysqli_error($link);
        exit();
    }
}
