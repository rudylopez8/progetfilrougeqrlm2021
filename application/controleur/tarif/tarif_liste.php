        <table>
            <caption><a href="<?=hlien("tarif","edit","id",0)?>">Créer enregistrement</a></caption>
            <thead>
                <tr>
                    <th>tar_id</th>
<th>tar_categorie</th>
<th>tar_intervalle</th>
<th>tar_prix</th>

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
                    <td><?=$tar_id?></td>
<td><?=$tar_categorie?></td>
<td><?=$tar_intervalle?></td>
<td><?=$tar_prix?></td>

                    <td><a href="<?=hlien("tarif","edit","id",$tar_id)?>">Edition</a></td>
                    <td><a href="<?=hlien("tarif","delete","id",$tar_id)?>">Suppression</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>