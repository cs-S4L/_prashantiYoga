<form id="cmsEdit" action="<?=BASE_URL ?>cmsEdit/processEdit.php" method="POST">
	<h3>Editiere das Feld "<?= $this->{DBCmsFields::Field}?>"</h3>
	
	<label for="heading">Überschrift:</label>
	<input type="text" name="heading" value="<?=$this->writeToForm('heading')?>">

	<label for="text">Text:</label>
	<textarea name="text" rows="6"><?=$this->writeToForm('text')?></textarea>

	<input type="hidden" name="<?=DBCmsFields::Field?>" value="<?= $this->{DBCmsFields::Field}?>">
	<input type="hidden" name="<?=DBCmsFields::TemplateName?>" value="<?= get_class($this)?>">
	<input id="submit" type="submit" name="submit" value="Feld ändern">
	<input id="abort" type="button" name="abort" value="Abbrechen">
</form>