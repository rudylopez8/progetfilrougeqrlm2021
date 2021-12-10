        <form method="post" action="<?=hlien("utilisateur","save")?>">
            <input type="hidden" name="uti_id" value="<?=$uti_id?>">
            <p>
                <label>uti_id : </label><b><?=$uti_id?></b>
            </p>
            <p>
<label for='uti_nom'>uti_nom : </label>
<input type='text' name='uti_nom' id='uti_nom' value='<?=$uti_nom?>'>
</p>
<p>
<label for='uti_login'>uti_login : </label>
<input type='text' name='uti_login' id='uti_login' value='<?=$uti_login?>'>
</p>
<p>
<label for='uti_mail'>uti_mail : </label>
<input type='text' name='uti_mail' id='uti_mail' value='<?=$uti_mail?>'>
</p>
<p>
<label for='uti_mdp'>uti_mdp : </label>
<input type='text' name='uti_mdp' id='uti_mdp' value='<?=$uti_mdp?>'>
</p>
<p>
<label for='uti_profil'>uti_profil : </label>
<input type='text' name='uti_profil' id='uti_profil' value='<?=$uti_profil?>'>
</p>
<p>
<label for='uti_agence'>uti_agence : </label>
<input type='text' name='uti_agence' id='uti_agence' value='<?=$uti_agence?>'>
</p>

            <p>
                <input type="submit" name="btSubmit" value="Envoyer">
            </p>
        </form>