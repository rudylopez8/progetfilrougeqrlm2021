        <form method="post" action="<?=hlien("categorie","save")?>">
            <input type="hidden" name="cat_id" value="<?=$cat_id?>">
            <p>
                <label>cat_id : </label><b><?=$cat_id?></b>
            </p>
            <p>
<label for='cat_nom'>cat_nom : </label>
<input type='text' name='cat_nom' id='cat_nom' value='<?=$cat_nom?>'>
</p>

            <p>
                <input type="submit" name="btSubmit" value="Envoyer">
            </p>
        </form>