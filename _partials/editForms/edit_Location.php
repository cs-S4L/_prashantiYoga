<form id="cmsEdit" action="<?=BASE_URL ?>cmsEdit/processEdit.php" method="POST">
	<h3>Editiere das Feld "<?= $this->{DBCmsFields::Field}?>"</h3>
	
	<label for="text">Adresse:</label>
	<textarea name="adress" rows="6"><?=$this->writeToForm('adress')?></textarea>

	<label for="heading">Location Homepage:</label>
	<input type="text" name="homepageUrl" value="<?=$this->writeToForm('homepageUrl')?>">

	<label for="heading">Maps Url:</label>
	<input type="text" name="mapsUrl" value="<?=$this->writeToForm('mapsUrl')?>">


	<input type="hidden" name="<?=DBCmsFields::Field?>" value="<?= $this->{DBCmsFields::Field}?>">
	<input type="hidden" name="<?=DBCmsFields::TemplateName?>" value="<?= get_class($this)?>">
	<input id="submit" type="submit" name="submit" value="change">
	<input id="abort" type="button" name="abort" value="abort">
</form>