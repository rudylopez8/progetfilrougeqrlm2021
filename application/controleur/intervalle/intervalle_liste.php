        <table>
            <caption><a href="<?=hlien("intervalle","edit","id",0)?>">Créer enregistrement</a></caption>
            <thead>
                <tr>
                    <th>int_id</th>
<th>int_min</th>
<th>int_max</th>

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
                    <td><?=$int_id?></td>
<td><?=$int_min?></td>
<td><?=$int_max?></td>

                    <td><a href="<?=hlien("intervalle","edit","id",$int_id)?>">Edition</a></td>
                    <td><a href="<?=hlien("intervalle","delete","id",$int_id)?>">Suppression</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>