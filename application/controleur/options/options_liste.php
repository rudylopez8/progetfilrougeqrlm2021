        <table>
            <caption><a href="<?=hlien("options","edit","id",0)?>">Créer enregistrement</a></caption>
            <thead>
                <tr>
                    <th>opt_id</th>
<th>opt_nom</th>
<th>opt_prix</th>

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
                    <td><?=$opt_id?></td>
<td><?=$opt_nom?></td>
<td><?=$opt_prix?></td>

                    <td><a href="<?=hlien("options","edit","id",$opt_id)?>">Edition</a></td>
                    <td><a href="<?=hlien("options","delete","id",$opt_id)?>">Suppression</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>