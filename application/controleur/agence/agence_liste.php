        <table>
            <caption><a href="<?=hlien("agence","edit","id",0)?>">Créer enregistrement</a></caption>
            <thead>
                <tr>
                    <th>age_id</th>
<th>age_nom</th>
<th>age_departement</th>

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
                    <td><?=$age_id?></td>
<td><?=$age_nom?></td>
<td><?=$age_departement?></td>

                    <td><a href="<?=hlien("agence","edit","id",$age_id)?>">Edition</a></td>
                    <td><a href="<?=hlien("agence","delete","id",$age_id)?>">Suppression</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>