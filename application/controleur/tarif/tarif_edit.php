        <form method="post" action="<?=hlien("tarif","save")?>">
            <input type="hidden" name="tar_id" value="<?=$tar_id?>">
            <p>
                <label>tar_id : </label><b><?=$tar_id?></b>
            </p>
            <p>
<label for='tar_categorie'>tar_categorie : </label>
<input type='text' name='tar_categorie' id='tar_categorie' value='<?=$tar_categorie?>'>
</p>
<p>
<label for='tar_intervalle'>tar_intervalle : </label>
<input type='text' name='tar_intervalle' id='tar_intervalle' value='<?=$tar_intervalle?>'>
</p>
<p>
<label for='tar_prix'>tar_prix : </label>
<input type='text' name='tar_prix' id='tar_prix' value='<?=$tar_prix?>'>
</p>

            <p>
                <input type="submit" name="btSubmit" value="Envoyer">
            </p>
        </form>