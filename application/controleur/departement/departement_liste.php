        <table>
            <caption><a href="<?=hlien("departement","edit","id",0)?>">Créer enregistrement</a></caption>
            <thead>
                <tr>
                    <th>dep_id</th>
<th>dep_nom</th>
<th>dep_code</th>

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
                    <td><?=$dep_id?></td>
<td><?=$dep_nom?></td>
<td><?=$dep_code?></td>

                    <td><a href="<?=hlien("departement","edit","id",$dep_id)?>">Edition</a></td>
                    <td><a href="<?=hlien("departement","delete","id",$dep_id)?>">Suppression</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>