<input type="hidden" name="<?=DBCmsFields::Field?>" value="<?= $this->{DBCmsFields::Field}?>">
<input type="hidden" name="<?=DBCmsFields::TemplateName?>" value="<?= get_class($this)?>">
<input type="hidden" name="order" value="<?= $_GET['order']?>">
<input type="hidden" name="action" value="<?= $_GET['action']?>">

<input id="submit" type="submit" name="submit" value="Feld ändern">
<input id="abort" type="button" name="abort" value="Abbrechen">


</form>