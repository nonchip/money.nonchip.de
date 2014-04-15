<form method="post" action="/account/editSubmit/<?=$id?>" class="pure-form pure-form-stacked">
    <fieldset>

        <input name="shortname" type="text" placeholder="shortname" value="<?=$account?$account->shortname:''?>">
        <textarea name="longdesc" placeholder="longdesc"><?=$account?$account->longdesc:''?></textarea>
        <input name="balance" type="number" step="0.01" placeholder="balance" value="<?=$account?$account->balance:''?>">

        <button type="submit" class="pure-button pure-button-primary"><?=($id==0?'Create account':'Save changes')?></button>
    </fieldset>
</form>