        <table>
            <caption><a href="<?=hlien("locations","edit","id",0)?>">Créer enregistrement</a></caption>
            <thead>
                <tr>
                    <th>loc_id</th>
<th>loc_datedemande</th>
<th>loc_datedebut</th>
<th>loc_datefin</th>
<th>loc_client</th>
<th>loc_agencedepart</th>
<th>loc_agencearrivee</th>
<th>loc_voiture</th>
<th>loc_gestionaire</th>

                    <th>Edition</th>
                    <th>Suppression</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    //Application de htmlspecialchar à chaque élement de $row
                    extract(array_map("hsc",$row));    
                    ?>
                <tr>
                    <td><?=$loc_id?></td>
<td><?=$loc_datedemande?></td>
<td><?=$loc_datedebut?></td>
<td><?=$loc_datefin?></td>
<td><?=$loc_client?></td>
<td><?=$loc_agencedepart?></td>
<td><?=$loc_agencearrivee?></td>
<td><?=$loc_voiture?></td>
<td><?=$loc_gestionaire?></td>

                    <td><a href="<?=hlien("locations","edit","id",$loc_id)?>">Edition</a></td>
                    <td><a href="<?=hlien("locations","delete","id",$loc_id)?>">Suppression</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>