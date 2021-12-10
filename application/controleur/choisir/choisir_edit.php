        <form method="post" action="<?=hlien("choisir","save")?>">
            <input type="hidden" name="cho_id" value="<?=$cho_id?>">
            <p>
                <label>cho_id : </label><b><?=$cho_id?></b>
            </p>
            <p>
<label for='cho_option'>cho_option : </label>
<input type='text' name='cho_option' id='cho_option' value='<?=$cho_option?>'>
</p>
<p>
<label for='cho_location'>cho_location : </label>
<input type='text' name='cho_location' id='cho_location' value='<?=$cho_location?>'>
</p>

            <p>
                <input type="submit" name="btSubmit" value="Envoyer">
            </p>
        </form>