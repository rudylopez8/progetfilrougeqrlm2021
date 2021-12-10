        <form method="post" action="<?=hlien("intervalle","save")?>">
            <input type="hidden" name="int_id" value="<?=$int_id?>">
            <p>
                <label>int_id : </label><b><?=$int_id?></b>
            </p>
            <p>
<label for='int_min'>int_min : </label>
<input type='text' name='int_min' id='int_min' value='<?=$int_min?>'>
</p>
<p>
<label for='int_max'>int_max : </label>
<input type='text' name='int_max' id='int_max' value='<?=$int_max?>'>
</p>

            <p>
                <input type="submit" name="btSubmit" value="Envoyer">
            </p>
        </form>