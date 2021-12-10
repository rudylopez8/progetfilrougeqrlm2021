        <form method="post" action="<?=hlien("departement","save")?>">
            <input type="hidden" name="dep_id" value="<?=$dep_id?>">
            <p>
                <label>dep_id : </label><b><?=$dep_id?></b>
            </p>
            <p>
<label for='dep_nom'>dep_nom : </label>
<input type='text' name='dep_nom' id='dep_nom' value='<?=$dep_nom?>'>
</p>
<p>
<label for='dep_code'>dep_code : </label>
<input type='text' name='dep_code' id='dep_code' value='<?=$dep_code?>'>
</p>

            <p>
                <input type="submit" name="btSubmit" value="Envoyer">
            </p>
        </form>