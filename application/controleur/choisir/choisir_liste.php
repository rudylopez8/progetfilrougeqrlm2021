        <table>
            <caption><a href="<?=hlien("choisir","edit","id",0)?>">Créer enregistrement</a></caption>
            <thead>
                <tr>
                    <th>cho_id</th>
<th>cho_option</th>
<th>cho_location</th>

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
                    <td><?=$cho_id?></td>
<td><?=$cho_option?></td>
<td><?=$cho_location?></td>

                    <td><a href="<?=hlien("choisir","edit","id",$cho_id)?>">Edition</a></td>
                    <td><a href="<?=hlien("choisir","delete","id",$cho_id)?>">Suppression</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>