        <table>
            <caption><a href="<?=hlien("utilisateur","edit","id",0)?>">Créer enregistrement</a></caption>
            <thead>
                <tr>
                    <th>uti_id</th>
<th>uti_nom</th>
<th>uti_login</th>
<th>uti_mail</th>
<th>uti_mdp</th>
<th>uti_profil</th>
<th>uti_agence</th>

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
                    <td><?=$uti_id?></td>
<td><?=$uti_nom?></td>
<td><?=$uti_login?></td>
<td><?=$uti_mail?></td>
<td><?=$uti_mdp?></td>
<td><?=$uti_profil?></td>
<td><?=$uti_agence?></td>

                    <td><a href="<?=hlien("utilisateur","edit","id",$uti_id)?>">Edition</a></td>
                    <td><a href="<?=hlien("utilisateur","delete","id",$uti_id)?>">Suppression</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>