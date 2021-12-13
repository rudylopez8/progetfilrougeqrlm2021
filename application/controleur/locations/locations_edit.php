        <form method="post" action="<?=hlien("locations","save")?>">
            <input type="hidden" name="loc_id" value="<?=$loc_id?>">
            <p>
                <label>loc_id : </label><b><?=$loc_id?></b>
            </p>
            <p>
<label for='loc_datedemande'>loc_datedemande : </label>
<input type='text' name='loc_datedemande' id='loc_datedemande' value='<?=$loc_datedemande?>'>
</p>
<p>
<label for='loc_datedebut'>loc_datedebut : </label>
<input type='text' name='loc_datedebut' id='loc_datedebut' value='<?=$loc_datedebut?>'>
</p>
<p>
<label for='loc_datefin'>loc_datefin : </label>
<input type='text' name='loc_datefin' id='loc_datefin' value='<?=$loc_datefin?>'>
</p>
<p>
<label for='loc_client'>loc_client : </label>
<input type='text' name='loc_client' id='loc_client' value='<?=$loc_client?>'>
</p>
<p>
<label for='loc_agencedepart'>loc_agencedepart : </label>
<input type='text' name='loc_agencedepart' id='loc_agencedepart' value='<?=$loc_agencedepart?>'>
</p>
<p>
<label for='loc_agencearrivee'>loc_agencearrivee : </label>
<input type='text' name='loc_agencearrivee' id='loc_agencearrivee' value='<?=$loc_agencearrivee?>'>
</p>
<p>
<label for='loc_voiture'>loc_voiture : </label>
<input type='text' name='loc_voiture' id='loc_voiture' value='<?=$loc_voiture?>'>
</p>
<p>
<label for='loc_statut'>loc_statut : </label>
<input type='text' name='loc_statut' id='loc_statut' value='<?=$loc_statut?>'>
</p>
<p>
<label for='loc_gestionaire'>loc_gestionaire : </label>
<input type='text' name='loc_gestionaire' id='loc_gestionaire' value='<?=$loc_gestionaire?>'>
</p>

            <p>
                <input type="submit" name="btSubmit" value="Envoyer">
            </p>
        </form>