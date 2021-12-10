        <form method="post" action="<?=hlien("voiture","save")?>">
            <input type="hidden" name="voi_id" value="<?=$voi_id?>">
            <p>
                <label>voi_id : </label><b><?=$voi_id?></b>
            </p>
            <p>
<label for='voi_immatriculation'>voi_immatriculation : </label>
<input type='text' name='voi_immatriculation' id='voi_immatriculation' value='<?=$voi_immatriculation?>'>
</p>
<p>
<label for='voi_categorie'>voi_categorie : </label>
<input type='text' name='voi_categorie' id='voi_categorie' value='<?=$voi_categorie?>'>
</p>
<p>
<label for='voi_localisation'>voi_localisation : </label>
<input type='text' name='voi_localisation' id='voi_localisation' value='<?=$voi_localisation?>'>
</p>

            <p>
                <input type="submit" name="btSubmit" value="Envoyer">
            </p>
        </form>