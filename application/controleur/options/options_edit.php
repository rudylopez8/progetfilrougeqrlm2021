        <form method="post" action="<?=hlien("options","save")?>">
            <input type="hidden" name="opt_id" value="<?=$opt_id?>">
            <p>
                <label>opt_id : </label><b><?=$opt_id?></b>
            </p>
            <p>
<label for='opt_nom'>opt_nom : </label>
<input type='text' name='opt_nom' id='opt_nom' value='<?=$opt_nom?>'>
</p>
<p>
<label for='opt_prix'>opt_prix : </label>
<input type='text' name='opt_prix' id='opt_prix' value='<?=$opt_prix?>'>
</p>

            <p>
                <input type="submit" name="btSubmit" value="Envoyer">
            </p>
        </form>