        <table>
            <caption><a href="<?=hlien("profil","edit","id",0)?>">Créer enregistrement</a></caption>
            <thead>
                <tr>
                    <th>pro_id</th>
<th>pro_nom</th>

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
                    <td><?=$pro_id?></td>
<td><?=$pro_nom?></td>

                    <td><a href="<?=hlien("profil","edit","id",$pro_id)?>">Edition</a></td>
                    <td><a href="<?=hlien("profil","delete","id",$pro_id)?>">Suppression</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>