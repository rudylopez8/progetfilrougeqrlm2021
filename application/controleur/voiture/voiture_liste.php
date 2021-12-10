        <table>
            <caption><a href="<?=hlien("voiture","edit","id",0)?>">Créer enregistrement</a></caption>
            <thead>
                <tr>
                    <th>voi_id</th>
<th>voi_immatriculation</th>
<th>voi_categorie</th>
<th>voi_localisation</th>

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
                    <td><?=$voi_id?></td>
<td><?=$voi_immatriculation?></td>
<td><?=$voi_categorie?></td>
<td><?=$voi_localisation?></td>

                    <td><a href="<?=hlien("voiture","edit","id",$voi_id)?>">Edition</a></td>
                    <td><a href="<?=hlien("voiture","delete","id",$voi_id)?>">Suppression</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>