        <table>
            <caption><a href="<?=hlien("categorie","edit","id",0)?>">Créer enregistrement</a></caption>
            <thead>
                <tr>
                    <th>cat_id</th>
<th>cat_nom</th>

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
                    <td><?=$cat_id?></td>
<td><?=$cat_nom?></td>

                    <td><a href="<?=hlien("categorie","edit","id",$cat_id)?>">Edition</a></td>
                    <td><a href="<?=hlien("categorie","delete","id",$cat_id)?>">Suppression</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>