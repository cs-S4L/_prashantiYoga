<input type="hidden" name="<?=DBCmsFields::Field?>" value="<?= $this->{DBCmsFields::Field}?>">
<input type="hidden" name="<?=DBCmsFields::TemplateName?>" value="<?= get_class($this)?>">
<input type="hidden" name="order" value="<?= $_GET['order']?>">
<input type="hidden" name="action" value="<?= $_GET['action']?>">

<input id="submit" type="submit" name="submit" value="Feld ändern">
<!-- <button id="submit" type='submit' name='submit'>Feld ändern</button> -->
<input id="abort" type="button" name="abort" value="Abbrechen">

</form>

<?php if ( ($_GET['action'] != 'insert') && ($this->dynamicTemplateCount)) {?>
<form id="cmsDelete" class="cmsEdit clear" action="<?=BASE_URL ?>cmsEdit/processEdit.php" method="POST">
<form >
<input type="hidden" name="<?=DBCmsFields::Field?>" value="<?= $this->{DBCmsFields::Field}?>">
<input type="hidden" name="<?=DBCmsFields::TemplateName?>" value="<?= get_class($this)?>">
<input type="hidden" name="order" value="<?= $_GET['order']?>">
<input type="hidden" name="action" value="<?= 'delete'?>">

<input id="delete" type="submit" name="delete" value="Feld Löschen">

</form>
<?php } ?>