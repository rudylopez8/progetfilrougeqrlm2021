        <form method="post" action="<?=hlien("profil","save")?>">
            <input type="hidden" name="pro_id" value="<?=$pro_id?>">
            <p>
                <label>pro_id : </label><b><?=$pro_id?></b>
            </p>
            <p>
<label for='pro_nom'>pro_nom : </label>
<input type='text' name='pro_nom' id='pro_nom' value='<?=$pro_nom?>'>
</p>

            <p>
                <input type="submit" name="btSubmit" value="Envoyer">
            </p>
        </form>