<?php
function a_index()
{
    global $link;

    $message = "";
    $data = [];
    $sql = "";
    extract($_POST);
    if (isset($btSubmit)) {
        /* Exécution d'une requête multiple */
        $compteur = 0;
        $sql_array = explode(";", $sql);
        if (mysqli_multi_query($link, $sql)) {
            $data = [];
            $compteur = 0;
            do {
                /* Stockage du premier résultat */
                $data[$compteur] = [];
                if ($result = mysqli_store_result($link)) {
                    $data[$compteur] = mysqli_fetch_all($result, MYSQLI_ASSOC);
                }
                if (mysqli_more_results($link))
                    $compteur++;
            } while (@mysqli_next_result($link));
        }

        if (mysqli_errno($link))
            $message = "sql : " . $sql_array[$compteur] . "<br>Erreur : " . utf8_encode(mysqli_error($link));
    }

    $vue = "../application/controleur/_database/_database_index.php";
    require "../application/gabarit/gabarit.php";
}

function a_requete()
{
    global $link;

    //initialisation de message et data
    $message = "";
    $data = [];
    //éventuellement récupération de la requête sql
    extract($_POST);
    if (isset($btSubmit)) {
        //execution de la requête
        if ($result = mysqli_query($link, $sql))
            $data = $result->fetch_all(MYSQLI_ASSOC);
        else
            $message = mysqli_error($link);
    } else {
        //1ere affichage du formulaire
        $sql = "";
    }

    $vue = "../application/controleur/_database/_database_requete.php";
    require "../application/gabarit/gabarit.php";
}

function addQuotes($str)
{
    return "'$str'";
}

function insert_data($table, $data)
{
    global $link;
    $sql = "insert into $table values ";
    $tab = [];
    foreach ($data as $ligne) {
        $ligne = array_map("addQuotes", $ligne);
        $tab[] = "(" . implode(",", $ligne) . ")";
    }
    mysqli_query($link, $sql . implode(",", $tab));
    echo "$table<br>";
}


function a_dataset()
{
    global $link;

    $message = "";
    extract($_POST);

    if (isset($btsubmit)) {
        //profil
         $data = ["client", "agent", "src", "admin"];
        $nb = count($data);
        foreach ($data as $valeur) {
            $sql = "insert into profil values ('','$valeur')";
            mysqli_query($link, $sql);
        }
        $message .= "$nb profil<br>";


        //categorie
        $data = ["petit", "moyen", "grand", "utilitaire", "prestige", "camping car"];
        $nb = count($data);
        foreach ($data as $valeur) {
            $sql = "insert into categorie values ('','$valeur')";
            mysqli_query($link, $sql);
        }
        $message .= "$nb categorie<br>";

        //intervalle       
        $sql = "insert into intervalle values ('', '1', '11'), ('', '12', '24'), ('', '25', '500')";
        mysqli_query($link, $sql);

        //tarif
        $sql = "insert into tarif values ";
        $tab = [];
        $data = array(
            1 => array(1 => 4, 2 => 3.5, 3 => 3),
            2 => array(1 => 5, 2 => 4.5, 3 => 4),
            3 => array(1 => 7, 2 => 6.5, 3 => 6),
            4 => array(1 => 3, 2 => 2.5, 3 => 2),
            5 => array(1 => 15, 2 => 14, 3 => 13),
            6 => array(1 => 17, 2 => 16, 3 => 15)
        );
        print_r($data);
        $sqltarif = "select count(*) nbc 
            from categorie";
        $result = mysqli_query($link, $sqltarif);
        $nbcategorie = mysqli_fetch_assoc($result)["nbc"];

        $sqlintervalle = "select count(*) nbi 
            from intervalle";
        $result = mysqli_query($link, $sqlintervalle);
        $nbintervalle = mysqli_fetch_assoc($result)["nbi"];

        for ($i = 1; $i <= $nbcategorie; $i++) {
            for ($a = 1; $a <= $nbintervalle; $a++) {
                $prix = $data[$i][$a];
                $nom = "tarif$a";
                // $tab[] = "('','$i','$a','$prix')";
                $tab[] = ['', "$i", "$a", "$prix"];
            }
        }
        insert_data("tarif", $tab);
        //mysqli_query($link, $sql . implode(",", $tab));
        $message .= "tarifs<br>";

        //departement
        $data = [];
        for ($i = 1; $i <= 20; $i++)
            $data[] = ['', "departement$i", "$i"];
        insert_data("departement", $data);
        echo "ok departement";

        //agence
        $data = [];
        for ($i = 1; $i <= 20; $i++)
            $data[] = ['', "agence $i", "$i"];
        insert_data("agence", $data);

        //Utilisateur
        $nbclient = 1000;
        $nbagent = 40;
        $nbsrc = 10;
        $nbadmin = 2;

        $data = []; 
        $sql = "insert into utilisateur values ";       
        for ($i = 1; $i <= $nbclient; $i++) {
            $mdp = "toto";
            $data[]="('','client$i', 'clilog$i','climail$i','$mdp', 1,NULL)";
        }
        $sql=$sql . implode(",",$data);
        mysqli_query($link, $sql);

        $data = [];
        $sql = "insert into utilisateur values ";
        for ($i = 1; $i <= $nbagent; $i++) {
            $a = ceil($i / 2);
            $mdp = "toto";
            $data[]="('','ageent$i', 'agelog$i','agemail$i','$mdp', 2,'$a')";
        }
        $sql=$sql . implode(",",$data);
        mysqli_query($link, $sql);
        
        $data = [];
        $sql = "insert into utilisateur values ";
        for ($i = 1; $i <= $nbsrc; $i++) {
            $mdp = "toto";
            $data[]="('','src$i', 'srclog$i','srcmail$i','$mdp', 3,NULL)";
        }
        $sql=$sql . implode(",",$data);
        mysqli_query($link, $sql);

        $data = [];
        $sql = "insert into utilisateur values ";
        for ($i = 1; $i <= $nbadmin; $i++) {
            $mdp = "toto";
            $data[]="('','admin$i', 'adminlog$i','adminmail$i','$mdp', 4,NULL)";
        }
        $sql=$sql . implode(",",$data);
        mysqli_query($link, $sql);


        //option 
        $nb = 0;
        $data = [
            'climatisation' => 10,
            'GPS' => 7,
            'pneus neiges' => 23,
            'lecteur video' => 5,
            'minibar' => 15
        ];
        foreach ($data as $nom => $prix) {
            $sql = "insert into options values ('','$nom','$prix')";
            mysqli_query($link, $sql);
            $nb++;
        }
        $message .= "$nb option <br>";

        //voiture
        $data = [];
        $nbvoiture = 10;
        $sql2 = "select count(*) nb from agence";
        $result = mysqli_query($link, $sql2);
        $nombreagence = mysqli_fetch_assoc($result)["nb"];
        $sql3 = "select count(*) nb from categorie";
        $result = mysqli_query($link, $sql3);
        $nombrecategorie = mysqli_fetch_assoc($result)["nb"];

        for ($i = 1; $i <= $nombreagence; $i++) {
            for ($j = 1; $j <= $nbvoiture; $j++) {
                $categorie = mt_rand(1, $nombrecategorie);
                $data[] = ['', "immatricule$i", "$categorie", "$i"];
            }
        }
        insert_data("voiture", $data);
 
        //location
        $nbvoiture = 10 ;
        $nbclient = 1000;
        $nombreagence = 20;
        $nbagent = 40;
        $nbsrc = 10;
        $nbadmin = 2;

        $data = [];
        $sql = "insert into locations values ";
        $nbtotalvoiture = $nbvoiture * 20;
    $statutliste=["initialisée","en cours","validée","annulée"];
        $journee = (24 * 3600);
        $tdateactuelle = time();    
        for ($i = 1; $i <= $nbtotalvoiture; $i++) {
            for ($j = 1; $j <= 5; $j++) {
                $jour = mt_rand(1, 24);
                $tsdemande=mktime(mt_rand(1,24),0,0,mt_rand(1,12),$jour,2021);
                $tsdebut=$tsdemande+(24*3600);
                $tsfin=$tsdemande+$journee+mt_rand(3600,(48*3600));
                
                $datedemande=date("Y-m-d H:i:s",$tsdemande);
                $datedebut=date("Y-m-d H:i:s",$tsdebut);
                $datefin=date("Y-m-d H:i:s",$tsfin);
if ($tsfin<$tdateactuelle) {
    $hasard = mt_rand(1,20);
    if ($hasard == 20 ){
        $statut = $statutliste[3]; 
    } else {
        $statut = $statutliste[2];  
    }
    
}              
elseif (($tsdebut>$tdateactuelle)) {
    $statut = $statutliste[0];
}
else {
    $statut = $statutliste[1];
}

/* 

               $datededemande = mktime(mt_rand(8, 20), 0, 0, mt_rand(1, 12), $jour + $j, 2021);
              $dtdemande = date("Y-m-d H:i:s", $datededemande);
$datededebut=mktime($datededemande+$journee);
                $dtdebut = date("Y-m-d H:i:s", mktime($datededebut));
                $datedefin=mktime(mt_rand($datededebut+3600,$datededebut+(48*3600)));

                $dtfin = date("Y-m-d H:i:s", mktime($datedefin));
 */


                $client = mt_rand(1, $nbclient);
                $agedep = mt_rand(1, $nombreagence);
                $agearr = mt_rand(1, $nombreagence);
                $gestionnaire = mt_rand($nbclient, $nbclient + $nbagent + $nbsrc + $nbadmin);
                $data[] = "('', '$datedemande', '$datedebut', '$datefin', '$client', '$agedep', '$agearr', '$i','$statut', '$gestionnaire')";
            }
        }
        print_r($data);
        $sql=$sql . implode(",",$data);
        mysqli_query($link, $sql);
// select age_id,voi_id,count(*) nb from voiture,agence where voi_localiation=age_id group age_id
        //choisir
        $data = [];
        // on récupère le nombre de location
        $sql2 = "select count(*) nbl from locations";
        $result = mysqli_query($link, $sql2);
        $nombrelocations = mysqli_fetch_assoc($result)["nbl"];
        // on récupère le nombre d'option
        $sql3 = "select count(*) nbo from options";
        $result = mysqli_query($link, $sql3);
        $nombreoptions = mysqli_fetch_assoc($result)["nbo"];
        $taboptions = [];
        // on fait un tableau avec le nombre et donc l'id des options
        for ($i = 1; $i <= $nombreoptions; $i++) {
            $taboptions[] = $i;
        }
        // on test la posibilité de choisir des options pour toute les locations
        $nbchoisir = 2;
        for ($i = 1; $i <= $nombrelocations; $i++) {
            $choisir_option = mt_rand(1, 2);
            // si choisir option est = a 1 on choisie des option pour la location sinon rien
            if ($choisir_option = 1) {
                // on détermine le nombre des option choisis                
                $nbchoix = mt_rand(1, $nbchoisir);
                for ($j = 1; $j <= $nbchoix; $j++) {
                    shuffle($taboptions);
                    $data[] = ['', "$taboptions[$j]", "$i"];
                }
            }
        }
        insert_data("choisir", $data);
    }

    $vue = "../application/controleur/_database/_database_dataset.php";
    require "../application/gabarit/gabarit.php";
}
