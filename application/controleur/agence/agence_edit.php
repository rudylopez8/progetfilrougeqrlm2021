        <form method="post" action="<?=hlien("agence","save")?>">
            <input type="hidden" name="age_id" value="<?=$age_id?>">
            <p>
                <label>age_id : </label><b><?=$age_id?></b>
            </p>
            <p>
<label for='age_nom'>age_nom : </label>
<input type='text' name='age_nom' id='age_nom' value='<?=$age_nom?>'>
</p>
<p>
<label for='age_departement'>age_departement : </label>
<input type='text' name='age_departement' id='age_departement' value='<?=$age_departement?>'>
</p>

            <p>
                <input type="submit" name="btSubmit" value="Envoyer">
            </p>
        </form>